<?php

namespace App\Controllers\api;
require_once APPPATH . 'Libraries/dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use App\Models\Bannersmodel;
use App\Models\Categorymodel;
use App\Models\Productmodel;
use App\Models\Reviewmodel;
use App\Models\Wishlistmodel;
use App\Models\CartModel;
use App\Models\UserModel;
use App\Models\Ordermodel;
use App\Models\Orderitemmodel;
use App\Models\Variationmodel;
use App\Models\VariationsDetails;
use App\Models\variationtypemodel;
use App\Models\Variationvaluemodel;
use App\Models\User_shipping_addressmodel;
use App\Models\CityModel;
use App\Models\CountryModel;
use App\Models\StateModel;
use App\Models\Paymentmodel;
use App\Models\TaxModel;
use App\Models\shippingzonemodel;
use App\Models\shippingratemodel;
use App\Models\ShippingMethodModel;
use App\Models\CouponModel;
use App\Models\Allsettingsmodel;
use App\Models\ChatModel;


use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

class Product extends BaseController
{
    protected $Bannersmodel;
    protected $Categorymodel;
    protected $Productmodel;
    protected $Reviewmodel;
    protected $Wishlistmodel;
    protected $CartModel;
    protected $UserModel;
    protected $Ordermodel;
    protected $Orderitemmodel;
    protected $Variationmodel;
    protected $VariationsDetails;
    protected $variationtypemodel;
    protected $Variationvaluemodel;
    protected $User_shipping_addressmodel;
    protected $CityModel;
    protected $CountryModel;
    protected $StateModel;
    protected $Paymentmodel;
    protected $TaxModel;
    protected $shippingzonemodel;
    protected $shippingratemodel;
    protected $ShippingMethodModel;
    protected $CouponModel;
    protected $Allsettingsmodel;
    protected $ChatModel;


    private $apiContext;

    public function __construct()
    {
        $this->profileImagePath = base_url('admin/public/upload_images/');
        $this->productImagePath = base_url('admin/public/assets/img/product_images/');

        $db = \Config\Database::connect();
        $this->Bannersmodel = new Bannersmodel($db);
        $this->Categorymodel = new Categorymodel($db);
        $this->Productmodel = new Productmodel($db);
        $this->Reviewmodel = new Reviewmodel($db);
        $this->Wishlistmodel = new Wishlistmodel($db);
        $this->CartModel = new CartModel($db);
        $this->UserModel = new UserModel($db);
        $this->Ordermodel = new Ordermodel($db);
        $this->Orderitemmodel = new Orderitemmodel($db);
        $this->Variationmodel = new Variationmodel($db);
        $this->VariationsDetails = new VariationsDetails($db);
        $this->variationtypemodel = new variationtypemodel($db);
        $this->Variationvaluemodel = new Variationvaluemodel($db);
        $this->User_shipping_addressmodel = new User_shipping_addressmodel($db);
        $this->CityModel = new CityModel($db);
        $this->CountryModel = new CountryModel($db);
        $this->StateModel = new StateModel($db);
        $this->Paymentmodel = new Paymentmodel($db);
        $this->TaxModel = new TaxModel($db);
        $this->shippingzonemodel = new shippingzonemodel($db);
        $this->shippingratemodel = new shippingratemodel($db);
        $this->ShippingMethodModel = new ShippingMethodModel($db);
        $this->CouponModel = new CouponModel($db);
        $this->Allsettingsmodel = new Allsettingsmodel($db);
        $this->ChatModel = new ChatModel($db);

        // $this->apiContext = new ApiContext(
        //     [
        //         'client_id' => 'AZiWD3YmHRw3Pj8cZuMcM4nLDiE85uukuK754IXwe34QTJpaNZSmxVXYvafgmsQ7F5hnUFXFegqUN6YQ',
        //         'client_secret' => 'EO7hjc5NRCag6fsTzuHJl2FeoqKLBg_s_sLv2_5aMUqU5IkRIIFSvNE1qWmqgGp6cRJiZVPf4e3ksXTg',
        //     ]
        // );
    }

    public function allProducts()
    {
        $allProducts = $this->Productmodel->where("ProductLive", 1)->findAll();
        $allProductList = array();
        foreach ($allProducts as $relatedProduct) {
            $productImages = json_decode($relatedProduct['ProductImage']);
            foreach ($productImages as $productImage) {
                $relatedProduct['AllProductImage'][] = $this->productImagePath . $productImage;
            }
            $allProductList[] = $relatedProduct;
        }
        return json_encode(array("status" => 'success', "message" => "product found", "allProducts" => $allProductList));
    }

    public function productDetails()
    {
        $productID = $this->request->getPost('productID');
        if (!$productID) {
            return json_encode(array("status" => 'fail', "message" => "productID is required!"));
        }

        $product = $this->Productmodel->where("ProductID", $productID)->where("ProductLive", 1)->first();
        foreach (json_decode($product['ProductImage']) as $image) {
            $product["allImages"][] = $this->productImagePath . $image;
        }

        $relatedProducts = $this->Productmodel->where("CategoryID", $product['CategoryID'])->where("SubCategoryID", $product['SubCategoryID'])->where("ProductLive", 1)->limit(7)->findAll();
        $allRelatedProducts = array();
        foreach ($relatedProducts as $relatedProduct) {
            $productImages = json_decode($relatedProduct['ProductImage']);
            foreach ($productImages as $productImage) {
                $relatedProduct['AllProductImage'][] = $this->productImagePath . $productImage;
            }
            $allRelatedProducts[] = $relatedProduct;
        }
        return json_encode(array("status" => 'success', "message" => "product found", "productDetails" => $product, "relatedProducts" => $allRelatedProducts));
    }

    public function cart_count()
    {
        $CartModel = new CartModel();
        $user_id = $this->request->getPost('user_id');

        if (!$user_id) {
            return json_encode(array("status" => "fail", "message" => "user_id is required."));
        }

        // Count the number of items in the cart for the specified user
        $cart_count = $CartModel->where('user_id', $user_id)->countAllResults();

        // Return the count in JSON format
        return json_encode(array("status" => 'success', "cart_count" => $cart_count));
    }

    // public function searchProducts()
    // {
    //     $searchedText = $this->request->getPost("searchText");
    //     $user_id = $this->request->getPost("user_id");

    //     $seachedProducts = $this->Productmodel->like("ProductName", $searchedText)->orLike("ProductShortDesc", $searchedText)->where("ProductLive", 1)->findAll();
    //     $allRelatedProducts = array();
    //     if (!empty($searchedText) && !empty($seachedProducts)) {
    //         foreach ($seachedProducts as $seachedProduct) {
    //             $seachedProductInfo['ProductID'] = $seachedProduct['ProductID'];
    //             $seachedProductInfo['ProductName'] = $seachedProduct['ProductName'];
    //             $seachedProductInfo['ProductShortDesc'] = $seachedProduct['ProductShortDesc'];
    //             $seachedProductInfo['ProductPrice'] = $seachedProduct['ProductPrice'];
    //             foreach (json_decode($seachedProduct['ProductImage']) as $image) {
    //                 $seachedProductInfo["allImages"] = $this->productImagePath . $image;
    //             }
    //             $product_id=$seachedProduct['ProductID'];
    //              $wishlish_data=$this->Wishlistmodel->where('ProductID',$product_id)->where('UserID',$user_id)->first();
    //             if($wishlish_data){
    //                 $seachedProductInfo['wishlist']= 1;
    //             }else{
    //                 $seachedProductInfo['wishlist']= 0;
    //             }
    //             $allRelatedProducts[] = $seachedProductInfo;
    //         }
    //         return json_encode(array("status" => 'success', "message" => "results found", "searchResults" => $allRelatedProducts));
    //     } else {
    //         return json_encode(array("status" => 'fail', "message" => "results not found","searchResults" => []));
    //     }
    // }

    public function searchProducts()
    {
        $searchedText = $this->request->getPost("searchText");
        $user_id = $this->request->getPost("user_id");

        // Fetch products based on the search text
        $seachedProducts = $this->Productmodel
            ->like("ProductName", $searchedText)
            ->orLike("ProductShortDesc", $searchedText)
            ->where("ProductLive", 1)
            ->findAll();

        //   print_r($seachedProducts);die;  

        $allRelatedProducts = [];

        if (!empty($searchedText) && !empty($seachedProducts)) {
            foreach ($seachedProducts as $seachedProduct) {
                $seachedProductInfo = [];
                $seachedProductInfo['ProductID'] = $seachedProduct['ProductID'];
                $seachedProductInfo['ProductName'] = $seachedProduct['ProductName'];
                $seachedProductInfo['ProductType'] = $seachedProduct['ProductType'];
                $seachedProductInfo['ProductShortDesc'] = $seachedProduct['ProductShortDesc'];
                $seachedProductInfo['ProductPrice'] = $seachedProduct['ProductPrice'];
                $seachedProductInfo['Sale_ProductPrice'] = $seachedProduct['Sale_ProductPrice'];

                // Initialize the images array
                $seachedProductInfo["allImages"] = [];

                // Process product images directly
                if (!empty($seachedProduct['ProductImage'])) {
                    $productImages = json_decode($seachedProduct['ProductImage'], true);
                    if (is_array($productImages)) {
                        foreach ($productImages as $image) {
                            // Include the image paths directly without existence check
                            $imagePath = $this->productImagePath . $image;
                            $seachedProductInfo["allImages"][] = $imagePath; // Add the image path directly
                        }
                    }
                }

                // Fetch wishlist data for the user
                $wishlish_data = $this->Wishlistmodel
                    ->where('ProductID', $seachedProduct['ProductID'])
                    ->where('UserID', $user_id)
                    ->first();
                $seachedProductInfo['wishlist'] = $wishlish_data ? 1 : 0;

                // Add product info to the results array
                $allRelatedProducts[] = $seachedProductInfo;
            }

            return $this->response->setJSON([
                "status" => 'success',
                "message" => "results found",
                "searchResults" => $allRelatedProducts
            ]);
        } else {
            return $this->response->setJSON([
                "status" => 'fail',
                "message" => "results not found",
                "searchResults" => []
            ]);
        }
    }
    public function filter_a_to_z()
    {
        // Retrieve user_id, sortOrder, and cate_id from the request
        $user_id = $this->request->getPost("user_id");
        $sortOrder = $this->request->getPost("sortOrder");
        $cate_id = $this->request->getPost("cate_id"); // Category ID to filter by (if provided)

        // Map '1' to 'asc' and '2' to 'desc' for sorting order
        $sortOrder = $sortOrder == '2' ? 'desc' : 'asc';

        // Initialize the Product model
        $this->Productmodel = new Productmodel();
        $this->Wishlistmodel = new Wishlistmodel();

        // Start the query for products
        $query = $this->Productmodel->where("ProductLive", 1); // Only active products

        // If cate_id is provided, filter by SubCategoryID
        if (!empty($cate_id)) {
            $query->where("CategoryID", $cate_id);
        }


        // print_r($query);die;

        // Order the results by ProductName
        $searchedProducts = $query->orderBy("ProductName", $sortOrder)->findAll();

        $allRelatedProducts = [];

        // Process the products if any are found
        if (!empty($searchedProducts)) {
            foreach ($searchedProducts as $searchedProduct) {
                $searchedProductInfo = [
                    'ProductID' => $searchedProduct['ProductID'],
                    'ProductName' => $searchedProduct['ProductName'],
                    'ProductType' => $searchedProduct['ProductType'],
                    'ProductShortDesc' => $searchedProduct['ProductShortDesc'],
                    'ProductPrice' => $searchedProduct['ProductPrice'],
                    'Sale_ProductPrice' => $searchedProduct['Sale_ProductPrice'],
                ];

                // Handle product images (use JSON decoding safely)
                $images = !empty($searchedProduct['ProductImage']) ? json_decode($searchedProduct['ProductImage'], true) : [];
                $formattedImages = [];

                if (!empty($images) && is_array($images)) {
                    foreach ($images as $image) {
                        $formattedImages[] = $this->productImagePath . $image;
                    }
                }

                // Use array_unique to remove duplicate images
                $uniqueImages = array_unique($formattedImages);

                // Set a fallback image if no unique images are found
                $searchedProductInfo["allImages"] = !empty($uniqueImages) ? $uniqueImages : ['default-image.jpg'];

                // Check if the product is in the wishlist
                $product_id = $searchedProduct['ProductID'];
                $wishlist_data = $this->Wishlistmodel
                    ->where('ProductID', $product_id)
                    ->where('UserID', $user_id)
                    ->first();

                $searchedProductInfo['wishlist'] = $wishlist_data ? 1 : 0;

                $currency=$this->Allsettingsmodel->first();
                $currn=$currency['currency'];
                $searchedProductInfo['currency'] = $currn;
                // Add the product to the results array
                $allRelatedProducts[] = $searchedProductInfo;
            }

            return $this->response->setJSON([
                "status" => 'success',
                "message" => "Results found",
                "searchResults" => $allRelatedProducts
            ]);
        } else {
            return $this->response->setJSON([
                "status" => 'fail',
                "message" => "No results found",
                "searchResults" => []
            ]);
        }
    }

    public function filter_low_to_high()
    {
        $user_id = $this->request->getPost("user_id");
        $priceSort = $this->request->getPost("priceSort");
        $cate_id = $this->request->getPost("cate_id");  // Category ID to filter by (if provided)

        // Initialize query builder
        $query = $this->Productmodel->where("ProductLive", 1);  // Only active products

        // Check if cate_id is provided, and filter by category
        if (!empty($cate_id)) {
            $query->where("CategoryID", $cate_id);  // Filter by CategoryID
        }

        // Check for price sort
        if ($priceSort === '1') {
            $query->orderBy("ProductPrice", 'asc');
        } elseif ($priceSort === '2') {
            $query->orderBy("ProductPrice", 'desc');
        } else {
            $query->orderBy("ProductName", 'asc');
        }

        // Execute the query
        $searchedProducts = $query->findAll();
        // print_r($searchedProducts);die;
        $allRelatedProducts = [];

        if (!empty($searchedProducts)) {
            foreach ($searchedProducts as $searchedProduct) {
                $searchedProductInfo = [
                    'ProductID' => $searchedProduct['ProductID'],
                    'ProductName' => $searchedProduct['ProductName'],
                    'ProductType' => $searchedProduct['ProductType'],
                    'ProductShortDesc' => $searchedProduct['ProductShortDesc'],
                    'ProductPrice' => $searchedProduct['ProductPrice'],
                    'Sale_ProductPrice' => $searchedProduct['Sale_ProductPrice'],
                ];

                // Handle product images
                $images = json_decode($searchedProduct['ProductImage']);
                $formattedImages = [];  // Initialize formatted images array

                if (!empty($images)) {
                    foreach ($images as $image) {
                        $formattedImages[] = $this->productImagePath . $image;
                    }
                }

                // Use array_unique to remove duplicate images
                $uniqueImages = array_unique($formattedImages);

                // Set a fallback image if no unique images are found
                $searchedProductInfo["allImages"] = !empty($uniqueImages)
                    ? $uniqueImages : ['default-image.jpg'];

                // Check if product is in the wishlist
                $product_id = $searchedProduct['ProductID'];
                $wishlist_data = $this->Wishlistmodel
                    ->where('ProductID', $product_id)
                    ->where('UserID', $user_id)
                    ->first();

                $searchedProductInfo['wishlist'] = $wishlist_data ? 1 : 0;
                $currency=$this->Allsettingsmodel->first();
                $currn=$currency['currency'];
                $searchedProductInfo['currency'] = $currn;
                // Add the product info to the response array
                $allRelatedProducts[] = $searchedProductInfo;
            }

            return $this->response->setJSON([
                "status" => 'success',
                "message" => "Results found",
                "searchResults" => $allRelatedProducts
            ]);
        } else {
            return $this->response->setJSON([
                "status" => 'fail',
                "message" => "No results found",
                "searchResults" => []
            ]);
        }
    }


    public function searchproduct_by_subcategory()
    {
        $searchedText = $this->request->getPost("searchText");
        $category_id = $this->request->getPost('category_id');
        $subcategory_id = $this->request->getPost('subcategory_id');
        $user_id = $this->request->getPost("user_id");
        if (!$category_id) {
            return json_encode(array("status" => "fail", "message" => "category_id is required."));
        }
        if (!$subcategory_id) {
            return json_encode(array("status" => "fail", "message" => "subcategory_id is required."));
        }
        //  $seachedProducts = $this->Productmodel->like("ProductName", $searchedText)->orLike("ProductShortDesc", $searchedText)->where("ProductLive", 1)->where('CategoryID',$category_id)->where('SubCategoryID',$subcategory_id)->findAll();
        //   $seachedProducts = $this->Productmodel->where("ProductLive", 1)->where('CategoryID',$category_id)->where('SubCategoryID',$subcategory_id)->like("ProductName", $searchedText)->orLike("ProductShortDesc", $searchedText)->findAll();

        $seachedProducts = $this->Productmodel
            ->where("ProductLive", 1)
            ->where('CategoryID', $category_id)
            ->where('SubCategoryID', $subcategory_id)
            ->groupStart() // Start a group of OR conditions
            ->like("ProductName", $searchedText)
            ->orLike("ProductShortDesc", $searchedText)
            ->groupEnd() // End the group of OR conditions
            ->findAll();
        //  print_r($seachedProducts); die;
        $allRelatedProducts = array();
        if (!empty($searchedText) && !empty($seachedProducts)) {
            foreach ($seachedProducts as $seachedProduct) {
                $seachedProductInfo['ProductID'] = $seachedProduct['ProductID'];
                $seachedProductInfo['ProductName'] = $seachedProduct['ProductName'];
                $seachedProductInfo['ProductShortDesc'] = $seachedProduct['ProductShortDesc'];
                $seachedProductInfo['ProductPrice'] = $seachedProduct['ProductPrice'];
                $seachedProductInfo['Sale_ProductPrice'] = $seachedProduct['Sale_ProductPrice'];
                $seachedProductInfo['ProductType'] = $seachedProduct['ProductType'];
                foreach (json_decode($seachedProduct['ProductImage']) as $image) {
                    $seachedProductInfo["allImages"] = $this->productImagePath . $image;
                }
                $product_id = $seachedProduct['ProductID'];
                $wishlish_data = $this->Wishlistmodel->where('ProductID', $product_id)->where('UserID', $user_id)->first();
                if ($wishlish_data) {
                    $seachedProductInfo['wishlist'] = 1;
                } else {
                    $seachedProductInfo['wishlist'] = 0;
                }
                $currency=$this->Allsettingsmodel->first();
                $currn=$currency['currency'];
                $searchedProductInfo['currency'] = $currn;

                $allRelatedProducts[] = $seachedProductInfo;
            }
            return json_encode(array("status" => 'success', "message" => "results found", "searchResults" => $allRelatedProducts));
        } else {
            return json_encode(array("status" => 'fail', "message" => "results not found", "searchResults" => []));
        }

    }
    public function simple_product_details()
    {
        $product_id = $this->request->getPost('product_id');
        $user_id = $this->request->getPost("user_id");
        if (!$product_id) {
            return json_encode(array("status" => "fail", "message" => "product_id is required."));
        }
        $product_data = $this->Productmodel->select("ProductID,ProductType,CategoryID,SubCategoryID,ProductName,ProductShortDesc,ProductLongDesc,ProductImage,ProductLive,ProductPrice,Sale_ProductPrice,ProductStock")
            ->where('ProductID', $product_id)->where('ProductType', 1)->first();
        if (!empty($product_data)) {
            $wishlish_data = $this->Wishlistmodel->where('ProductID', $product_id)->where('UserID', $user_id)->first();
            if ($wishlish_data) {
                $product_data['wishlist'] = 1;
            } else {
                $product_data['wishlist'] = 0;
            }
            $cart_data = $this->CartModel->where('product_id', $product_id)->where('user_id', $user_id)->first();
            if ($cart_data) {
                $product_data['cartlist'] = 1;
            } else {
                $product_data['cartlist'] = 0;
            }

            if ($product_data && $product_data['ProductType'] == 1) {
                $all_img = json_decode($product_data['ProductImage']);
                foreach ($all_img as $key => $single_img) {
                    $product_data['allimage'][$key] = $this->productImagePath . $single_img;
                }
                $type = $product_data['ProductType'];
                $price = $product_data['ProductPrice'];
                $selling_price = $product_data['Sale_ProductPrice'];
                if ($type == 1) {
                    $product_data['single_product_price'] = $selling_price;
                } else {
                    $product_data['single_product_price'] = "";
                }
                $currency=$this->Allsettingsmodel->first();
                $currn=$currency['currency'];
                $product_data['currency'] = $currn;
                $related_products = $this->Productmodel
                    ->select("ProductID, ProductName, ProductImage, ProductPrice, Sale_ProductPrice, ProductStock")
                    ->where('CategoryID', $product_data['CategoryID'])
                    ->where('ProductID !=', $product_id)
                    ->where('ProductLive', 1)
                    ->limit(5)
                    ->get()
                    ->getResultArray();

                foreach ($related_products as &$related_product) {

                    $related_wishlist_data = $this->Wishlistmodel->where('ProductID', $related_product['ProductID'])->where('UserID', $user_id)->first();
                    $related_product['wishlist'] = $related_wishlist_data ? 1 : 0;


                    $related_product_images = json_decode($related_product['ProductImage'], true) ?: [];
                    $related_product['image'] = !empty($related_product_images) ? base_url('admin/public/assets/img/product_images/' . $related_product_images[0]) : '';
                    $currency=$this->Allsettingsmodel->first();
                $currn=$currency['currency'];
                $related_product['currency'] = $currn;

                    $related_product['selling_price'] = $related_product['Sale_ProductPrice'] ?? $related_product['ProductPrice'];
                }
                return json_encode(array("status" => 'success', "message" => "results found", "product_data" => $product_data, "related_products" => $related_products ?? []));
            }

        } else {
            return json_encode(array("status" => "fail", "message" => "Product Data Not Found"));
        }
    }
    public function product_details()
    {
        $product_id = $this->request->getPost('product_id');
        $user_id = $this->request->getPost("user_id");
        if (!$product_id) {
            return json_encode(array("status" => "fail", "message" => "product_id is required."));
        }
        $product_data = $this->Productmodel->select("ProductID,ProductType,CategoryID,SubCategoryID,ProductName,ProductShortDesc,ProductLongDesc,ProductImage,ProductLive,ProductPrice,Sale_ProductPrice")
            ->where('ProductID', $product_id)->first();
        if (!empty($product_data)) {
            $wishlish_data = $this->Wishlistmodel->where('ProductID', $product_id)->where('UserID', $user_id)->first();
            if ($wishlish_data) {
                $product_data['wishlist'] = 1;
            } else {
                $product_data['wishlist'] = 0;
            }
            $cart_data = $this->CartModel->where('product_id', $product_id)->where('user_id', $user_id)->first();
            if ($cart_data) {
                $product_data['cartlist'] = 1;
            } else {
                $product_data['cartlist'] = 0;
            }

            if ($product_data && $product_data['ProductType'] == 1) {
                $all_img = json_decode($product_data['ProductImage']);
                foreach ($all_img as $key => $single_img) {
                    $product_data['allimage'][$key] = $this->productImagePath . $single_img;
                }
                $type = $product_data['ProductType'];
                $price = $product_data['ProductPrice'];
                $selling_price = $product_data['Sale_ProductPrice'];
                if ($type == 1) {
                    $product_data['single_product_price'] = $selling_price;
                } else {
                    $product_data['single_product_price'] = "";
                }

                return json_encode(array("status" => 'success', "message" => "results found", "product_data" => $product_data));
            }
            if ($product_data && $product_data['ProductType'] == 2) {

                $all_img = json_decode($product_data['ProductImage']);
                foreach ($all_img as $key => $single_img) {
                    $product_data['allimage'][$key] = $this->productImagePath . $single_img;
                }
                $product_data['single_product_price'] = "";
                $variation_data = $this->Variationmodel->where('ProductID', $product_id)->findAll();
                // print_r($variation_data); die;
                if ($variation_data) {
                    foreach ($variation_data as $key => $single_data) {

                        // $varoation_price=$single_data['VariationPrice'];
                        $Sale_VariationPrice = $single_data['Sale_VariationPrice'];
                        $variation_data[$key]['single_product_price'] = $Sale_VariationPrice;
                        $variation_id = $single_data['VariationID'];
                        $variation_details_data = $this->VariationsDetails->where('VariationID', $variation_id)->findAll();
                        // print_r($variation_details_data); die;
                        if ($variation_details_data) {
                            $variation_value_data_tmp = [];
                            foreach ($variation_details_data as $key1 => $single_variation_details) {
                                $variation_valueid = $single_variation_details['VariationVlueID'];
                                $variation_value_data = $this->Variationvaluemodel->select('variation_value.*,variation_type.VariationTypeName')
                                    ->join('variation_type', 'variation_value.VariationTypeID=variation_type.VariationTypeID')
                                    ->where('VariationID', $variation_valueid)->first();
                                // print_r($variation_value_data);
                                if ($variation_value_data) {
                                    $variation_value_data_tmp[] = $variation_value_data;
                                }

                            }
                            $variation_data[$key]['variation_sub_data'] = $variation_value_data_tmp;
                            // die;
                        }


                    }
                }
                $variation_sub_data = array_column($variation_data, 'variation_sub_data');
                // print_r($variation_sub_data);die;


                $tmp = array();
                foreach ($variation_sub_data as $val) {
                    foreach ($val as $val1) {
                        if (isset($tmp[$val1['VariationTypeName']]) && !empty($tmp[$val1['VariationTypeName']])) {
                            $VariationID = array_column($tmp[$val1['VariationTypeName']], 'VariationID');
                            if (!in_array($val1['VariationID'], $VariationID)) {
                                $tmp[$val1['VariationTypeName']][] = $val1;
                            }
                        } else {
                            $tmp[$val1['VariationTypeName']][] = $val1;
                        }

                    }
                }
                if (isset($tmp['color'])) {

                    $keyIndex = array_search("color", array_keys($tmp));
                    $newKeys = array_keys($tmp);
                    $newKeys[$keyIndex] = "color_data";

                    $tmp = array_combine($newKeys, array_values($tmp));
                }
                $filter_keys = array_keys($tmp);
                return json_encode(array("status" => 'success', "message" => "results found", "product_data" => $product_data, "variation_data" => $variation_data, "filter_variation_data" => $tmp, "filter_keys" => $filter_keys));
            }
        } else {
            return json_encode(array("status" => "fail", "message" => "Product Data Not Found"));
        }
    }
    public function test_product_color()
    {
        $product_id = $this->request->getPost('product_id');
        if (!$product_id) {
            return json_encode(array("status" => "fail", "message" => "product_id is required."));
        }

        $product_variations_data = $this->Variationmodel->where('ProductID', $product_id)->findAll();
        $dis_array = array_column($product_variations_data, 'VariationID');
        if ($product_variations_data) {
            $variation_details_temp = [];
            $variation_details_data = $this->VariationsDetails
                ->select('*,VariationVlueID ')
                ->whereIn('VariationID', $dis_array)
                ->groupBy('VariationVlueID ')
                ->findAll();
            if ($variation_details_data) {
                foreach ($variation_details_data as $key1 => $single_variation_detail) {
                    $variation_valueid = $single_variation_detail['VariationVlueID'];
                    if ($variation_valueid != 0) {
                        $variation_value_table = $this->Variationvaluemodel->where('VariationID', $variation_valueid)->first();
                        if ($variation_value_table['VariationTypeID'] == 15) {
                            $var_img = $variation_value_table['Variation_image'];
                            $variation_value_table['var_img'] = $this->productImagePath . $var_img;
                            $variation_details_temp[] = $variation_value_table;
                        }
                    }
                }

            }
            return json_encode(array("status" => 'success', "message" => "results found", "variation_data" => $variation_details_temp, "product_data" => $product_variations_data));
        } else {
            return json_encode(array("status" => "fail", "message" => "Product Not Found.", "variation_data" => []));
        }
    }
    public function test_product_size()
    {
        $product_id = $this->request->getPost('product_id');
        if (!$product_id) {
            return json_encode(array("status" => "fail", "message" => "product_id is required."));
        }

        $product_variations_data = $this->Variationmodel->where('ProductID', $product_id)->findAll();
        $dis_array = array_column($product_variations_data, 'VariationID');
        // print_r($dis_array);die;
        if ($product_variations_data) {
            $variation_details_temp = [];
            $variation_details_data = $this->VariationsDetails
                ->select('*,VariationVlueID ')
                ->whereIn('VariationID', $dis_array)
                ->groupBy('VariationVlueID ')
                ->findAll();
            // print_r($variation_details_data); die;

            // foreach($product_variations_data as $key=>$single_data){
            //     $variation_id=$single_data['VariationID'];
            //     $product_variations_data[$key]['variation_idd']=$variation_id;
            //     $variation_details_data=$this->VariationsDetails->where('VariationID',$variation_id)->findAll();
            // print_r($variation_details_data);
            if ($variation_details_data) {
                foreach ($variation_details_data as $key1 => $single_variation_detail) {
                    $variation_valueid = $single_variation_detail['VariationVlueID'];
                    // print_r($variation_valueid);
                    if ($variation_valueid != 0) {
                        // echo "2";
                        $variation_value_table = $this->Variationvaluemodel->where('VariationID', $variation_valueid)->first();
                        // print_r($variation_value_table); 
                        if ($variation_value_table['VariationTypeID'] == 16) {
                            // echo "k";
                            $var_img = $variation_value_table['Variation_image'];
                            $variation_value_table['var_img'] = $this->productImagePath . $var_img;
                            // $variation_value_table['variation_idd']=$variation_id;
                            // print_r($variation_value_table);
                            $variation_details_temp[] = $variation_value_table;
                        }
                    }
                    // print_r($variation_value_table); 
                }

                //  return json_encode(array("status" => 'success', "message" => "results found", "variation_data" =>$variation_details_temp ));
            }
            // }  
            return json_encode(array("status" => 'success', "message" => "results found", "variation_data" => $variation_details_temp, "product_data" => $product_variations_data));
        } else {
            return json_encode(array("status" => "fail", "message" => "Product Not Found.", "variation_data" => []));
        }
    }
    public function product_color()
    {
        $product_id = $this->request->getPost('product_id');
        if (!$product_id) {
            return json_encode(array("status" => "fail", "message" => "product_id is required."));
        }

        $product_variations_data = $this->Variationmodel->where('ProductID', $product_id)->findAll();
        $dis_array = array_column($product_variations_data, 'VariationID');
        // print_r($dis_array);die;
        if ($product_variations_data) {
            $variation_details_temp = [];
            $variation_details_data = $this->VariationsDetails
                ->select('*,VariationVlueID ')
                ->whereIn('VariationID', $dis_array)
                ->groupBy('VariationVlueID ')
                ->findAll();
            // print_r($variation_details_data); die;

            // foreach($product_variations_data as $key=>$single_data){
            //     $variation_id=$single_data['VariationID'];
            //     $product_variations_data[$key]['variation_idd']=$variation_id;
            //     $variation_details_data=$this->VariationsDetails->where('VariationID',$variation_id)->findAll();
            // print_r($variation_details_data);
            if ($variation_details_data) {
                foreach ($variation_details_data as $key1 => $single_variation_detail) {
                    $variation_valueid = $single_variation_detail['VariationVlueID'];
                    $variation_idd = $single_variation_detail['VariationID'];
                    // print_r($variation_valueid);
                    if ($variation_valueid != 0) {
                        // echo "2";
                        $variation_value_table = $this->Variationvaluemodel->where('VariationID', $variation_valueid)->first();
                        // print_r($variation_value_table); 
                        if ($variation_value_table['VariationTypeID'] == 15) {
                            // echo "k";
                            $var_img = $variation_value_table['Variation_image'];
                            $variation_value_table['var_img'] = $this->productImagePath . $var_img;
                            $variation_value_table['variation_idd'] = $variation_idd;
                            // print_r($variation_value_table);
                            $variation_details_temp[] = $variation_value_table;
                        }
                    }
                    // print_r($variation_value_table); 
                }

                //  return json_encode(array("status" => 'success', "message" => "results found", "variation_data" =>$variation_details_temp ));
            }
            // }  
            return json_encode(array("status" => 'success', "message" => "results found", "variation_data" => $variation_details_temp, "product_data" => $product_variations_data));
        } else {
            return json_encode(array("status" => "fail", "message" => "Product Not Found.", "variation_data" => []));
        }
    }

    public function product_size()
    {
        $product_id = $this->request->getPost('product_id');
        if (!$product_id) {
            return json_encode(array("status" => "fail", "message" => "product_id is required."));
        }

        $product_variations_data = $this->Variationmodel->where('ProductID', $product_id)->findAll();
        $dis_array = array_column($product_variations_data, 'VariationID');
        // print_r($dis_array);die;
        if ($product_variations_data) {
            $variation_details_temp = [];
            $variation_details_data = $this->VariationsDetails
                ->select('*,VariationVlueID ')
                ->whereIn('VariationID', $dis_array)
                ->groupBy('VariationVlueID ')
                ->findAll();
            // print_r($variation_details_data); die;

            // foreach($product_variations_data as $key=>$single_data){
            //     $variation_id=$single_data['VariationID'];
            //     $product_variations_data[$key]['variation_idd']=$variation_id;
            //     $variation_details_data=$this->VariationsDetails->where('VariationID',$variation_id)->findAll();
            // print_r($variation_details_data);
            if ($variation_details_data) {
                foreach ($variation_details_data as $key1 => $single_variation_detail) {
                    $variation_valueid = $single_variation_detail['VariationVlueID'];
                    // print_r($variation_valueid);
                    if ($variation_valueid != 0) {
                        // echo "2";
                        $variation_value_table = $this->Variationvaluemodel->where('VariationID', $variation_valueid)->first();
                        // print_r($variation_value_table); 
                        if ($variation_value_table['VariationTypeID'] == 16) {
                            // echo "k";
                            $var_img = $variation_value_table['Variation_image'];
                            $variation_value_table['var_img'] = $this->productImagePath . $var_img;
                            // $variation_value_table['variation_idd']=$variation_id;
                            // print_r($variation_value_table);
                            $variation_details_temp[] = $variation_value_table;
                        }
                    }
                    // print_r($variation_value_table); 
                }

                //  return json_encode(array("status" => 'success', "message" => "results found", "variation_data" =>$variation_details_temp ));
            }
            // }  
            return json_encode(array("status" => 'success', "message" => "results found", "variation_data" => $variation_details_temp, "product_data" => $product_variations_data));
        } else {
            return json_encode(array("status" => "fail", "message" => "Product Not Found.", "variation_data" => []));
        }
    }
    public function product_material()
    {
        echo "hii";
        die;
        $product_id = $this->request->getPost('product_id');
        if (!$product_id) {
            return json_encode(array("status" => "fail", "message" => "product_id is required."));
        }

        $product_variations_data = $this->Variationmodel->where('ProductID', $product_id)->findAll();
        $dis_array = array_column($product_variations_data, 'VariationID');
        // print_r($dis_array);die;
        if ($product_variations_data) {
            $variation_details_temp = [];
            $variation_details_data = $this->VariationsDetails
                ->select('*,VariationVlueID ')
                ->whereIn('VariationID', $dis_array)
                ->groupBy('VariationVlueID ')
                ->findAll();
            // print_r($variation_details_data); die;

            // foreach($product_variations_data as $key=>$single_data){
            //     $variation_id=$single_data['VariationID'];
            //     $product_variations_data[$key]['variation_idd']=$variation_id;
            //     $variation_details_data=$this->VariationsDetails->where('VariationID',$variation_id)->findAll();
            // print_r($variation_details_data);
            if ($variation_details_data) {
                foreach ($variation_details_data as $key1 => $single_variation_detail) {
                    $variation_valueid = $single_variation_detail['VariationVlueID'];
                    // print_r($variation_valueid);
                    if ($variation_valueid != 0) {
                        // echo "2";
                        $variation_value_table = $this->Variationvaluemodel->where('VariationID', $variation_valueid)->first();
                        // print_r($variation_value_table); 
                        if ($variation_value_table['VariationTypeID'] == 18) {
                            // echo "k";
                            $var_img = $variation_value_table['Variation_image'];
                            $variation_value_table['var_img'] = $this->productImagePath . $var_img;
                            // $variation_value_table['variation_idd']=$variation_id;
                            // print_r($variation_value_table);
                            $variation_details_temp[] = $variation_value_table;
                        }
                    }
                    // print_r($variation_value_table); 
                }

                //  return json_encode(array("status" => 'success', "message" => "results found", "variation_data" =>$variation_details_temp ));
            }
            // }  
            return json_encode(array("status" => 'success', "message" => "results found", "variation_data" => $variation_details_temp, "product_data" => $product_variations_data));
        } else {
            return json_encode(array("status" => "fail", "message" => "Product Not Found.", "variation_data" => []));
        }
    }

    public function product_data_get_from_color()
    {
        $variation_idd = $this->request->getPost('variation_idd');

        $variation_data = $this->Variationmodel->where('VariationID', $variation_idd)->first();

        // $variation_details_data=$this->VariationsDetails->select('VariationsDetails.*,variation_value.*')
        // ->join('variation_value','VariationsDetails.VariationVlueID=variation_value.VariationID')
        // ->where('VariationsDetails.VariationID',$variation_idd)->findAll();

        // $vari_data=array_column($variation_details_data,'VariationName'); 
        // print_r($vari_data);
        // die;





        if ($variation_data) {

            $all_img = json_decode($variation_data['product_variation_image']);
            if ($all_img) {
                foreach ($all_img as $key => $single_img) {
                    $variation_data['allimage'][$key] = $this->productImagePath . $single_img;
                }
            }
            return json_encode(array("status" => 'success', "message" => "results found", "variation_data" => $variation_data));
        } else {
            return json_encode(array("status" => "fail", "message" => "Product Not Found.", "variation_data" => []));
        }
    }
    public function product_data_match_with_coler_size()
    {
        $color_variation_id = $this->request->getPost('color_variation_id');
        $size_variation_id = $this->request->getPost('size_variation_id');
        $product_id = $this->request->getPost('product_id');
        $product_variations_data = $this->Variationmodel->where('ProductID', $product_id)->findAll();
        if ($product_variations_data) {
            // $single__variations_data['VariationID'];
            $variation_id = array_column($product_variations_data, 'VariationID');



            $query = $this->VariationsDetails;
            // $query->select('*');
            $query->whereIn('VariationID', $variation_id);
            $query->whereIn('VariationVlueID', [$color_variation_id, $size_variation_id]);
            $query->groupBy('VariationID');
            $query->having('COUNT(DISTINCT VariationVlueID)', count([$color_variation_id, $size_variation_id]));
            $result = $query->findAll();


            // print_r($result);die; 
            if ($result) {
                $main_id = array_column($result, 'VariationID');
                $query = $this->Variationmodel;
                $query->select('VariationPrice,Sale_VariationPrice,product_variation_image,VariationID AS variation_match_id');
                $query->whereIn('VariationID', $main_id);
                $result1 = $query->first();
                // print_r($result1);die;
                $all_img = json_decode($result1['product_variation_image']);
                if ($all_img) {
                    foreach ($all_img as $key => $single_img) {
                        $result1['allimage'][$key] = $this->productImagePath . $single_img;
                    }
                } else {
                    $result1['allimage'] = [];
                }

                $cart_data = $this->CartModel->where('product_id', $product_id)->where('product_color', $color_variation_id)->where('product_size', $size_variation_id)->first();
                if ($cart_data) {
                    $result1['cartlist'] = 1;
                } else {
                    $result1['cartlist'] = 0;
                }
                $price_data[] = $result1;
                return json_encode(array("status" => 'success', "message" => "results found", "Price_data" => $price_data));
            } else {
                return json_encode(array("status" => "fail", "message" => "This color and size Combination not available.", "Price_data" => []));
            }

        } else {
            return json_encode(array("status" => "fail", "message" => "Product Not Found.", "Price_data" => []));
        }

    }
    public function price_try()
    {
        $color_variation_id = $this->request->getPost('color_variation_id');
        $size_variation_id = $this->request->getPost('size_variation_id');
        $product_id = $this->request->getPost('product_id');
        $product_variations_data = $this->Variationmodel->where('ProductID', $product_id)->findAll();
        if ($product_variations_data) {
            // $single__variations_data['VariationID'];
            $variation_id = array_column($product_variations_data, 'VariationID');

            // print_r($variation_id); die;

            $query = $this->VariationsDetails;
            // $query->select('*');
            $query->whereIn('VariationID', $variation_id);
            $query->whereIn('VariationVlueID', [$color_variation_id, $size_variation_id]);
            $query->groupBy('VariationID');
            $query->having('COUNT(DISTINCT VariationVlueID)', count([$color_variation_id, $size_variation_id]));
            $result = $query->findAll();


            print_r($result);
            die;
            if ($result) {
                $main_id = array_column($result, 'VariationID');
                $query = $this->Variationmodel;
                $query->select('VariationPrice');
                $query->whereIn('VariationID', $main_id);
                $result1 = $query->first();
                // print_r($result1);die;
                $price_data[] = $result1;
                return json_encode(array("status" => 'success', "message" => "results found", "Price_data" => $price_data));
            } else {
                return json_encode(array("status" => "fail", "message" => "This coloer and size Combination not available.", "Price_data" => []));
            }

        } else {
            return json_encode(array("status" => "fail", "message" => "Product Not Found.", "Price_data" => []));
        }
    }

    public function addToWishList()
    {
        $userID = $this->request->getPost('userId');
        $productID = $this->request->getPost('productID');
        if (!$userID) {
            return json_encode(array("status" => "fail", "message" => "userId is required."));
        }
        if (!$productID) {
            return json_encode(array("status" => "fail", "message" => "productID is required."));
        }

        $addToWishList = $this->Wishlistmodel->insert(["ProductID" => $productID, "UserID" => $userID]);
        if ($addToWishList) {
            return json_encode(array("status" => "success", "message" => "Your wishlist updated."));
        } else {
            return json_encode(array("status" => "fail", "message" => "fail to add wishlist."));
        }
    }

    public function removeFromWishList()
    {
        $userID = $this->request->getPost('userId');
        $productID = $this->request->getPost('productID');
        if (!$userID) {
            return json_encode(array("status" => "fail", "message" => "userId is required."));
        }
        if (!$productID) {
            return json_encode(array("status" => "fail", "message" => "productID is required."));
        }

        $wishListInfo = $this->Wishlistmodel->where("ProductID", $productID)->where("UserID", $userID)->first();
        if ($wishListInfo) {
            $this->Wishlistmodel->delete($wishListInfo['ID']);
            return json_encode(array("status" => "success", "message" => "successfully removed from your wishlist."));
        } else {
            return json_encode(array("status" => "fail", "message" => "fail to remove from wishlist."));
        }
    }

    public function userWishList()
    {
        $userID = $this->request->getPost('userId');
        if (!$userID) {
            return json_encode(array("status" => "fail", "message" => "userId is required."));
        }

        $userWishLists = $this->Wishlistmodel->where("UserID", $userID)->findAll();
        // print_r($userWishLists); die;
        if ($userWishLists) {
            foreach ($userWishLists as $userWishList) {
                $product = $this->Productmodel->where("ProductID", $userWishList['ProductID'])->where("ProductLive", 1)->first();

                if ($product) {
                    foreach (json_decode($product['ProductImage']) as $image) {
                        $product["allImages"][] = $this->productImagePath . $image;
                    }
                    $currency=$this->Allsettingsmodel->first();
                    $currn=$currency['currency'];
                    $product['currency'] = $currn;
                    $wishListProducts[] = $product;
                } else {
                    return json_encode(array("status" => "fail", "message" => "product not avalible."));
                }
            }
            if ($wishListProducts) {
                return json_encode(array("status" => "success", "message" => "wishlist found.", "wishList" => $wishListProducts));
            }
        } else {
            return json_encode(array("status" => "fail", "message" => "your wishlist is empty."));
        }
    }

// ------- 21-11
    //     public function addtocart()
    // { 
    //     $userID =  $this->request->getPost('userId');
    //     $productID =  $this->request->getPost('productID');
    //     $product_color =  $this->request->getPost('product_color');
    //     $product_size =  $this->request->getPost('product_size');
    //     $product_price =  $this->request->getPost('product_price');
    //     $variation_tbl_id=$this->request->getPost('variation_tbl_id');
    //     $product_quantity=$this->request->getPost('product_quantity');

    //     if (!$userID) {
    //         return json_encode(array("status" => "fail", "message" => "userId is required."));
    //     }
    //     if (!$productID) {
    //         return json_encode(array("status" => "fail", "message" => "productID is required."));
    //     }
    //          $settingsData = $this->Allsettingsmodel->first();

    //     // print_r($settingsData);die;
    //     if (!$settingsData) {
    //         return json_encode(['status' => 'fail', 'message' => 'Settings not found.']);
    //     }

    //     $emailadmin = $settingsData['Email'];
    //         if($variation_tbl_id!=0 && $variation_tbl_id != null){
    //         $check_data=$this->CartModel->where('user_id',$userID)->where('product_id',$productID)->first();
    //     if(!empty($check_data)){
    //         return json_encode(array("status" => "fail", "message" => "Product already in cart."));
    //         }
    //     }


    //         if(!empty($product_quantity)){
    //         $product_quantity=$product_quantity;
    //     }else{
    //         $product_quantity=1;
    //     }

    //         $all_feild = [
    //         'user_id' => $userID,
    //         'product_id' => $productID,
    //         'product_color'=> $product_color,
    //         'product_size'=> $product_size,
    //         'product_price'=> $product_price,
    //         'variation_tbl_id'=> $variation_tbl_id,
    //         'quantity' => $product_quantity,


    //         ];

    //     $add_cart_data = $this->CartModel->insert($all_feild);
    //     if ($add_cart_data) {
    //         echo json_encode(array('message' => 'Product Add To Cart Successfully', 'status' => 'success'));
    //         // Ensure the client receives the response immediately
    //         if (function_exists('fastcgi_finish_request')) {
    //             fastcgi_finish_request();  // Send the response to the client now
    //         }

    //         // Call the background email-sending function
    //         $this->send_mail_addtocart($userID, $productID, $product_quantity, $product_price, $emailadmin);

           
    //     } else {
    //         echo json_encode(array('message' => 'Error', 'status' => 'false'));
    //     }

    //     }
        // =============
        
        public function addtocart()
{ 
    $userID = $this->request->getPost('userId');
    $productID = $this->request->getPost('productID');
    $product_color = $this->request->getPost('product_color');
    $product_size = $this->request->getPost('product_size');
    $product_price = $this->request->getPost('product_price');
    $variation_tbl_id = $this->request->getPost('variation_tbl_id');
    $product_quantity = $this->request->getPost('product_quantity');

    if (!$userID) {
        return json_encode(array("status" => "fail", "message" => "userId is required."));
    }
    if (!$productID) {
        return json_encode(array("status" => "fail", "message" => "productID is required."));
    }

    $settingsData = $this->Allsettingsmodel->first();

    if (!$settingsData) {
        return json_encode(['status' => 'fail', 'message' => 'Settings not found.']);
    }

    $emailadmin = $settingsData['Email'];

    if ($variation_tbl_id != 0 && $variation_tbl_id != null) {
        $check_data = $this->CartModel->where('user_id', $userID)->where('product_id', $productID)->first();
        if (!empty($check_data)) {
            return json_encode(array("status" => "fail", "message" => "Product already in cart."));
        }
    }

    if (empty($product_quantity)) {
        $product_quantity = 1;
    }

    // Check if a coupon is already applied for the user
    $existingCartWithCoupon = $this->CartModel->where('user_id', $userID)->where('coupon_code IS NOT NULL')->first();
    $couponCode = $existingCartWithCoupon ? $existingCartWithCoupon['coupon_code'] : null;

    // Prepare data for insertion
    $all_feild = [
        'user_id' => $userID,
        'product_id' => $productID,
        'product_color' => $product_color,
        'product_size' => $product_size,
        'product_price' => $product_price,
        'variation_tbl_id' => $variation_tbl_id,
        'quantity' => $product_quantity,
        'coupon_code' => $couponCode, // Apply the existing coupon if any
    ];

    $add_cart_data = $this->CartModel->insert($all_feild);

    if ($add_cart_data) {
        echo json_encode(array('message' => 'Product Add To Cart Successfully', 'status' => 'success'));
        // Ensure the client receives the response immediately
        if (function_exists('fastcgi_finish_request')) {
            fastcgi_finish_request();  // Send the response to the client now
        }

        // Call the background email-sending function
        $this->send_mail_addtocart($userID, $productID, $product_quantity, $product_price, $emailadmin);
    } else {
        echo json_encode(array('message' => 'Error', 'status' => 'false'));
    }
}

        
// public function addtocart()
// { 
//     $userID = $this->request->getPost('userId');
//     $productID = $this->request->getPost('productID');
//     $product_price = $this->request->getPost('product_price');
//     $product_quantity = $this->request->getPost('product_quantity');

    //     $numeric_price = $product_price*$product_quantity;


    //     if (empty($userID)) {
//         return json_encode(array("status" => "fail", "message" => "userId is required."));
//     }
//     if (empty($productID)) {
//         return json_encode(array("status" => "fail", "message" => "productID is required."));
//     }

    //     $product_quantity = !empty($product_quantity) ? $product_quantity : 1;

    //     $all_fields = [
//         'user_id' => $userID,
//         'product_id' => $productID,
//         'product_price' => number_format($numeric_price, 2, '.', ''),
//         'quantity' => $product_quantity,

    //     ];
//     // print_r($all_fields);die;
//     // print_r($all_fields);die;
//     $add_cart_data = $this->CartModel->insert($all_fields);
//     if ($add_cart_data) {
//         return json_encode(array('message' => 'Product added to cart successfully', 'status' => 'success'));
//     } else {
//         return json_encode(array('message' => 'Error adding product to cart', 'status' => 'fail'));
//     }
// }
    // public function addtocart()
    // {
    //     $userID = $this->request->getPost('userId');
    //     $productID = $this->request->getPost('productID');
    //     $product_price = $this->request->getPost('product_price');
    //     $product_quantity = $this->request->getPost('product_quantity');

    //     // $Settings = new Allsettingsmodel(); 
    //     $settingsData = $this->Allsettingsmodel->first();

    //     // print_r($settingsData);die;
    //     if (!$settingsData) {
    //         return json_encode(['status' => 'fail', 'message' => 'Settings not found.']);
    //     }

    //     $emailadmin = $settingsData['Email'];

    //     if (empty($userID)) {
    //         return json_encode(array("status" => "fail", "message" => "userId is required."));
    //     }
    //     if (empty($productID)) {
    //         return json_encode(array("status" => "fail", "message" => "productID is required."));
    //     }

    //     $product_quantity = !empty($product_quantity) ? $product_quantity : 1;

    //     $all_fields = [
    //         'user_id' => $userID,
    //         'product_id' => $productID,
    //         'product_price' => $product_price,
    //         'quantity' => $product_quantity,
    //     ];

    //     $add_cart_data = $this->CartModel->insert($all_fields);

    //     if ($add_cart_data) {
    //         // Respond immediately with success
    //         echo json_encode(array('message' => 'Product added to cart successfully', 'status' => 'success'));

    //         // Ensure the client receives the response immediately
    //         if (function_exists('fastcgi_finish_request')) {
    //             fastcgi_finish_request();  // Send the response to the client now
    //         }

    //         // Call the background email-sending function
    //         $this->send_mail_addtocart($userID, $productID, $product_quantity, $product_price, $emailadmin);

    //     } else {
    //         return json_encode(array('message' => 'Error adding product to cart', 'status' => 'fail'));
    //     }
    // }
    public function send_mail_addtocart($userID, $productID, $product_quantity, $product_price, $emailadmin)
    {
        // Fetch product and user data
        $product = $this->Productmodel->where('ProductID', $productID)->first();
        $user = $this->UserModel->where('UserID', $userID)->first();

        if (!$product || !$user) {
            return;
        }
        $currency = $this->Allsettingsmodel->first();
        $curry=$currency['currency'];
        // User and product details
        $email = $user['UserEmail'];
        $UserFirstName = $user['UserFirstName'];
        $UserLastName = $user['UserLastName'];
        $UserPhone = $user['UserPhone'];
        $productName = $product['ProductName'];
        // $productPrice = number_format($product_price, 2);
        // $totalPrice = number_format($product_quantity * $product_price, 2);
        $product_price_clean = floatval(preg_replace('/[^\d.]/', '', $product_price));
        $productPrice = number_format($product_price_clean, 2);
        $totalPrice = number_format($product_quantity * $product_price_clean, 2);

        // Get product image (handle comma-separated images or JSON array)
        $productImages = json_decode($product['ProductImage'], true);
        $productImage = (is_array($productImages) && isset($productImages[0])) ? $productImages[0] : 'no_product.webp';
        if (!is_array($productImages)) {
            $productImages = explode(',', $product['ProductImage']);
            $productImage = isset($productImages[0]) ? $productImages[0] : 'no_product.webp';
        }

        // Define logo URL
        $logo = "https://ecomweb.fableadtechnolabs.com/admin/public/upload_images/1728803054_e8778ea13ec894e43181.png";
        $imageUrl = base_url('/admin/public/assets/img/product_images/' . $productImage);

        // Prepare email content
        $subject = 'Product Added to Cart By Customer';
        $message = "<html><body>";
        $message .= "<div style='font-family: Arial, sans-serif; max-width: 600px; margin: auto; background-color: white; padding: 20px; border: solid 1px gainsboro;'>
                        <div style='text-align: center; margin-bottom: 20px;'>
                            <img src='" . $logo . "' alt='Pharmaxy Logo' style='max-width: 150px;'>
                            <h2 style='color: #333;'>Product Added to Cart</h2>
                            <p><strong>User Name:</strong> " . $UserFirstName . ' ' . $UserLastName . "</p>
                            <p><strong>User Email:</strong> " . $email . "</p>
                            <p><strong>User Phone:</strong> " . $UserPhone . "</p>
                        </div>
                        <table style='width: 100%; border-collapse: collapse;'>
                            <tr>
                                <th style='text-align: left; padding: 8px; background-color: #f4f4f4; border-top: 1px solid #ddd;'><strong>Image:</strong></th>
                                <td style='padding: 8px; border-top: 1px solid #ddd;'>
                                    <img src='" . $imageUrl . "' alt='Product Image' style='max-width: 70px;'>
                                </td>
                            </tr>
                            <tr>
                                <th style='text-align: left; padding: 8px; background-color: #f4f4f4; border-top: 1px solid #ddd;'><strong>Product:</strong></th>
                                <td style='padding: 8px; border-top: 1px solid #ddd;'> " . htmlspecialchars($productName) . "</td>
                            </tr>
                            <tr>
                                <th style='text-align: left; padding: 8px; background-color: #f4f4f4; border-top: 1px solid #ddd;'><strong>Quantity:</strong></th>
                                <td style='padding: 8px; border-top: 1px solid #ddd;'> " . htmlspecialchars($product_quantity) . "</td>
                            </tr>
                            <tr>
                                <th style='text-align: left; padding: 8px; background-color: #f4f4f4; border-top: 1px solid #ddd;'><strong>Price:</strong></th>
                                <td style='padding: 8px; border-top: 1px solid #ddd;'>".htmlspecialchars($curry) . $productPrice . "</td>
                            </tr>
                            <tr>
                                <th style='text-align: left; padding: 8px; background-color: #f4f4f4; border-top: 1px solid #ddd;'><strong>Total:</strong></th>
                                <td style='padding: 8px; border-top: 1px solid #ddd;'>".htmlspecialchars($curry) . $totalPrice . "</td>
                            </tr>
                        </table>
                        <div style='text-align: center; margin-top: 20px;'>
                            <p style='color: #888;'>Copyright © 2024 Pharmaxy - All Rights Reserved.</p>
                        </div>
                    </div>";
        $message .= "</body></html>";


        // Send email
        $emailSender = new \App\Libraries\EmailSender();
        // print_r($$emailSender);die;
        $emailSender->sendEmail($emailadmin, $subject, $message);
        // 
    }


    public function after_login_addtocart()
    {
        // print_r('hii');
        $userID = $this->request->getPost('userId');
        if (!$userID) {
            return json_encode(array("status" => "fail", "message" => "userId is required."));
        }


    }

//     public function view_cart_list()
// {
//     // $userID = $this->request->getPost('userId');
    
//     // // Validate user ID
//     // if (!$userID) {
//     //     return json_encode(["status" => "fail", "message" => "userId is required."]);
//     // }

//     // // Retrieve cart data for the user
//     // $cart_data = $this->CartModel->where('user_id', $userID)->findAll();
//     // $product_detailsarr = [];
    
//     // if ($cart_data) {
//     //     $total_amount1 = 0;

//     //     // Loop through each cart item
//     //     foreach ($cart_data as $single_cart_data) {
//     //         $vrp = $this->Variationmodel->where('VariationID', $single_cart_data['variation_tbl_id'])->first();
//     //         $product_id = $single_cart_data['product_id'];
//     //         $cart_product_quantity = intval($single_cart_data['quantity']);
//     //         $product_color = $single_cart_data['product_color'];
//     //         $product_size = $single_cart_data['product_size'];
//     //         $product_price = floatval($single_cart_data['product_price']);
//     //         $product_variation_id = $single_cart_data['variation_tbl_id'];
//     //         $cart_tbl_id = $single_cart_data['id'];

//     //         // Get product price from variation, fallback if missing
//     //         $price = $vrp['VariationPrice'] ?? 0;
//     //         $total_amount1 += $product_price * $cart_product_quantity;

//     //         // Retrieve product details
//     //         $product_details = $this->Productmodel->where('ProductID', $product_id)->first();
//     //         if ($product_details) {
//     //             // Assign cart item details to product
//     //             $product_details['cart_product_quantity'] = $cart_product_quantity;
//     //             $product_details['product_color'] = $product_color;
//     //             $product_details['product_size'] = $product_size;
//     //             $product_details['product_price_main'] = $product_price;
//     //             $product_details['variation_tbl_id'] = $product_variation_id;
//     //             $product_details['cart_tbl_id'] = $cart_tbl_id;
//     //             $product_details['VariationPricemain'] = $price;  // Optional, depending on your use case

//     //             // Handle product images
//     //             $all_img = json_decode($product_details['ProductImage'], true);
//     //             $first_img = $all_img[0] ?? 'default_image.jpg'; // Fallback if no image
//     //             $product_details["allImages"] = $this->productImagePath . $first_img;

//     //             // Append product details to the array
//     //             $product_detailsarr[] = $product_details;
//     //         }
//     //     }

//     //     // Fetch tax rate, use default of 0 if not found
//     //     $txt = $this->TaxModel->where('is_check', 1)->first();
//     //     $tax_rate = $txt ? floatval($txt['TaxRate']) : 0;

//     //     // Fetch shipping data, use default of 0 if no shipping zone is checked
//     //     $shipping_data = $this->shippingzonemodel->where('is_check', 1)->first();
//     //     $shipping_cost = $shipping_data ? 10 : 0;

//     //     // Calculate tax and totals
//     //     $total_tax1 = $total_amount1 * $tax_rate / 100;
//     //     $total_with_tax1 = $total_amount1 + $shipping_cost + $total_tax1;

//     //     // Fetch currency, use 'USD' as default if not found
//     //     $currency = $this->Allsettingsmodel->first();
//     //     $crrncy = $currency['currency'] ?? 'USD';

//     //     // Return the response as a JSON
//     //     return json_encode([
//     //         'message' => 'Successfully',
//     //         'status' => 'success',
//     //         'cart_details' => $product_detailsarr,
//     //         'final_total' => number_format($total_amount1, 2),
//     //         'total_tax' => number_format($total_tax1, 2),
//     //         'final_total_with_tax' => number_format($total_with_tax1, 2),
//     //         'shipping_cost' => number_format($shipping_cost, 2),
//     //         'currency' => $crrncy,
//     //     ]);
//     // } else {
//     //     // Return response when cart is empty
//     //     return json_encode([
//     //         'message' => 'Cart is Empty',
//     //         'status' => 'fail',
//     //     ]);
//     // }
    
    
// }

// without state thing in frontend ---
// public function view_cart_list(){
//      $userId = $this->request->getPost('userId');
//     $couponCode = $this->request->getPost('Coupon');

//     if (!$userId) {
//         return json_encode(array("status" => "fail", "message" => "User ID required."));
//     }

//     // Fetch user and cart items
//     // $user = $this->UserModel->where('UserID', $userId)->first();
//     $cartItems = $this->CartModel->where('user_id', $userId)->findAll();
//     // print_r($cartItems);die;
//     if (empty($cartItems)) {
//         return json_encode(array("status" => "fail", "message" => "No items in cart."));
//     }

//     // Initialize variables
//     $discount = 0;
//     $productDetailsArr = [];
//     $totalAmount = 0;
//     $couponMessage = "No coupon applied.";

//     foreach ($cartItems as $cartItem) {
//         $productID = $cartItem['product_id'];
//         $productQuantity = $cartItem['quantity'];
//         $productPrice = $cartItem['product_price'];
//         $cartTblID = $cartItem['id'];

//         $totalAmount += (floatval($productPrice) * floatval($productQuantity));

//         $productDetails = $this->Productmodel->where('ProductID', $productID)->first();
//         if ($productDetails) {
//             $productDetails['cart_product_quantity'] = $productQuantity;
//             $productDetails['product_price_main'] = $productPrice;
//             $productDetails['cart_tbl_id'] = $cartTblID;

//             $allImages = isset($productDetails['ProductImage']) ? json_decode($productDetails['ProductImage'], true) : [];
//             $firstImage = !empty($allImages) ? $allImages[0] : '';
//             $productDetails["allImages"] = $this->productImagePath . $firstImage;

//             $productDetailsArr[] = $productDetails;
//         }
//     }

//     // Process coupon logic
//     if ($couponCode) {
//         $couponDetails = $this->CouponModel->where('CouponCode', $couponCode)->first();

//         if ($couponDetails) {
//             $currentDate = date('Y-m-d');
//             $startDate = $couponDetails['StartDate'];
//             $endDate = $couponDetails['EndDate'];

//             if ($currentDate >= $startDate && $currentDate <= $endDate) {
//                 $isCouponApplicable = false;

//                 // Check coupon applicability based on ProductCoupon type
//                 if ($couponDetails['ProductCoupon'] == 2) { // Specific products
//                     foreach ($productDetailsArr as $product) {
//                         if (in_array($product['ProductID'], explode(',', $couponDetails['ProductID']))) {
//                             $isCouponApplicable = true;
//                             break;
//                         }
//                     }
//                 } elseif ($couponDetails['ProductCoupon'] == 1) { // Specific categories
//                     foreach ($productDetailsArr as $product) {
//                         if (in_array($product['CategoryID'], explode(',', $couponDetails['CategoryID']))) {
//                             $isCouponApplicable = true;
//                             break;
//                         }
//                     }
//                 } elseif ($couponDetails['ProductCoupon'] == 3) { // Specific users
//                     if (in_array($userId, explode(',', $couponDetails['UserID']))) {
//                         $isCouponApplicable = true;
//                     }
//                 }

//                 // Apply coupon if applicable and conditions are met
//                 if ($isCouponApplicable) {
//                     $discount = ($couponDetails['CouponType'] == 1)
//                         ? ($totalAmount * $couponDetails['CouponValue']) / 100
//                         : $couponDetails['CouponValue'];

//                     $couponMessage = "Coupon applied successfully!";
//                 } else {
//                     return json_encode(array("status" => "fail", "message" => "Invalid Coupon."));
//                 }
//             } else {
//                 return json_encode(array("status" => "fail", "message" => "Coupon expired or not yet valid."));
//             }
//         } else {
//             return json_encode(array("status" => "fail", "message" => "Invalid coupon code."));
//         }
//     }

//     // Fetch tax details
//     $taxData = $this->TaxModel->where('is_check', 1)->first();
//     $taxRate = $taxData ? $taxData['TaxRate'] : 0;

//     // Fetch shipping details
//     $shippingData = $this->shippingzonemodel->where('is_check', 1)->first();
//     $shippingCost = $shippingData ? 10 : 0;

//     // Calculate totals
//     $totalTax = (floatval($totalAmount) * floatval($taxRate)) / 100;
//     $finalTotal = (floatval($totalAmount) - floatval($discount)) + floatval($totalTax) + floatval($shippingCost);

//     // Prepare final response
//     return json_encode(array(
//         'message' => 'Successfully',
//         'status' => 'success',
//         'cart_details' => $productDetailsArr,
//         'total_amount' => number_format($totalAmount, 2),
//         'discount_applied' => number_format($discount, 2),
//         'shipping_cost' => number_format($shippingCost, 2),
//         'total_tax' => number_format($totalTax, 2),
//         'final_total_with_shipping_and_discount' => number_format($finalTotal, 2),
//         'coupon_message' => $couponMessage,
//     ));
// }
// ================

public function view_cart_list() {
    $userId = $this->request->getPost('userId');
    $couponCode = $this->request->getPost('Coupon');

    if (!$userId) {
        return json_encode(array("status" => "fail", "message" => "User ID required."));
    }

    // Fetch user cart items
    $cartItems = $this->CartModel->where('user_id', $userId)->findAll();
    if (empty($cartItems)) {
        return json_encode(array("status" => "fail", "message" => "No items in cart."));
    }

    // Fetch the currently applied coupon from the database if none provided
    // if (!$couponCode) {
    //     $userCart = $this->CartModel->where('user_id', $userId)->first();
    //     $couponCode = $userCart ? $userCart['coupon_code'] : null;
    // }
    
     if (!$couponCode) {
        $existingCart = $this->CartModel->where('user_id', $userId)->where('coupon_code IS NOT NULL')->first();
        $couponCode = $existingCart ? $existingCart['coupon_code'] : null;
    }


    // Initialize variables
    $discount = 0;
    $productDetailsArr = [];
    $totalAmount = 0;
    $couponMessage = "No coupon applied.";

    foreach ($cartItems as $cartItem) {
        $productID = $cartItem['product_id'];
        $productQuantity = $cartItem['quantity'];
        $productPrice = $cartItem['product_price'];
        $cartTblID = $cartItem['id'];

        $totalAmount += (floatval($productPrice) * floatval($productQuantity));

        $productDetails = $this->Productmodel->where('ProductID', $productID)->first();
        if ($productDetails) {
            $productDetails['cart_product_quantity'] = $productQuantity;
            $productDetails['product_price_main'] = $productPrice;
            $productDetails['cart_tbl_id'] = $cartTblID;

            $allImages = isset($productDetails['ProductImage']) ? json_decode($productDetails['ProductImage'], true) : [];
            $firstImage = !empty($allImages) ? $allImages[0] : '';
            $productDetails["allImages"] = $this->productImagePath . $firstImage;

            $productDetailsArr[] = $productDetails;
        }
    }

    // Process coupon logic
    if ($couponCode) {
        $couponDetails = $this->CouponModel->where('CouponCode', $couponCode)->first();

        if ($couponDetails) {
            $currentDate = date('Y-m-d');
            $startDate = $couponDetails['StartDate'];
            $endDate = $couponDetails['EndDate'];

            if ($currentDate >= $startDate && $currentDate <= $endDate) {
                $isCouponApplicable = false;

                // Check coupon applicability based on ProductCoupon type
                if ($couponDetails['ProductCoupon'] == 2) { // Specific products
                    foreach ($productDetailsArr as $product) {
                        if (in_array($product['ProductID'], explode(',', $couponDetails['ProductID']))) {
                            $isCouponApplicable = true;
                            break;
                        }
                    }
                } elseif ($couponDetails['ProductCoupon'] == 1) { // Specific categories
                    foreach ($productDetailsArr as $product) {
                        if (in_array($product['CategoryID'], explode(',', $couponDetails['CategoryID']))) {
                            $isCouponApplicable = true;
                            break;
                        }
                    }
                } elseif ($couponDetails['ProductCoupon'] == 3) { // Specific users
                    if (in_array($userId, explode(',', $couponDetails['UserID']))) {
                        $isCouponApplicable = true;
                    }
                }

                // Apply coupon if applicable and conditions are met
                if ($isCouponApplicable) {
                    $discount = ($couponDetails['CouponType'] == 1)
                        ? ($totalAmount * $couponDetails['CouponValue']) / 100
                        : $couponDetails['CouponValue'];

                    $couponMessage = "Coupon applied successfully!";

                    // Store the applied coupon in the database
                    $this->CartModel->where('user_id', $userId)->set(['coupon_code' => $couponCode])->update();
                } else {
                    return json_encode(array("status" => "fail", "message" => "Invalid Coupon."));
                }
            } else {
                return json_encode(array("status" => "fail", "message" => "Coupon expired or not yet valid."));
            }
        } else {
            return json_encode(array("status" => "fail", "message" => "Invalid coupon code."));
        }
    }

    // Fetch tax details
    $taxData = $this->TaxModel->where('is_check', 1)->first();
    $taxRate = $taxData ? $taxData['TaxRate'] : 0;

    // Fetch shipping details
    $shippingData = $this->shippingzonemodel->where('is_check', 1)->first();
    $shippingCost = $shippingData ? 10 : 0;

    // Calculate totals
    $totalTax = (floatval($totalAmount) * floatval($taxRate)) / 100;
    $finalTotal = (floatval($totalAmount) - floatval($discount)) + floatval($totalTax) + floatval($shippingCost);

    // Prepare final response
    return json_encode(array(
        'message' => 'Successfully',
        'status' => 'success',
        'cart_details' => $productDetailsArr,
        'total_amount' => number_format($totalAmount, 2),
        'discount_applied' => number_format($discount, 2),
        'shipping_cost' => number_format($shippingCost, 2),
        'total_tax' => number_format($totalTax, 2),
        'final_total_with_shipping_and_discount' => number_format($finalTotal, 2),
        'coupon_message' => $couponMessage,
    ));
}


    public function remove_coupen()
    {
        $userID = $this->request->getPost('userId');
        if (!$userID) {
            return json_encode(array("status" => "fail", "message" => "userId is required."));
        }
        
        $this->CartModel->where('user_id', $userID)->set(['coupon_code' => null])->update();

        $cart_data = $this->CartModel->where('user_id', $userID)->findAll();
        $product_detailsarr = [];
        if ($cart_data) {
            $total_amount1 = 0;
            foreach ($cart_data as $key => $single_cart_data) {
                $product_id = $single_cart_data['product_id'];
                $cart_product_quantity = $single_cart_data['quantity'];
                $product_color = $single_cart_data['product_color'];
                $product_size = $single_cart_data['product_size'];
                $product_price = $single_cart_data['product_price'];
                $product_variation_id = $single_cart_data['variation_tbl_id'];
                $cart_tbl_id = $single_cart_data['id'];
                $total_amount1 = $total_amount1 + ($product_price * $cart_product_quantity);

                $product_details = $this->Productmodel->where('ProductID', $product_id)->first();
                $product_details['cart_product_quantity'] = $cart_product_quantity;
                $product_details['product_color'] = $product_color;
                $product_details['product_size'] = $product_size;
                $product_details['product_price_main'] = $product_price;
                $product_details['variation_tbl_id'] = $product_variation_id;
                $product_details['cart_tbl_id'] = $cart_tbl_id;
                if ($product_details) {

                    $all_img = json_decode($product_details['ProductImage']);
                    $first_img = $all_img[0];
                    $product_details["allImages"] = $this->productImagePath . $first_img;
                }

                $product_detailsarr[] = $product_details;
            }

            $txtrate = $this->TaxModel
                ->like('City', '*')
                ->like('State', '*')
                ->like('Zip', '*')
                ->first();

            $shipping = 10;
            $rate = $txtrate['TaxRate'];
            $total_tax1 = $total_amount1 * $rate / 100;
            $total_with_tax1 = $total_amount1 + $shipping + ($total_amount1 * $rate / 100);

            $total_tax = "$total_tax1";
            $shipping_cost = "$shipping";
            $total_with_tax = "$total_with_tax1";
            $total_amount = "$total_amount1";
            echo json_encode(array('message' => 'Successfully removed discount', 'status' => 'success', 'cart_details' => $product_detailsarr, 'final_total' => $total_amount, 'total_tax' => $total_tax, 'final_total_with_tax' => $total_with_tax, 'shipping_cost' => $shipping_cost));
        } else {
            echo json_encode(array('message' => 'Cart is Empty', 'status' => 'false'));
        }
    }

    public function view_cart_list_test()
{
    $userId = $this->request->getPost('userId');
    $couponCode = $this->request->getPost('Coupon');

    // Validate Coupon Code and User ID
    // if (!$couponCode) {
    //     return json_encode(array("status" => "fail", "message" => "Coupon required."));
    // }
    if (!$userId) {
        return json_encode(array("status" => "fail", "message" => "User ID required."));
    }

    // Fetch user and cart items
    // $user = $this->UserModel->where('UserID', $userId)->first();
    $cartItems = $this->CartModel->where('user_id', $userId)->findAll();
    // print_r($cartItems);die;
    if (empty($cartItems)) {
        return json_encode(array("status" => "fail", "message" => "No items in cart."));
    }

    // Initialize variables
    $discount = 0;
    $productDetailsArr = [];
    $totalAmount = 0;
    $couponMessage = "No coupon applied.";

    foreach ($cartItems as $cartItem) {
        $productID = $cartItem['product_id'];
        $productQuantity = $cartItem['quantity'];
        $productPrice = $cartItem['product_price'];
        $cartTblID = $cartItem['id'];

        $totalAmount += (floatval($productPrice) * floatval($productQuantity));

        $productDetails = $this->Productmodel->where('ProductID', $productID)->first();
        if ($productDetails) {
            $productDetails['cart_product_quantity'] = $productQuantity;
            $productDetails['product_price_main'] = $productPrice;
            $productDetails['cart_tbl_id'] = $cartTblID;

            $allImages = isset($productDetails['ProductImage']) ? json_decode($productDetails['ProductImage'], true) : [];
            $firstImage = !empty($allImages) ? $allImages[0] : '';
            $productDetails["allImages"] = $this->productImagePath . $firstImage;

            $productDetailsArr[] = $productDetails;
        }
    }

    // Process coupon logic
    if ($couponCode) {
        $couponDetails = $this->CouponModel->where('CouponCode', $couponCode)->first();

        if ($couponDetails) {
            $currentDate = date('Y-m-d');
            $startDate = $couponDetails['StartDate'];
            $endDate = $couponDetails['EndDate'];

            if ($currentDate >= $startDate && $currentDate <= $endDate) {
                $isCouponApplicable = false;

                // Check coupon applicability based on ProductCoupon type
                if ($couponDetails['ProductCoupon'] == 2) { // Specific products
                    foreach ($productDetailsArr as $product) {
                        if (in_array($product['ProductID'], explode(',', $couponDetails['ProductID']))) {
                            $isCouponApplicable = true;
                            break;
                        }
                    }
                } elseif ($couponDetails['ProductCoupon'] == 1) { // Specific categories
                    foreach ($productDetailsArr as $product) {
                        if (in_array($product['CategoryID'], explode(',', $couponDetails['CategoryID']))) {
                            $isCouponApplicable = true;
                            break;
                        }
                    }
                } elseif ($couponDetails['ProductCoupon'] == 3) { // Specific users
                    if (in_array($userId, explode(',', $couponDetails['UserID']))) {
                        $isCouponApplicable = true;
                    }
                }

                // Apply coupon if applicable and conditions are met
                if ($isCouponApplicable) {
                    $discount = ($couponDetails['CouponType'] == 1)
                        ? ($totalAmount * $couponDetails['CouponValue']) / 100
                        : $couponDetails['CouponValue'];

                    $couponMessage = "Coupon applied successfully!";
                } else {
                    return json_encode(array("status" => "fail", "message" => "Invalid Coupon."));
                }
            } else {
                return json_encode(array("status" => "fail", "message" => "Coupon expired or not yet valid."));
            }
        } else {
            return json_encode(array("status" => "fail", "message" => "Invalid coupon code."));
        }
    }

    // Fetch tax details
    $taxData = $this->TaxModel->where('is_check', 1)->first();
    $taxRate = $taxData ? $taxData['TaxRate'] : 0;

    // Fetch shipping details
    $shippingData = $this->shippingzonemodel->where('is_check', 1)->first();
    $shippingCost = $shippingData ? 10 : 0;

    // Calculate totals
    $totalTax = (floatval($totalAmount) * floatval($taxRate)) / 100;
    $finalTotal = (floatval($totalAmount) - floatval($discount)) + floatval($totalTax) + floatval($shippingCost);

    // Prepare final response
    return json_encode(array(
        'message' => 'Successfully',
        'status' => 'success',
        'cart_details' => $productDetailsArr,
        'total_amount' => number_format($totalAmount, 2),
        'discount_applied' => number_format($discount, 2),
        'shipping_cost' => number_format($shippingCost, 2),
        'total_tax' => number_format($totalTax, 2),
        'final_total_with_shipping_and_discount' => number_format($finalTotal, 2),
        'coupon_message' => $couponMessage,
    ));
}






public function view_cart_list_1($userID, $shipping_address_id)
{
    if (!$userID) {
        return json_encode(["status" => "fail", "message" => "User ID is required."]);
    }

    $cart_data = $this->CartModel->where('user_id', $userID)->findAll();
    if (empty($cart_data)) {
        return json_encode(['message' => 'Cart is empty', 'status' => 'fail']);
    }

    $product_detailsarr = [];
    foreach ($cart_data as $single_cart_data) {
        $product_id = $single_cart_data['product_id'];
        $cart_product_quantity = $single_cart_data['quantity'];
        $product_color = $single_cart_data['product_color'];
        $product_size = $single_cart_data['product_size'];
        $product_price = $single_cart_data['product_price'];
        $product_variation_id = $single_cart_data['variation_tbl_id'];
        $cart_tbl_id = $single_cart_data['id'];

        $product_details = $this->Productmodel->where('ProductID', $product_id)->first();
        if ($product_details) {
            $product_details['cart_product_quantity'] = $cart_product_quantity;
            $product_details['product_color'] = $product_color;
            $product_details['product_size'] = $product_size;
            $product_details['product_price_main'] = $product_price;
            $product_details['variation_tbl_id'] = $product_variation_id;
            $product_details['cart_tbl_id'] = $cart_tbl_id;

            $all_img = json_decode($product_details['ProductImage']);
            $first_img = $all_img[0] ?? '';
            $product_details["allImages"] = $this->productImagePath . $first_img;

            $product_detailsarr[] = $product_details;
        }
    }

    // Calculate tax
    $tax_response = $this->tax($shipping_address_id, $cart_data);
    $tax_data = json_decode($tax_response, true);
    if ($tax_data['status'] !== 'success') {
        return json_encode(['status' => 'fail', 'message' => 'Tax calculation failed.']);
    }

    $total_price = $tax_data['total_price'];
    $total_tax = $tax_data['total_tax'];
    $total_with_tax = $tax_data['total_with_tax'];

    // Calculate shipping rate
    $shipping_response = $this->shipping_rate_find($shipping_address_id);
    $shipping_data = json_decode($shipping_response, true);
    if ($shipping_data['status'] !== 'success') {
        return json_encode(['status' => 'fail', 'message' => 'Shipping rate calculation failed.']);
    }

    $shipping_rate = $shipping_data['shipping_rate'];

    // Final total with shipping
    $final_total_with_shipping = $total_with_tax + $shipping_rate;

    return json_encode([
        'message' => 'Successfully retrieved cart details.',
        'status' => 'success',
        'cart_details' => $product_detailsarr,
        'total_price' => $total_price,
        'total_tax' => $total_tax,
        'total_with_tax' => $total_with_tax,
        'shipping_rate' => $shipping_rate,
        'final_total_with_shipping' => $final_total_with_shipping
    ]);
}

    public function success_paypal()
    {
        $userID = $this->request->getPost('userId');
        $paymentID = $this->request->getPost('paymentID');
        $payment_type = $this->request->getPost('type');
        $shipping_address_id = $this->request->getPost('shipping_address_id');
        $discount = $this->request->getPost('discount');
        // print_r($payment_type);die;
        if ((isset($userID) && !empty($userID)) && (isset($paymentID) && !empty($paymentID))) {

            $test = $this->view_cart_list_1($userID,$shipping_address_id);
            $cart_details = json_decode($test);

            $test1 = $this->saveOrder($payment_type, $userID, $shipping_address_id, $cart_details, $paymentID,$discount);


            if ($test1) {
                $res = array('message' => 'Successfully', 'status' => 'success', 'order_id'=>$test1);
            } else {
                $res = array('message' => 'Cart is Empty', 'status' => 'false');
            }
        } else {
            $res = array('message' => 'Required parameter not getting.', 'status' => 'false');
        }
        return json_encode($res);
    }
    public function saveOrder($platform, $userID, $shipping_address_id, $cart_details, $transation_id,$discount)
    {
        $shipping_data = $this->User_shipping_addressmodel->where('id', $shipping_address_id)->first();
        $user_data = $this->UserModel->where('UserID', $shipping_data['user_id'])->first();

        // print_r($cart_details);die;
        $order_date = date("d-m-Y");
        $order_number = mt_rand(10000, 99999);
        $total_amout = $cart_details->final_total_with_shipping-$discount;
        $txt = $cart_details->total_tax;

        $all_feild = [
            'UserID' => $userID,
            'fname' => $shipping_data['first_name'],
            'lname' => $shipping_data['last_name'],
            'email' => $user_data['UserEmail'],
            'phoneno' => $shipping_data['number'],
            'country' => $shipping_data['country'],
            'state' => $shipping_data['state'],
            'city' => $shipping_data['city'],
            'address1' => $shipping_data['address'],
            'zipcode' => $shipping_data['zipcode'],
            'OrderDate' => $order_date,
            'OrderNumber' => $order_number,
            'TotalAmount' => $total_amout,
            'totalTax' => $txt,
            'payment' => $platform,
            'OrderStatus' => 'Pending',
        ];

        $add_order_data = $this->Ordermodel->insert($all_feild);
        $insert_id = $this->Ordermodel->getInsertID();

        if ($insert_id) {
            $cart_data2 = $this->CartModel->where('user_id', $userID)->findAll();
            $all_data3 = [
                'Transation_id' => $transation_id,
                'OrderID' => $insert_id,
                'UserID' => $userID,
                'PaymentType' => $platform,
                'Amount' => $total_amout,
                'PaymentStatus' => "success",
            ];
            $paymet_tbl_data = $this->Paymentmodel->insert($all_data3);

            foreach ($cart_data2 as $single_cart_data2) {
                $product_id2 = $single_cart_data2['product_id'];
                $quantity2 = $single_cart_data2['quantity'];
                $price2 = $single_cart_data2['product_price'];
                $product_color = $single_cart_data2['product_color'];
                $product_size = $single_cart_data2['product_size'];
                $variation_tbl_id = $single_cart_data2['variation_tbl_id'];

                $all_data2 = [
                    'OrderID' => $insert_id,
                    'ProductID' => $product_id2,
                    'Quantity' => $quantity2,
                    'Price' => $price2,
                    'variation_table_id' => $variation_tbl_id,
                    'product_color' => $product_color,
                    'product_size' => $product_size,
                ];
                $add_order_items = $this->Orderitemmodel->insert($all_data2);
            }

            if ($add_order_items) {
                $pdf_path = $this->generateInvoicePDFs($insert_id, $all_feild, $cart_data2);
                if ($pdf_path) {
                    $this->Ordermodel->update($insert_id, ['invoice_pdf' => $pdf_path]);
                }
                return $insert_id;
            }
        }

        return false;
    }


    private function generateInvoicePDFs($order_id, $all_feild, $cart_data2)
    {
        $dompdf = new \Dompdf\Dompdf();

        // Fetch and encode logo image
        $imagePath = 'https://ecomweb.fableadtechnolabs.com/admin/public/upload_images/1728803054_e8778ea13ec894e43181.png';

        $imageData = file_get_contents($imagePath);
        $base64 = base64_encode($imageData);
        $base64Image = 'data:image/jpeg;base64,' . $base64;

        $qrPath = 'https://pharmaxy.org/phmxy-admin/public/upload_images/bank/ImportedPhoto.jpeg';
        $qrData = file_get_contents($qrPath);
        $base64QR = base64_encode($qrData);
        $base64QRImage = 'data:image/jpeg;base64,' . $base64QR;
        // Fetch order and settings data
        $order = $this->Ordermodel->where('OrderID', $order_id)->first();
        // $data = $this->Settings->first();
        $data2 = $this->Allsettingsmodel->first();
        $currency   = $data2['currency'];
        // Start building HTML
        $html = '
        <style>
            * { margin: 0; padding: 0; box-sizing: border-box; font-family: Arial, sans-serif; }
            body { padding: 20px; }
            .container { width: 100%; max-width: 960px; margin: 0 auto; }
            header { display: flex; justify-content: space-between; border-bottom: 2px solid #000; padding-bottom: 10px; flex-wrap: wrap; }
            header .company-info { text-align: right; }
            h1, h2 { color: #333; }
            section { margin-top: 20px; }
            table { width: 100%; border-collapse: collapse; margin-top: 10px; }
            table, th, td { border: 1px solid #ccc; }
            th, td { padding: 8px; text-align: left; }
            .total-label { text-align: right; font-weight: bold; }
            footer { text-align: center; margin-top: 40px; font-size: 12px; color: #777; }
            @media (max-width: 768px) { .logo img { width: 100px; } table, th, td { font-size: 14px; } .total-label { font-size: 16px; } }
            @media (max-width: 576px) { h1 { font-size: 24px; } section { margin-top: 15px; } }
    
            .row.de { display: flex; justify-content: space-between; flex-wrap: wrap; }
            .col-lg-6 { flex: 0 0 48%; margin-bottom: 20px; }
            @media (max-width: 768px) { .col-lg-6 { flex: 0 0 100%; } }
            .right-align { text-align: right; }
        </style>
    
        <body>
            <div class="container">
                <header>
                    <div class="logo">
                        <img src="' . $base64Image . '" alt="Company Logo" width="150">
                    </div>
                    <div class="company-info">
                        <h1>Ecomweb</h1>
                        <p>Address: ' . htmlspecialchars($data2['Address']) . '</p>
                        <p>Email: ' . htmlspecialchars($data2['Email']) . ' | Phone: ' . htmlspecialchars($data2['Phone']) . '</p>
                
                    </div>
                </header>
    
                <div class="row de">
                    <section class="order-details col-lg-6">
                        <h4>Order Details</h4>
                        <p><strong>Order Number:</strong> # ' . htmlspecialchars($order['OrderNumber']) . '</p>
                        <p><strong>Order Date:</strong> ' . date('jS F Y') . '</p>
                    </section>
    
                    <section class="customer-info col-lg-6 right-align">
                        <h4>Customer Information</h4>
                        <p><strong>Name:</strong> ' . htmlspecialchars($all_feild['fname'] . ' ' . $all_feild['lname']) . '</p>
                        <p><strong>Email:</strong> ' . htmlspecialchars($all_feild['email']) . '</p>
                        <p><strong>Shipping Address:</strong> ' . htmlspecialchars($all_feild['address1']) . '</p>
                        <p><strong>Phone No:</strong> ' . htmlspecialchars($all_feild['phoneno']) . '</p>
                    </section>
                </div>
    
                <section class="order-summary">
                    <h2>Order Summary</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Batch</th>
                                <th>Exp Date</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>';

        $totalAmount = 0;
        foreach ($cart_data2 as $item) {
            $product_details = $this->Productmodel->where('ProductID', $item['product_id'])->first();
            $product_details_item = $this->Orderitemmodel->where('ProductID', $item['product_id'])->first();
            $productName = $product_details ? htmlspecialchars($product_details['ProductName']) : 'Unknown Product';
            $totalPrice = $item['quantity'] * $item['product_price'];
            $totalAmount += $totalPrice;

            $html .= '<tr>
                        <td style="width:250px">' . $productName . '</td>
                        <td>' . htmlspecialchars($item['quantity']) . '</td>
                        <td>' . htmlspecialchars($item['product_price']) . '</td>
                        <td>' . (empty($product_details_item['package_date']) ? '-' : htmlspecialchars($product_details_item['package_date'])) . '</td>
                        <td>' . (empty($product_details_item['exprice_date']) ? '-' : htmlspecialchars($product_details_item['exprice_date'])) . '</td>
                        <td>'.htmlspecialchars($currency) . number_format($totalPrice, 2) . '</td>
                      </tr>';
        }

        $html .= '<tr>
                    <td colspan="5" class="total-label">Sub Total:</td>
                    <td>'.htmlspecialchars($currency) . number_format($totalAmount, 2) . '</td>
                  </tr>';

        // Check if any additional charges or discounts exist before adding rows
        if (!empty($order['totalDiscount']) && $order['totalDiscount'] != 0) {
            $html .= '<tr>
                        <td colspan="5" class="total-label">Discount(-):</td>
                        <td>' .htmlspecialchars($currency) . htmlspecialchars($order['totalDiscount']) . '</td>
                      </tr>';
        }
        
        if (!empty($order['totalTax']) && $order['totalTax'] != 0) {
            $html .= '<tr>
                        <td colspan="5" class="total-label">Tax(+):</td>
                        <td>' .htmlspecialchars($currency) . htmlspecialchars($order['totalTax']) . '</td>
                      </tr>';
        }
        
        if (!empty($order['totalShipingCost']) && $order['totalShipingCost'] != 0) {
            $html .= '<tr>
                        <td colspan="5" class="total-label">Shipping Charges(+):</td>
                        <td>' .htmlspecialchars($currency) . htmlspecialchars($order['totalShipingCost']) . '</td>
                      </tr>';
        }
        
        if (!empty($order['referDis']) && $order['referDis'] != 0) {
            $html .= '<tr>
                        <td colspan="5" class="total-label">Referral Discount(-):</td>
                        <td>' .htmlspecialchars($currency) . htmlspecialchars($order['referDis']) . '</td>
                      </tr>';
        }


        // Add total amount row
        $html .= '<tr>
                    <td colspan="5" class="total-label">Total Amount:</td>
                    <td>'.htmlspecialchars($currency) . htmlspecialchars($order['TotalAmount']) . '</td>
                  </tr>';

        $html .= '</tbody>
                  </table>
                </section>
    
                <div class="row de">                    
                    <section class="order-details col-lg-6">
                        <h4>Payment Details</h4>
                        <p><strong>Payment Method:</strong> ' . htmlspecialchars($all_feild['payment']) . '</p>
                        <p><strong>Payment Status:</strong> ' . htmlspecialchars($all_feild['OrderStatus']) . '</p>
                    </section>
                </div>
    
                <footer>
                    <p>For any queries, please contact us at info@Ecomweb.org</p>
                    <p>&copy; 2024 Ecomweb. All rights reserved.</p>
                </footer>
            </div>
        </body>';

        // Load HTML into Dompdf
        $dompdf->loadHtml($html);

        // Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the PDF
        $dompdf->render();

        // Save the generated PDF to a file
        $pdf_output = $dompdf->output();
        $pdf_filename = 'invoice_' . $order_id . '.pdf';
        $pdf_file_path = FCPATH . 'admin/public/invoice/' . $pdf_filename;

        if (!is_dir(FCPATH . 'admin/public/invoice/')) {
            mkdir(FCPATH . 'admin/public/invoice/', 0777, true);
        }

        file_put_contents($pdf_file_path, $pdf_output);

        // Return the PDF filename for further use
        // return $pdf_filename;
        return base_url('admin/public/invoice/' . $pdf_filename);
    }



    public function increment_quantity()
    {

        $cart_id = $this->request->getPost('cart_tbl_id');
        if (!$cart_id) {
            return json_encode(array("status" => "fail", "message" => "cart_id is required."));
        }


        $cart_list_info = $this->CartModel->where('id', $cart_id)->first();
        if ($cart_list_info) {
            $quantity_num = $cart_list_info['quantity'];
            $cart_id = $cart_list_info['id'];
            $new_quantity_num = $quantity_num + 1;
            $all_data = [
                'quantity' => $new_quantity_num
            ];
            $add_data = $this->CartModel->update($cart_id, $all_data);
            if ($add_data) {
                echo json_encode(array('message' => 'quantity added successfully', 'status' => 'success'));
            } else {
                return json_encode(array("status" => "fail", "message" => "error."));
            }
        } else {
            echo json_encode(array('message' => 'Cart is Empty', 'status' => 'false'));
        }
    }
    public function decrement_quantity()
    {

        $cart_id = $this->request->getPost('cart_tbl_id');
        if (!$cart_id) {
            return json_encode(array("status" => "fail", "message" => "cart_id is required."));
        }
        $cart_list_info = $this->CartModel->where('id', $cart_id)->first();
        if ($cart_list_info) {
            $quantity_num = $cart_list_info['quantity'];
            if ($quantity_num == 1) {
                return json_encode(array("status" => "fail", "message" => "Minimum 1 Product required"));
                exit;
            }
            $cart_id = $cart_list_info['id'];
            $new_quantity_num = $quantity_num - 1;
            $all_data = [
                'quantity' => $new_quantity_num
            ];
            $add_data = $this->CartModel->update($cart_id, $all_data);
            if ($add_data) {
                echo json_encode(array('message' => 'quantity Removed successfully', 'status' => 'success'));
            } else {
                return json_encode(array("status" => "fail", "message" => "error."));
            }
        } else {
            echo json_encode(array('message' => 'Cart is Empty', 'status' => 'false'));
        }
    }
    public function remove_cart()
    {
        $user_id = $this->request->getPost('user_id');
        $product_id = $this->request->getPost('product_id');
        if (!$user_id) {
            return json_encode(array("status" => "fail", "message" => "user_id is required."));
        }
        if (!$product_id) {
            return json_encode(array("status" => "fail", "message" => "product_id is required."));
        }

        $cart_list_info = $this->CartModel->where('user_id', $user_id)->where('product_id', $product_id)->first();
        if ($cart_list_info) {
            $this->CartModel->delete($cart_list_info['id']);
            return json_encode(array("status" => "success", "message" => "successfully removed from your Cart."));
        } else {
            return json_encode(array("status" => "fail", "message" => "fail to remove from Cart."));
        }
    }

    // public function checkout()
    // {
    //     $user_id =  $this->request->getPost('user_id');
    //     $payment = $this->request->getPost('payment');
    //     $shipping_address_id=$this->request->getPost('shipping_address_id');

    //     if (!$user_id) {
    //         return json_encode(array("status" => "fail", "message" => "user_id is required."));
    //     }
    //     // if($payment== "paypal"){
    //     //     echo "in";
    //     //     exit;

    //     // }

    //     $cart_data = $this->CartModel->where('user_id', $user_id)->findAll();
    //     $product_detailsarr = [];
    //     $total_amount1=0;
    //     if ($cart_data) {
    //         foreach ($cart_data as $key => $single_cart_data) {
    //             $product_id = $single_cart_data['product_id'];
    //             $cart_product_quantity = $single_cart_data['quantity'];
    //             $product_price=$single_cart_data['product_price'];
    //             $total_amount1=$total_amount1+($product_price*$cart_product_quantity);

    //             $vari_tbl_id=$single_cart_data['variation_tbl_id'];

    //             if($vari_tbl_id==0 || $vari_tbl_id==null){

    //                 $product_details = $this->Productmodel->where('ProductID', $product_id)->first();
    //                 $stock_quantity=$product_details['ProductStock'];
    //                 $new_quantity=$stock_quantity-$cart_product_quantity;
    //                 $all_data=[
    //                     'ProductStock'=> $new_quantity,
    //                     ];
    //                     $this->Productmodel->update($product_id,$all_data);
    //             }else{

    //                 $product_variation_details=$this->Variationmodel->where('VariationID', $vari_tbl_id)->first();
    //                 $vari_stock_quantity=$product_variation_details['VariationStock'];
    //                 $vari_new_quantity=$vari_stock_quantity-$cart_product_quantity;
    //                 $all_data1=[
    //                     'VariationStock'=> $vari_new_quantity,
    //                     ];
    //                     $this->Variationmodel->update($vari_tbl_id,$all_data1);
    //             }

    //         }

    //         $total_tax1=$total_amount1*10/100;
    //         $total_with_tax1=$total_amount1+($total_amount1*10/100);

    //         $total_tax="$total_tax1";
    //         $total_with_tax="$total_with_tax1";
    //         $total_amount="$total_amount1";
    //         $user_data_n = $this->UserModel->where('UserID', $user_id)->first();
    //         $user_shipping_address_data=$this->User_shipping_addressmodel->where('id',$shipping_address_id)->first();

    //         $fname = $user_shipping_address_data['first_name'];
    //         $lname = $user_shipping_address_data['last_name'];
    //         $email = $user_data_n['UserEmail'];
    //         $phone = $user_shipping_address_data['number'];
    //         $country = $user_shipping_address_data['country'];
    //         $state = $user_shipping_address_data['state'];
    //         $city = $user_shipping_address_data['city'];
    //         $address1 = $user_shipping_address_data['address'];
    //         $zipcode = $user_shipping_address_data['zipcode'];

    //         $order_date = date("d-m-Y");
    //         $order_number = mt_rand(10000, 99999);

    //         $all_data = [
    //             'UserID' => $user_id,
    //             'fname' => $fname,
    //             'lname' => $lname,
    //             'email' => $email,
    //             'phoneno' => $phone,
    //             'country' => $country,
    //             'state' => $state,
    //             'city' => $city,
    //             'address1' => $address1,
    //             'zipcode' => $zipcode,
    //             'OrderDate' => $order_date,
    //             'OrderNumber' => $order_number,
    //             'TotalAmount' => $total_with_tax,
    //             'payment' => $payment,
    //             'OrderStatus' => "Pending"

    //         ];
    //         $add_order_data = $this->Ordermodel->insert($all_data);
    //         $insert_id = $this->Ordermodel->getInsertID();
    //         if ($insert_id) {
    //             $cart_data2 = $this->CartModel->where('user_id', $user_id)->findAll();
    //             $all_data3=[
    //                 'OrderID' => $insert_id,
    //                 'UserID' => $user_id,
    //                 'PaymentType' => $payment,
    //                 'Amount' => $total_with_tax,
    //                 'PaymentStatus' => "success",
    //                 ];
    //             $paymet_tbl_data=$this->Paymentmodel->insert($all_data3);

    //             foreach ($cart_data2 as $single_cart_data2) {
    //                 $product_id2 = $single_cart_data2['product_id'];
    //                 $quantity2 = $single_cart_data2['quantity'];
    //                 $price2= $single_cart_data2['product_price'];
    //                 $product_color=$single_cart_data2['product_color'];
    //                 $product_size=$single_cart_data2['product_size'];
    //                 $variation_tbl_id=$single_cart_data2['variation_tbl_id'];

    //                 $all_data2 = [
    //                     'OrderID' => $insert_id,
    //                     'ProductID' => $product_id2,
    //                     'Quantity' => $quantity2,
    //                     'Price' => $price2,
    //                     'variation_table_id' =>$variation_tbl_id,
    //                     'product_color' =>$product_color,
    //                     'product_size' =>$product_size
    //                 ];
    //                 $add_order_items = $this->Orderitemmodel->insert($all_data2);
    //             }
    //             if ($add_order_items) {
    //                 $this->CartModel->where('user_id', $user_id)->delete();
    //             }
    //         }




    //         echo json_encode(array('message' => 'Successfully', 'status' => 'success', 'cart_details' => $all_data,'final_total' => $total_amount,'total_tax'=>$total_tax,'final_total_with_tax'=>$total_with_tax));
    //     } else {
    //         echo json_encode(array('message' => 'Cart is Empty', 'status' => 'false'));
    //     }
    // }
    public function checkout()
    {
        $user_id = $this->request->getPost('user_id');
        $payment = $this->request->getPost('payment');
        $shipping_address_id = $this->request->getPost('shipping_address_id');
        $discount = $this->request->getPost('discount');

        if (!$user_id) {
            return json_encode(['status' => 'fail', 'message' => 'User ID is required.']);
        }

        // Fetch cart data for the user
        $cart_data = $this->CartModel->where('user_id', $user_id)->findAll();

        if (empty($cart_data)) {
            return json_encode(['message' => 'Cart is Empty', 'status' => 'fail']);
        }

        $total_amount = 0;
        $product_detailsarr = [];

        // Loop through each cart item to calculate total amount and update stock
        foreach ($cart_data as $single_cart_data) {
            $product_id = $single_cart_data['product_id'];
            $cart_product_quantity = $single_cart_data['quantity'];
            $product_price = $single_cart_data['product_price'];
            $vari_tbl_id = $single_cart_data['variation_tbl_id'];

            $total_amount += ($product_price * $cart_product_quantity);

            if ($vari_tbl_id == 0 || $vari_tbl_id == null) {
                // Update product stock if no variation
                $product_details = $this->Productmodel->where('ProductID', $product_id)->first();
                if ($product_details) {
                    $new_quantity = $product_details['ProductStock'] - $cart_product_quantity;
                    $this->Productmodel->update($product_id, ['ProductStock' => $new_quantity]);
                }
            } else {
                // Update variation stock if exists
                $product_variation_details = $this->Variationmodel->where('VariationID', $vari_tbl_id)->first();
                if ($product_variation_details) {
                    $vari_new_quantity = $product_variation_details['VariationStock'] - $cart_product_quantity;
                    $this->Variationmodel->update($vari_tbl_id, ['VariationStock' => $vari_new_quantity]);
                }
            }
        }

        // Fetch and calculate tax
        $TAX = $this->tax($shipping_address_id, $cart_data);
        $json_tax = json_decode($TAX);

        if (!isset($json_tax->total_price, $json_tax->total_tax, $json_tax->total_with_tax)) {
            return json_encode(['status' => 'fail', 'message' => 'Failed to calculate tax.']);
        }
        // 
        $total_price = $json_tax->total_price;
        $total_tax = $json_tax->total_tax;
        $total_with_tax = $json_tax->total_with_tax;

        // Fetch shipping rate
        $SHIP = $this->shipping_rate_find($shipping_address_id);
        $json_ship = json_decode($SHIP);

        if (!isset($json_ship->shipping_rate)) {
            return json_encode(['status' => 'fail', 'message' => 'Failed to fetch shipping rate.']);
        }

        $shipping_rate = floatval($json_ship->shipping_rate);

        // Calculate total with tax

        $total_with_tax = ($total_with_tax - $discount) + $shipping_rate;

        // Fetch user and shipping address details
        $user_data_n = $this->UserModel->where('UserID', $user_id)->first();
        $user_shipping_address_data = $this->User_shipping_addressmodel->where('id', $shipping_address_id)->first();

        // Prepare order details
        $fname = $user_shipping_address_data['first_name'] ?? '';
        $lname = $user_shipping_address_data['last_name'] ?? '';
        $email = $user_data_n['UserEmail'] ?? '';
        $phone = $user_shipping_address_data['number'] ?? '';
        $country = $user_shipping_address_data['country'] ?? '';
        $state = $user_shipping_address_data['state'] ?? '';
        $city = $user_shipping_address_data['city'] ?? '';
        $address1 = $user_shipping_address_data['address'] ?? '';
        $zipcode = $user_shipping_address_data['zipcode'] ?? '';

        $order_date = date("d-m-Y");
        $order_number = mt_rand(10000, 99999);

        $order_data = [
            'UserID' => $user_id,
            'fname' => $fname,
            'lname' => $lname,
            'email' => $email,
            'phoneno' => $phone,
            'country' => $country,
            'state' => $state,
            'city' => $city,
            'address1' => $address1,
            'zipcode' => $zipcode,
            'OrderDate' => $order_date,
            'totalTax' => $total_tax,
            'totalShipingCost' => $shipping_rate,
            'totalDiscount' => $discount,
            'OrderNumber' => $order_number,
            'TotalAmount' => $total_with_tax,
            'payment' => $payment,
            'OrderStatus' => 'Pending',
        ];
        // print_r($order_data);die;
        // Insert order data
        $add_order_data = $this->Ordermodel->insert($order_data);
        $insert_id = $this->Ordermodel->getInsertID();

        if ($insert_id) {
            $pdf_path = $this->generateInvoicePDF($insert_id, $order_data, $cart_data);
            if ($pdf_path) {
                $this->Ordermodel->update($insert_id, ['invoice_pdf' => $pdf_path]);
            }
            $payment_data = [
                'OrderID' => $insert_id,
                'UserID' => $user_id,
                'PaymentType' => $payment,
                'Amount' => $total_with_tax,
                'PaymentStatus' => 'success',
            ];
            $this->Paymentmodel->insert($payment_data);

            // Save order items
            foreach ($cart_data as $single_cart_data) {
                $order_item_data = [
                    'OrderID' => $insert_id,
                    'ProductID' => $single_cart_data['product_id'],
                    'Quantity' => $single_cart_data['quantity'],
                    'Price' => $single_cart_data['product_price'],
                    'variation_table_id' => $single_cart_data['variation_tbl_id'],
                    'product_color' => $single_cart_data['product_color'],
                    'product_size' => $single_cart_data['product_size'],
                ];
                $this->Orderitemmodel->insert($order_item_data);
            }

            // Clear the cart
            // $this->CartModel->where('user_id', $user_id)->delete();

            // Success response
            return json_encode([
                'message' => 'Order placed successfully',
                'status' => 'success',
                'user_id' => $user_id,
                'order_id' => $insert_id,
                'order_number' => $order_number,
                'order_id' => $insert_id,
                'final_total' => $total_price,
                'total_tax' => $total_tax,
                'final_total_with_tax' => $total_with_tax,
            ]);
        } else {
            return json_encode(['message' => 'Failed to place order', 'status' => 'fail']);
        }
    }
    // -----------------

    private function generateInvoicePDF($order_id, $order_data, $cart_data)
    {
        $dompdf = new \Dompdf\Dompdf();

        // Fetch and encode logo image
        $imagePath = 'https://ecomweb.fableadtechnolabs.com/admin/public/upload_images/1728803054_e8778ea13ec894e43181.png';

        $imageData = file_get_contents($imagePath);
        $base64 = base64_encode($imageData);
        $base64Image = 'data:image/jpeg;base64,' . $base64;

        $qrPath = 'https://pharmaxy.org/phmxy-admin/public/upload_images/bank/ImportedPhoto.jpeg';
        $qrData = file_get_contents($qrPath);
        $base64QR = base64_encode($qrData);
        $base64QRImage = 'data:image/jpeg;base64,' . $base64QR;
        // Fetch order and settings data
        $order = $this->Ordermodel->where('OrderID', $order_id)->first();
        // $data = $this->Settings->first();
        $data2 = $this->Allsettingsmodel->first();
        $currency   = $data2['currency'];
        // Start building HTML
        $html = '
        <style>
            * { margin: 0; padding: 0; box-sizing: border-box; font-family: Arial, sans-serif; }
            body { padding: 20px; }
            .container { width: 100%; max-width: 960px; margin: 0 auto; }
            header { display: flex; justify-content: space-between; border-bottom: 2px solid #000; padding-bottom: 10px; flex-wrap: wrap; }
            header .company-info { text-align: right; }
            h1, h2 { color: #333; }
            section { margin-top: 20px; }
            table { width: 100%; border-collapse: collapse; margin-top: 10px; }
            table, th, td { border: 1px solid #ccc; }
            th, td { padding: 8px; text-align: left; }
            .total-label { text-align: right; font-weight: bold; }
            footer { text-align: center; margin-top: 40px; font-size: 12px; color: #777; }
            @media (max-width: 768px) { .logo img { width: 100px; } table, th, td { font-size: 14px; } .total-label { font-size: 16px; } }
            @media (max-width: 576px) { h1 { font-size: 24px; } section { margin-top: 15px; } }
    
            .row.de { display: flex; justify-content: space-between; flex-wrap: wrap; }
            .col-lg-6 { flex: 0 0 48%; margin-bottom: 20px; }
            @media (max-width: 768px) { .col-lg-6 { flex: 0 0 100%; } }
            .right-align { text-align: right; }
        </style>
    
        <body>
            <div class="container">
                <header>
                    <div class="logo">
                        <img src="' . $base64Image . '" alt="Company Logo" width="150">
                    </div>
                    <div class="company-info">
                        <h1>Ecomweb</h1>
                        <p>Address: ' . htmlspecialchars($data2['Address']) . '</p>
                        <p>Email: ' . htmlspecialchars($data2['Email']) . ' | Phone: ' . htmlspecialchars($data2['Phone']) . '</p>
                
                    </div>
                </header>
    
                <div class="row de">
                    <section class="order-details col-lg-6">
                        <h4>Order Details</h4>
                        <p><strong>Order Number:</strong> # ' . htmlspecialchars($order['OrderNumber']) . '</p>
                        <p><strong>Order Date:</strong> ' . date('jS F Y') . '</p>
                    </section>
    
                    <section class="customer-info col-lg-6 right-align">
                        <h4>Customer Information</h4>
                        <p><strong>Name:</strong> ' . htmlspecialchars($order_data['fname'] . ' ' . $order_data['lname']) . '</p>
                        <p><strong>Email:</strong> ' . htmlspecialchars($order_data['email']) . '</p>
                        <p><strong>Shipping Address:</strong> ' . htmlspecialchars($order_data['address1']) . '</p>
                        <p><strong>Phone No:</strong> ' . htmlspecialchars($order_data['phoneno']) . '</p>
                    </section>
                </div>
    
                <section class="order-summary">
                    <h2>Order Summary</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Batch</th>
                                <th>Exp Date</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>';

        $totalAmount = 0;
        foreach ($cart_data as $item) {
            $product_details = $this->Productmodel->where('ProductID', $item['product_id'])->first();
            $product_details_item = $this->Orderitemmodel->where('ProductID', $item['product_id'])->first();
            $productName = $product_details ? htmlspecialchars($product_details['ProductName']) : 'Unknown Product';
            $totalPrice = $item['quantity'] * $item['product_price'];
            $totalAmount += $totalPrice;

            $html .= '<tr>
                        <td style="width:250px">' . $productName . '</td>
                        <td>' . htmlspecialchars($item['quantity']) . '</td>
                        <td>' . htmlspecialchars($item['product_price']) . '</td>
                        <td>' . (empty($product_details_item['package_date']) ? '-' : htmlspecialchars($product_details_item['package_date'])) . '</td>
                        <td>' . (empty($product_details_item['exprice_date']) ? '-' : htmlspecialchars($product_details_item['exprice_date'])) . '</td>
                        <td>' . number_format($totalPrice, 2) . '</td>
                      </tr>';
        }

        $html .= '<tr>
                    <td colspan="5" class="total-label">Sub Total:</td>
                    <td>'.htmlspecialchars($currency). number_format($totalAmount, 2) . '</td>
                  </tr>';

        // Check if any additional charges or discounts exist before adding rows
        if (!empty($order['totalDiscount']) && $order['totalDiscount'] != 0) {
            $html .= '<tr>
                        <td colspan="5" class="total-label">Discount(-):</td>
                        <td>' .htmlspecialchars($currency) . htmlspecialchars($order['totalDiscount']) . '</td>
                      </tr>';
        }
        
        if (!empty($order['totalTax']) && $order['totalTax'] != 0) {
            $html .= '<tr>
                        <td colspan="5" class="total-label">Tax(+):</td>
                        <td>' .htmlspecialchars($currency) . htmlspecialchars($order['totalTax']) . '</td>
                      </tr>';
        }
        
        if (!empty($order['totalShipingCost']) && $order['totalShipingCost'] != 0) {
            $html .= '<tr>
                        <td colspan="5" class="total-label">Shipping Charges(+):</td>
                        <td>' .htmlspecialchars($currency) . htmlspecialchars($order['totalShipingCost']) . '</td>
                      </tr>';
        }
        
        if (!empty($order['referDis']) && $order['referDis'] != 0) {
            $html .= '<tr>
                        <td colspan="5" class="total-label">Referral Discount(-):</td>
                        <td>' .htmlspecialchars($currency) . htmlspecialchars($order['referDis']) . '</td>
                      </tr>';
        }

        // Add total amount row
        $html .= '<tr>
                    <td colspan="5" class="total-label">Total Amount:</td>
                    <td>'.htmlspecialchars($currency) . htmlspecialchars($order['TotalAmount']) . '</td>
                  </tr>';

        $html .= '</tbody>
                  </table>
                </section>
    
                <div class="row de">                    
                    <section class="order-details col-lg-6">
                        <h4>Payment Details</h4>
                        <p><strong>Payment Method:</strong> ' . htmlspecialchars($order_data['payment']) . '</p>
                        <p><strong>Payment Status:</strong> ' . htmlspecialchars($order_data['OrderStatus']) . '</p>
                    </section>
                </div>
    
                <footer>
                    <p>For any queries, please contact us at info@Ecomweb.org</p>
                    <p>&copy; 2024 Ecomweb. All rights reserved.</p>
                </footer>
            </div>
        </body>';

        // Load HTML into Dompdf
        $dompdf->loadHtml($html);

        // Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the PDF
        $dompdf->render();

        // Save the generated PDF to a file
        $pdf_output = $dompdf->output();
        $pdf_filename = 'invoice_' . $order_id . '.pdf';
        $pdf_file_path = FCPATH . 'admin/public/invoice/' . $pdf_filename;

        if (!is_dir(FCPATH . 'admin/public/invoice/')) {
            mkdir(FCPATH . 'admin/public/invoice/', 0777, true);
        }

        file_put_contents($pdf_file_path, $pdf_output);

        // Return the PDF filename for further use
        // return $pdf_filename;
        return base_url('admin/public/invoice/' . $pdf_filename);
    }
    public function sendOrderConfirmationEmail()
    {
        $user_id = $this->request->getPost('userId');
        $order_id = $this->request->getPost('order_id');
        
        if(empty( $user_id))
        {
             return json_encode(["message" => "Order confirmation successfully", "status" => 'success']);
        }
        // Retrieve cart data based on user ID or device ID
        $cart_data = $this->CartModel->where('user_id', $user_id)->findAll();
        // Check if cart is empty
        if (empty($cart_data)) {
            return json_encode(["message" => "Cart is Empty", "status" => "false"]);
        }

        $emailSender = new \App\Libraries\EmailSender();
        $all_setting_datas = $this->Allsettingsmodel->first();
        $order_data = $this->Ordermodel->where('OrderID', $order_id)->first();
        $currency  = $all_setting_datas['currency'];
        $total_amount1 = 0;
        foreach ($cart_data as $single_cart_data) {
            if (isset($single_cart_data['product_id'], $single_cart_data['quantity'], $single_cart_data['product_price'])) {
                $product_id = $single_cart_data['product_id'];
                $cart_product_quantity = $single_cart_data['quantity'];
                $product_price = $single_cart_data['product_price'];
                $total_amount1 += $product_price * $cart_product_quantity;
                $product_details = $this->Productmodel->where('ProductID', $product_id)->first();
                if ($product_details) {
                    $stock_quantity = $product_details['ProductStock'] ?? 0;
                    $new_quantity = max(0, (int) $stock_quantity - (int) $cart_product_quantity);
                    $this->Productmodel->update($product_id, ['ProductStock' => $new_quantity]);
                }
            } else {
                return json_encode(["message" => "Invalid cart data", "status" => "false"]);
            }
        }


        $subject = 'New Order Confirmation';
        $logo = "https://ecomweb.fableadtechnolabs.com/admin/public/upload_images/1728803054_e8778ea13ec894e43181.png";

        $message = "<html>
    <head>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'>
        <style>
             .order {
                border-collapse: collapse;
                margin: 0;
                padding: 0;
                width: 100%;
                table-layout: fixed;
                border: 1px solid black;
            }
            .order tr {
                border: 1px solid #ddd;
                padding: .35em;
            }
            .order td, .order th {
                padding: 0.625em;
                text-align: left;
                border: 1px solid #ddd;
            }
            .order th {
                background-color: #f8f8f8;
                font-size: .85em;
                letter-spacing: .1em;
            }
            .product {
                border: 1px solid #ddd;
                border-collapse: collapse;
                margin: 0;
                padding: 0;
                width: 100%;
                table-layout: fixed;
            }
            .product tr {
                border: 1px solid #ddd;
                padding: .35em;
            }
            .product th,
            .product td {
                padding: .625em;
                text-align: center;
            }
            .product th {
                background-color: #f8f8f8;
                font-size: .85em;
                letter-spacing: .1em;
            }
        </style>
    </head>
    <body>
        <div style='width:100%; text-align:center'><img src='$logo' alt='Logo'/></div>
        <h3 style='text-align:center;'>Thank you! Your order has been placed successfully.</h3>
        <h3>Your order details are as follows:</h3>
        <div style='display: flex; justify-content: space-between;'>
            <div style='border: 1px solid #ccc; padding: 10px; width: 49%;'>
                <h4 style='margin: 0;'>SUMMARY:</h4>
               <table class='order' style='width: 100%; border: none !important;'>
                    <tr style='border: none;'><td style='border: none;'><strong>Order No.:</strong></td><td style='border: none;'>#{$order_data['OrderNumber']}</td></tr>
                    <tr style='border: none;'><td style='border: none;'><strong>Total Product Price:</strong></td><td style='border: none;'>₹{$total_amount1}</td></tr>";

        if ($order_data['totalShipingCost'] > 0) {
            $message .= "<tr style='border: none;'><td style='border: none;'><strong>Shipping Cost:</strong></td><td style='border: none;'>(+ ₹{$order_data['totalShipingCost']})</td></tr>";
        }
        if ($order_data['totalTax'] > 0) {
            $message .= "<tr style='border: none;'><td style='border: none;'><strong>Handling Charge:</strong></td><td style='border: none;'>(+ ₹{$order_data['totalTax']})</td></tr>";
        }
        if ($order_data['totalDiscount'] > 0) {
            $message .= "<tr style='border: none;'><td style='border: none;'><strong>Discount:</strong></td><td style='border: none;'>(- ₹{$order_data['totalDiscount']})</td></tr>";
        }
        $message .= "<tr style='border: none;'><td style='border: none;'><strong>Total Amount:</strong></td><td style='border: none;'>₹{$order_data['TotalAmount']}</td></tr>
                    <tr style='border: none;'><td style='border: none;'><strong>Placed On:</strong></td><td style='border: none;'>{$order_data['OrderDate']}</td></tr>
                </table>
            </div>
            <div style='border: 1px solid #ccc; padding: 25px; width: 49% !important;'>
                <h4 style='margin: 0;'>SHIPPING ADDRESS:</h4>
                <p><strong>Name:</strong> {$order_data['fname']} {$order_data['lname']}</p>
                <p><strong>Email:</strong> {$order_data['email']}</p>
                <p><strong>Phone:</strong> {$order_data['phoneno']}</p>
                <p><strong>Address:</strong> {$order_data['address1']}, {$order_data['city']}, {$order_data['state']}</p>
            </div>
        </div>
        <h3>PRODUCT DETAILS:</h3>
        <table class='product' width='100%'>
            <thead><tr><th>Image</th><th>Name</th><th>Quantity</th><th>Price</th><th>Subtotal</th></tr></thead><tbody>";

        // Loop through each product in the cart to populate product details
        foreach ($cart_data as $product) {
            $productdata = $this->Productmodel->where('ProductID', $product['product_id'])->first();
            $productImageArray = isset($productdata['ProductImage']) ? json_decode($productdata['ProductImage'], true) : null;
            $productImage = is_array($productImageArray) && !empty($productImageArray)
                ? base_url('admin/public/assets/img/product_images/') . $productImageArray[0]
                : 'https://ecomweb.fableadtechnolabs.com/admin/public/upload_images/1728803054_e8778ea13ec894e43181.png';
            $productName = $productdata['ProductName'] ?? 'Product Name Not Available';
            $productPrice = (float) $product['product_price'];
            $quantity = (int) $product['quantity'];
            $subtotal = $productPrice * $quantity;

            $message .= "<tr><td><img src='{$productImage}' style='width: 50px; height: 50px;'></td>
                        <td>{$productName}</td><td>{$quantity}</td><td>" .htmlspecialchars($currency). number_format($productPrice, 2) . "</td>
                        <td>".htmlspecialchars($currency) . number_format($subtotal, 2) . "</td></tr>";
        }

        $message .= "</tbody></table>
        
        <div style='background-color: #0147E0; padding: 10px; text-align: center; border-radius: 5px;'>
            <h3 style='color: white;'>If you have any issues with the order kindly contact 
            <a href='tel:{$all_setting_datas['Phone']}' style='color:white;'>Call Us</a></h3>
        </div>
    </body></html>";


        // Send email and clear cart on success
        $user_email = $order_data['email'];
        $isMailSent = $emailSender->sendEmail($user_email, $subject, $message);

        if ($isMailSent) {
            $this->CartModel->where('user_id', $user_id)->delete();
            return json_encode(["message" => "Order confirmation email sent successfully", "status" => 'success']);
        }
        return json_encode(["message" => "Email sending failed", "status" => "fail"]);
    }



    public function checkout_details()
    {
        $request = $this->request->getPost();
        $user_id = isset($request['user_id']) ? $request['user_id'] : null;
        $discount = isset($request['discount']) ? floatval($request['discount']) : 0;
        $shipping_id = isset($request['shipphing_id']) ? $request['shipphing_id'] : null;

        if (!$user_id) {
            return json_encode(['status' => 'fail', 'message' => 'user_id is required.']);
        }

        // Fetch cart data
        $cart_data = $this->CartModel->where('user_id', $user_id)->findAll();
        if (empty($cart_data)) {
            return json_encode(['status' => 'false', 'message' => 'Cart is Empty']);
        }

        // Fetch user details
        $user_data = $this->UserModel->where('UserID', $user_id)->first();
        $shipping_data = $this->User_shipping_addressmodel->where('user_id', $user_id)->first();

        // Set default shipping ID if not provided
        if (empty($shipping_id) && !empty($shipping_data)) {
            $shipping_id = $shipping_data['id'];
        }

        // Validate shipping ID
        if (!$shipping_id) {
            return json_encode(['status' => 'fail', 'message' => 'Shipping address is required.']);
        }

        // Calculate tax details
        $TAX = $this->tax($shipping_id, $cart_data);
        $json_tax = json_decode($TAX);

        if (!isset($json_tax->total_price, $json_tax->total_tax, $json_tax->total_with_tax)) {
            return json_encode(['status' => 'fail', 'message' => 'Failed to calculate tax.']);
        }

        $total_price = $json_tax->total_price;
        $total_tax = $json_tax->total_tax;
        $total_with_tax = $json_tax->total_with_tax;

        // Calculate shipping rate
        $SHIP = $this->shipping_rate_find($shipping_id);
        $json_ship = json_decode($SHIP);
        // print_r($json_ship);die;

        if (!isset($json_ship->shipping_rate)) {
            return json_encode(['status' => 'fail', 'message' => 'Failed to fetch shipping rate.']);
        }

        $shipping_rate = floatval($json_ship->shipping_rate);
        $total_with_tax_ship = $total_with_tax + $shipping_rate - $discount;
        $currency = $this->Allsettingsmodel->first();
        $crrncy=$currency['currency'];
        // Prepare the response
        $response = [
            'status' => 'success',
            'message' => 'Checkout details fetched successfully',
            'user_details' => $user_data,
            'final_total' => $total_price,
            'total_tax' => $total_tax,
            'final_total_with_tax' => $total_with_tax,
            'shipping_rate' => $shipping_rate,
            'discount' => $discount,
            'currency'=>"$crrncy",
            'total_with_tax_ship' => $total_with_tax_ship

        ];

        return json_encode($response);
    }


    public function tax($shipphing_id, $cart_data)
    {
        // Fetch shipping address
        $shipping_data = $this->User_shipping_addressmodel->where('id', $shipphing_id)->first();
        $total_price = 0;
        $total_tax = 0;
    
        foreach ($cart_data as $key => $single_cart_data) {
            $product_id = $single_cart_data['product_id'];
            $product_price = floatval($single_cart_data['product_price']);
            $product_quantity = intval($single_cart_data['quantity']);
    
            // Fetch product data
            $prod_data = $this->Productmodel->where('ProductID', $product_id)->first();
    
            $tax_id = 0;
            if (!empty($single_cart_data['variation_tbl_id'])) {
                $vari_data = $this->Variationmodel->where('VariationID', $single_cart_data['variation_tbl_id'])->first();
                $tax_id = isset($vari_data['variation_tax_class_id']) ? intval($vari_data['variation_tax_class_id']) : 0;
            } else {
                $tax_id = isset($prod_data['tax_class_id']) ? intval($prod_data['tax_class_id']) : 0;
            }
    
            $country = !empty($shipping_data['country']) ? $shipping_data['country'] : '*';
            $state = !empty($shipping_data['state']) ? $shipping_data['state'] : '*';
            $city = !empty($shipping_data['city']) ? $shipping_data['city'] : '*';
            $postcode = !empty($shipping_data['zipcode']) ? $shipping_data['zipcode'] : '*';
    
            $tax_rate = 0;
    
            $result = [];
            for ($i = 0; $i < 5; $i++) {
                $fetch_data = $this->TaxModel
                    ->where('is_check', 1) // Add the is_check condition
                    ->like('Country', $country)
                    ->like('State', $state)
                    ->like('City', $city)
                    ->like('Zip', $postcode)
                    ->first();
    
                if ($fetch_data) {
                    $result = $fetch_data;
                    $tax_rate = floatval($result['TaxRate']);
                    break;
                } else {
                    if ($i == 0) {
                        $postcode = "*";
                    } elseif ($i == 1) {
                        $city = "*";
                    } elseif ($i == 2) {
                        $state = "*";
                    } elseif ($i == 3) {
                        $country = "*";
                    }
                }
            }
    
            // Add to totals
            $total_price += ($product_quantity * $product_price);
            $total_tax += ($product_price * $tax_rate) / 100;
        }
    
        $total_with_tax = $total_price + $total_tax;
    
        return json_encode([
            "status" => "success",
            'total_price' => $total_price,
            'total_tax' => $total_tax,
            'total_with_tax' => $total_with_tax
        ]);
    }
    
    public function shipping_rate_find($shipphing_id)
    {
        $shipping_data = $this->User_shipping_addressmodel->where('id', $shipphing_id)->first();
        $shipping_price = 0;
    
        if (!empty($shipping_data) && !empty($shipping_data['zipcode'])) {
            $postcode = $shipping_data['zipcode'];
    
            $method_data = $this->ShippingMethodModel->where('MethodID', 9)->first();
            $ship_method = $method_data['MethodID'];
    
            $fetch_data = $this->shippingzonemodel->where('is_check', 1)->findAll(); // Add is_check condition
            $zone_id = '';
    
            foreach ($fetch_data as $single_data) {
                $zonename = json_decode($single_data['ZoneName']);
                if (in_array($postcode, $zonename)) {
                    $zone_id = $single_data['ZoneID'];
                    break; // Exit loop once a matching zone is found
                }
            }
    
            if (!empty($zone_id)) {
                $zone_data = $this->shippingzonemodel->where('ZoneID', $zone_id)->first();
                $rateid = $zone_data['RateID'];
                // print_r($rateid);die;
                $rate_data = $this->shippingratemodel
                    ->where('RateID', $rateid)
                    // ->where('MethodID', $ship_method)
                    ->first();
    
                if ($rate_data) {
                    $shipping_price = $rate_data['Price'];
                } else {
                    $shipping_price = 0;
                }
            } else {
                $shipping_price = 0;
            }
        } else {
            $shipping_price = 0;
        }
    
        return json_encode([
            "status" => "success",
            'shipping_rate' => $shipping_price
        ]);
    }
    
    // public function my_orders()
    // {
    //     $userID = $this->request->getPost('userId');
    //     if (!$userID) {
    //         return json_encode(array("status" => "fail", "message" => "userId is required."));
    //     }

    //     // Fetch all orders for the user
    //     $order_data = $this->Ordermodel->where('UserID', $userID)->findAll();
    //     $order_details = [];

    //     if ($order_data) {
    //         foreach ($order_data as $single_order_data) {
    //             $order_id = $single_order_data['OrderID'];

    //             // Count unread chats for the given OrderID and receiver_id
    //             $unreadCount = $this->ChatModel->where('order_id', $order_id)
    //                 ->where('receiver_id', $userID)
    //                 ->where('read_status', 0)
    //                 ->countAllResults();

    //             // Prepare order basic details
    //             $all_order = [
    //                 'fname' => $single_order_data['fname'],
    //                 'lname' => $single_order_data['lname'],
    //                 'email' => $single_order_data['email'],
    //                 'address1' => $single_order_data['address1'],
    //                 'address2' => $single_order_data['address2'],
    //                 'OrderNumber' => $single_order_data['OrderNumber'],
    //                 'payment' => $single_order_data['payment'],
    //                 'TotalAmount' => $single_order_data['TotalAmount'],
    //                 'OrderStatus' => $single_order_data['OrderStatus'],
    //                 'unread_chat_count' => $unreadCount // Add unread chat count here
    //             ];

    //             // Fetch order items
    //             $orderdetails = $this->Orderitemmodel->where('OrderID', $order_id)->findAll();

    //             // Loop through each order item
    //             foreach ($orderdetails as $single_order_details) {
    //                 $product_id = $single_order_details['ProductID'];
    //                 $product_data = $this->Productmodel->where('ProductID', $product_id)->first();
    //                 $product_name = $product_data ? $product_data['ProductName'] : 'Unknown Product';

    //                 // Reset product-specific details for each item
    //                 $all_order['orderid'] = $single_order_details['OrderID'];
    //                 $all_order['orderitemid'] = $single_order_details['OrderItemID'];
    //                 $all_order['productid'] = $single_order_details['ProductID'];
    //                 $all_order['single_product_price'] = $single_order_details['Price'];
    //                 $all_order['product_name'] = $product_name;
    //                 $all_order['product_color_id'] = $single_order_details['product_color'];
    //                 $all_order['product_size_id'] = $single_order_details['product_size'];
    //                 $all_order['product_variation_tabl_id'] = $single_order_details['variation_table_id'];
    //                 $all_order['img_data'] = '';

    //                 // Fetch product image
    //                 if ($single_order_details['variation_table_id'] != 0 && !empty($single_order_details['variation_table_id'])) {
    //                     $variation_img = $this->Variationmodel->where('VariationID', $single_order_details['variation_table_id'])->first();
    //                     $all_img = $variation_img ? json_decode($variation_img['product_variation_image']) : [];
    //                 } else {
    //                     $product_tbl_img = $this->Productmodel->where('ProductID', $product_id)->first();
    //                     $all_img = $product_tbl_img ? json_decode($product_tbl_img['ProductImage']) : [];
    //                 }

    //                 // Assign the first image if available
    //                 if (!empty($all_img) && is_array($all_img)) {
    //                     $first_img = $all_img[0];
    //                     $all_order['img_data'] = $this->productImagePath . $first_img;
    //                 }

    //                 // Append this order item to the order details array
    //                 $order_details[] = $all_order;
    //             }
    //         }

    //         // Return success response with order details
    //         echo json_encode(array('message' => 'Successfully', 'status' => 'success', 'cart_details' => $order_details));
    //     } else {
    //         // Return response if no orders found
    //         echo json_encode(array('message' => 'Order empty', 'status' => 'false'));
    //     }
    // }
    
    // perfect for all orders ------------
//     public function my_orders()
//     {
//     $userID = $this->request->getPost('userId');
//     $OrderStatus = $this->request->getPost('OrderStatus');
//     if (!$userID) {
//         return json_encode(array("status" => "fail", "message" => "userId is required."));
//     }

//     // Fetch all orders for the user
//     $order_data = $this->Ordermodel->where('UserID', $userID)->findAll();
//     $order_details = [];

//     if ($order_data) {
//         foreach ($order_data as $single_order_data) {
//             $order_id = $single_order_data['OrderID'];

//             // Count unread chats for the given OrderID and receiver_id
//             $unreadCount = $this->ChatModel->where('order_id', $order_id)
//                 ->where('receiver_id', $userID)
//                 ->where('read_status', 0)
//                 ->countAllResults();

//             // Initialize order summary using TotalAmount from the database
//             $order_summary = [
//                 'orderid' => $single_order_data['OrderID'],
//                 'fname' => $single_order_data['fname'],
//                 'lname' => $single_order_data['lname'],
//                 'email' => $single_order_data['email'],
//                 'address1' => $single_order_data['address1'],
//                 'address2' => $single_order_data['address2'],
//                 'OrderNumber' => $single_order_data['OrderNumber'],
//                 'payment' => $single_order_data['payment'],
//                 'TotalAmount' => $single_order_data['TotalAmount'], // Use TotalAmount from the database
//                 'OrderStatus' => $single_order_data['OrderStatus'],
//                 'unread_chat_count' => $unreadCount,
//                 'totalShippingCost' => $single_order_data['totalShipingCost'],
//                 'totalTax' => $single_order_data['totalTax'],
//                 'totalDiscount' => $single_order_data['totalDiscount'],
//                 'products' => []
//             ];

//             // Fetch order items
//             $orderitems = $this->Orderitemmodel->where('OrderID', $order_id)->findAll();

//             if ($orderitems) {
//                 foreach ($orderitems as $orderitem) {
//                     $product_id = $orderitem['ProductID'];
//                     $product_data = $this->Productmodel->where('ProductID', $product_id)->first();
//                     $product_name = $product_data ? $product_data['ProductName'] : 'Unknown Product';

//                     // Fetch product image
//                     $img_data = '';
//                     if ($orderitem['variation_table_id'] != 0 && !empty($orderitem['variation_table_id'])) {
//                         $variation_img = $this->Variationmodel->where('VariationID', $orderitem['variation_table_id'])->first();
//                         $all_img = $variation_img ? json_decode($variation_img['product_variation_image']) : [];
//                     } else {
//                         $product_tbl_img = $this->Productmodel->where('ProductID', $product_id)->first();
//                         $all_img = $product_tbl_img ? json_decode($product_tbl_img['ProductImage']) : [];
//                     }

//                     if (!empty($all_img) && is_array($all_img)) {
//                         $img_data = $this->productImagePath . $all_img[0];
//                     }

//                     // Add product details
//                     $order_summary['products'][] = [
//                         'productid' => $orderitem['ProductID'],
//                         'orderitemid' => $orderitem['OrderItemID'],
//                         'product_name' => $product_name,
//                         'single_product_price' => $orderitem['Price'],
//                         'product_color_id' => $orderitem['product_color'],
//                         'product_size_id' => $orderitem['product_size'],
//                         'product_variation_tabl_id' => $orderitem['variation_table_id'],
//                         'img_data' => $img_data
//                     ];
//                 }
//             }

//             // Add the summarized order to the final result
//             $order_details[] = $order_summary;
//         }

//         // Return success response with order details
//         echo json_encode(array('message' => 'Successfully', 'status' => 'success', 'order_details' => $order_details));
//     } else {
//         // Return response if no orders found
//         echo json_encode(array('message' => 'Order empty', 'status' => 'false'));
//     }
// }
// =========================================

public function my_orders()
{
    $userID = $this->request->getPost('userId');
    $OrderStatus = $this->request->getPost('OrderStatus');
    
    if (!$userID) {
        return json_encode(array("status" => "fail", "message" => "userId is required."));
    }

    // Initialize the query
    $this->Ordermodel->where('UserID', $userID);
    
    // If OrderStatus is provided, add it to the query
    if (!empty($OrderStatus)) {
        $this->Ordermodel->where('OrderStatus', $OrderStatus);
    }

    // Fetch the orders
    $order_data = $this->Ordermodel->findAll();
    $order_details = [];

    if ($order_data) {
        foreach ($order_data as $single_order_data) {
            $order_id = $single_order_data['OrderID'];

            // Count unread chats for the given OrderID and receiver_id
            $unreadCount = $this->ChatModel->where('order_id', $order_id)
                ->where('receiver_id', $userID)
                ->where('read_status', 0)
                ->countAllResults();

            // Initialize order summary using TotalAmount from the database
            $order_summary = [
                'orderid' => $single_order_data['OrderID'],
                'fname' => $single_order_data['fname'],
                'lname' => $single_order_data['lname'],
                'email' => $single_order_data['email'],
                'address1' => $single_order_data['address1'],
                'address2' => $single_order_data['address2'],
                'OrderNumber' => $single_order_data['OrderNumber'],
                'payment' => $single_order_data['payment'],
                'TotalAmount' => $single_order_data['TotalAmount'], // Use TotalAmount from the database
                'OrderStatus' => $single_order_data['OrderStatus'],
                'unread_chat_count' => $unreadCount,
                'totalShippingCost' => $single_order_data['totalShipingCost'],
                'totalTax' => $single_order_data['totalTax'],
                'totalDiscount' => $single_order_data['totalDiscount'],
                'products' => []
            ];

            // Fetch order items
            $orderitems = $this->Orderitemmodel->where('OrderID', $order_id)->findAll();

            if ($orderitems) {
                foreach ($orderitems as $orderitem) {
                    $product_id = $orderitem['ProductID'];
                    $product_data = $this->Productmodel->where('ProductID', $product_id)->first();
                    $product_name = $product_data ? $product_data['ProductName'] : 'Unknown Product';

                    // Fetch product image
                    $img_data = '';
                    if ($orderitem['variation_table_id'] != 0 && !empty($orderitem['variation_table_id'])) {
                        $variation_img = $this->Variationmodel->where('VariationID', $orderitem['variation_table_id'])->first();
                        $all_img = $variation_img ? json_decode($variation_img['product_variation_image']) : [];
                    } else {
                        $product_tbl_img = $this->Productmodel->where('ProductID', $product_id)->first();
                        $all_img = $product_tbl_img ? json_decode($product_tbl_img['ProductImage']) : [];
                    }

                    if (!empty($all_img) && is_array($all_img)) {
                        $img_data = $this->productImagePath . $all_img[0];
                    }

                    // Add product details
                    $order_summary['products'][] = [
                        'productid' => $orderitem['ProductID'],
                        'orderitemid' => $orderitem['OrderItemID'],
                        'product_name' => $product_name,
                        'single_product_price' => $orderitem['Price'],
                        'product_color_id' => $orderitem['product_color'],
                        'product_size_id' => $orderitem['product_size'],
                        'product_variation_tabl_id' => $orderitem['variation_table_id'],
                        'img_data' => $img_data
                    ];
                }
            }

            // Add the summarized order to the final result
            $order_details[] = $order_summary;
        }

        // Return success response with order details
        echo json_encode(array('message' => 'Successfully', 'status' => 'success', 'order_details' => $order_details));
    } else {
        // Return response if no orders found
        echo json_encode(array('message' => 'Order empty', 'status' => 'false'));
    }
}


    public function complete_myorders()
    {
        $userID = $this->request->getPost('userId');
        if (!$userID) {
            return json_encode(array("status" => "fail", "message" => "userId is required."));
        }

        $order_data = $this->Ordermodel->where('UserID', $userID)->where('OrderStatus', 'Completed')->findAll();
        // print_r($order_data);die;
        $order_details = [];
   
        if ($order_data) {
            foreach ($order_data as $key => $single_order_data) {
                $order_id = $single_order_data['OrderID'];

                $orderdetails = $this->Orderitemmodel->where('OrderID', $order_id)
                ->findAll();

                // $order_id = $single_order_data['OrderID'];
                $all_order['fname'] = $single_order_data['fname'];
                $all_order['lname'] = $single_order_data['lname'];
                $all_order['email'] = $single_order_data['email'];
                $all_order['address1'] = $single_order_data['address1'];
                $all_order['address2'] = $single_order_data['address2'];
                $all_order['OrderNumber'] = $single_order_data['OrderNumber'];
                $all_order['payment'] = $single_order_data['payment'];
                $all_order['TotalAmount'] = $single_order_data['TotalAmount'];
                $orderdetails = $this->Orderitemmodel->where('OrderID', $order_id)->findAll();
                // print_r($orderdetails); 

                foreach ($orderdetails as $key1 => $single_order_details) {
                    // $temp['second']=$single_order_details;
                    // print_r($single_order_details);
                    $product_id = $single_order_details['ProductID'];
                    $product_data = $this->Productmodel->where('ProductID', $product_id)->first();
                    $product_name = $product_data['ProductName'];
                    $all_order['orderid'] = $single_order_details['OrderID'];
                    $all_order['orderitemid'] = $single_order_details['OrderItemID'];
                    $all_order['productid'] = $single_order_details['ProductID'];
                    $all_order['single_product_price'] = $single_order_details['Price'];
                    $all_order['product_name'] = $product_name;
                    $all_order['product_color_id'] = $single_order_details['product_color'];
                    $all_order['product_size_id'] = $single_order_details['product_size'];
                    $all_order['product_variation_tabl_id'] = $single_order_details['variation_table_id'];
                    $all_order['img_data'] = '';
                    
                    if ($single_order_details['variation_table_id'] != 0) {
                        $variation_img = $this->Variationmodel->where('VariationID', $single_order_details['variation_table_id'])->first();
                        if ($variation_img && isset($variation_img['product_variation_image'])) {
                            $all_img = json_decode($variation_img['product_variation_image']);
                            if (!empty($all_img)) {
                                $first_img = $all_img[0];
                                $all_order['img_data'] = $this->productImagePath . $first_img;
                            } else {
                                $all_order['img_data'] = ''; 
                            }
                        } else {
                            $all_order['img_data'] = ''; 
                        }
                    } else {
                        $product_tbl_img = $this->Productmodel->where('ProductID', $product_id)->first();
                        if ($product_tbl_img && isset($product_tbl_img['ProductImage'])) {
                            $all_img = json_decode($product_tbl_img['ProductImage']);
                            if (!empty($all_img)) {
                                $first_img = $all_img[0];
                                $all_order['img_data'] = $this->productImagePath . $first_img;
                            } else {
                                $all_order['img_data'] = ''; 
                            }
                        } else {
                            $all_order['img_data'] = '';
                        }
                    }


                    // print_r($all_order); 
                    array_push($order_details, $all_order);
                }

                //$order_details[] = $temp;

            }
            echo json_encode(array('message' => 'Successfully', 'status' => 'success', 'cart_details' => $order_details));
            //  print_r($order_details); 

        } else {
            echo json_encode(array('message' => 'Order empty', 'status' => 'false'));
        }
    }
    public function pending_myorders()
    {
        $userID = $this->request->getPost('userId');
        if (!$userID) {
            return json_encode(array("status" => "fail", "message" => "userId is required."));
        }

        $order_data = $this->Ordermodel->where('UserID', $userID)->where('OrderStatus', 'Pending')->findAll();
        // print_r($order_data);die;
        $order_details = [];
        if ($order_data) {
            foreach ($order_data as $key => $single_order_data) {
                // print_r($single_order_data['OrderID']);
                // $temp = array();
                //$temp['fisrt']=$single_order_data;
                $order_id = $single_order_data['OrderID'];
                $all_order['fname'] = $single_order_data['fname'];
                $all_order['lname'] = $single_order_data['lname'];
                $all_order['email'] = $single_order_data['email'];
                $all_order['address1'] = $single_order_data['address1'];
                $all_order['address2'] = $single_order_data['address2'];
                $all_order['OrderNumber'] = $single_order_data['OrderNumber'];
                $all_order['payment'] = $single_order_data['payment'];
                $all_order['TotalAmount'] = $single_order_data['TotalAmount'];
                $orderdetails = $this->Orderitemmodel->where('OrderID', $order_id)->findAll();
                // print_r($orderdetails); 

                foreach ($orderdetails as $key1 => $single_order_details) {
                    // $temp['second']=$single_order_details;
                    // print_r($single_order_details);
                    $product_id = $single_order_details['ProductID'];
                    $product_data = $this->Productmodel->where('ProductID', $product_id)->first();
                    $product_name = $product_data['ProductName'];
                    $all_order['orderid'] = $single_order_details['OrderID'];
                    $all_order['orderitemid'] = $single_order_details['OrderItemID'];
                    $all_order['productid'] = $single_order_details['ProductID'];
                    $all_order['single_product_price'] = $single_order_details['Price'];
                    $all_order['product_name'] = $product_name;
                    $all_order['product_color_id'] = $single_order_details['product_color'];
                    $all_order['product_size_id'] = $single_order_details['product_size'];
                    $all_order['product_variation_tabl_id'] = $single_order_details['variation_table_id'];
                    $all_order['img_data'] = '';
                    if ($single_order_details['variation_table_id'] != 0) {
                        $variation_img = $this->Variationmodel->where('VariationID', $single_order_details['variation_table_id'])->first();
                        $all_img = json_decode($variation_img['product_variation_image']);
                        //   print_r($variation_img);
                        $first_img = $all_img[0];
                        $all_order['img_data'] = $this->productImagePath . $first_img;
                        // print_r($variation_img);
                    } else {
                        $product_tbl_img = $this->Productmodel->where('ProductID', $product_id)->first();

                        $all_img = json_decode($product_tbl_img['ProductImage']);
                        $first_img = $all_img[0];
                        $all_order['img_data'] = $this->productImagePath . $first_img;
                    }



                    // print_r($all_order); 
                    array_push($order_details, $all_order);
                }

                //$order_details[] = $temp;

            }
            echo json_encode(array('message' => 'Successfully', 'status' => 'success', 'cart_details' => $order_details));
            //  print_r($order_details); 

        } else {
            echo json_encode(array('message' => 'Order empty', 'status' => 'false'));
        }
    }
    public function cancelled_myorders()
    {
        $userID = $this->request->getPost('userId');
        if (!$userID) {
            return json_encode(array("status" => "fail", "message" => "userId is required."));
        }

        $order_data = $this->Ordermodel->where('UserID', $userID)->where('OrderStatus', 'Order Cancelled')->findAll();
        // print_r($order_data);die;
        $order_details = [];
        if ($order_data) {
            foreach ($order_data as $key => $single_order_data) {
                // print_r($single_order_data['OrderID']);
                // $temp = array();
                //$temp['fisrt']=$single_order_data;
                $order_id = $single_order_data['OrderID'];
                $all_order['fname'] = $single_order_data['fname'];
                $all_order['lname'] = $single_order_data['lname'];
                $all_order['email'] = $single_order_data['email'];
                $all_order['address1'] = $single_order_data['address1'];
                $all_order['address2'] = $single_order_data['address2'];
                $all_order['OrderNumber'] = $single_order_data['OrderNumber'];
                $all_order['payment'] = $single_order_data['payment'];
                $all_order['TotalAmount'] = $single_order_data['TotalAmount'];
                $orderdetails = $this->Orderitemmodel->where('OrderID', $order_id)->findAll();
                // print_r($orderdetails); 

                foreach ($orderdetails as $key1 => $single_order_details) {
                    // $temp['second']=$single_order_details;
                    // print_r($single_order_details);
                    $product_id = $single_order_details['ProductID'];
                    $product_data = $this->Productmodel->where('ProductID', $product_id)->first();
                    $product_name = $product_data['ProductName'];
                    $all_order['orderid'] = $single_order_details['OrderID'];
                    $all_order['orderitemid'] = $single_order_details['OrderItemID'];
                    $all_order['productid'] = $single_order_details['ProductID'];
                    $all_order['single_product_price'] = $single_order_details['Price'];
                    $all_order['product_name'] = $product_name;
                    $all_order['product_color_id'] = $single_order_details['product_color'];
                    $all_order['product_size_id'] = $single_order_details['product_size'];
                    $all_order['product_variation_tabl_id'] = $single_order_details['variation_table_id'];
                    $all_order['img_data'] = '';
                    if ($single_order_details['variation_table_id'] != 0) {
                        $variation_img = $this->Variationmodel->where('VariationID', $single_order_details['variation_table_id'])->first();
                        $all_img = json_decode($variation_img['product_variation_image']);
                        //   print_r($variation_img);
                        $first_img = $all_img[0];
                        $all_order['img_data'] = $this->productImagePath . $first_img;
                        // print_r($variation_img);
                    } else {
                        $product_tbl_img = $this->Productmodel->where('ProductID', $product_id)->first();

                        $all_img = json_decode($product_tbl_img['ProductImage']);
                        $first_img = $all_img[0];
                        $all_order['img_data'] = $this->productImagePath . $first_img;
                    }



                    // print_r($all_order); 
                    array_push($order_details, $all_order);
                }

                //$order_details[] = $temp;

            }
            echo json_encode(array('message' => 'Successfully', 'status' => 'success', 'cart_details' => $order_details));
            //  print_r($order_details); 

        } else {
            echo json_encode(array('message' => 'Order empty', 'status' => 'false'));
        }
    }
    public function shipped_myorders()
    {
        $userID = $this->request->getPost('userId');
        if (!$userID) {
            return json_encode(array("status" => "fail", "message" => "userId is required."));
        }

        $order_data = $this->Ordermodel->where('UserID', $userID)->where('OrderStatus', 'Shipped')->findAll();
        // print_r($order_data);die;
        $order_details = [];
        if ($order_data) {
            foreach ($order_data as $key => $single_order_data) {
                // print_r($single_order_data['OrderID']);
                // $temp = array();
                //$temp['fisrt']=$single_order_data;
                $order_id = $single_order_data['OrderID'];
                $all_order['fname'] = $single_order_data['fname'];
                $all_order['lname'] = $single_order_data['lname'];
                $all_order['email'] = $single_order_data['email'];
                $all_order['address1'] = $single_order_data['address1'];
                $all_order['address2'] = $single_order_data['address2'];
                $all_order['OrderNumber'] = $single_order_data['OrderNumber'];
                $all_order['payment'] = $single_order_data['payment'];
                $all_order['TotalAmount'] = $single_order_data['TotalAmount'];
                $orderdetails = $this->Orderitemmodel->where('OrderID', $order_id)->findAll();
                // print_r($orderdetails); 

                foreach ($orderdetails as $key1 => $single_order_details) {
                    // $temp['second']=$single_order_details;
                    // print_r($single_order_details);
                    $product_id = $single_order_details['ProductID'];
                    $product_data = $this->Productmodel->where('ProductID', $product_id)->first();
                    $product_name = $product_data['ProductName'];
                    $all_order['orderid'] = $single_order_details['OrderID'];
                    $all_order['orderitemid'] = $single_order_details['OrderItemID'];
                    $all_order['productid'] = $single_order_details['ProductID'];
                    $all_order['single_product_price'] = $single_order_details['Price'];
                    $all_order['product_name'] = $product_name;
                    $all_order['product_color_id'] = $single_order_details['product_color'];
                    $all_order['product_size_id'] = $single_order_details['product_size'];
                    $all_order['product_variation_tabl_id'] = $single_order_details['variation_table_id'];
                    $all_order['img_data'] = '';
                    if ($single_order_details['variation_table_id'] != 0) {
                        $variation_img = $this->Variationmodel->where('VariationID', $single_order_details['variation_table_id'])->first();
                        $all_img = json_decode($variation_img['product_variation_image']);
                        //   print_r($variation_img);
                        $first_img = $all_img[0];
                        $all_order['img_data'] = $this->productImagePath . $first_img;
                        // print_r($variation_img);
                    } else {
                        $product_tbl_img = $this->Productmodel->where('ProductID', $product_id)->first();

                        $all_img = json_decode($product_tbl_img['ProductImage']);
                        $first_img = $all_img[0];
                        $all_order['img_data'] = $this->productImagePath . $first_img;
                    }



                    // print_r($all_order); 
                    array_push($order_details, $all_order);
                }

                //$order_details[] = $temp;

            }
            echo json_encode(array('message' => 'Successfully', 'status' => 'success', 'cart_details' => $order_details));
            //  print_r($order_details); 

        } else {
            echo json_encode(array('message' => 'Order empty', 'status' => 'false'));
        }
    }
    public function processing_myorders()
    {
        $userID = $this->request->getPost('userId');
        if (!$userID) {
            return json_encode(array("status" => "fail", "message" => "userId is required."));
        }

        $order_data = $this->Ordermodel->where('UserID', $userID)->where('OrderStatus', 'Order Processing')->findAll();
        // print_r($order_data);die;
        $order_details = [];
        if ($order_data) {
            foreach ($order_data as $key => $single_order_data) {
                // print_r($single_order_data['OrderID']);
                // $temp = array();
                //$temp['fisrt']=$single_order_data;
                $order_id = $single_order_data['OrderID'];
                $all_order['fname'] = $single_order_data['fname'];
                $all_order['lname'] = $single_order_data['lname'];
                $all_order['email'] = $single_order_data['email'];
                $all_order['address1'] = $single_order_data['address1'];
                $all_order['address2'] = $single_order_data['address2'];
                $all_order['OrderNumber'] = $single_order_data['OrderNumber'];
                $all_order['payment'] = $single_order_data['payment'];
                $all_order['TotalAmount'] = $single_order_data['TotalAmount'];
                $orderdetails = $this->Orderitemmodel->where('OrderID', $order_id)->findAll();
                // print_r($orderdetails); 

                foreach ($orderdetails as $key1 => $single_order_details) {
                    // $temp['second']=$single_order_details;
                    // print_r($single_order_details);
                    $product_id = $single_order_details['ProductID'];
                    $product_data = $this->Productmodel->where('ProductID', $product_id)->first();
                    $product_name = $product_data['ProductName'];
                    $all_order['orderid'] = $single_order_details['OrderID'];
                    $all_order['orderitemid'] = $single_order_details['OrderItemID'];
                    $all_order['productid'] = $single_order_details['ProductID'];
                    $all_order['single_product_price'] = $single_order_details['Price'];
                    $all_order['product_name'] = $product_name;
                    $all_order['product_color_id'] = $single_order_details['product_color'];
                    $all_order['product_size_id'] = $single_order_details['product_size'];
                    $all_order['product_variation_tabl_id'] = $single_order_details['variation_table_id'];
                    $all_order['img_data'] = '';
                    if ($single_order_details['variation_table_id'] != 0) {
                        $variation_img = $this->Variationmodel->where('VariationID', $single_order_details['variation_table_id'])->first();
                        $all_img = json_decode($variation_img['product_variation_image']);
                        //   print_r($variation_img);
                        $first_img = $all_img[0];
                        $all_order['img_data'] = $this->productImagePath . $first_img;
                        // print_r($variation_img);
                    } else {
                        $product_tbl_img = $this->Productmodel->where('ProductID', $product_id)->first();

                        $all_img = json_decode($product_tbl_img['ProductImage']);
                        $first_img = $all_img[0];
                        $all_order['img_data'] = $this->productImagePath . $first_img;
                    }



                    // print_r($all_order); 
                    array_push($order_details, $all_order);
                }

                //$order_details[] = $temp;

            }
            echo json_encode(array('message' => 'Successfully', 'status' => 'success', 'cart_details' => $order_details));
            //  print_r($order_details); 

        } else {
            echo json_encode(array('message' => 'Order empty', 'status' => 'false'));
        }
    }
    
    public function order_details()
    {
        $order_item_id = $this->request->getPost('order_item_id');

        if (!$order_item_id) {
            return json_encode(array("status" => "fail", "message" => "order_item_id is required."));
        }

        // Fetch all order items related to the given OrderID
        $order_items_data = $this->Orderitemmodel->where('OrderID', $order_item_id)->findAll();

        if ($order_items_data) {
            $order_items = [];

            // Loop through each order item to gather product and variation details
            foreach ($order_items_data as $single_order_data) {
                $variation_tbl_id = $single_order_data['variation_table_id'];
                $product_id = $single_order_data['ProductID'];

                // Fetch product data
                $product_data = $this->Productmodel->where('ProductID', $product_id)->first();
                if ($product_data) {
                    $single_order_data['product_name'] = $product_data['ProductName'];
                    $single_order_data['img_data'] = '';

                    // Fetch variation image if available, otherwise fetch product image
                    if ($variation_tbl_id != 0 && !empty($variation_tbl_id)) {
                        $variation_img = $this->Variationmodel->where('VariationID', $variation_tbl_id)->first();
                        if ($variation_img) {
                            $all_img = json_decode($variation_img['product_variation_image'], true);
                            $first_img = isset($all_img[0]) ? $all_img[0] : '';
                            $single_order_data['img_data'] = $this->productImagePath . $first_img;
                        }
                    } else {
                        $product_tbl_img = $this->Productmodel->where('ProductID', $product_id)->first();
                        if ($product_tbl_img) {
                            $all_img = json_decode($product_tbl_img['ProductImage'], true);
                            $first_img = isset($all_img[0]) ? $all_img[0] : '';
                            $single_order_data['img_data'] = $this->productImagePath . $first_img;
                        }
                    }

                    $order_id = $single_order_data['OrderID'];
                    $order_data = $this->Ordermodel->where('OrderID', $order_id)->first();

                    if ($order_data) {
                        $single_order_data['order_data'] = $order_data['OrderDate'];
                        $single_order_data['OrderNumber'] = $order_data['OrderNumber'];
                        $single_order_data['payment'] = $order_data['payment'];
                        $single_order_data['OrderStatus'] = $order_data['OrderStatus'];
                        $single_order_data['firstname'] = $order_data['fname'];
                        $single_order_data['lastname'] = $order_data['lname'];
                        $single_order_data['phoneno'] = $order_data['phoneno'];
                        $single_order_data['address1'] = $order_data['address1'];
                        $single_order_data['zipcode'] = $order_data['zipcode'];
                        $single_order_data['referDis'] = $order_data['referDis'] ?? 0;
                        $single_order_data['totalTax'] = $order_data['totalTax'] ?? 0;
                        $single_order_data['totalShipingCost'] = $order_data['totalShipingCost'] ?? 0;
                        $single_order_data['totalDiscount'] = $order_data['totalDiscount'] ?? 0;
                        $single_order_data['TotalAmount'] = $order_data['TotalAmount'];


                        // Calculate subtotal
                        $totalAmount = $order_data['TotalAmount'];
                        // $subtotal = $totalAmount + ($single_order_data['totalDiscount'] + $single_order_data['totalShipingCost'] + $single_order_data['totalTax']  + $single_order_data['referDis']);
                        $subtotal = ($totalAmount + $single_order_data['totalDiscount'] + $single_order_data['referDis']) - $single_order_data['totalShipingCost'] - $single_order_data['totalTax'];
                        // (total amout + discount + referdis) -tax - shippingcost


                        $single_order_data['subtotal'] = $subtotal < 0 ? 0 : $subtotal;


                        $city_data = $this->CityModel->where('CityID', $order_data['city'])->first();
                        $single_order_data['city_name'] = $city_data ? $city_data['CityName'] : '';

                        $state_data = $this->StateModel->where('StateID', $order_data['state'])->first();
                        $single_order_data['state_name'] = $state_data ? $state_data['StateName'] : '';

                        $country_data = $this->CountryModel->where('CountryID', $order_data['country'])->first();
                        $single_order_data['country_name'] = $country_data ? $country_data['CountryName'] : '';

                        if ($variation_tbl_id != 0 && !empty($variation_tbl_id)) {
                            $variation_n_data = $this->VariationsDetails
                                ->select('VariationsDetails.*, variation_value.VariationName, variation_type.VariationTypeName, variation_type.VariationTypeID')
                                ->join('variation_value', 'variation_value.VariationID = VariationsDetails.VariationVlueID')
                                ->join('variation_type', 'variation_type.VariationTypeID = variation_value.VariationTypeID')
                                ->where('VariationsDetails.VariationID', $variation_tbl_id)
                                ->findAll();
                            $single_order_data['variation_details'] = $variation_n_data;
                        } else {
                            $single_order_data['variation_details'] = null;
                        }

                        $order_items[] = $single_order_data;
                    }
                }
            }
            // ==============================
             if ($order_data) {
            $user_subtotal = ($order_data['TotalAmount'] + $order_data['totalDiscount'] + $order_data['referDis']) - $order_data['totalShipingCost'] - $order_data['totalTax'];
            $order_data['subtotal'] = $user_subtotal < 0 ? 0 : $user_subtotal;
        }
        // ====================

            return json_encode(array('message' => 'Successfully retrieved order details', 'status' => 'success', 'order_details' => $order_items, 'user_detail' => $order_data));
        } else {
            return json_encode(array('message' => 'Order not found', 'status' => 'fail'));
        }
    }
    
    public function cancel_order()
    {
        $userID = $this->request->getPost('userId');
        $OrderID = $this->request->getPost('OrderID');

        if (!$userID) {
            return json_encode(['status' => 'fail', 'message' => 'userId is required.']);
        }

        if (!$OrderID) {
            return json_encode(['status' => 'fail', 'message' => 'OrderID is required.']);
        }

        // Fetch user data from User_shipping_addressmodel
        $usersData = $this->User_shipping_addressmodel->where('user_id', $userID)->first();
        $admin = $this->Allsettingsmodel->first();
        $adminemail = $admin['Email'];

        // If no shipping data, get data from UserModel
        if (empty($usersData) || empty($usersData['email'])) {
            $usersData = $this->UserModel->where('UserID', $userID)->first();

            if (empty($usersData) || empty($usersData['UserEmail'])) {
                return json_encode(['status' => 'fail', 'message' => 'User data not found.']);
            }
        }

        // Fetch the order details
        $order = $this->Ordermodel->where('UserID', $userID)
            ->where('OrderID', $OrderID)
            ->where('OrderStatus', 'pending')
            ->first();

        if (empty($order)) {
            return json_encode(['status' => 'fail', 'message' => 'Order not found or not pending.']);
        }

        // Update the order status to 'Cancelled'
        $updated = $this->Ordermodel->where('OrderID', $OrderID)->set('OrderStatus', 'Order Cancelled')->update();

        if ($updated) {
            // Respond with success message
            echo json_encode(['status' => 'success', 'message' => 'Order canceled successfully.']);
            flush();  // Ensure the response is sent immediately

            // Use fastcgi_finish_request() to send the response and continue email sending in the background
            if (function_exists('fastcgi_finish_request')) {
                fastcgi_finish_request();
            }

            // Prepare the email
            $logo = "https://ecomweb.fableadtechnolabs.com/admin/public/upload_images/1728803054_e8778ea13ec894e43181.png";
            $subject = 'Order Cancelled By Customer';
            $message = "<html><body>";
            $message .= "<!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Order Cancellation Confirmation</title>
            </head>
            <body>
                <div style='font-family: Arial, sans-serif; max-width: 600px; margin: auto; background-color: white; padding: 20px; border: solid 1px gainsboro; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);'>
                    <div style='text-align: center; margin-bottom: 20px;'>
                    <img src='" . $logo . "' alt='Logo'>
                        <h2 style='color: #333;'>Order Cancellation Confirmation</h2>
                    </div>
                    
                    <section class='order-cancellation'>
                        <div style='margin-bottom: 20px;'>
                            <h3 style='color: #333;text-align: center;'>Order Details</h3>
                            <table style='width: 100%; border-collapse: collapse; margin-left: 136px;'>
                                <tr>
                                    <th style='text-align: left; padding-right: 10px;'><strong>Order Number:</strong></th>
                                    <td style='padding: 8px;'>" . ($order['OrderNumber'] ?? "N/A") . "</td>
                                </tr>
                                <tr>
                                    <th style='text-align: left; padding-right: 10px;'><strong>User Name:</strong></th>
                                    <td style='padding: 8px;'>" .
                (($usersData['first_name'] ?? $usersData['UserFirstName']) . " " .
                    ($usersData['last_name'] ?? $usersData['UserLastName'])) . "</td>
                                </tr>
                                <tr>
                                    <th style='text-align: left; padding-right: 10px;'><strong>User Email:</strong></th>
                                    <td style='padding: 8px;'>" . ($usersData['email'] ?? $usersData['UserEmail']) . "</td>
                                </tr>
                                <tr>
                                    <th style='text-align: left; padding-right: 10px;'><strong>Order Status:</strong></th>
                                    <td style='padding: 8px; color: red;'>Cancelled</td>
                                </tr>
                            </table>
                        </div>
                        <div style='text-align: center;'>
                            <p style='color: red; font-size: 18px;'> " .
                (($usersData['first_name'] ?? $usersData['UserFirstName']) . " " .
                    ($usersData['last_name'] ?? $usersData['UserLastName'])) . " order has been cancelled.</p>
                        </div>
                    </section>
                    <div style='text-align: center; margin-top: 20px;'>
                        <p style='color: #888;'>Copyright © 2024 Your Company - All Rights Reserved.</p>
                    </div>
                </div>
            </body>
            </html>";
            $message .= "</body></html>";

            // Send the email
            $userEmail = $usersData['email'] ?? $usersData['UserEmail']; // Use the proper email field
            $emailSender = new \App\Libraries\EmailSender();
            $isMailSent = $emailSender->sendEmail($adminemail, $subject, $message);

            if (!$isMailSent) {
                log_message('error', 'Failed to send refill alert email.');
            }

        } else {
            return json_encode(['status' => 'fail', 'message' => 'Failed to update the order status.']);
        }
    }

    public function change_shipping_address()
    {
        $userID = $this->request->getPost('userId');
        $fname = $this->request->getPost('first_name');
        $lname = $this->request->getPost('last_name');
        $address = $this->request->getPost('address');
        $city = $this->request->getPost('city');
        $state = $this->request->getPost('state');
        $country = $this->request->getPost('country');
        $zipcode = $this->request->getPost('zipcode');
        $phone = $this->request->getPost('phone');
        if (!$userID) {
            return json_encode(array("status" => "fail", "message" => "userId is required."));
        }
        if (!$fname) {
            return json_encode(array("status" => "fail", "message" => "fname is required."));
        }
        if (!$lname) {
            return json_encode(array("status" => "fail", "message" => "lname is required."));
        }
        if (!$address) {
            return json_encode(array("status" => "fail", "message" => "address is required."));
        }
        if (!$city) {
            return json_encode(array("status" => "fail", "message" => "city is required."));
        }
        if (!$state) {
            return json_encode(array("status" => "fail", "message" => "state is required."));
        }
        if (!$country) {
            return json_encode(array("status" => "fail", "message" => "country is required."));
        }
        if (!$zipcode) {
            return json_encode(array("status" => "fail", "message" => "zipcode is required."));
        }
        if (!$phone) {
            return json_encode(array("status" => "fail", "message" => "phone is required."));
        }

        // $all_data=[
        //     'UserFirstName'=> $fname,
        //     'UserLastName'=> $lname,
        //     'UserCity'=> $city,
        //     'UserState'=> $state,
        //     'UserCountry'=> $country,
        //     'UserAddress'=> $address,
        //     'UserZip'=> $zipcode
        //     ];

        $all_data = [
            'user_id' => $userID,
            'first_name' => $fname,
            'last_name' => $lname,
            'city' => $city,
            'state' => $state,
            'country' => $country,
            'zipcode' => $zipcode,
            'address' => $address,
            'number' => $phone,
        ];

        // print_r($all_data); die;
        // $address_data=$this->UserModel->update($userID,$all_data);
        $address_data = $this->User_shipping_addressmodel->insert($all_data);
        if ($address_data) {
            echo json_encode(array('message' => 'Address update Successfully', 'status' => 'success'));
        } else {
            echo json_encode(array('message' => 'Address update Error', 'status' => 'false'));
        }

    }
    public function user_all_shipping_address()
    {
        $userID = $this->request->getPost('userId');
        if (!$userID) {
            return json_encode(array("status" => "fail", "message" => "userId is required."));
        }
        $user_address_data = $this->User_shipping_addressmodel->where('user_id', $userID)->findAll();
        if ($user_address_data) {
            echo json_encode(array('message' => 'all_shipping_address', 'status' => 'success', 'all_shipping_address' => $user_address_data));
        } else {
            echo json_encode(array('message' => 'Data not Found', 'status' => 'false'));
        }

    }
    public function user_select_shipping_address()
    {
        $shipiing_address_id = $this->request->getPost('shipping_address_id');
        if (!$shipiing_address_id) {
            return json_encode(array("status" => "fail", "message" => "shipiing_address_id is required."));
        }

        $address_data = $this->User_shipping_addressmodel->where('id', $shipiing_address_id)->first();
        if ($address_data) {
            echo json_encode(array('message' => 'selectaddress', 'status' => 'success', 'select_shipping_address' => $address_data));
        } else {
            echo json_encode(array('message' => 'Data not Found', 'status' => 'false'));
        }
    }
    public function edit_shipping_address()
    {
        $shipiing_address_id = $this->request->getPost('shipping_address_id');

        $fname = $this->request->getPost('first_name');
        $lname = $this->request->getPost('last_name');
        $address = $this->request->getPost('address');
        $city = $this->request->getPost('city');
        $state = $this->request->getPost('state');
        $country = $this->request->getPost('country');
        $zipcode = $this->request->getPost('zipcode');
        $phone = $this->request->getPost('phone');

        if (!$shipiing_address_id) {
            return json_encode(array("status" => "fail", "message" => "shipiing_address_id is required."));
        }
        if (!$fname) {
            return json_encode(array("status" => "fail", "message" => "fname is required."));
        }
        if (!$lname) {
            return json_encode(array("status" => "fail", "message" => "lname is required."));
        }
        if (!$address) {
            return json_encode(array("status" => "fail", "message" => "address is required."));
        }
        if (!$city) {
            return json_encode(array("status" => "fail", "message" => "city is required."));
        }
        if (!$state) {
            return json_encode(array("status" => "fail", "message" => "state is required."));
        }
        if (!$country) {
            return json_encode(array("status" => "fail", "message" => "country is required."));
        }
        if (!$zipcode) {
            return json_encode(array("status" => "fail", "message" => "zipcode is required."));
        }
        if (!$phone) {
            return json_encode(array("status" => "fail", "message" => "phone is required."));
        }

        $all_data = [
            'first_name' => $fname,
            'last_name' => $lname,
            'city' => $city,
            'state' => $state,
            'country' => $country,
            'zipcode' => $zipcode,
            'address' => $address,
            'number' => $phone,
        ];

        $edit_data = $this->User_shipping_addressmodel->update($shipiing_address_id, $all_data);
        if ($edit_data) {
            echo json_encode(array('message' => 'sucessfully update address', 'status' => 'success'));
        } else {
            echo json_encode(array('message' => 'update error', 'status' => 'false'));
        }

    }
    public function delete_shipping_address()
    {
        $shipiing_address_id = $this->request->getPost('shipping_address_id');
        if (!$shipiing_address_id) {
            return json_encode(array("status" => "fail", "message" => "shipiing_address_id is required."));
        }
        $delete_data = $this->User_shipping_addressmodel->delete($shipiing_address_id);
        if ($delete_data) {
            echo json_encode(array('message' => 'Delete address Sucessfully ', 'status' => 'success'));
        } else {
            echo json_encode(array('message' => 'Delete address error', 'status' => 'false'));
        }
    }
    public function sales_price_product()
    {
        $product_data = $this->Productmodel->where('ProductLive', 1)->findAll();
        // print_r($product_data);  
        $product_data_array1 = [];
        foreach ($product_data as $key => $single_product) {
            // print($single_product['ProductType']);
            if ($single_product['ProductType'] == 1) {
                $regular_price = $single_product['ProductPrice'];
                $sale_price = $single_product['Sale_ProductPrice'];
                $discount = $regular_price - $sale_price;
                $product_data_array2['discount'] = $discount;
                $product_data_array2['ProductID'] = $single_product['ProductID'];
                $product_data_array2['ProductType'] = $single_product['ProductType'];
                if (!empty($single_product['ProductImage'])) {
                    $all_img = json_decode($single_product['ProductImage']);
                    $first_img = $all_img[0];
                    $product_data_array2['img_data'] = $this->productImagePath . $first_img;
                } else {
                    $product_data_array2['img_data'] = "";
                }


                array_push($product_data_array1, $product_data_array2);
            }
            if ($single_product['ProductType'] == 2) {
                $p_id = $single_product['ProductID'];
                $product_data_array2['ProductID'] = $p_id;
                $product_data_array2['ProductType'] = $single_product['ProductType'];

                $variation_data = $this->Variationmodel->where('ProductID', $p_id)->findAll();
                foreach ($variation_data as $key1 => $single_variation) {
                    $variation_regular_price = $single_variation['VariationPrice'];
                    $variation_sale_price = $single_variation['Sale_VariationPrice'];
                    $vari_discount = $variation_regular_price - $variation_sale_price;
                    $product_data_array2['discount'] = $vari_discount;
                    if (!empty($single_variation['product_variation_image'])) {
                        $all_img = json_decode($single_variation['product_variation_image']);
                        $first_img = $all_img[0];
                        $product_data_array2['img_data'] = $this->productImagePath . $first_img;

                    } else {
                        $product_data_array2['img_data'] = "";
                    }
                    array_push($product_data_array1, $product_data_array2);
                }


            }
        }
        $dis_array = array_column($product_data_array1, 'discount');
        array_multisort($dis_array, SORT_DESC, $product_data_array1);
        $firstTenData = array_slice($product_data_array1, 0, 10);
        // print_r($firstTenData); 
        echo json_encode(array('message' => 'Successfully', 'status' => 'success', 'product_data' => $firstTenData));

    }
    // public function all_sales_list_product(){
    //     $user_id=$this->request->getPost('user_id');
    //       $product_data=$this->Productmodel->where('ProductLive', 1)->findAll();
    //     // print_r($product_data); die; 
    //     $product_data_array1=[];
    //     foreach($product_data as $key=>$single_product){
    //         // print($single_product['ProductType']);
    //     if($single_product['ProductType']==1){

    //         $regular_price=$single_product['ProductPrice'];
    //         $sale_price=$single_product['Sale_ProductPrice'];
    //         $discount=$regular_price-$sale_price;
    //         $product_data_array2['discount']=$discount;
    //         $product_data_array2['ProductID']=$single_product['ProductID'];
    //         $product_data_array2['ProductName']=$single_product['ProductName'];
    //         $product_data_array2['ProductShortDesc']=$single_product['ProductShortDesc'];
    //         $product_data_array2['regular_price']=$regular_price;
    //         $product_data_array2['sale_price']=$sale_price;
    //         $product_data_array2['variation_id']="";

    //                         $all_img=json_decode($single_product['ProductImage']);
    //                         $first_img=$all_img[0];
    //                         $product_data_array2['img_data']= $this->productImagePath .$first_img;

    //         $wishlish_data=$this->Wishlistmodel->where('ProductID',$single_product['ProductID'])->where('UserID',$user_id)->first();
    //             if($wishlish_data){
    //                 $product_data_array2['wishlist']= 1;
    //             }else{
    //                 $product_data_array2['wishlist']= 0;
    //             }
    //         // print_r($product_data_array2);

    //         array_push($product_data_array1,$product_data_array2);
    //     }
    //     if($single_product['ProductType']==2){

    //         $p_id=$single_product['ProductID'];
    //         $product_data_array2['ProductID']=$p_id;
    //         $product_data_array2['ProductName']=$single_product['ProductName'];
    //         $product_data_array2['ProductShortDesc']=$single_product['ProductShortDesc'];

    //         $variation_data=$this->Variationmodel->where('ProductID',$p_id)->findAll();
    //         foreach($variation_data as $key1=>$single_variation){
    //             $variation_regular_price=$single_variation['VariationPrice'];
    //             $variation_sale_price=$single_variation['Sale_VariationPrice'];
    //             $vari_discount=$variation_regular_price-$variation_sale_price;
    //             $product_data_array2['discount']=$vari_discount;
    //             $product_data_array2['regular_price']=$variation_regular_price;
    //             $product_data_array2['sale_price']=$variation_sale_price;
    //             $product_data_array2['variation_id']=$single_variation['VariationID'];


    //                         $all_img=json_decode($single_variation['product_variation_image']);
    //                         $first_img=$all_img[0];
    //                         $product_data_array2['img_data']= $this->productImagePath .$first_img;

    //             $wishlish_data=$this->Wishlistmodel->where('ProductID',$single_product['ProductID'])->where('UserID',$user_id)->first();
    //             if($wishlish_data){
    //                 $product_data_array2['wishlist']= 1;
    //             }else{
    //                 $product_data_array2['wishlist']= 0;
    //             }            
    //                         // print_r($product_data_array2);
    //                         array_push($product_data_array1,$product_data_array2);
    //         }


    //     }
    //     }
    //     // print_r($product_data_array1); die;
    //     $dis_array=array_column($product_data_array1, 'discount');
    //     // print_r($dis_array); die;
    //     array_multisort($dis_array, SORT_DESC, $product_data_array1);

    //     // print_r($product_data_array1); 
    //     echo json_encode(array('message' => 'Successfully', 'status' => 'success','product_data'=>$product_data_array1));
    // }
    public function all_sales_list_product()
    {
        $user_id = $this->request->getPost('user_id');
        $product_data = $this->Productmodel->where('ProductLive', 1)->findAll();
        // print_r($product_data); die; 
        $product_data_array1 = [];
        foreach ($product_data as $key => $single_product) {
            // print($single_product['ProductType']);
            // if($single_product['ProductType']==1){

            $regular_price = $single_product['ProductPrice'];
            $sale_price = $single_product['Sale_ProductPrice'];
            $discount = $regular_price - $sale_price;
            $product_data_array2['discount'] = $discount;
            $product_data_array2['ProductID'] = $single_product['ProductID'];
            $product_data_array2['ProductName'] = $single_product['ProductName'];
            $product_data_array2['ProductShortDesc'] = $single_product['ProductShortDesc'];
            $product_data_array2['regular_price'] = $regular_price;
            $product_data_array2['sale_price'] = $sale_price;
            $product_data_array2['variation_id'] = "";
            $product_data_array2['ProductType'] = $single_product['ProductType'];

            $all_img = json_decode($single_product['ProductImage']);
            $first_img = $all_img[0];
            $product_data_array2['img_data'] = $this->productImagePath . $first_img;

            $wishlish_data = $this->Wishlistmodel->where('ProductID', $single_product['ProductID'])->where('UserID', $user_id)->first();
            if ($wishlish_data) {
                $product_data_array2['wishlist'] = 1;
            } else {
                $product_data_array2['wishlist'] = 0;
            }
            // print_r($product_data_array2);

            array_push($product_data_array1, $product_data_array2);
            // }

        }
        // print_r($product_data_array1); die;
        $dis_array = array_column($product_data_array1, 'discount');
        // print_r($dis_array); die;
        array_multisort($dis_array, SORT_DESC, $product_data_array1);

        // print_r($product_data_array1); 
        echo json_encode(array('message' => 'Successfully', 'status' => 'success', 'product_data' => $product_data_array1));
    }
    // public function search_all_sales_list_product(){
    //     $user_id=$this->request->getPost('user_id');
    //     $searchedText = $this->request->getPost("searchText");
    //     $product_data= $this->Productmodel->like("ProductName", $searchedText)->orLike("ProductShortDesc", $searchedText)->where("ProductLive", 1)->findAll();

    //      $product_data_array1=[];
    //     foreach($product_data as $key=>$single_product){
    //         // print($single_product['ProductType']);
    //     if($single_product['ProductType']==1){

    //         $regular_price=$single_product['ProductPrice'];
    //         $sale_price=$single_product['Sale_ProductPrice'];
    //         $discount=$regular_price-$sale_price;
    //         $product_data_array2['discount']=$discount;
    //         $product_data_array2['ProductID']=$single_product['ProductID'];
    //         $product_data_array2['ProductName']=$single_product['ProductName'];
    //         $product_data_array2['ProductShortDesc']=$single_product['ProductShortDesc'];
    //         $product_data_array2['regular_price']=$regular_price;
    //         $product_data_array2['sale_price']=$sale_price;
    //         $product_data_array2['variation_id']="";

    //                         $all_img=json_decode($single_product['ProductImage']);
    //                         $first_img=$all_img[0];
    //                         $product_data_array2['img_data']= $this->productImagePath .$first_img;

    //         $wishlish_data=$this->Wishlistmodel->where('ProductID',$single_product['ProductID'])->where('UserID',$user_id)->first();
    //             if($wishlish_data){
    //                 $product_data_array2['wishlist']= 1;
    //             }else{
    //                 $product_data_array2['wishlist']= 0;
    //             }
    //         // print_r($product_data_array2);

    //         array_push($product_data_array1,$product_data_array2);
    //     }
    //     if($single_product['ProductType']==2){

    //         $p_id=$single_product['ProductID'];
    //         $product_data_array2['ProductID']=$p_id;
    //         $product_data_array2['ProductName']=$single_product['ProductName'];
    //         $product_data_array2['ProductShortDesc']=$single_product['ProductShortDesc'];

    //         $variation_data=$this->Variationmodel->where('ProductID',$p_id)->findAll();
    //         foreach($variation_data as $key1=>$single_variation){
    //             $variation_regular_price=$single_variation['VariationPrice'];
    //             $variation_sale_price=$single_variation['Sale_VariationPrice'];
    //             $vari_discount=$variation_regular_price-$variation_sale_price;
    //             $product_data_array2['discount']=$vari_discount;
    //             $product_data_array2['regular_price']=$variation_regular_price;
    //             $product_data_array2['sale_price']=$variation_sale_price;
    //             $product_data_array2['variation_id']=$single_variation['VariationID'];


    //                         $all_img=json_decode($single_variation['product_variation_image']);
    //                         $first_img=$all_img[0];
    //                         $product_data_array2['img_data']= $this->productImagePath .$first_img;

    //             $wishlish_data=$this->Wishlistmodel->where('ProductID',$single_product['ProductID'])->where('UserID',$user_id)->first();
    //             if($wishlish_data){
    //                 $product_data_array2['wishlist']= 1;
    //             }else{
    //                 $product_data_array2['wishlist']= 0;
    //             }            
    //                         // print_r($product_data_array2);
    //                         array_push($product_data_array1,$product_data_array2);
    //         }


    //     }
    //     }
    //     // print_r($product_data_array1); die;
    //     $dis_array=array_column($product_data_array1, 'discount');
    //     // print_r($dis_array); die;
    //     array_multisort($dis_array, SORT_DESC, $product_data_array1);

    //     // print_r($product_data_array1); 
    //     echo json_encode(array('message' => 'Successfully', 'status' => 'success','product_data'=>$product_data_array1));

    // }
    public function search_all_sales_list_product()
    {
        $user_id = $this->request->getPost('user_id');
        $searchedText = $this->request->getPost("searchText");
        $product_data = $this->Productmodel->like("ProductName", $searchedText)->orLike("ProductShortDesc", $searchedText)->where("ProductLive", 1)->findAll();

        $product_data_array1 = [];
        foreach ($product_data as $key => $single_product) {
            // print($single_product['ProductType']);
            // if($single_product['ProductType']==1){

            $regular_price = $single_product['ProductPrice'];
            $sale_price = $single_product['Sale_ProductPrice'];
            $discount = $regular_price - $sale_price;
            $product_data_array2['discount'] = $discount;
            $product_data_array2['ProductID'] = $single_product['ProductID'];
            $product_data_array2['ProductName'] = $single_product['ProductName'];
            $product_data_array2['ProductShortDesc'] = $single_product['ProductShortDesc'];
            $product_data_array2['regular_price'] = $regular_price;
            $product_data_array2['sale_price'] = $sale_price;
            $product_data_array2['variation_id'] = "";
            $product_data_array2['ProductType'] = $single_product['ProductType'];

            $all_img = json_decode($single_product['ProductImage']);
            $first_img = $all_img[0];
            $product_data_array2['img_data'] = $this->productImagePath . $first_img;

            $wishlish_data = $this->Wishlistmodel->where('ProductID', $single_product['ProductID'])->where('UserID', $user_id)->first();
            if ($wishlish_data) {
                $product_data_array2['wishlist'] = 1;
            } else {
                $product_data_array2['wishlist'] = 0;
            }
            // print_r($product_data_array2);

            array_push($product_data_array1, $product_data_array2);
            // }

        }
        // print_r($product_data_array1); die;
        $dis_array = array_column($product_data_array1, 'discount');
        // print_r($dis_array); die;
        array_multisort($dis_array, SORT_DESC, $product_data_array1);

        // print_r($product_data_array1); 
        echo json_encode(array('message' => 'Successfully', 'status' => 'success', 'product_data' => $product_data_array1));

    }
    // public function best_selling_product(){
    //     $user_id=$this->request->getPost('user_id');
    //     // echo "hii";die;
    //     $order_data = $this->Orderitemmodel
    //     ->select('*, SUM(quantity) as total_sales')
    //     ->groupBy('ProductID')
    //     ->orderBy('total_sales', 'DESC')
    //     ->limit(10)
    //     ->findAll();
    //   if($order_data){
    //     //   print_r($order_data); die;
    //       $product_data_array1=[];
    //       foreach($order_data as $key=>$single_data){
    //           $product_id=$single_data['ProductID'];
    //           $product_data=$this->Productmodel->where('ProductID',$product_id)->where('ProductLive', 1)->first();
    //           $variation_type=$product_data['ProductType'];
    //         //   print_r($variation_type); die;
    //               if($variation_type==1){
    //                   $product_data_array2['regular_price']=$product_data['ProductPrice'];
    //                   $product_data_array2['sale_price']=$product_data['Sale_ProductPrice'];
    //                   $product_data_array2['ProductID']=$product_data['ProductID'];
    //                     $product_data_array2['ProductName']=$product_data['ProductName'];
    //                     $product_data_array2['ProductShortDesc']=$product_data['ProductShortDesc'];
    //                     $product_data_array2['variation_id']="";

    //                       if($product_data['ProductImage']){
    //                         $all_img=json_decode($product_data['ProductImage']);
    //                         $first_img=$all_img[0];
    //                         $product_data_array2['img_data']= $this->productImagePath .$first_img;
    //                       }else{
    //                           $product_data_array2['img_data']="";
    //                       }
    //                         $wishlish_data=$this->Wishlistmodel->where('ProductID',$product_data['ProductID'])->where('UserID',$user_id)->first();
    //                             if($wishlish_data){
    //                                 $product_data_array2['wishlist']= 1;
    //                             }else{
    //                                 $product_data_array2['wishlist']= 0;
    //                             }

    //                   array_push($product_data_array1,$product_data_array2);
    //               }

    //               if($variation_type==2){
    //                     $product_data_array2['ProductID']=$product_data['ProductID'];
    //                     $product_data_array2['ProductName']=$product_data['ProductName'];
    //                     $product_data_array2['ProductShortDesc']=$product_data['ProductShortDesc'];


    //                     $variation_data=$this->Variationmodel->where('ProductID',$product_id)->findAll();
    //                     foreach($variation_data as $key1=>$single_variation){
    //                      $variation_regular_price=$single_variation['VariationPrice'];
    //                         $variation_sale_price=$single_variation['Sale_VariationPrice'];
    //                         $product_data_array2['regular_price']=$variation_regular_price;
    //                         $product_data_array2['sale_price']=$variation_sale_price;
    //                         $product_data_array2['variation_id']=$single_variation['VariationID'];
    //                         //  print_r($product_data_array2); die;
    //                         if($single_variation['product_variation_image']){
    //                             $all_img=json_decode($single_variation['product_variation_image']);
    //                         $first_img=$all_img[0];
    //                         $product_data_array2['img_data']= $this->productImagePath .$first_img;
    //                         }else{
    //                             $product_data_array2['img_data']="";
    //                         }
    //                             $wishlish_data=$this->Wishlistmodel->where('ProductID',$single_data['ProductID'])->where('UserID',$user_id)->first();
    //                         // print_r($this->Wishlistmodel);
    //                             if($wishlish_data){
    //                                 $product_data_array2['wishlist']= 1;
    //                             }else{
    //                                 $product_data_array2['wishlist']= 0;
    //                             } 

    //                         array_push($product_data_array1,$product_data_array2);
    //                     }

    //               }


    //       }

    //       echo json_encode(array('message' => 'Successfully', 'status' => 'success','product_data'=>$product_data_array1));



    //   }else{
    //       echo json_encode(array('message' => 'data not avalible', 'status' => 'false'));
    //   }
    //     // print_r($product_data);
    // }
    public function best_selling_product()
    {
        $user_id = $this->request->getPost('user_id');
        // echo "hii";die;
        $order_data = $this->Orderitemmodel
            ->select('*, SUM(quantity) as total_sales')
            ->groupBy('ProductID')
            ->orderBy('total_sales', 'DESC')
            ->limit(10)
            ->findAll();
        if ($order_data) {
            //   print_r($order_data); die;
            $product_data_array1 = [];
            foreach ($order_data as $key => $single_data) {
                $product_id = $single_data['ProductID'];
                $product_data = $this->Productmodel->where('ProductID', $product_id)->where('ProductLive', 1)->first();

                $product_data_array2['ProductID'] = $product_data['ProductID'];
                $product_data_array2['ProductType'] = $product_data['ProductType'];
                $product_data_array2['ProductName'] = $product_data['ProductName'];
                $product_data_array2['ProductPrice'] = $product_data['ProductPrice'];
                $product_data_array2['Sale_ProductPrice'] = $product_data['Sale_ProductPrice'];
                $product_data_array2['ProductShortDesc'] = $product_data['ProductShortDesc'];
                $product_data_array2['ProductLongDesc'] = $product_data['ProductLongDesc'];
                //   print_r($product_data_array2);die;
                if ($product_data['ProductImage']) {
                    $all_img = json_decode($product_data['ProductImage']);
                    $first_img = $all_img[0];
                    $product_data_array2['img_data'] = $this->productImagePath . $first_img;
                } else {
                    $product_data_array2['img_data'] = "";
                }
                $wishlish_data = $this->Wishlistmodel->where('ProductID', $product_id)->where('UserID', $user_id)->first();
                // print_r($this->Wishlistmodel);
                if ($wishlish_data) {
                    $product_data_array2['wishlist'] = 1;
                } else {
                    $product_data_array2['wishlist'] = 0;
                }

                array_push($product_data_array1, $product_data_array2);
            }

            echo json_encode(array('message' => 'Successfully', 'status' => 'success', 'product_data' => $product_data_array1));



        } else {
            echo json_encode(array('message' => 'data not avalible', 'status' => 'false'));
        }
        // print_r($product_data);
    }
    
    public function search_best_selling_product()
    {
        $user_id = $this->request->getPost('user_id');
        $searchedText = $this->request->getPost("searchText");
        // echo "hii";die;
        $order_data = $this->Orderitemmodel
            ->select('*, SUM(quantity) as total_sales')
            ->join('products', 'products.ProductID = orderitems.ProductID', 'left')
            ->like('products.ProductName', $searchedText, 'both')
            ->groupBy('orderitems.ProductID')
            ->orderBy('total_sales', 'DESC')
            ->limit(10)
            ->findAll();
        // print_r($order_data); die;
        if ($order_data) {
            //   print_r($order_data); die;
            $product_data_array1 = [];
            foreach ($order_data as $key => $single_data) {
                $product_id = $single_data['ProductID'];
                $product_data = $this->Productmodel->where('ProductID', $product_id)->where('ProductLive', 1)->first();

                $product_data_array2['ProductID'] = $product_data['ProductID'];
                $product_data_array2['ProductType'] = $product_data['ProductType'];
                $product_data_array2['ProductName'] = $product_data['ProductName'];
                $product_data_array2['ProductPrice'] = $product_data['ProductPrice'];
                $product_data_array2['Sale_ProductPrice'] = $product_data['Sale_ProductPrice'];
                $product_data_array2['ProductShortDesc'] = $product_data['ProductShortDesc'];
                $product_data_array2['ProductLongDesc'] = $product_data['ProductLongDesc'];
                //   print_r($product_data_array2);die;
                if ($product_data['ProductImage']) {
                    $all_img = json_decode($product_data['ProductImage']);
                    $first_img = $all_img[0];
                    $product_data_array2['img_data'] = $this->productImagePath . $first_img;
                } else {
                    $product_data_array2['img_data'] = "";
                }
                $wishlish_data = $this->Wishlistmodel->where('ProductID', $product_id)->where('UserID', $user_id)->first();
                // print_r($this->Wishlistmodel);
                if ($wishlish_data) {
                    $product_data_array2['wishlist'] = 1;
                } else {
                    $product_data_array2['wishlist'] = 0;
                }

                array_push($product_data_array1, $product_data_array2);
            }

            echo json_encode(array('message' => 'Successfully', 'status' => 'success', 'product_data' => $product_data_array1));



        } else {
            echo json_encode(array('message' => 'data not avalible', 'status' => 'false'));
        }
    }
    
    // ---------------- NEW ARRIVALS ----------------
    public function new_arrivals()
    {
    $user_id = $this->request->getPost('user_id'); // Get the user ID from POST request

    // Fetch the latest products, ordered by creation date (descending), limited to 10
    $latest_products = $this->Productmodel
        ->where('ProductLive', 1) // Ensure products are active/live
        ->orderBy('Created_at', 'DESC') // Sort by most recently created products
        ->limit(10) // Limit to 10 products
        ->findAll();

    if ($latest_products) {
        $product_data_array1 = [];

        foreach ($latest_products as $product) {
            $product_data_array2['ProductID'] = $product['ProductID'];
            $product_data_array2['ProductType'] = $product['ProductType'];
            $product_data_array2['ProductName'] = $product['ProductName'];
            $product_data_array2['ProductPrice'] = $product['ProductPrice'];
            $product_data_array2['Sale_ProductPrice'] = $product['Sale_ProductPrice'];
            $product_data_array2['ProductShortDesc'] = $product['ProductShortDesc'];
            $product_data_array2['ProductLongDesc'] = $product['ProductLongDesc'];

            // Process product image
            if ($product['ProductImage']) {
                $all_img = json_decode($product['ProductImage']);
                $first_img = $all_img[0];
                $product_data_array2['img_data'] = $this->productImagePath . $first_img;
            } else {
                $product_data_array2['img_data'] = "";
            }

            // Check if the product is in the user's wishlist
            $wishlist_data = $this->Wishlistmodel
                ->where('ProductID', $product['ProductID'])
                ->where('UserID', $user_id)
                ->first();

            $product_data_array2['wishlist'] = $wishlist_data ? 1 : 0;

            // Add product to the result array
            array_push($product_data_array1, $product_data_array2);
        }

        echo json_encode([
            'message' => 'Successfully retrieved new arrivals',
            'status' => 'success',
            'product_data' => $product_data_array1,
        ]);
    } else {
        echo json_encode([
            'message' => 'No new arrivals available',
            'status' => 'false',
        ]);
    }
}

    public function search_new_arrivals()
    {
    $user_id = $this->request->getPost('user_id'); // Get the user ID from POST request
    $searchedText = $this->request->getPost('searchText'); // Get the search text from POST request

    // Fetch the latest products matching the search text
    $searched_products = $this->Productmodel
        ->where('ProductLive', 1) // Ensure products are active/live
        ->like('ProductName', $searchedText, 'both') // Search for the text in the product name
        ->orderBy('Created_at', 'DESC') // Sort by most recently created products
        ->limit(10) // Limit to 10 products
        ->findAll();

    if ($searched_products) {
        $product_data_array1 = [];

        foreach ($searched_products as $product) {
            $product_data_array2['ProductID'] = $product['ProductID'];
            $product_data_array2['ProductType'] = $product['ProductType'];
            $product_data_array2['ProductName'] = $product['ProductName'];
            $product_data_array2['ProductPrice'] = $product['ProductPrice'];
            $product_data_array2['Sale_ProductPrice'] = $product['Sale_ProductPrice'];
            $product_data_array2['ProductShortDesc'] = $product['ProductShortDesc'];
            $product_data_array2['ProductLongDesc'] = $product['ProductLongDesc'];

            // Process product image
            if ($product['ProductImage']) {
                $all_img = json_decode($product['ProductImage']);
                $first_img = $all_img[0];
                $product_data_array2['img_data'] = $this->productImagePath . $first_img;
            } else {
                $product_data_array2['img_data'] = "";
            }

            // Check if the product is in the user's wishlist
            $wishlist_data = $this->Wishlistmodel
                ->where('ProductID', $product['ProductID'])
                ->where('UserID', $user_id)
                ->first();

            $product_data_array2['wishlist'] = $wishlist_data ? 1 : 0;

            // Add product to the result array
            array_push($product_data_array1, $product_data_array2);
        }

        echo json_encode([
            'message' => 'Successfully retrieved searched new arrivals',
            'status' => 'success',
            'product_data' => $product_data_array1,
        ]);
    } else {
        echo json_encode([
            'message' => 'No matching new arrivals available',
            'status' => 'false',
        ]);
    }
}

    // ==============================================================
    
    // ------------- TRENDING ITEMS -----------
    public function trending_items()
    {
    $user_id = $this->request->getPost('user_id');
    $days = 7;

        // Join Orderitemmodel with Ordermodel to filter by OrderDate
        $order_data = $this->Orderitemmodel
        ->select('orderitems.ProductID, SUM(orderitems.Quantity) as total_sales')
        ->join('orders', 'orders.OrderID = orderitems.OrderID') // Join with orders table
        ->where('orders.OrderDate >=', date('Y-m-d', strtotime("-$days days"))) // Filter by OrderDate
        ->groupBy('orderitems.ProductID')
        ->orderBy('total_sales', 'DESC')
        ->limit(10)
        ->findAll();

    if ($order_data) {
        $product_data_array = [];
        foreach ($order_data as $single_data) {
            $product_id = $single_data['ProductID'];
            $product_data = $this->Productmodel->where('ProductID', $product_id)->where('ProductLive', 1)->first();

            $product_info['ProductID'] = $product_data['ProductID'];
            $product_info['ProductType'] = $product_data['ProductType'];
            $product_info['ProductName'] = $product_data['ProductName'];
            $product_info['ProductPrice'] = $product_data['ProductPrice'];
            $product_info['Sale_ProductPrice'] = $product_data['Sale_ProductPrice'];
            $product_info['ProductShortDesc'] = $product_data['ProductShortDesc'];

            if ($product_data['ProductImage']) {
                $all_img = json_decode($product_data['ProductImage']);
                $product_info['img_data'] = $this->productImagePath . $all_img[0];
            } else {
                $product_info['img_data'] = "";
            }

            $wishlist_data = $this->Wishlistmodel->where('ProductID', $product_id)->where('UserID', $user_id)->first();
            $product_info['wishlist'] = $wishlist_data ? 1 : 0;

            $product_data_array[] = $product_info;
        }

        echo json_encode(array('message' => 'Trending items fetched successfully', 'status' => 'success', 'product_data' => $product_data_array));
    } else {
        echo json_encode(array('message' => 'No trending items available', 'status' => 'false'));
    }
}

    public function search_trending_items()
{
    $user_id = $this->request->getPost('user_id'); // Get user ID from POST request
    $searchedText = $this->request->getPost('searchText'); // Get search text from POST request
    $days = 7; // Timeframe for trending items (last 7 days)

    // Fetch trending products based on search text
    $order_data = $this->Orderitemmodel
        ->select('orderitems.ProductID, SUM(orderitems.Quantity) as total_sales')
        ->join('orders', 'orders.OrderID = orderitems.OrderID') // Join with orders table
        ->join('products', 'products.ProductID = orderitems.ProductID') // Join with products table
        ->where('orders.OrderDate >=', date('Y-m-d', strtotime("-$days days"))) // Filter by OrderDate
        ->like('products.ProductName', $searchedText, 'both') // Filter by search text in product name
        ->groupBy('orderitems.ProductID')
        ->orderBy('total_sales', 'DESC')
        ->limit(10)
        ->findAll();

    if ($order_data) {
        $product_data_array = [];
        foreach ($order_data as $single_data) {
            $product_id = $single_data['ProductID'];
            $product_data = $this->Productmodel->where('ProductID', $product_id)->where('ProductLive', 1)->first();

            $product_info['ProductID'] = $product_data['ProductID'];
            $product_info['ProductType'] = $product_data['ProductType'];
            $product_info['ProductName'] = $product_data['ProductName'];
            $product_info['ProductPrice'] = $product_data['ProductPrice'];
            $product_info['Sale_ProductPrice'] = $product_data['Sale_ProductPrice'];
            $product_info['ProductShortDesc'] = $product_data['ProductShortDesc'];

            // Process product image
            if ($product_data['ProductImage']) {
                $all_img = json_decode($product_data['ProductImage']);
                $product_info['img_data'] = $this->productImagePath . $all_img[0];
            } else {
                $product_info['img_data'] = "";
            }

            // Check if the product is in the user's wishlist
            $wishlist_data = $this->Wishlistmodel->where('ProductID', $product_id)->where('UserID', $user_id)->first();
            $product_info['wishlist'] = $wishlist_data ? 1 : 0;

            $product_data_array[] = $product_info;
        }

        echo json_encode(array('message' => 'Trending items searched successfully', 'status' => 'success', 'product_data' => $product_data_array));
    } else {
        echo json_encode(array('message' => 'No matching trending items available', 'status' => 'false'));
    }
}


    // ========================================================
    
    
    // public function search_best_selling_product(){
    //      $user_id=$this->request->getPost('user_id');
    //       $searchedText = $this->request->getPost("searchText");
    //     // echo "hii";die;
    //     $order_data = $this->Orderitemmodel
    //     ->select('*, SUM(quantity) as total_sales')
    //     ->join('products', 'products.ProductID = orderitems.ProductID', 'left')
    //     ->like('products.ProductName', $searchedText, 'both')
    //     ->groupBy('orderitems.ProductID')
    //     ->orderBy('total_sales', 'DESC')
    //     ->limit(10)
    //     ->findAll();
    //     // print_r($order_data); die;
    //     if($order_data){
    //     //   print_r($order_data); die;
    //       $product_data_array1=[];
    //       foreach($order_data as $key=>$single_data){
    //           $product_id=$single_data['ProductID'];
    //           $product_data=$this->Productmodel->where('ProductID',$product_id)->where('ProductLive', 1)->first();
    //           $variation_type=$product_data['ProductType'];
    //         //   print_r($variation_type); die;
    //               if($variation_type==1){
    //                   $product_data_array2['regular_price']=$product_data['ProductPrice'];
    //                   $product_data_array2['sale_price']=$product_data['Sale_ProductPrice'];
    //                   $product_data_array2['ProductID']=$product_data['ProductID'];
    //                     $product_data_array2['ProductName']=$product_data['ProductName'];
    //                     $product_data_array2['ProductShortDesc']=$product_data['ProductShortDesc'];
    //                     $product_data_array2['variation_id']="";

    //                       if($product_data['ProductImage']){
    //                         $all_img=json_decode($product_data['ProductImage']);
    //                         $first_img=$all_img[0];
    //                         $product_data_array2['img_data']= $this->productImagePath .$first_img;
    //                       }else{
    //                           $product_data_array2['img_data']="";
    //                       }
    //                         $wishlish_data=$this->Wishlistmodel->where('ProductID',$product_data['ProductID'])->where('UserID',$user_id)->first();
    //                             if($wishlish_data){
    //                                 $product_data_array2['wishlist']= 1;
    //                             }else{
    //                                 $product_data_array2['wishlist']= 0;
    //                             }

    //                   array_push($product_data_array1,$product_data_array2);
    //               }

    //               if($variation_type==2){
    //                     $product_data_array2['ProductID']=$product_data['ProductID'];
    //                     $product_data_array2['ProductName']=$product_data['ProductName'];
    //                     $product_data_array2['ProductShortDesc']=$product_data['ProductShortDesc'];


    //                     $variation_data=$this->Variationmodel->where('ProductID',$product_id)->findAll();
    //                     foreach($variation_data as $key1=>$single_variation){
    //                      $variation_regular_price=$single_variation['VariationPrice'];
    //                         $variation_sale_price=$single_variation['Sale_VariationPrice'];
    //                         $product_data_array2['regular_price']=$variation_regular_price;
    //                         $product_data_array2['sale_price']=$variation_sale_price;
    //                         $product_data_array2['variation_id']=$single_variation['VariationID'];
    //                         //  print_r($product_data_array2); die;
    //                         if($single_variation['product_variation_image']){
    //                             $all_img=json_decode($single_variation['product_variation_image']);
    //                         $first_img=$all_img[0];
    //                         $product_data_array2['img_data']= $this->productImagePath .$first_img;
    //                         }else{
    //                             $product_data_array2['img_data']="";
    //                         }
    //                             $wishlish_data=$this->Wishlistmodel->where('ProductID',$single_data['ProductID'])->where('UserID',$user_id)->first();
    //                         // print_r($this->Wishlistmodel);
    //                             if($wishlish_data){
    //                                 $product_data_array2['wishlist']= 1;
    //                             }else{
    //                                 $product_data_array2['wishlist']= 0;
    //                             } 

    //                         array_push($product_data_array1,$product_data_array2);
    //                     }

    //               }


    //       }

    //       echo json_encode(array('message' => 'Successfully', 'status' => 'success','product_data'=>$product_data_array1));



    //   }else{
    //       echo json_encode(array('message' => 'data not avalible', 'status' => 'false'));
    //   }
    // }

 
    
    public function add_review()
    {
        // echo "hii"; die;
        $userID = $this->request->getPost('userId');
        $product_id = $this->request->getPost('product_id');
        $rating = $this->request->getPost('rating');
        $description = $this->request->getPost('description');
        if (!$userID) {
            return json_encode(array("status" => "fail", "message" => "userId is required."));
        }
        if (!$product_id) {
            return json_encode(array("status" => "fail", "message" => "product_id is required."));
        }
        if (!$rating) {
            return json_encode(array("status" => "fail", "message" => "rating is required."));
        }
        if (!$description) {
            return json_encode(array("status" => "fail", "message" => "description is required."));
        }

        if ($rating < 1 || $rating > 5) {
            return json_encode(array("status" => "fail", "message" => "must between 1 to 5."));
        }

        $user_data = $this->UserModel->where('UserID', $userID)->first();
        if ($user_data) {
            $user_name = $user_data['UserFirstName'];
            $user_email = $user_data['UserEmail'];
        }

        $all_data = [
            'ProductID' => $product_id,
            'UserID' => $userID,
            'rating' => $rating,
            'name' => $user_name,
            'email' => $user_email,
            'description' => $description,
        ];
        $add_review = $this->Reviewmodel->insert($all_data);
        if ($add_review) {
            echo json_encode(array('message' => ' Review Add Successfully', 'status' => 'success'));
        } else {
            echo json_encode(array("status" => "fail", "message" => "Review Add Error."));
        }

    }
    public function view_Review()
    {
        // echo "hii"; die;
        $product_id = $this->request->getPost('product_id');
        if (!$product_id) {
            return json_encode(array("status" => "fail", "message" => "product_id is required."));
        }
        $review_data = $this->Reviewmodel->where('ProductID', $product_id)->orderBy('review_id', 'desc')->findAll();
        if ($review_data) {
            $array1 = [];
            foreach ($review_data as $key => $single_review) {
                $array2['review_id'] = $single_review['review_id'];
                $array2['name'] = $single_review['name'];
                $array2['rating'] = $single_review['rating'];
                $array2['email'] = $single_review['email'];
                $array2['comments'] = $single_review['description'];
                $array2['user_id'] = $single_review['UserID'];
                $array2['date'] = date('d-m-Y', strtotime($single_review['created_date']));

                $user_id = $single_review['ProductID'];
                $user_data = $this->UserModel->where('UserID', $single_review['UserID'])->first();
                $array2['user_profile'] = $this->profileImagePath . $user_data['UserProfile'];

                array_push($array1, $array2);

                //  print_r($array2); die;
            }
            echo json_encode(array('status' => 'success', 'review_data' => $review_data = $array1));
        } else {
            echo json_encode(array("status" => "fail", "message" => "Review Not Found!", 'review_data' => []));
        }
    }
    public function delete_review()
    {
        $userID = $this->request->getPost('userId');
        $review_id = $this->request->getPost('review_id');
        if (!$userID) {
            return json_encode(array("status" => "fail", "message" => "userId is required."));
        }
        if (!$review_id) {
            return json_encode(array("status" => "fail", "message" => "review_id is required."));
        }

        $review_data = $this->Reviewmodel->where('review_id', $review_id)->where('UserID', $userID)->first();
        // print_r($review_data); die;
        if ($review_data) {
            $this->Reviewmodel->delete($review_data['review_id']);
            echo json_encode(array('message' => ' Review Delete Successfully', 'status' => 'success'));
        } else {
            return json_encode(array("status" => "fail", "message" => "review delete error."));
        }



    }
    public function paypal()
    {
        require_once APPPATH . 'ThirdParty/PayPal-PHP-SDK/autoload.php';

        $paypal = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'AZiWD3YmHRw3Pj8cZuMcM4nLDiE85uukuK754IXwe34QTJpaNZSmxVXYvafgmsQ7F5hnUFXFegqUN6YQ',
                'EO7hjc5NRCag6fsTzuHJl2FeoqKLBg_s_sLv2_5aMUqU5IkRIIFSvNE1qWmqgGp6cRJiZVPf4e3ksXTg'
            )
        );
        // try {
        //     echo 1;
        //     $this->apiContext = new ApiContext([
        //         'client_id' => 'AZiWD3YmHRw3Pj8cZuMcM4nLDiE85uukuK754IXwe34QTJpaNZSmxVXYvafgmsQ7F5hnUFXFegqUN6YQ',
        //         'client_secret' => 'EO7hjc5NRCag6fsTzuHJl2FeoqKLBg_s_sLv2_5aMUqU5IkRIIFSvNE1qWmqgGp6cRJiZVPf4e3ksXTg',
        //     ]);
        //     echo 2;
        // } catch (Exception $e) {
        //     die('API context initialization error: ' . $e->getMessage());
        // }
        print_r("Ok" . $paypal);
        die;
        $card_holder_name = $this->request->getPost('card_holder_name');
        // $card_number=$this->request->getPost('card_number');
        // $ex_month=$this->request->getPost('ex_month');
        // $ex_year=$this->request->getPost('ex_year');
        // $cvv=$this->request->getPost('cvv');





        // if(!$card_holder_name){ return json_encode(array("status"=>"fail","message"=>"Card Holder Name is required.")); }
        // if(!$card_number){ return json_encode(array("status"=>"fail","message"=>"Card Number is required.")); }
        // if(!$ex_month){ return json_encode(array("status"=>"fail","message"=>"Expiry Month is required.")); }
        // if(!$ex_year){ return json_encode(array("status"=>"fail","message"=>"Expiry Year is required.")); }
        // if(!$cvv){ return json_encode(array("status"=>"fail","message"=>"Cvv is required.")); }


        // Get the card details from the request
        $cardNumber = $this->request->getVar('card_number');
        $expiryMonth = $this->request->getVar('expiry_month');
        $expiryYear = $this->request->getVar('expiry_year');
        $cvc = $this->request->getVar('cvc');

        // Create a new credit card object
        $creditCard = new CreditCard();

        // Set the credit card details
        $creditCard->number = $cardNumber;
        $creditCard->expire_month = $expiryMonth;
        $creditCard->expire_year = $expiryYear;
        $creditCard->cvv2 = $cvc;

        // Create a new funding instrument object
        $fundingInstrument = new FundingInstrument();

        // Set the funding instrument type
        $fundingInstrument->credit_card = $creditCard;

        // Create a new payer object
        $payer = new Payer();

        // Set the payer's funding instrument
        $payer->funding_instruments = [$fundingInstrument];

        // Create a new payment object
        $payment = new Payment();

        // Set the payment intent
        $payment->intent = 'sale';

        // Set the payer
        $payment->payer = $payer;

        // Create the payment
        $response = $payment->create($this->apiContext);

        // Get the payment token
        $paymentToken = $response->id;

        // Return the payment token
        return json_encode(['token' => $paymentToken]);
    }

    public function createPayment($order_id, $amount_pay)
    {

        if (!$amount_pay) {
            return json_encode(array("status" => "fail", "message" => "amount is required."));
        }

        // print_r("hh");
        // die;
        // Load PayPal configuration
        $paypalConfig = new \Config\PayPal();

        try {
            // print_r($paypalConfig->clientId);
            // die;
            $apiContext = new ApiContext(
                new OAuthTokenCredential(
                    $paypalConfig->clientId,
                    $paypalConfig->clientSecret
                )
            );

            // Your PayPal API code here
        } catch (Exception $e) {
            // Handle the exception
            echo 'PayPal API Error: ' . $e->getMessage();
        }

        // Create a payer
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        // Create an amount
        $amount = new Amount();
        $amount->setTotal($amount_pay); // Set the payment amount
        $amount->setCurrency('USD'); // Set the currency

        // Create a transaction
        $transaction = new Transaction();
        $transaction->setAmount($amount);
        $transaction->setDescription('Example Payment Description');

        // Create a redirect URL
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(base_url('api/success/' . $order_id)); // Set the return URL after payment
        $redirectUrls->setCancelUrl(base_url('paypal/cancel'));   // Set the cancel URL

        // Create a payment
        $payment = new Payment();
        $payment->setIntent('sale');
        $payment->setPayer($payer);
        $payment->setTransactions([$transaction]);
        $payment->setRedirectUrls($redirectUrls);

        try {
            // Create the payment
            $payment->create($apiContext);

            // Get the approval URL to redirect the user to PayPal
            $approvalUrl = $payment->getApprovalLink();

            // Redirect the user to PayPal for payment approval
            return redirect()->to($approvalUrl);
        } catch (\Exception $ex) {
            // Handle any errors that occur during the creation of the payment
            return $ex->getMessage();
        }
    }





    function responsePayment()
    {
        if (isset($_GET) && !empty($_GET)) {
            print_r('hello');
            return json_encode($_GET);
        }
    }

    function success($order_id)
    {
        // print_r($order_id);
        // return json_encode($order_id);
        echo json_encode(array('message' => 'success', 'status' => 'success', 'order_id' => $order_id));
    }
}
