<?php

namespace App\Controllers\api;
require_once APPPATH . 'Libraries/dompdf/autoload.inc.php';
use Razorpay\Api\Api;
use Razorpay\Api\Errors\Error;
use CodeIgniter\Controller;

use App\Models\Bannersmodel;
use App\Models\Categorymodel;
use App\Models\Subcategorymodel;
use App\Models\Productmodel;
use App\Models\Reviewmodel;
use App\Models\CountryModel;
use App\Models\StateModel;
use App\Models\CityModel;
use App\Models\Paymentgatewaymodel;
use Stripe\Stripe;
use App\Models\CartModel;
use App\Models\User_shipping_addressmodel;
use App\Models\Ordermodel;
use App\Models\Orderitemmodel;
use App\Models\UserModel;
use App\Models\Paymentmodel;
use App\Models\Allsettingsmodel;
// use App\Libraries\RazorPay;
// use Config\Razorpay;
// use Config\Razorpay;
// use Razorpay\Api\Api;
// use App\Controllers\BaseController;
// use Razorpay\Api\Api;

// use Razorpay\Api\Errors\Error;
class Home extends BaseController
{
    protected $Bannersmodel;
    protected $Categorymodel;
    protected $Subcategorymodel;
    protected $Productmodel;
    protected $Reviewmodel;
    protected $CountryModel;
    protected $StateModel;
    protected $CityModel;
    protected $UserModel;
    protected $CartModel;
    protected $Paymentgatewaymodel;
    protected $User_shipping_addressmodel;
    protected $Ordermodel;
    protected $Orderitemmodel;
    protected $Paymentmodel;
    protected $Allsettingsmodel;

    public function __construct()
    {
        $this->profileImagePath = base_url('admin/public/upload_images/');
        $this->productImagePath = base_url('admin/public/assets/img/product_images/');
        
        $db = \Config\Database::connect();
        $this->Bannersmodel = new Bannersmodel($db);
        $this->Categorymodel = new Categorymodel($db);
        $this->Subcategorymodel = new Subcategorymodel($db);
        $this->Productmodel = new Productmodel($db);
        $this->Reviewmodel = new Reviewmodel($db);
        $this->CountryModel = new CountryModel($db);
        $this->StateModel = new StateModel($db);
        $this->CityModel = new CityModel($db);
        $this->Paymentgatewaymodel = new Paymentgatewaymodel($db);
        $this->CartModel = new CartModel($db);
        $this->User_shipping_addressmodel = new User_shipping_addressmodel($db);
        $this->Ordermodel = new Ordermodel($db);
        $this->Orderitemmodel = new Orderitemmodel($db);
        $this->UserModel = new UserModel($db);
        $this->Paymentmodel = new Paymentmodel($db);
        $this->Allsettingsmodel = new Allsettingsmodel($db);
    }
    
    // public function homeFeeds()
    // {
    //     $banner = $this->Bannersmodel->select("CONCAT('" . $this->profileImagePath . "', BannerImg) AS BannerImg,BannerUrl")->where("BannerLive", 1)->findAll();
    //     $categories = $this->Categorymodel->select("CategoryID,CONCAT('" . $this->profileImagePath . "', Catagoryimage) AS Catagoryimage,CategoryName")->where("ProductLive",1)->findAll();
    //     foreach($categories as $categorie){
    //         $subCategories[] = $this->Subcategorymodel->select("sub_category_id,category_id,sub_category")->where("category_id",$categorie['CategoryID'])->first();
    //     }
    //     $products = $this->Productmodel->where("ProductLive",1)->findAll();
    //     $allProducts = array();
    //     foreach($products as $product){
    //         $productImages = json_decode($product['ProductImage']);
    //         foreach($productImages as $productImage){
    //             $product['AllProductImage'][] = $this->productImagePath.$productImage;
    //         }
    //         $allProducts[] = $product;
    //     }
        
    //     return json_encode(array("status"=>'success',"banners"=>$banner,"categories"=>$categories,"subCategories"=>$subCategories,"allProducts"=>$allProducts));
    // }
    
    
    
    public function homeFeeds()
    {
    $banner = $this->Bannersmodel
        ->select("CONCAT('" . $this->profileImagePath . "', BannerImg) AS BannerImg, BannerUrl")
        ->where("BannerLive", 1)
        ->findAll();


    if (!empty ($banner)) {
        return json_encode([
            "status" => 'success',
            "banners" => $banner,
        ]);
    } else {
        return json_encode([
            "status" => 'false',
            "banners" => [],
        ]);
    }
}
    public function countries()
    {
        $countries = $this->CountryModel->select("CountryID,CountryCode,CountryName")->orderBy("CountryName","asc")->findAll();
        return json_encode(array("status"=>'success',"message"=>"all countries","countries"=>$countries));
    }
    
    public function states()
    {
        
        $countryID = $this->request->getPost("countryID");
        if(!$countryID){ return json_encode(array("status"=>"fail","message"=>"countryID is required")); }
        
        $states = $this->StateModel->select("StateID,CountryID,StateName")->where("CountryID",$countryID)->where("StateLive",1)->orderBy("StateName","asc")->findAll();
        return json_encode(array("status"=>'success',"message"=>"all states CountryID wise","states"=>$states));
    }
    
    public function cities()
    {
        $stateID = $this->request->getPost("stateID");
        if(!$stateID){ return json_encode(array("status"=>"fail","message"=>"stateID is required")); }
        
        $cities = $this->CityModel->select("CityID,StateID,CityName")->where("StateID",$stateID)->where("CityLive",1)->orderBy("CityName","asc")->findAll();
        return json_encode(array("status"=>'success',"message"=>"all cities StateID wise","cities"=>$cities));
    }
    
    public function Paymentgateway()
    { 
        $Paymentgateway =$this->Paymentgatewaymodel->findAll();
        
        $data=[];
        if($Paymentgateway){
            foreach($Paymentgateway as $val){
                $details = isset($val['details'])?json_decode($val['details']):array();
                if($val['type'] == 1){
                    $type = 'cod';
                }else if($val['type'] == 2){
                    $type = 'bank_transfer';
                }else if($val['type'] == 3){
                    $data['paypal']['status'] =  $val['status'];
                    $type = 'paypal';
                }else if($val['type'] == 4){
                    $data['stripe']['status'] =  $val['status'];
                    $type = 'stripe';
                }else if($val['type'] == 5){
                    $type = 'razorpay';
                }
                
                if($type=='razorpay'){
                            $type='razorpay_data';
                        }
                $data[$type]['status'] =  isset($val['status']) && $val['status'] == 1? true : false;
                if(!empty($details)){
                    foreach($details as $key=>$val1){
                        
                        $data[$type][$key]=$val1;
                    }
                }
            }
            $res = array('status'=>true,'data'=>$data);
        }else{
            $res = array('status'=>false);
        }
        return json_encode($res);
    }
    
    public function stripe_payment() { 
        $payment_type = $this->request->getPost('type');
        $shipping_address_id = $this->request->getPost('shipping_address_id');
        $userID = $this->request->getPost('userId');
    
        $stripe_data = $this->Paymentgatewaymodel->where('type', 4)->first();
        $stripe_details = json_decode($stripe_data['details']); 
        $stripe_sec_key = $stripe_details->secret_key;
    
        $card_number = $this->request->getPost('number');
        $expiry_month = $this->request->getPost('expiry_month');
        $expiry_year = $this->request->getPost('expiry_year');
        $cvv = $this->request->getPost('cvv');
        $customer_card_name = $this->request->getPost('name');
        $amt = $this->request->getPost('amt') * 100;
    
        if (!$card_number || !$expiry_month || !$expiry_year || !$cvv || !$customer_card_name || !$amt) {
            return json_encode(['status' => 'fail', 'message' => 'All fields are required']);
        }
    
        \Stripe\Stripe::setApiKey($stripe_sec_key);
    
        try {
            $token = \Stripe\Token::create([
                'card' => [
                    'number' => $card_number,
                    'exp_month' => $expiry_month,
                    'exp_year' => $expiry_year,
                    'cvc' => $cvv,
                ],
            ]);
    
            $customer = \Stripe\Customer::create([
                'name' => $customer_card_name,
                'source' => $token->id,
            ]);
    
            $charge = \Stripe\Charge::create([
                'amount' => $amt,
                'currency' => 'eur',
                'customer' => $customer->id,
            ]);
    
            if ($charge['status'] == 'succeeded') {
                
                $orderId=$this->saveOrdersde($payment_type, $userID, $shipping_address_id, json_decode($this->view_cart_list_1_pay()), $charge['id']);
                echo json_encode(['status' => 'success', 'message' => 'Payment successful!', 'paymentID' => $charge['id'],'orderId' => $orderId]);
            }
        } catch (\Exception $e) {
           
            echo json_encode(['status' => 'failed', 'message' => $e->getMessage()]);
        }
    }
    public function saveOrdersde($payment_type, $userID, $shipping_address_id, $cart_details, $transaction_id) {
    //   print_r($cart_details);die;
        $shipping_data = $this->User_shipping_addressmodel->where('id', $shipping_address_id)->first();
        $user_data = $this->UserModel->where('UserID', $userID)->first();
    
        $order_date = date("d-m-Y");
        $order_number = mt_rand(10000, 99999);
        $total_amount = $cart_details->final_total_with_tax;
        $total_tax = $cart_details->total_tax;
    
        $all_fields = [
            'UserID' => $userID,
            'fname' => $shipping_data['first_name'],
            'lname' => $shipping_data['last_name'],
            'email' => $user_data['UserEmail'] ?? null,
            'phoneno' => $shipping_data['number'],
            'country' => $shipping_data['country'],
            'state' => $shipping_data['state'],
            'city' => $shipping_data['city'],
            'address1' => $shipping_data['address'],
            'zipcode' => $shipping_data['zipcode'],
            'OrderDate' => $order_date,
            'OrderNumber' => $order_number,
            'TotalAmount' => $total_amount,
            'totalTax' => $total_tax,
            'payment' => $payment_type,
            'OrderStatus' => 'Pending',
        ];
    //   print_r($all_fields);die;
        $add_order_data = $this->Ordermodel->insert($all_fields);
        $insert_id = $this->Ordermodel->getInsertID();
    
        if ($insert_id) {
            $cart_data2 = $this->CartModel->where('user_id', $userID)->findAll();
    
            // Insert into payment table
            $payment_data = [
                'Transation_id' => $transaction_id,
                'OrderID' => $insert_id,
                'UserID' => $userID,
                'PaymentType' => $payment_type,
                'Amount' => $total_amount,
                'PaymentStatus' => "success",
            ];
           
            $this->Paymentmodel->insert($payment_data);
    
            foreach ($cart_data2 as $single_cart_data2) {
                $all_data2 = [
                    'OrderID' => $insert_id,
                    'ProductID' => $single_cart_data2['product_id'],
                    'Quantity' => $single_cart_data2['quantity'],
                    'Price' => $single_cart_data2['product_price'],
                    'variation_table_id' => $single_cart_data2['variation_tbl_id'],
                    'product_color' => $single_cart_data2['product_color'],
                    'product_size' => $single_cart_data2['product_size'],
                ];
               
                $this->Orderitemmodel->insert($all_data2);
            }
    
            // Generate Invoice PDF
            $pdf_path = $this->generateInvoicePDFs($insert_id, $all_fields, $cart_data2);
            if ($pdf_path) {
                $this->Ordermodel->update($insert_id, ['invoice_pdf' => $pdf_path]);
           
            }
            return $insert_id;
        }
        return false;
    }
    

public function view_cart_list_1_pay()
    {  
        
        $userID =  $this->request->getPost('userId');
        if (!$userID) {
            return json_encode(array("status" => "fail", "message" => "userId is required."));
        }

        $cart_data = $this->CartModel->where('user_id', $userID)->findAll();
        
        $product_detailsarr = [];
        if ($cart_data) {
            $total_amount1=0;
            foreach ($cart_data as $key => $single_cart_data) {
                $product_id = $single_cart_data['product_id'];
                $cart_product_quantity=$single_cart_data['quantity'];
                $product_color=$single_cart_data['product_color'];
                $product_size=$single_cart_data['product_size'];
                $product_price=$single_cart_data['product_price'];
                $product_variation_id=$single_cart_data['variation_tbl_id'];
                $cart_tbl_id=$single_cart_data['id'];
                $total_amount1=$total_amount1+($product_price*$cart_product_quantity);
                
                // print_r($single_cart_data['quantity']);die;
              
                $product_details = $this->Productmodel->where('ProductID', $product_id)->first();
                  $product_details['cart_product_quantity']=$cart_product_quantity;
                  $product_details['product_color']=$product_color;
                  $product_details['product_size']=$product_size;
                  $product_details['product_price_main']=$product_price;
                  $product_details['variation_tbl_id']=$product_variation_id;
                  $product_details['cart_tbl_id']=$cart_tbl_id;
                if($product_details){
                    
                    $all_img=json_decode($product_details['ProductImage']);
                    $first_img=$all_img[0];
                    $product_details["allImages"]= $this->productImagePath .$first_img;
                }
                
                $product_detailsarr[] = $product_details;
            } 
           
            $total_tax1=$total_amount1*10/100;
            $total_with_tax1=$total_amount1+($total_amount1*10/100);
            
            $total_tax="$total_tax1";
            $total_with_tax="$total_with_tax1";
            $total_amount="$total_amount1";
            
            return json_encode(array('message' => 'Successfully', 'status' => 'success', 'cart_details' => $product_detailsarr,'final_total' => $total_amount,'total_tax'=>$total_tax,'final_total_with_tax'=>$total_with_tax));
        } else {
            return json_encode(array('message' => 'Cart is Empty', 'status' => 'false'));
        }
    }
    public function razorpay_payment()
    {
        require_once APPPATH . '../vendor/autoload.php';

        $razorpayConfig = [
            'keyId' => 'rzp_test_9UrkTeo8gsGo77',
            'keySecret' => 'rOG3EgOvfgOTlRIPSvjuFn8T'
        ];

        $customer_card_name = $this->request->getPost('name');
        $amt = $this->request->getPost('amt');
        $payment_type = $this->request->getPost('type');
        $shipping_address_id = $this->request->getPost('shipping_address_id');
        $userID = $this->request->getPost('userId');

        if (empty($customer_card_name) || empty($amt) || empty($userID)) {
            return $this->response->setJSON([
                'status' => 'failed',
                'message' => 'Invalid input. Please provide a valid name, amount, and user ID.'
            ]);
        }

        // Fetch cart details
        $test = $this->view_cart_list_1_pay();
        $cart_details = json_decode($test);

        // Calculate amount in paise
        $amtInPaise = $amt * 100;

        try {
            // Initialize Razorpay API
            $api = new \Razorpay\Api\Api($razorpayConfig['keyId'], $razorpayConfig['keySecret']);

            // Create Razorpay payment link
            $payment = $api->paymentLink->create([
                'amount' => $amtInPaise,
                'currency' => 'INR',
                'accept_partial' => false, // Disable partial payments
                'description' => 'Payment for order',
                'customer' => [
                    'name' => $customer_card_name,
                    'email' => 'customer@example.com',
                    'contact' => '+919000090000',
                ],
                'notify' => [
                    'sms' => true,
                    'email' => true,
                ],
                'reminder_enable' => true,
                'notes' => [
                    'policy_name' => 'Jeevan Bima',
                ],
                'callback_url' => base_url('razorpay_callback'),
                'callback_method' => 'get'
            ]);

            // Payment link data
            $pay_data = [
                'id' => $payment['id'],
                'url' => $payment['short_url'],
            ];

            // Insert order and payment data into the database
            $paymentID = $payment['id']; // Razorpay Payment Link ID
            $orderSaved = $this->saveOrder($payment_type, $userID, $shipping_address_id, $cart_details, $paymentID);

            if ($orderSaved) {
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Payment link created and order saved successfully!',
                    'pay_data' => $pay_data,
                    'orderId' => $orderSaved
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => 'failed',
                    'message' => 'Payment link created but failed to save order in the database.'
                ]);
            }
        } catch (\Razorpay\Api\Errors\BadRequestError $e) {
            return $this->response->setJSON([
                'status' => 'failed',
                'message' => 'Razorpay Bad Request: ' . $e->getMessage()
            ]);
        } catch (\Razorpay\Api\Errors\ServerError $e) {
            return $this->response->setJSON([
                'status' => 'failed',
                'message' => 'Razorpay Server Error: ' . $e->getMessage()
            ]);
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'status' => 'failed',
                'message' => 'General Error: ' . $e->getMessage()
            ]);
        }
    }
    public function saveOrder($payment_type, $userID, $shipping_address_id, $cart_details, $transation_id)
    {
        
        $shipping_data = $this->User_shipping_addressmodel->where('id', $shipping_address_id)->first();
        // print_r($shipping_data);die;
        if (!$shipping_data) {
            return false;
        }
       
        // Fetch user data
        $user_data = $this->UserModel->where('UserID', $userID)->first();
        if (!$user_data) {
            return false; 
        }
    
        $order_date = date("Y-m-d"); 
        $order_number = mt_rand(10000, 99999); 
        $total_amount = $cart_details->final_total_with_tax;
        $total_tax = $cart_details->total_tax;
       
        $order_data = [
            'UserID' => $userID,
            'fname' => $shipping_data['first_name'],
            'lname' => $shipping_data['last_name'],
            'email' => $user_data['UserEmail'] ?? null,
            'phoneno' => $shipping_data['number'],
            'country' => $shipping_data['country'],
            'state' => $shipping_data['state'],
            'city' => $shipping_data['city'],
            'address1' => $shipping_data['address'],
            'zipcode' => $shipping_data['zipcode'],
            'OrderDate' => $order_date,
            'OrderNumber' => $order_number,
            'TotalAmount' => $total_amount,
            'totalTax' => $total_tax,
            'payment' => $payment_type,
            'OrderStatus' => 'Pending'
        ];
       
        $this->Ordermodel->insert($order_data);
        $insert_id = $this->Ordermodel->getInsertID();
    
        if (!$insert_id) {
            return false; 
        }
    
        $payment_data = [
            'Transation_id' => $transation_id,
            'OrderID' => $insert_id,
            'UserID' => $userID,
            'PaymentType' => $payment_type,
            'Amount' => $total_amount,
            'PaymentStatus' => 'success'
        ];
        $this->Paymentmodel->insert($payment_data);

        $pdf_path = $this->generateInvoicePDF($insert_id, $order_data, $cart_details);
        if ($pdf_path) {
            $this->Ordermodel->update($insert_id, ['invoice_pdf' => $pdf_path]);
        }
    
        // Insert each cart item into the OrderItem table
        if (!empty($cart_details->cart_details)) {
            foreach ($cart_details->cart_details as $item) {
                $order_item_data = [
                    'OrderID' => $insert_id,
                    'ProductID' => $item->ProductID,
                    'Quantity' => $item->cart_product_quantity,
                    'Price' => $item->product_price_main,
                    'product_color' => $item->product_color ?? null,
                    'product_size' => $item->product_size ?? null
                ];
                $this->Orderitemmodel->insert($order_item_data);
            }
        }
    
        return $insert_id;
    }
    
    public function razorpay_callback()
    {
        $input = file_get_contents("php://input");
        $data = json_decode($input, true);

        log_message('info', 'Razorpay Callback Data: ' . print_r($data, true));

        $razorpay_signature = $this->request->getPost('razorpay_signature');
        $razorpay_payment_id = $this->request->getPost('razorpay_payment_id');
        $razorpay_order_id = $this->request->getPost('razorpay_order_id');

        $razorpaySecret = 'rOG3EgOvfgOTlRIPSvjuFn8T';
        $generatedSignature = hash_hmac('sha256', $razorpay_order_id . '|' . $razorpay_payment_id, $razorpaySecret);

        if ($razorpay_signature == $generatedSignature) {
            if (isset($data['status']) && $data['status'] == 'paid') {
                $paymentId = $data['id'];
                $orderId = $data['order_id'];
                $amount = $data['amount'];

                // Update order with Razorpay transaction ID
                $this->Ordermodel->where('OrderNumber', $orderId)
                                ->set(['Transation_id' => $paymentId, 'OrderStatus' => 'Completed'])
                                ->update();

                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Payment was successful'
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => 'failed',
                    'message' => 'Payment status is not paid'
                ]);
            }
        } else {
            return $this->response->setJSON([
                'status' => 'failed',
                'message' => 'Invalid signature'
            ]);
        }
    }

    private function generateInvoicePDF($order_id, $order_data, $cart_data)
    {
        $dompdf = new \Dompdf\Dompdf();
    
        // Fetch and encode logo image
        $imagePath = 'https://ecomweb.fableadtechnolabs.com/admin/public/upload_images/1728803054_e8778ea13ec894e43181.png';
        $imageData = @file_get_contents($imagePath);
        $base64Image = $imageData ? 'data:image/jpeg;base64,' . base64_encode($imageData) : '';
    
        $qrPath = 'https://pharmaxy.org/phmxy-admin/public/upload_images/bank/ImportedPhoto.jpeg';
        $qrData = @file_get_contents($qrPath);
        $base64QRImage = $qrData ? 'data:image/jpeg;base64,' . base64_encode($qrData) : '';
    
        // Fetch order and settings details
        $order = $this->Ordermodel->where('OrderID', $order_id)->first();
        $data2 = $this->Allsettingsmodel->first();
    
        if (!$order || !$data2) {
            return false; // Return if data is missing to prevent errors
        }
    
        // Ensure order_data is an object
        $order_data = is_object($order_data) ? $order_data : (object) $order_data;
    
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
            @media (max-width: 768px) { .logo img { width: 100px; } }
        </style>
    
        <body>
            <div class="container">
                <header>
                    <div class="logo">
                        <img src="' . $base64Image . '" alt="Company Logo" width="150">
                    </div>
                    <div class="company-info">
                        <h1>Ecomweb</h1>
                        <p>Address: ' . htmlspecialchars($data2['Address'] ?? '') . '</p>
                        <p>Email: ' . htmlspecialchars($data2['Email'] ?? '') . ' | Phone: ' . htmlspecialchars($data2['Phone'] ?? '') . '</p>
                    </div>
                </header>
                 <div class="row de">
                <section class="order-details col-lg-6">
                    <h4>Order Details</h4>
                    <p><strong>Order Number:</strong> # ' . htmlspecialchars($order['OrderNumber'] ?? '') . '</p>
                    <p><strong>Order Date:</strong> ' . date('jS F Y') . '</p>
                </section>
    
                <section class="customer-info col-lg-6 right-align">
                    <h4>Customer Information</h4>
                    <p><strong>Name:</strong> ' . htmlspecialchars(($order_data->fname ?? '') . ' ' . ($order_data->lname ?? '')) . '</p>
                    <p><strong>Email:</strong> ' . htmlspecialchars($order_data->email ?? '') . '</p>
                    <p><strong>Shipping Address:</strong> ' . htmlspecialchars($order_data->address1 ?? '') . '</p>
                    <p><strong>Phone No:</strong> ' . htmlspecialchars($order_data->phoneno ?? '') . '</p>
                </section>
                </div>
                <section>
                    <h2>Order Summary</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>';
    
        $totalAmount = 0;
    
        $cart_details = is_object($cart_data) && isset($cart_data->cart_details) ? $cart_data->cart_details : [];
    
        foreach ($cart_details as $item) {
            $product_details = $this->Productmodel->where('ProductID', $item->ProductID)->first();
            $productName = $product_details ? htmlspecialchars($product_details['ProductName']) : 'Unknown Product';
            $totalPrice = $item->cart_product_quantity * $item->Sale_ProductPrice;
            $totalAmount += $totalPrice;
    
            $html .= '<tr>
                        <td style="width:250px">' . $productName . '</td>
                        <td>' . htmlspecialchars($item->cart_product_quantity) . '</td>
                        <td>' . htmlspecialchars($item->Sale_ProductPrice) . '</td>
                        <td>INR ' . number_format($totalPrice, 2) . '</td>
                      </tr>';
        }
    
        $html .= '<tr>
                    <td colspan="3" class="total-label">Sub Total:</td>
                    <td>INR ' . number_format($totalAmount, 2) . '</td>
                  </tr>';
    
        $html .= !empty($order['totalDiscount']) ? '<tr><td colspan="3" class="total-label">Discount(-):</td><td>INR ' . htmlspecialchars($order['totalDiscount']) . '</td></tr>' : '';
        $html .= !empty($order['totalTax']) ? '<tr><td colspan="3" class="total-label">Tax(+):</td><td>INR ' . htmlspecialchars($order['totalTax']) . '</td></tr>' : '';
        $html .= !empty($order['totalShipingCost']) ? '<tr><td colspan="3" class="total-label">Shipping(+):</td><td>INR ' . htmlspecialchars($order['totalShipingCost']) . '</td></tr>' : '';
        $html .= !empty($order['referDis']) ? '<tr><td colspan="3" class="total-label">Referral Discount(-):</td><td>INR ' . htmlspecialchars($order['referDis']) . '</td></tr>' : '';
    
        $html .= '<tr>
                    <td colspan="3" class="total-label">Total Amount:</td>
                    <td>INR ' . htmlspecialchars($order['TotalAmount'] ?? '') . '</td>
                  </tr>';
    
        $html .= '</tbody></table></section>
         <div class="row de">                    
                    <section class="order-details col-lg-6">
                        <h4>Payment Details</h4>
                        <p><strong>Payment Method:</strong> ' . htmlspecialchars($order['payment']) . '</p>
                        <p><strong>Payment Status:</strong> ' . htmlspecialchars($order['OrderStatus']) . '</p>
                    </section>
                </div>
    
                <footer>
                    <p>For any queries, please contact us at info@Ecomweb.org</p>
                    <p>&copy; 2024 Ecomweb. All rights reserved.</p>
                </footer>
            </div></body>';
    
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
    
        $pdf_output = $dompdf->output();
        $pdf_filename = 'invoice_' . $order_id . '.pdf';
        $pdf_file_path = FCPATH . 'admin/public/invoice/' . $pdf_filename;
    
        if (!is_dir(FCPATH . 'admin/public/invoice/')) {
            mkdir(FCPATH . 'admin/public/invoice/', 0777, true);
        }
    
        file_put_contents($pdf_file_path, $pdf_output);
        return base_url('admin/public/invoice/' . $pdf_filename);
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
}