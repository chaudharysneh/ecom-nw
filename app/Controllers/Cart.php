<?php

namespace App\Controllers;


use App\Models\Productmodel;
use App\Models\CouponModel;
use CodeIgniter\API\ResponseTrait;
use App\Models\Categorymodel;
use App\Models\Subcategorymodel;
use App\Models\Variationmodel;
use App\Models\TaxModel;
use App\Models\VariationsDetails;
use App\Models\Variationvaluemodel;
use App\Models\variationtypemodel;
use App\Models\UserModel;
use App\Models\Allsettingsmodel;


class Cart extends BaseController
{
    use ResponseTrait;
    protected $Categorymodel;
    protected $Subcategorymodel;
    protected $Variation;
    protected $VariationsDetails;
    protected $Variationvaluemodel;
    protected $variationtypemodel;
    protected $CouponModel;
    protected $UserModel;
    protected $Allsettingsmodel;
    protected $TaxModel;

    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->Categorymodel = new Categorymodel($db);
        $this->Subcategorymodel = new Subcategorymodel($db);
        $this->Variation = new Variationmodel($db);
        $this->VariationsDetails = new VariationsDetails($db);
        $this->Variationvaluemodel = new Variationvaluemodel($db);
        $this->variationtypemodel = new variationtypemodel($db);
        $this->CouponModel = new CouponModel($db);
        $this->UserModel = new UserModel($db);
        $this->Allsettingsmodel = new Allsettingsmodel($db);
        $this->TaxModel = new TaxModel($db);


    }

    public function index()
    {
        // Retrieve the cart data from the session
        $cart = session()->get('cart');
        // echo "<pre>";
        // print_r($cart); die;
        // echo "</pre>";
        $CartTotals = (object) $this->calculateCartTotals();

        // echo "<pre>";
        // print_r($CartTotals); die;
        $data['catdata'] = $this->Categorymodel->findAll();
        $data['subdata'] = [];
        foreach ($data['catdata'] as $cat) {
            $subcategories = $this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $data['subdata'][$cat['CategoryID']] = $subcategories;
        }
        // ====================
        $userID = session()->get('user_id');
        $currentDate = date('Y-m-d');

        $cartProductIDs = $cart ? array_column($cart, 'id') ?? [] : [];
        $cartProductCatIDs = $cart ? array_column($cart, 'category_id') ?? [] : [];

        $couponQuery = $this->CouponModel
            ->where('StartDate <=', $currentDate)
            ->where('EndDate >=', $currentDate)
            ->where('CouponLive', 1);

        // if ($userID) {
        //     // // If a user ID is found, show coupons for the user or available to all users
        //     $couponQuery->groupStart()
        //         ->where('UserID', null)
        //         ->orWhere('UserID', $userID)
        //         ->groupEnd();
        //         } else {
        //             $couponQuery->where('UserID', null);
        //         }

        $coupons = $couponQuery->findAll();

        // ==================== Tax Logic ====================
        $TaxModel = new TaxModel;
        $isTaxEnabled = $TaxModel->where('is_check', 1)->countAllResults() > 0 ? 1 : 0;
        // ==================== End of Tax Logic ====================


        // ==================== Shipping Logic ====================
        $shippingZoneModel = new \App\Models\shippingzonemodel();
        // $isShippingEnabled = $shippingZoneModel->where('is_check', 1)->countAllResults() > 0;
        $isShippingEnabled = $shippingZoneModel->where('is_check', 1)->countAllResults() > 0 ? 1 : 0;
        // ==================== End of Shipping Logic ====================


        // $coupons = $this->CouponModel->findAll();

        return view('cart', [
            'cart' => $cart,
            'CartTotals' => $CartTotals,
            'catdata' => $data['catdata'],
            'subdata' => $data['subdata'],
            'coupons' => $coupons,
            'isShippingEnabled' => $isShippingEnabled,
            'isTaxEnabled' => $isTaxEnabled,
        ]);
    }

    public function checkout()
    {
        $cart = session()->get('cart');
        $CartTotals = (object) $this->calculateCartTotals();
        return view('checkout', [
            'cart' => $cart,
            'CartTotals' => $CartTotals,
        ]);
    }

    public function addcart()
    {

        $productId = $this->request->getVar('productId');
        $quantity = $this->request->getVar('quantity');
        $variationId = $this->request->getVar('variationId');
        $gotocheckout = $this->request->getVar('gotocheckout');
        $uid = $this->request->getVar('uid');
        $productPrice = 0;
        $image_path = '';

        // Load the ProductModel
        $productModel = new ProductModel();
        $product = $productModel->asObject()->find($productId);

        if ($product->ProductType == 2 && $variationId != "") {
            $product = $productModel->getProductWithVariation($productId, $variationId);
            $productPrice = $product->VariationPrice;

        } else if ($product->ProductType == 2) {

            $product = $productModel->getProductWithVariationdata($productId);
            $productPrice = $product->variationprice;

        } else {
            $productPrice = $product->ProductPrice;

        }

        if ($product === '') {
            $response = [
                'status' => 'error',
                'message' => 'Product not found.',
            ];
            $statusCode = 404; // Not Found
        } else {

            if ($uid != "") {
                $imageData = session()->get($uid);
                $image_path = $imageData['image_path'];
            } else {
                $imagitem = json_decode($product->ProductImage);
                $imgurl = (isset($imagitem[0])) ? ($imagitem[0]) : ('');
                $image_path = base_url('admin/public/assets/img/product_images/' . $imgurl);
            }

            // Create cart item array
            $cartItem = [
                'id' => $product->ProductID,
                'name' => $product->ProductName,
                'BrandID' => $product->BrandID,
                'BrandName' => $product->BrandName,
                'price' => $productPrice,
                'quantity' => $quantity,
                'unit_price' => $productPrice, // Add unit price
                'total' => ($productPrice * $quantity), // Add total
                'ProductImage' => $image_path,
                'ProductCartDesc' => $product->ProductCartDesc,
            ];


            // Check if cart already exists in session
            $cart = session()->get('cart');

            if ($cart) {
                // Check if the product with the same ID already exists in the cart
                $existingItemKey = $this->findCartItemIndex($cart, $productId);
                if ($existingItemKey !== false) {
                    // Update the quantity and recalculate unit price and total
                    $cart[$existingItemKey]['quantity'] += $quantity;
                    $cart[$existingItemKey]['unit_price'] = $productPrice;
                    $cart[$existingItemKey]['total'] = $productPrice * $cart[$existingItemKey]['quantity'];
                } else {
                    // Add the new item to the cart
                    $cart[] = $cartItem;
                }
            } else {
                // Cart doesn't exist, create a new cart array
                $cart = [$cartItem];
            }

            // Store the updated cart in the session
            session()->set('cart', $cart);

            $totalCartItem = count($cart);
            $CartTotals = (object) $this->calculateCartTotals();

            $response = [
                'status' => 'success',
                'message' => 'Product added successfully.',
                'gotocheckout' => $gotocheckout,
                'CartTotals' => count($cart),
                'total_item' => $CartTotals->subtotal,
                'cart' => $cart,
                'url' => base_url('checkout'),
            ];
            $statusCode = 200; // OK
        }
        echo json_encode($response);
    }

    public function addToCart()
    {
        $TaxModel = new TaxModel();
        $productId = $this->request->getVar('productId');

        // print_r($productId);die;
        $quantity = $this->request->getVar('quantity');
        $variationId = $this->request->getVar('variationId');
        $price = $this->request->getVar('price');
        $productPrice = 0;
        $image_path = '';
        $response = '';
        $tax_rate = 0;
        $imagitem = [];
        // Load the ProductModel
        $productModel = new ProductModel();
        $product = $productModel->asObject()->find($productId);

        // Check if user is logged in
        $userID = session()->get('user_id');
        $user = null;
        if ($userID) {
            $user = $this->UserModel->where('UserID', $userID)->first();
        }

        $Settings = new Allsettingsmodel();
        $settingsData = $Settings->first(); // Get the first setting
        if (!$settingsData) {
            return json_encode(['status' => 'fail', 'message' => 'Settings not found.']);
        }

        $emailadmin = $settingsData['Email'];


        if ($product->ProductType == '2' && $variationId != "") {
            $product = $productModel->getProductWithVariation($productId, $variationId);
            //$productPrice = $product->variationprice;
            $productPrice = ($product->VariationSalePrice) ? ($product->VariationSalePrice) : ($product->variationprice);
            $imagitem = json_decode(($product->product_variation_image) ? ($product->product_variation_image) : ([]));
            // $variation_n_data= $this->VariationsDetails->where('VariationID',$variationId)->findAll();
            $tax_data_from_vari_id = $this->Variation->where('VariationID', $variationId)->first();

            $product->is_taxable = $tax_data_from_vari_id['variation_is_taxable'];
            $product->tax_class_id = $tax_data_from_vari_id['variation_tax_class_id'];


            $variation_n_data = $this->VariationsDetails->select('VariationsDetails.*,variation_value.VariationName,variation_type.VariationTypeName, variation_type.VariationTypeID')
                ->join('variation_value', 'variation_value.VariationID=VariationsDetails.VariationVlueID')
                ->join('variation_type', '`variation_type`.`VariationTypeID`=`variation_value`.`VariationTypeID`')
                ->where('VariationsDetails.VariationID', $variationId)->findAll();

        } else if ($product->ProductType == '2' && $variationId == "") {

            $product = $productModel->getProductWithVariationdata($productId);
            $productPrice = ($product->VariationSalePrice) ? ($product->VariationSalePrice) : ($product->variationprice);
            $imagitem = json_decode(($product->product_variation_image) ? ($product->product_variation_image) : ([]));
            $variation_n_data = '';

        } else {
            $productPrice = ($product->Sale_ProductPrice) ? ($product->Sale_ProductPrice) : ($product->ProductPrice);
            $imagitem = json_decode($product->ProductImage);
            $variation_n_data = '';
        }

        if ($product === '') {
            $response = [
                'status' => 'error',
                'message' => 'Product not found.',
            ];

        } else {
            $imgurl = (isset($imagitem[0])) ? ($imagitem[0]) : ('');
            $image_path = base_url('admin/public/assets/img/product_images/' . $imgurl);

            $tax = null;
            if ($product->tax_class_id) {
                $tax = $TaxModel->getTaxRate($product->tax_class_id);
            }

            // Create cart item array
            $cartItem = [
                'id' => $product->ProductID,
                'category_id' => $product->CategoryID,
                'variationId' => ($variationId != "") ? ($variationId) : (''),
                'name' => $product->ProductName,
                'BrandID' => $product->BrandID,
                'is_taxable' => $product->is_taxable,
                'tax_class_id' => $product->tax_class_id,
                'tax' => $tax,
                'price' => $productPrice,
                'quantity' => $quantity,
                'unit_price' => $productPrice, // Add unit price
                'total' => ($productPrice * $quantity), // Add total
                'ProductImage' => $image_path,
                'ProductCartDesc' => $product->ProductCartDesc,
                'slug' => $product->slug,
                'vari_data' => $variation_n_data
            ];
            // echo "<pre>";print_r($cartItem); die;
            // Check if cart already exists in session
            $cart = session()->get('cart');
            if ($cart) {
                // Check if the product with the same ID already exists in the cart
                $existingItemKey = $this->findCartItemIndex($cart, $productId, $variationId);

                if ($existingItemKey !== false) {
                    // Update the quantity and recalculate unit price and total
                    $cart[$existingItemKey]['quantity'] += $quantity;
                    $cart[$existingItemKey]['unit_price'] = $productPrice;
                    $cart[$existingItemKey]['total'] = $productPrice * $cart[$existingItemKey]['quantity'];
                } else {
                    // Add the new item to the cart
                    $cart[] = $cartItem;
                }
            } else {
                // Cart doesn't exist, create a new cart array
                $cart = [$cartItem];
            }

            // Store the updated cart in the session
            session()->set('cart', $cart);

            $CartTotals = (object) $this->calculateCartTotals();

            // --------------------
            if ($user) {
                $email = $user['UserEmail'];
                $UserFirstName = $user['UserFirstName'];
                $UserLastName = $user['UserLastName'];

                $logo = "https://ecomweb.fableadtechnolabs.com/admin/public/upload_images/1702970978_5ddd8499c96a9fe06ef1.png";
                $imageUrl = base_url('/admin/public/assets/img/product_images/' . $image_path);

                // Prepare email content
                $subject = 'Product Added to Cart By Customer';
                $message = "<html><body>";
                $message .= "<div style='font-family: Arial, sans-serif; max-width: 600px; margin: auto; background-color: white; padding: 20px; border: solid 1px gainsboro;'>
                            <div style='text-align: center; margin-bottom: 20px;'>
                                <img src='" . $logo . "' alt='Pharmaxy Logo' style='max-width: 150px;'>
                                <h2 style='color: #333;'>Product Added to Cart</h2>
                                <p><strong>User Name:</strong> " . $UserFirstName . ' ' . $UserLastName . "</p>
                                <p><strong>User Email:</strong> " . $email . "</p>
                            </div>
                            <table style='width: 100%; border-collapse: collapse;'>
                                <tr>
                                    <th style='text-align: left; padding: 8px; background-color: #f4f4f4; border-top: 1px solid #ddd;'><strong>Image:</strong></th>
                                    <td style='padding: 8px; border-top: 1px solid #ddd;'>
                                        <img src='" . $image_path . "' alt='Product Image' style='max-width: 70px;'>
                                    </td>
                                </tr>
                                <tr>
                                    <th style='text-align: left; padding: 8px; background-color: #f4f4f4; border-top: 1px solid #ddd;'><strong>Product:</strong></th>
                                    <td style='padding: 8px; border-top: 1px solid #ddd;'>" . htmlspecialchars($product->ProductName) . "</td>
                                </tr>
                                <tr>
                                    <th style='text-align: left; padding: 8px; background-color: #f4f4f4; border-top: 1px solid #ddd;'><strong>Quantity:</strong></th>
                                    <td style='padding: 8px; border-top: 1px solid #ddd;'>" . htmlspecialchars($quantity) . "</td>
                                </tr>
                                <tr>
                                    <th style='text-align: left; padding: 8px; background-color: #f4f4f4; border-top: 1px solid #ddd;'><strong>Price:</strong></th>
                                    <td style='padding: 8px; border-top: 1px solid #ddd;'> ". $settingsData['currency'] . $productPrice . "</td>
                                </tr>
                                <tr>
                                    <th style='text-align: left; padding: 8px; background-color: #f4f4f4; border-top: 1px solid #ddd;'><strong>Total:</strong></th>
                                    <td style='padding: 8px; border-top: 1px solid #ddd;'>". $settingsData['currency'] . $productPrice * $quantity . "</td>
                                </tr>
                            </table>
                            <div style='text-align: center; margin-top: 20px;'>
                                <p style='color: #888;'>Copyright © 2024 Ecom - All Rights Reserved.</p>
                            </div>
                        </div>";
                $message .= "</body></html>";

                // Send email
                $emailSender = new \App\Libraries\EmailSender();
                $isMailSent = $emailSender->sendEmail($emailadmin, $subject, $message);
            }
            // ==============

            $response = [
                'status' => 'success',
                'message' => 'Product added successfully.',
                // 'gotocheckout'=>$gotocheckout,
                'CartTotals' => count($cart),
                'total_item' => $CartTotals->subtotal,
                'cart' => $cart,
                'url' => base_url('checkout'),
            ];
            $statusCode = 200; // OK

        }
        echo json_encode($response);
    }

    // Helper function to find the index of a cart item by ProductID
    private function findCartItemIndex($cart, $productId, $variationId = null)
    {
        foreach ($cart as $index => $item) {
            if ($item['id'] == $productId && $item['variationId'] == $variationId) {
                return $index;
            }
        }

        return false;
    }

    public function getCartItems()
    {
        $cart = session()->get('cart');

        return $cart ? $cart : array();
    }

    public function removeFromCart_old()
    {
        $response = [
            'status' => 'error',
            'message' => 'Product not found.',
        ];
        $statusCode = 404; // Not Found

        $itemId = $this->request->getVar('itemId');
        // Get the cart items from the session
        $cart = session()->get('cart');

        // Find the item index in the cart array
        $itemIndex = array_search($itemId, array_column($cart, 'id'));

        // Remove the item from the cart if found
        if ($itemIndex !== false) {
            unset($cart[$itemIndex]);
            $cart = array_values($cart);
            session()->set('cart', $cart);

            $CartTotals = (object) $this->calculateCartTotals();
            $DiscountPrice = 0;
            $shippingCost = 10; // Assuming a fixed shipping cost of $10

            $taxRate = 0.1; // Assuming a tax rate of 10%
            $tax = $CartTotals->subtotal * $taxRate;
            $totalWithShipping = ($CartTotals->subtotal - $DiscountPrice) + $shippingCost + $tax;
            if (session()->has('couponCode')) {
                $couponCode = session()->get('couponCode');

                $CouponModel = new CouponModel();
                $coupon = $CouponModel->where(['CouponLive' => 1, 'CouponCode' => $couponCode])->get()->getRow();
                //print_r( $coupon);exit();

                $couponDiscount = $coupon->CouponValue;
                if ($coupon->CouponType == '2') {
                    $DiscountPrice = $couponDiscount;
                } else {
                    $DiscountPrice = ($CartTotals->subtotal * ($couponDiscount / 100));
                }
            }


            $response = [
                'status' => 'success',
                'message' => 'Product remove from cart.',
                'cart' => $cart,
                'CartTotals' => count($cart),
                'total_item' => $CartTotals->subtotal,
                'shippingCost' => $shippingCost,
                'tax' => $tax,
                'itemid' => $itemId,
                'DiscountPrice' => $DiscountPrice,
                'totalWithShipping' => $totalWithShipping,
            ];
            $statusCode = 200; // OK

            echo json_encode($response);
        }
        //return $this->respond($response, $statusCode);
    }
    
    public function removeFromCart()
    {
        $response = [
            'status' => 'error',
            'message' => 'Product not found.',
        ];
        $statusCode = 404;

        $itemId = $this->request->getVar('itemId');
        // Get the cart items from the session
        $cart = session()->get('cart');

        // Find the item index in the cart array
        $itemIndex = array_search($itemId, array_column($cart, 'id'));

        // Remove the item from the cart if found
        if ($itemIndex !== false) {
            unset($cart[$itemIndex]);
            $cart = array_values($cart);
            session()->set('cart', $cart);
            $tax = 0;
            $CartTotals = (object) $this->calculateCartTotals();
            $subtotal = $CartTotals->subtotal;
            // $shippingCost = $CartTotals->shippingCost;
            // $DiscountPrice = 0;
            // $shippingCost = 0; 

            $shippingCost = 0; // Default to 0
            $shippingZoneModel = new \App\Models\shippingzonemodel();
            // $isShippingEnabled = $shippingZoneModel->where('is_check', 1)->countAllResults() > 0;
            $isShippingEnabled = $shippingZoneModel->where('is_check', 1)->countAllResults() > 0 ? 1 : 0;

            if ($isShippingEnabled) {
                // Apply default shipping logic if at least one zone is enabled
                // $shippingCost = ($subtotal >= 1000) ? 0 : 10;
                $shippingCost = $CartTotals->shippingCost;
            }

            //  ================dicount -------
            $couponCode = '';
            $DiscountPrice = 0;
            if (session()->has('couponCode')) {
                $couponCode = session()->get('couponCode');
                $CouponModel = new CouponModel();
                $coupon = $CouponModel->where(['CouponLive' => 1, 'CouponCode' => $couponCode])->get()->getRow();

                if ($coupon) {
                    $couponDiscount = $coupon->CouponValue;
                    if ($coupon->CouponType == '2') {
                        $DiscountPrice = $couponDiscount; // Fixed value discount
                    } else {
                        $DiscountPrice = ($CartTotals->subtotal * ($couponDiscount / 100)); // Percentage discount
                    }
                }
            }

             // ==================== Tax Logic ====================
         $taxRate = 0;

         $TaxModel = new TaxModel;
         $isTaxEnabled = $TaxModel->where('is_check', 1)->countAllResults() > 0 ? 1 : 0;
 
 
         if ($isTaxEnabled) {
            //  $taxRate = 10;
            //  $tax = $subtotal * ($taxRate / 100);
            $tax = $CartTotals->tax;
         }else{
            $tax = 0;
         }
         // ==================== End of Tax Logic ====================


            $response = [
                'status' => 'success',
                'message' => 'Product remove from cart.',
                'cart' => $cart,
                'CartTotals' => count($cart),
                'total_item' => $CartTotals->subtotal,
                'shippingCost' => $shippingCost,
                'DiscountPrice' => $DiscountPrice,
                // 'tax' => number_format($CartTotals->tax, 2),
                'tax' => number_format($tax, 2),
                'itemid' => $itemId,
                'totalWithShipping' => $CartTotals->totalWithShipping,
                'isShippingEnabled' => $isShippingEnabled,
                'isTaxEnabled' => $isTaxEnabled,
            ];
            $statusCode = 200; // OK

            echo json_encode($response);
        }
    }

    public function clearCart()
    {
        // Clear the cart by removing the 'cart' session data
        session()->remove('cart');
        session()->remove('couponCode');
        session()->remove('shipping_price');
    }
    public function updateCart_old()
    {
        $itemData = $this->request->getVar('quant');

        // $productId = $this->request->getVar('productId');
        // Get the cart items from the session
        $cart = session()->get('cart');
        foreach ($itemData as $itemId => $quantity) {
            // Find the item index in the cart array
            $itemIndex = array_search($itemId, array_column($cart, 'id'));
            // Update the quantity of the item if found
            if ($itemIndex !== false) {
                $cart[$itemIndex]['quantity'] = $quantity;
                // Update unit price and total
                $cart[$itemIndex]['total'] = $cart[$itemIndex]['unit_price'] * $quantity;
            }
        }

        // Update the cart in the session
        session()->set('cart', $cart);
        // Recalculate cart totals
        $CartTotals = (object) $this->calculateCartTotals();

        $shippingCost = 10; // Assuming a fixed shipping cost of $10
        $DiscountPrice = 0;
        $taxRate = 0.1; // Assuming a tax rate of 10%
        $tax = $CartTotals->subtotal * $taxRate;
        $totalWithShipping = ($CartTotals->subtotal - $DiscountPrice) + $shippingCost + $tax;

        if (session()->has('couponCode')) {
            $couponCode = session()->get('couponCode');

            $CouponModel = new CouponModel();
            $coupon = $CouponModel->where(['CouponLive' => 1, 'CouponCode' => $couponCode])->get()->getRow();
            //print_r( $coupon);exit();

            $couponDiscount = $coupon->CouponValue;
            if ($coupon->CouponType == '2') {
                $DiscountPrice = $couponDiscount;
            } else {
                $DiscountPrice = ($CartTotals->subtotal * ($couponDiscount / 100));
            }
        }

        $response = [
            'status' => 'success',
            'message' => 'Cart updated successfully.',
            'cart' => $cart,
            'CartTotals' => count($cart),
            'total_item' => $CartTotals->subtotal,
            'shippingCost' => $shippingCost,
            'tax' => $tax,
            'DiscountPrice' => $DiscountPrice,
            'totalWithShipping' => $totalWithShipping,
        ];
        $statusCode = 200; // OK

        echo json_encode($response);
        // return $this->respond($response, $statusCode);
    }
    public function updateCart()
    {
        $itemData = $this->request->getVar('quant');
        // Get the cart items from the session
        $cart = session()->get('cart');
        foreach ($itemData as $itemId => $quantity) {
            // Find the item index in the cart array
            $itemIndex = array_search($itemId, array_column($cart, 'id'));
            // Update the quantity of the item if found
            if ($itemIndex !== false) {
                $cart[$itemIndex]['quantity'] = $quantity;
                // Update unit price and total
                $cart[$itemIndex]['total'] = $cart[$itemIndex]['unit_price'] * $quantity;
            }
        }

        // Update the cart in the session
        session()->set('cart', $cart);
        // Recalculate cart totals
        $tax = 0;
        $CartTotals = (object) $this->calculateCartTotals();
        $subtotal = $CartTotals->subtotal;

        // $DiscountPrice = 0;
        // $shippingCost = 0; 
        $DiscountPrice = $CartTotals->DiscountPrice;
        // $shippingCost = $CartTotals->shippingCost;

        $shippingCost = 0; // Default to 0

        $shippingZoneModel = new \App\Models\shippingzonemodel();
        // $isShippingEnabled = $shippingZoneModel->where('is_check', 1)->countAllResults() > 0;
        $isShippingEnabled = $shippingZoneModel->where('is_check', 1)->countAllResults() > 0 ? 1 : 0;

        if ($isShippingEnabled) {
            // Apply default shipping logic if at least one zone is enabled
            // $shippingCost = ($subtotal >= 1000) ? 0 : 10;
            $shippingCost = $CartTotals->shippingCost;
        }

         // ==================== Tax Logic ====================
         $taxRate = 0;

         $TaxModel = new TaxModel;
         $isTaxEnabled = $TaxModel->where('is_check', 1)->countAllResults() > 0 ? 1 : 0;
 
 
         if ($isTaxEnabled) {
            //  $taxRate = 10;
            //  $tax = $subtotal * ($taxRate / 100);
             $tax = $CartTotals->tax;
         }else{
            $tax = 0;
         }
         // ==================== End of Tax Logic ====================
        

        $response = [
            'status' => 'success',
            'message' => 'Cart updated successfully.',
            'cart' => $cart,
            'CartTotals' => count($cart),
            'total_item' => $CartTotals->subtotal,
            'shippingCost' => $shippingCost,
            // 'tax' => number_format($CartTotals->tax, 2),
            'tax' => $tax,
            'DiscountPrice' => $DiscountPrice,
            'totalWithShipping' => $CartTotals->totalWithShipping,
            'isShippingEnabled' => $isShippingEnabled,
            'isTaxEnabled' => $isTaxEnabled,
        ];
        $statusCode = 200; // OK

        echo json_encode($response);
    }


    // 18nov, 2024 6:09 pm =================================

    // public static function calculateCartTotals()
    // {
    //     $cart = session()->get('cart');
    //     $subtotal = 0;
    //     $allprice_taxes = 0;
    //     if ($cart) {
    //         foreach ($cart as $item) {
    //             $pprice = $item['total'];
    //             $taxs = isset($item['tax']) ? ($item['tax']) : (array());
    //             $price_Tax = 0;
    //             if ($taxs) {
    //                 foreach ($taxs as $tax) {
    //                     $taxRate = $tax['TaxRate'];
    //                     $price_Tax += $pprice * ($taxRate / 100);
    //                 }
    //             } else {
    //                 $taxRate = 10;
    //                 $price_Tax += $pprice * ($taxRate / 100);
    //             }
    //             $allprice_taxes += $price_Tax;
    //             $allppprice = $pprice;
    //             //$subtotal += $item['total'];
    //             $subtotal += $allppprice;
    //         }
    //     }
    //     $couponCode = '';
    //     $DiscountPrice = 0;
    //     if (session()->has('couponCode')) {
    //         $couponCode = session()->get('couponCode');

    //         $CouponModel = new CouponModel();
    //         $coupon = $CouponModel->where(['CouponLive' => 1, 'CouponCode' => $couponCode])->get()->getRow();
    //         //print_r( $coupon);exit();

    //         $couponDiscount = $coupon->CouponValue;
    //         if ($coupon->CouponType == '2') {
    //             $DiscountPrice = $couponDiscount;
    //         } else {
    //             $DiscountPrice = ($subtotal * ($couponDiscount / 100));
    //         }
    //     }

    //     //  $ship_price=session()->get('shipping_price');
    //     // print_r($ship_price);die;
    //     // if(isset($ship_price) && !empty($ship_price)){
    //     //     $shippingCost=$ship_price;
    //     // }else{
    //     //     $shippingCost= 10;
    //     // }
    //     if($subtotal >= 1000){
    //         $shippingCost = 0; 
    //     }else{
    //         $shippingCost = 10;  
    //     }

    //     $taxRate = 0.1; // Assuming a tax rate of 10%
    //     $ntax = $subtotal;

    //     // $totalWithShipping = ($subtotal - $DiscountPrice) + $shippingCost ;
    //     $totalWithShipping = ($subtotal - $DiscountPrice) + $allprice_taxes + $shippingCost;

    //     return [
    //         'subtotal' => $subtotal,
    //         'shippingCost' => $shippingCost,
    //         'couponCode' => $couponCode,
    //         'tax' => $allprice_taxes,
    //         'DiscountPrice' => $DiscountPrice,
    //         'totalWithShipping' => $totalWithShipping,
    //     ];
    // }
    // ===================------------------==============================

    // ---------------========================-------------------
    public static function calculateCartTotals()
    {
        $cart = session()->get('cart');
        $subtotal = 0;
        $allprice_taxes = 0;
        if ($cart) {
            foreach ($cart as $item) {
                $pprice = $item['total'];

                // $allprice_taxes += $price_Tax;
                $allppprice = $pprice;
                $subtotal += $allppprice;
            }
        }

        // $taxRate = 10;
        // $tax = $subtotal * ($taxRate / 100);

         // ==================== Tax Logic ====================
         $taxRate = 0;

         $TaxModel = new TaxModel;
         $isTaxEnabled = $TaxModel->where('is_check', 1)->countAllResults() > 0 ? 1 : 0;
 
 
         if ($isTaxEnabled) {
             $taxRate = 10;
             $tax = $subtotal * ($taxRate / 100);
         }else{
            $tax = 0;
         }
         // ==================== End of Tax Logic ====================

        $couponCode = '';
        $DiscountPrice = 0;
        if (session()->has('couponCode')) {
            $couponCode = session()->get('couponCode');

            $CouponModel = new CouponModel();
            $coupon = $CouponModel->where(['CouponLive' => 1, 'CouponCode' => $couponCode])->get()->getRow();
            //print_r( $coupon);exit();

            $couponDiscount = $coupon->CouponValue;
            if ($coupon->CouponType == '2') {
                $DiscountPrice = $couponDiscount;
            } else {
                $DiscountPrice = ($subtotal * ($couponDiscount / 100));
            }
        }


        // ==================== Shipping Logic ====================
        $shippingCost = 0; // Default to 0

        $shippingZoneModel = new \App\Models\shippingzonemodel();
        // $isShippingEnabled = $shippingZoneModel->where('is_check', 1)->countAllResults() > 0;
        $isShippingEnabled = $shippingZoneModel->where('is_check', 1)->countAllResults() > 0 ? 1 : 0;


        if ($isShippingEnabled) {
            // Apply default shipping logic if at least one zone is enabled
            $shippingCost = ($subtotal >= 1000) ? 0 : 10;
        }
        // ==================== End of Shipping Logic ====================

        // $totalWithShipping = ($subtotal - $DiscountPrice) + $shippingCost ;
        $totalWithShipping = ($subtotal - $DiscountPrice) + $tax + $shippingCost;

        return [
            'subtotal' => $subtotal,
            'shippingCost' => $shippingCost,
            'couponCode' => $couponCode,
            'tax' => $tax,
            'DiscountPrice' => $DiscountPrice,
            'totalWithShipping' => $totalWithShipping,
            'isShippingEnabled' => $isShippingEnabled,
            'isTaxEnabled' => $isTaxEnabled,
        ];
    }
    // ---------------========================-------------------

    public function applyCoupon()
    {
        $couponCode = $this->request->getVar('couponCode');
        $response = '';
        $statusCode = 202;
        $cart = session()->get('cart');
        // echo "<pre>";
        // print_r($cart);die;

        if ($couponCode) {
            $AllsettingsModel = new Allsettingsmodel();
            $settings = $AllsettingsModel->first(); // Assuming you only need the first record
            $CouponModel = new CouponModel();

            // Find the coupon based on CouponCode and UserStatus
            $couponDetails = $CouponModel->where(['UserStatus' => 1, 'CouponCode' => $couponCode])->first();

            $subtotal = 0;
            if ($cart) {
                foreach ($cart as $item) {
                    $subtotal += $item['total'];
                }
            }

            if ($couponDetails) {
                // Check coupon validity dates
                $currentDate = date('Y-m-d');
                $startDate = $couponDetails['StartDate'];
                $endDate = $couponDetails['EndDate'];

                if ($currentDate < $startDate || $currentDate > $endDate) {
                    return json_encode(array("status" => "fail", "message" => "Coupon is expired or not yet valid."));
                }

                $couponType = $couponDetails['CouponType'];
                $couponValue = $couponDetails['CouponValue'];
                // $minimumPrice = $couponDetails['MinimunPrice'];
                // $maximumPrice = $couponDetails['MaximunPrice'];
                $productCoupon = $couponDetails['ProductCoupon'];
                $categoryIDs = explode(',', $couponDetails['CategoryID']);
                $allowedProductIDs = explode(',', $couponDetails['ProductID']);
                $productCouponUserID = $couponDetails['UserID'];
                // echo "<pre>";
                // print_r($allowedProductIDs);
                // echo "<pre>";
                // print_r($categoryIDs);

                // Retrieve product IDs and category IDs from the cart
                $cartProductIDs = $cart ? array_column($cart, 'id') : [];
                $cartProductCatIDs = $cart ? array_column($cart, 'category_id') : [];
                // echo "<pre>";
                //         print_r($cartProductCatIDs);die;

                $isCouponApplicable = false;

                // Priority 1: Check if the coupon is user-specific
                if (!empty($productCouponUserID)) {
                    $allowedUsers = explode(',', $productCouponUserID);
                    $userID = session()->get('user_id'); // Get user ID
                    if (in_array($userID, $allowedUsers)) {
                        $isCouponApplicable = true;
                    }
                }

                // Priority 2: Check if the coupon is product-specific (only if user check failed)
                if (!$isCouponApplicable && !empty($allowedProductIDs)) {
                    if (count(array_intersect($cartProductIDs, $allowedProductIDs)) > 0) {
                        $isCouponApplicable = true;
                    }
                }

                // Priority 3: Check if the coupon is category-specific (only if both user and product checks failed)
                if (!$isCouponApplicable && !empty($categoryIDs)) {
                    if (count(array_intersect($cartProductCatIDs, $categoryIDs)) > 0) {
                        $isCouponApplicable = true;
                    }
                }

                // Apply coupon if valid for any condition and total amount meets the minimum/maximum price
                if ($isCouponApplicable) {
                    if ($couponType == 1) {
                        $DiscountPrice = ($subtotal * $couponValue) / 100; // Percentage discount
                    } elseif ($couponType == 2) {
                        $DiscountPrice = $couponValue;
                    }

                    // ===============
                    $CartTotals = (object) $this->calculateCartTotals();
                    // echo "<pre>";
                    // print_r($subtotal); echo "<pre>";
                    // print_r($CartTotals);die;

                    // Fetch shipping cost and minimum total amount required for shipping
                    // $ShippingModel = new ShippingDataModel();
                    // $shippingData = $ShippingModel->findAll(); 
                    // $shippingCost = 0;
                    // $shippingCost = 10;

                    // if ($subtotal >= 1000) {
                    //     $shippingCost = 0;
                    // } else {
                    //     $shippingCost = 10;
                    // }

                    // $shippingCost = $CartTotals->shippingCost;
                    $shippingCost = 0; // Default to 0

                    $shippingZoneModel = new \App\Models\shippingzonemodel();
                    // $isShippingEnabled = $shippingZoneModel->where('is_check', 1)->countAllResults() > 0;
                    $isShippingEnabled = $shippingZoneModel->where('is_check', 1)->countAllResults() > 0 ? 1 : 0;

                    if ($isShippingEnabled) {
                        // Apply default shipping logic if at least one zone is enabled
                        // $shippingCost = ($subtotal >= 1000) ? 0 : 10;
                        $shippingCost = $CartTotals->shippingCost;
                    }



                    // $taxRate = 10; // Assuming a tax rate of 10%
                    // $tax = $subtotal * ($taxRate / 100);
                     // ==================== Tax Logic ====================
                    $taxRate = 0;

                    $TaxModel = new TaxModel;
                    $isTaxEnabled = $TaxModel->where('is_check', 1)->countAllResults() > 0 ? 1 : 0;
            
            
                    if ($isTaxEnabled) {
                        // $taxRate = 10;
                        // $tax = $subtotal * ($taxRate / 100);
                        $tax = $CartTotals->tax;
                    }else{
                        $tax = 0;
                    }
                    // ==================== End of Tax Logic ====================
                    // $totalWithShipping = ($subtotal - $DiscountPrice) + $tax;

                    $total = ($subtotal - $DiscountPrice) + $tax;

                    // Final total with optional shipping cost included
                    $totalWithHandlingCharge = $total + $shippingCost;

                    // Store the coupon code in the session
                    session()->set('couponCode', $couponCode);

                    // Prepare response
                    $response = [
                        'status' => 'success',
                        'couponCode' => $couponCode,
                        'message' => 'Coupon applied successfully!',
                        'cart' => $cart,
                        'CartTotals' => count($cart),
                        'total_item' => $subtotal,
                        'shippingCost' => $shippingCost,
                        'DiscountPrice' => $DiscountPrice, // Coupon discount
                        'tax' => $tax,
                        'totalWithHandling' => $total,
                        'totalWithShipping' => $totalWithHandlingCharge,
                        'isShippingEnabled' => $isShippingEnabled,
                        'isTaxEnabled' => $isTaxEnabled,
                    ];
                    $statusCode = 200; // OK
                } else {
                    return json_encode(array("status" => "fail", "message" => "Sorry This Coupons Is Not Applicable For Products Present In Your Cart"));
                }
            } else {
                return json_encode(array("status" => "fail", "message" => "Invalid coupon code."));
            }
        }

        echo json_encode($response);
    }


    public function removeCoupon()
    {
        $response = '';
        $statusCode = 202;

        $couponCode = $this->request->getVar('couponCode');

        if ($couponCode != "") {
            $couponModel = new CouponModel();
            $coupon = $couponModel->where(['UserStatus' => 1, 'CouponCode' => $couponCode])->get()->getRow();

            if (!empty($coupon)) {
                session()->remove('couponCode');
                $cart = session()->get('cart');
                $cartTotals = (object) $this->calculateCartTotals();
                // $shippingCost = 10; 
                $subtotal = $cartTotals->subtotal;
                // $shippingCost = $cartTotals->shippingCost;
                // if ($subtotal >= 1000) {
                //     $shippingCost = 0;
                // } else {
                //     $shippingCost = 10;
                // }

                $shippingCost = 0; // Default to 0

                $shippingZoneModel = new \App\Models\shippingzonemodel();
                // $isShippingEnabled = $shippingZoneModel->where('is_check', 1)->countAllResults() > 0;
                $isShippingEnabled = $shippingZoneModel->where('is_check', 1)->countAllResults() > 0 ? 1 : 0;

                if ($isShippingEnabled) {
                    // Apply default shipping logic if at least one zone is enabled
                    // $shippingCost = ($subtotal >= 1000) ? 0 : 10;
                    $shippingCost = $cartTotals->shippingCost;
                }

                // $taxRate = 0.1;
                // $tax = $cartTotals->subtotal * $taxRate;
                 // ==================== Tax Logic ====================
                $taxRate = 0;

                $TaxModel = new TaxModel;
                $isTaxEnabled = $TaxModel->where('is_check', 1)->countAllResults() > 0 ? 1 : 0;
        
        
                if ($isTaxEnabled) {
                    // $taxRate = 10;
                    // $tax = $subtotal * ($taxRate / 100);
                    $tax = $cartTotals->tax;
                }else{
                    $tax = 0;
                }
                // ==================== End of Tax Logic ====================
                $totalWithShipping = $cartTotals->subtotal + $shippingCost + $tax;


                $response = [
                    'status' => 'success',
                    'couponCode' => '',
                    'message' => 'Coupon removed successfully.',
                    'cart' => $cart,
                    'cartTotals' => count($cart),
                    'total_item' => $cartTotals->subtotal,
                    'shippingCost' => $shippingCost,
                    'tax' => $tax,
                    'totalWithShipping' => $totalWithShipping,
                    'isShippingEnabled' => $isShippingEnabled,
                    'isTaxEnabled' => $isTaxEnabled,
                ];
                $statusCode = 200; // OK
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'Coupon not found.',
                ];
            }
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Invalid coupon code.',
            ];
        }

        echo json_encode($response);
    }


}
