<?php

namespace App\Controllers;
use App\Controllers\Cart;
use CodeIgniter\API\ResponseTrait;
use App\Models\CountryModel;
use App\Models\StateModel;
use App\Models\CityModel;
use App\Models\Ordermodel;
use App\Models\Orderitemmodel;
use App\Models\UserModel;
use App\Models\Subcategorymodel;
use App\Models\Categorymodel;
use App\Models\Paymentgatewaymodel;
use App\Models\Paymentmodel;
use App\Models\EmailsmtpModel;
use App\Models\TaxModel;
use App\Models\User_shipping_addressmodel;
use App\Models\ShippingMethodModel;
use App\Models\shippingzonemodel;
use App\Models\shippingratemodel;
use Razorpay\Api\Api;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\PaymentExecution;
use CodeIgniter\Controller;
use Stripe\Stripe;
use App\Models\CouponModel;
use App\Models\NotificationModel;


// require_once APPPATH . 'ThirdParty/paypal/vendor/autoload.php';


class Checkout extends BaseController
{
    use ResponseTrait;
    protected $Ordermodel;
    protected $CountryModel;
    protected $StateModel;
    protected $Orderitemmodel;
    protected $UserModel;
    protected $Subcategorymodel;
    protected $Categorymodel;
    protected $emailsmtp_model;
     protected $TaxModel;
     protected $User_shipping_addressmodel;
      protected $ShippingMethodModel;
      protected $shippingzonemodel;
      protected $shippingratemodel;
     private $apiContext;
     private $paymentmodel;
     protected $CouponModel;
     protected $NotificationModel;
     

    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->Ordermodel = new Ordermodel($db);
        $this->CountryModel = new CountryModel($db);
        $this->StateModel = new StateModel($db);
        $this->CityModel = new CityModel($db);
       
        $this->Orderitemmodel = new Orderitemmodel($db);
        $this->UserModel = new UserModel($db);
        $this->Subcategorymodel = new Subcategorymodel($db);
        $this->Categorymodel = new Categorymodel($db);
        $this->Paymentgatewaymodel = new Paymentgatewaymodel($db);
        $this->emailsmtp_model = new EmailsmtpModel($db);
        $this->TaxModel = new TaxModel($db);
        $this->User_shipping_addressmodel = new User_shipping_addressmodel($db);
        $this->ShippingMethodModel = new ShippingMethodModel($db);
        $this->shippingzonemodel = new shippingzonemodel($db);
        $this->shippingratemodel = new shippingratemodel($db);
        $this->paymentmodel = new Paymentmodel($db);
        $this->CouponModel = new CouponModel($db);
        $this->NotificationModel = new NotificationModel($db);
        
        $this->apiContext = new \PayPal\Rest\ApiContext
        (
            new \PayPal\Auth\OAuthTokenCredential(
                'AZWspDqjd4Qbe4q1zpui7DkmCtleGaFg9DPLKhS4JdRDb1g9N9ESZbl_Xnk5APRslzCYuwCRglzI3Oji',     // PayPal Client ID
                'EKDw16rdkIa1SYOmX4cdAFfBzJKVweTQeAJ0iIbwuJMvSl9ZuP3okAEFv3A5x1VCsScH1KlGWjRyHUcp'  // PayPal Client Secret
            )
        );
        //  $this->apiContext = new ApiContext(
        //     new OAuthTokenCredential(
        //         'AWCKXAzgEuDM04D1TvPFXgelUGGD406NnHabDCKEv15kpPPvLmcd0ptT2G4UBDD4lZjp1Jfd6s_-VeDE',     // PayPal Client ID
        //         'EGThZg2_OkwMjrT3uW-pn8mHLymGcpgcCVpJL9aNGd21gYug5aRWikAduOETpGhEv6juFylLgVZxCaJi'  // PayPal Client Secret
        //     )
        // );
    }
    
    public function index()
    {
        // Retrieve the cart data from the session
        $cart = session()->get('cart');
        $user_id =  session()->get('user_id');
        $CartCon = new Cart();
        $CartTotals = (object) $CartCon->calculateCartTotals();
        // echo "<pre>";print_r($CartTotals);die;
        $CountryModel= new CountryModel;
        $StateModel = new StateModel;
        $CityModel = new CityModel;
        $Ordermodel = new Ordermodel;
        $Orderitemmodel = new Orderitemmodel;
        $Countries = $CountryModel->findAll();
        $States = $StateModel->findAll();
        $City = $CityModel->findAll();
        $users = $this->UserModel->where('UserID', $user_id)->first();
        // print_r($users);die;
        $user_data  = $this->User_shipping_addressmodel->where('user_id', $user_id)->first();
        $data['catdata'] = $this->Categorymodel->findAll();
        $data['subdata']=[];
        // echo "<pre>";print_r($cart); die;
       
        foreach($data['catdata'] as $cat)
        {
            //$data['subdata']=$this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $subcategories = $this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $data['subdata'][$cat['CategoryID']] = $subcategories;
        }
        
        $Paymentgateway =$this->Paymentgatewaymodel->findAll();
        $data['all_address_data'] = $this->User_shipping_addressmodel->where('user_id',$user_id)->findAll();
        $shipping_method=$this->ShippingMethodModel->findAll();
        
        return view('checkout', [
            'cart' => $cart,
            'userdata' => $users,
            'user_data' => $user_data,
            'CartTotals'=> $CartTotals,
            'Countries'=>$Countries,
            'State'=>$States,
            'City'=>$City,
            'catdata'=> $data['catdata'],
            'subdata'=> $data['subdata'],
            'paymentgateway' => $Paymentgateway,
            'all_address_data' => $data['all_address_data'],
            'shipping_method'=>$shipping_method
        ]);
    }
    
 public function get_address_data() {

$address_id = $_POST['address_id'];

// Fetch address data from the database or wherever it is stored
// Replace the following with your actual logic to fetch the address data

$get_data = $this->User_shipping_addressmodel->where('id',$address_id)->first();

// $address_data = [
//     'id' => '1',
//     'firstname' => 'John',
//     'lastname' => 'Doe',
//     'address1' => '123 Main St',
//     'country' => 'USA',
//     'state' => 'CA',
//     'city' => 'Los Angeles',
//     'zip' => '90001',
//     'phone' => '1234567890'
// ];

// Return the address data as JSON
echo json_encode($get_data);

}
// public function for_update_tax()
// {
//     // print_r('gfhhdh'); die;
    
//     // if($country==""){
//     //     $country="*";
//     // }
//     // if($state==""){
//     //     $state="*";
//     // }
//     // if($city==""){
//     //     $city="*";
//     // }
//     // if($postcode==""){
//     //     $postcode="*";
//     // }    

    
//     // $arr=[$country,$state,$city,$postcode];
//     $cart = session()->get('cart');
//     // print_r($cart); die;

//     // $all_tax_class_id=array_column($cart,'tax_class_id');
//     $all_tax_class_id = array_map(function($item) {
//     return isset($item['tax_class_id']) ? $item['tax_class_id'] : 0;
//     }, $cart);
//     // print_r($all_tax_class_id);
//     foreach($all_tax_class_id as $key=>$sigle_tax_class_id){
//         $country=isset($_POST['country']) && !empty($_POST['country']) ?$_POST['country']:'*';
//         $state=isset($_POST['state']) && !empty($_POST['state']) ?$_POST['state']:'*';
//         $city=isset($_POST['city']) && !empty($_POST['city']) ?$_POST['city']:'*';
//         $postcode=isset($_POST['postcode']) && !empty($_POST['postcode']) ? $_POST['postcode']:'*';
//         $result = array();
//         // print_r("[".$sigle_tax_class_id."]");
//         for($i=0;$i<5;$i++){
//             // print_r($i);
//             // try{
//                 // $fetch_data=$this->TaxModel->where('Country',$country)->where('State',$state)->where('City',$city)
//                 // ->where('Zip',$postcode)->where('taxe_class_id',$sigle_tax_class_id)->first();
//                 $fetch_data=$this->TaxModel->where('Country',$country)->where('State',$state)->where('City',$city)
//                 ->where('Zip',$postcode)->first();
//             // }catch(Exception $e) {
              
//             // }
//                 // if($i==4){
//                 //     print_r($this->TaxModel->getLastQuery());die;
//                 // }
//                 if($fetch_data>0){
//                     $result=$fetch_data;
//                     break;
//                 }else{ 
//                     if($i==0)
//                     {
//                         $postcode= "*";
//                     }else if($i==1){
//                         $city="*";
//                     }else if($i==2){
//                         $state="*";
//                     }else if($i==3){
//                         $country="*";
//                     }
//                 }
        
//         }
        
//         if(!empty($result)){
//             // echo"<pre>"; print_r($fetch_data);
//             $taxrate=$fetch_data['TaxRate'];
//             // print_r($taxrate);
            
//                 $cart[$key]['tax'][0] = $fetch_data;
//         }else{
//             $cart[$key]['tax'][0]['TaxRate'] = 0;
//         }
         
//     } 
    
//     // die;
//     session()->set('cart', $cart);
//     $CartTotals = (object) $this->calculateCartTotals();
//     // echo json_encode($cart);
//     // echo"<pre>";print_r($cart);
//     echo json_encode($CartTotals);
//     // die;
    
    
    
// }
public function for_update_tax()
{
    // Get the cart from the session
    $cart = session()->get('cart');
    
    // Fetch POST data with fallback to '*' if any field is empty
    $country = !empty($_POST['country']) ? $_POST['country'] : '*';
    $state = !empty($_POST['state']) ? $_POST['state'] : '*';
    $city = !empty($_POST['city']) ? $_POST['city'] : '*';
    $postcode = !empty($_POST['postcode']) ? $_POST['postcode'] : '*';

    $result = null;

    // Define an array of fields in priority order for wildcard replacement
    $fields = ['postcode', 'city', 'state', 'country'];
    $values = [$postcode, $city, $state, $country];

    // Loop to reduce specificity and try matching in order
    for ($i = 0; $i <= 4; $i++) {
        // Update the search parameters dynamically with wildcards
        $currentCountry = $i > 3 ? '*' : $values[3];
        $currentState = $i > 2 ? '*' : $values[2];
        $currentCity = $i > 1 ? '*' : $values[1];
        $currentPostcode = $i > 0 ? '*' : $values[0];
        
        // Fetch data from TaxModel based on current values
        $fetch_data = $this->TaxModel
            ->where('Country', $currentCountry)
            ->where('State', $currentState)
            ->where('City', $currentCity)
            ->where('Zip', $currentPostcode)
            ->first();

        // Break loop if tax data is found
        if ($fetch_data) {
            $result = $fetch_data;
            break;
        }
    }

    $TaxModel = new TaxModel;
    $isTaxEnabled = $TaxModel->where('is_check', 1)->countAllResults() > 0;

    // If result is found, set the tax rate in the cart, otherwise set tax rate to 0
    // foreach ($cart as $key => &$item) {
    //     if ($result) {
    //         $taxrate = $result['TaxRate'];
    //         $item['tax'][0] = $result;
    //     } else {
    //         $item['tax'][0]['TaxRate'] = 0;
    //     }
    // }

    foreach ($cart as $key => &$item) {
        if ($isTaxEnabled && $result) {
            $item['tax'][0] = $result; 
        } else {
            $item['tax'][0]['TaxRate'] = 0; 
        }
    }

    // Update the session with the modified cart data
    session()->set('cart', $cart);
    
    // Calculate cart totals and respond with JSON
    $CartTotals = (object) $this->calculateCartTotals();
    echo json_encode($CartTotals);
}

// public function for_get_shipping_data(){
//     // print_r($_POST); die;
//     $postcode=$_POST['postcode'];
//     $ship_method=$_POST['ship_method'];
//     $fetch_data = $this->shippingzonemodel->findAll();
//     $zone_id='';
//     foreach($fetch_data as $single_data){
//         $zonename=json_decode($single_data['ZoneName']);
//         // var_dump($zonename);
//         if(in_array($postcode, $zonename)){
//             // echo "match";
//             $zone_id= $single_data['ZoneID'];
            
//         }else{
//             // echo "no";
//         }
//     }
//     if(!empty($zone_id)){
//         $zone_data=$this->shippingzonemodel->where('ZoneID',$zone_id)->first();
//         $rateid=$zone_data['RateID'];
//         $rate_data=$this->shippingratemodel->where('RateID',$rateid)->where('MethodID',$ship_method)->first();
//         if($rate_data){
//             $shipping_price=$rate_data['Price'];
//         }else{
//             $shipping_price=0;
//         }
        
//         // print_r($rateid);
//     }else{
//         $shipping_price=1;
//     }
    
//     session()->set('shipping_price',$shipping_price);
//     $ship_price=session()->get('shipping_price');
//     // echo "<pre>"; print_r($ship_price);die;
    
//     $CartTotals_1 = (object) $this->calculateCartTotals();
//     echo json_encode($CartTotals_1);   
  
    
// }

// public function for_get_shipping_data(){

//     $postcode=$_POST['postcode'];
//     $ship_method=$_POST['ship_method'];
//     $fetch_data = $this->shippingzonemodel->findAll();
//     $zone_id='';
//     foreach($fetch_data as $single_data){
//         $zonename=json_decode($single_data['ZoneName']);
//         if(in_array($postcode, $zonename)){
//             $zone_id= $single_data['ZoneID'];
//         }else{
//             // echo "no";
//         }
//     }
//     if (!empty($zone_id)) {
//         // Fetch zone data and calculate shipping price
//         $zone_data = $this->shippingzonemodel->where('ZoneID', $zone_id)->first();
//         $rateid = $zone_data['RateID'] ?? null;
//         $rate_data = $this->shippingratemodel->where('RateID', $rateid)->where('MethodID', $ship_method)->first();

//         if ($rate_data) {
//             $shipping_price = $rate_data['Price'];
//         } else {
//             $shipping_price = 0;
//         }

//         // NEW LOGIC: Set shipping price to 0 if subtotal price > 1000
//         $CartTotals_1 = (object) $this->calculateCartTotals();
//         $total_price = $CartTotals_1->subtotal;
//         if ($total_price > 1000) {
//             $shipping_price = 0;
//         }
//     }else{
//         $shipping_price=1;
//     }

//     session()->set('shipping_price', $shipping_price);
    
//     $CartTotals_1 = (object) $this->calculateCartTotals();
//     echo json_encode($CartTotals_1); 
// }

public function for_get_shipping_data()
{
    $postcode = $_POST['postcode'];
    $ship_method = $_POST['ship_method'];

    // Default shipping price
    $shipping_price = 0;

    // Fetch current cart totals
    $CartTotals = (object) $this->calculateCartTotals();

    // Check if shipping is enabled
    // if ($CartTotals->isShippingEnabled == 1) {
        // Proceed only if `ship_method` is not null
        if (!is_null($ship_method)) {
            // Determine zone ID based on postcode
            $fetch_data = $this->shippingzonemodel->findAll();
            $zone_id = '';
            foreach ($fetch_data as $single_data) {
                $zonename = json_decode($single_data['ZoneName']);
                if (in_array($postcode, $zonename)) {
                    $zone_id = $single_data['ZoneID'];
                    break; // Exit loop once a matching zone is found
                }
            }

            // If a zone is found, calculate the shipping price
            if (!empty($zone_id)) {
                $zone_data = $this->shippingzonemodel->where('ZoneID', $zone_id)->first();
                $rateid = $zone_data['RateID'] ?? null;
                $rate_data = $this->shippingratemodel->where('RateID', $rateid)->where('MethodID', $ship_method)->first();

                if ($rate_data) {
                    $shipping_price = $rate_data['Price'];
                }

                // Apply free shipping if subtotal exceeds 1000
                if ($CartTotals->subtotal > 1000) {
                    $shipping_price = 0;
                }
            }else{
                    $shipping_price=1;
                }
        }
    // }

    // Save shipping price to session
    session()->set('shipping_price', $shipping_price);

    // Recalculate CartTotals including updated shipping price
    $CartTotals = (object) $this->calculateCartTotals();
    echo json_encode($CartTotals);
}



 public static function calculateCartTotals()
    {
        $cart = session()->get('cart');
        $subtotal = 0;
        $allprice_taxes = 0;
        $all_tax_name=[];
        if($cart){
            foreach ($cart as $item) {
                $pprice = $item['total'];
                $taxs = isset($item['tax'])?($item['tax']):(array());
                $price_Tax = 0;
                // if($taxs){
                //     foreach($taxs as $tax){
                //         $taxRate = $tax['TaxRate'];
                //         $price_Tax +=  $pprice * ($taxRate / 100);
                //         $tax_name=$tax['TaxName'];
                //     }
                // }
                // array_push($all_tax_name,$tax_name);
                
                // $allprice_taxes += $price_Tax;
                //$allppprice = $pprice + $price_Tax;
                $allppprice = $pprice;
                //$subtotal += $item['total'];
                $subtotal += $allppprice;
            }
        }
        
        $taxRate = 0;

         $TaxModel = new TaxModel;
         $isTaxEnabled = $TaxModel->where('is_check', 1)->countAllResults() > 0 ? 1 : 0;
 
 
         if ($isTaxEnabled) {
             $taxRate = 10;
             $tax = $subtotal * ($taxRate / 100);
         }else{
            $tax = 0;
         }
        
        
        
        $unique_all_tax_name=array_unique($all_tax_name);
        $unique_all_tax_name=array_values($unique_all_tax_name);
        $unique_all_tax_name=implode(" ,",$unique_all_tax_name);
        $DiscountPrice = 0;
        if (session()->has('couponCode')) {
            $couponCode = session()->get('couponCode');
            
            $CouponModel = new CouponModel();
            $coupon  = $CouponModel->where(['CouponLive'=>1,'CouponCode'=>$couponCode])->get()->getRow();
            //print_r( $coupon);exit();
            
            $couponDiscount = $coupon->CouponValue;
            if ($coupon->CouponType == '2') {
                $DiscountPrice = $couponDiscount;
            } else {
                $DiscountPrice =  ($subtotal * ($couponDiscount / 100));
            } 
        }
        $ship_price=session()->get('shipping_price');
        // echo "<pre>";
        if($ship_price){
            $shippingCost=$ship_price;
        }else{
            $shippingCost=0;
        }

        // $shippingCost = 10; // Assuming a fixed shipping cost of $10
        
        // $taxRate = 0.1; // Assuming a tax rate of 10%
        // $ntax = $subtotal ;

        //$totalWithShipping = ($subtotal - $DiscountPrice) + $shippingCost;
        $totalWithShipping = ($subtotal - $DiscountPrice) + $tax+$shippingCost;
        // print_r($totalWithShipping);die;

        if ($shippingCost === 1) {
            $totalWithShipping -= 1;
        }

        return [
            'subtotal' => $subtotal,
            'shippingCost' => $shippingCost,
            'tax' => round($tax,2),
            'DiscountPrice' => $DiscountPrice,
            'totalWithShipping' => $totalWithShipping,
            'all_taxname'=>$unique_all_tax_name
        ];
    }

    public function stripe_payment(){
        $out = array('status'=>0,'msg'=>'Something wrong','data'=>array());
        $stripe_public_key = 'stripe_public_key';
        $stripe_secret_key = 'stripe_secret_key';
        
        
        $paymentGatewayModel = new \App\Models\Paymentgatewaymodel();
        $paymentgateway = $paymentGatewayModel->findAll();
         
        if(!empty($paymentgateway)){
            foreach($paymentgateway as $pgateway){
             if($pgateway['status']==1){
                 
                 if($pgateway['type']==4){
                    // echo '4=strip';
                    $pdata = json_decode($pgateway['details'], true);
                    $stripe_public_key = $pdata['public_key'];
                    $stripe_secret_key = $pdata['secret_key'];
                 }
             }
            }
        }
        
        
        //\Stripe\Stripe::setApiKey('sk_test_tTBT7tdR8F3zXLzJXQYQV07r00Vyt6cdv4');
        \Stripe\Stripe::setApiKey($stripe_secret_key);
        
        $cart = session()->get('cart');
        $userid = session()->get('user_id');
        $fname = $this->request->getPost('fname');
        $lname = $this->request->getPost('lname');
        $emails = $this->request->getPost('email');
        $phoneno = $this->request->getPost('phoneno');
        $country = $this->request->getPost('CountryID');
        $state = $this->request->getPost('state-province');
        $city = $this->request->getPost('city-province');
        $address1 = $this->request->getPost('address1');
        $address2 = $this->request->getPost('address2');
        $zipcode = $this->request->getPost('postcode');
        $company = $this->request->getPost('company_name');
        $OrderDate = date('d-m-Y');
        $TotalAmount = $this->request->getPost('amount');
        $payment = $this->request->getPost('patment_method');
        $OrderStatus = 'Pending';
        $orderno = rand(10000,99999);
        
        $CartTotals = (object) $this->calculateCartTotals();
        
        // $alltax=$CartTotals->tax;
        //  $shipping_charge=$CartTotals->shippingCost;
        //  $discount=$CartTotals->DiscountPrice;

        $subtotal = $CartTotals->subtotal;
        $alltax = $CartTotals->tax;
         $shipping_charge = $CartTotals->shippingCost;
         $discount = $CartTotals->DiscountPrice;
        $totalcheck = $subtotal + $alltax + $shipping_charge - $discount;

        // echo "<pre>";
        // print_r($totalcheck);die;
         
         $tokenId =  $this->request->getPost('stripe_token_id');
         $tokenType = $this->request->getPost('stripe_token_type');
         
         $ordrdata = [
             "UserID" => $userid,
             "fname" => $fname,
             "lname" => $lname,
             "email" => $emails,
             "phoneno" => $phoneno,
             "country" => $country,
             'city' => $city,
             "state" => $state,
             "address1" => $address1,
             "address2" => $address2,
             "zipcode" => $zipcode,
             "company" => $company,
             "OrderDate" => $OrderDate,
             "TotalAmount" => $totalcheck,
             "payment" => "Stripe",
             "OrderStatus" => $OrderStatus,
             "OrderNumber" => $orderno,
             "totalTax"=>$alltax,
             "totalShipingCost"=>$shipping_charge,
             "totalDiscount"=>$discount,
             "is_read" => 0,
            ];
        
        session()->set('OrderNumber', $orderno);
        
        // Assuming you have retrieved the customer ID from your database
        $stripeCustomerId = '';//$this->getUserStripeCustomerId($userid);
        
        try {
            // Create or update the customer
            if ($stripeCustomerId) {
                // Update the existing customer with the new payment source
                $customer = \Stripe\Customer::update($stripeCustomerId, [
                    'source' => $tokenId,
                ]);
            } else {
                // Create a new customer with the payment source
                $customer = \Stripe\Customer::create([
                    'email' => $emails,
                    //'source' => $tokenId,
                ]);
                
                // Save the Stripe customer ID in your system
                //$this->saveUserStripeCustomerId($userId, $customer->id);
                
                // Attach the payment method to the customer
                $paymentMethod = \Stripe\PaymentMethod::create([
                    'type' => 'card',
                    'card' => [
                        'token' => $tokenId,
                    ],
                ]);

                // \Stripe\Customer::update($customer->id, [
                //     'invoice_settings' => [
                //         'default_payment_method' => $paymentMethod->id,
                //     ],
                // ]);
                 
                
            }
            
            // Charge the customer
            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => $TotalAmount * 100, // Amount in cents
                // 'amount' => $totalcheck, // Amount in cents
                'currency' => 'usd', // Change to your currency
                'customer' => $customer->id,
                'description' => 'Order #' . $orderno,
                'payment_method' => $paymentMethod->id, // Use the payment method ID
                'confirm' => true,
                'automatic_payment_methods' => [
                    'enabled' => true,
                    'allow_redirects' => 'never'
                ],
            ]);
            
            
            
            // Retrieve payment status details
            $paymentStatus = 'success';
            
            // print_r($paymentStatus);die;
            // Handle the payment status as needed
            if ($paymentStatus === 'success') {
                // Payment succeeded
                $ordrdata['OrderStatus'] = $paymentStatus;
                $out['status']='1';
                $out['msg']='Your order has been placed successfully.';
                $out['data']=["OrderNumber" => $orderno];
  
            } else {
                // Payment failed or requires further action
                // Check $paymentIntent->status for more details
            }
        } catch (\Stripe\Exception\CardException $e) {
            // Handle card errors
            $error = $e->getError()->message;
            $out['data']=['error' => $error];
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            // Handle invalid request errors
            $error = $e->getError()->message;
            $out['data']=['error' => $error];
            //echo json_encode(['error' => $error]);
        } catch (\Stripe\Exception\AuthenticationException $e) {
            // Handle authentication errors
            $error = $e->getError()->message;
            $out['data']=['error' => $error];
            //echo json_encode(['error' => $error]);
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            // Handle API connection errors
            $error = $e->getError()->message;
            $out['data']=['error' => $error];
            //echo json_encode(['error' => $error]);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            // Handle other API errors
            $error = $e->getError()->message;
            $out['data']=['error' => $error];
            //echo json_encode(['error' => $error]);
        }
        
        $orddata = $this->Ordermodel->insert($ordrdata);

        $orderid = $this->Ordermodel->getInsertID();

        $tras_data  = [
            "Transation_id" => "stri_" . uniqid(),
            "UserID" => $userid,
            "OrderID" => $orderid,
            "PaymentType" => "Stripe",
            "Amount" => $totalcheck,
            "PaymentDate" => date("Y-m-d H:i:s"),
            "PaymentStatus" => 'success',
            // "PaymentKey" => $orderid,
        ];
       
        

        $paydata = $this->paymentmodel->insert($tras_data);

        
        foreach($cart as $cdata)
        {$vari_d="";
            if(isset($cdata['vari_data']) && !empty($cdata['vari_data'])) {
            $vari_array=[];
            $vari_array['VariationTypeID']=array_column($cdata['vari_data'],'VariationTypeID');
            $vari_array['VariationVlueID']=array_column($cdata['vari_data'],'VariationVlueID');
            $vari_array['VariationTypeName']=array_column($cdata['vari_data'],'VariationTypeName');
            $vari_array['VariationName']=array_column($cdata['vari_data'],'VariationName');
            
           
            $vari_d=json_encode($vari_array);
        }
            $orditem=["OrderID"=> $orderid,
            "ProductID"=>$cdata['id'],
            "Quantity"=>$cdata['quantity'],
            "Price"=>$cdata['unit_price'],
            "variation_table_id"=>$cdata['variationId'],
            "variation_details"=>$vari_d
            ];
            $this->Orderitemmodel->insert($orditem);
        }
        $dt['ord']=$this->Ordermodel->where('OrderID',$orderid)->get()->getRow();
        $dt['orditm']=$this->Orderitemmodel->where('OrderID',$dt['ord']->OrderID)->get()->getResult('array');
        
        $smtp_email_data = $this->emailsmtp_model->first();

            $smtp_email_host = $smtp_email_data['host'];
            $smtp_email_username = $smtp_email_data['username'];
            $smtp_email = $smtp_email_data['email'];
            $smtp_email_password = $smtp_email_data['password'];
            $smtp_email_port = $smtp_email_data['port'];
            $smtp_email_protocol = $smtp_email_data['protocol'];
            
            $tomail=$emails;
        
           $email = \Config\Services::email();
           
            $email->initialize([
                        'protocol' => 'smtp',
                        'SMTPHost' => $smtp_email_host,
                        'SMTPUser' => $smtp_email,
                        'SMTPPass' => $smtp_email_password,
                        'SMTPPort' => $smtp_email_port,  // Adjust the port as needed
                        'SMTPCrypto' => $smtp_email_protocol,  // Use 'tls' or 'ssl' based on your SMTP server configuration
            ]);

            // $from='fableadtechnolabs.com';
              $from=$smtp_email;
            $subject='New order confirmation';
    	   
            
            // $email->initialize($config);
            $email->setTo($tomail);
            // $email->setFrom('fableadtechnolabs.com', 'Order detail');
              $email->setFrom($smtp_email, 'Ecom');
           
            $email->setSubject($subject);
                
            $email->setmailType('html');
            
            // $messages = "<html><body>";
            // $messages .= "<h2 style='text-decoration:unset; color:black!important;'>Order details</h2>";
                       
            // $messages .= "</body></html>";
            $body = view('sentmaildata', $dt);
           
            $email->setMessage($body);
            
           if($email->send()) 
    		{
               // echo 1;
            } 
            else 
            {
            }
        
        echo json_encode($out);

    }
    public function saveUserStripeCustomerId($userId, $stripeCustomerId) {
        // Replace this with your logic to save the Stripe customer ID in your database
        // For example, you might update the users table with the Stripe customer ID
        // This is just a placeholder function
    }
    
    public function stripe_order_success()
    {
        $orderNumber = $this->request->getGet('OrderNumber'); 
        $data['ord'] = array();
        $data['orditm'] = array();
        $data['catdata'] = array();
        $data['subdata'] = array();
        if($orderNumber){
            $data['ord']=$this->Ordermodel->where('OrderNumber', $orderNumber)->orderBy('OrderID','DESC')->limit(1)->get()->getRow();
            $data['orditm'] = $this->Orderitemmodel->where('OrderID', $data['ord']->OrderID)->get()->getResult('array');
            $data['catdata'] = $this->Categorymodel->findAll();
            $data['subdata']=[];
            foreach($data['catdata'] as $cat)
            {
                //$data['subdata']=$this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
                $subcategories = $this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
                $data['subdata'][$cat['CategoryID']] = $subcategories;
            }
            session()->remove('cart');
            session()->remove('OrderNumber');
            session()->remove('couponCode');
            session()->remove('shipping_price');
        }
       
        echo view('stripe_payment_success',[
            'ord' => $data['ord'],
            'orditm'=>$data['orditm'],
            'catdata'=> $data['catdata'],
            'subdata'=> $data['subdata']
        ]);
    }

    public function cod_order_success()
    {
        
        $orderNumber = $this->request->getGet('OrderNumber'); 
        $data['ord'] = array();
        $data['orditm'] = array();
        $data['catdata'] = array();
        $data['subdata'] = array();
        if($orderNumber){
            $data['ord']=$this->Ordermodel->where('OrderNumber', $orderNumber)->orderBy('OrderID','DESC')->limit(1)->get()->getRow();
            $data['orditm'] = $this->Orderitemmodel->where('OrderID', $data['ord']->OrderID)->get()->getResult('array');
            $data['catdata'] = $this->Categorymodel->findAll();
            $data['subdata']=[];
            foreach($data['catdata'] as $cat)
            {
                //$data['subdata']=$this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
                $subcategories = $this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
                $data['subdata'][$cat['CategoryID']] = $subcategories;
            }
            session()->remove('cart');
            session()->remove('OrderNumber');
            session()->remove('couponCode');
            session()->remove('shipping_price');
        }
       
        echo view('cod_order_success',[
            'ord' => $data['ord'],
            'orditm'=>$data['orditm'],
            'catdata'=> $data['catdata'],
            'subdata'=> $data['subdata']
        ]);
    }
    
    public function razorpay_payment()
    {
            $session = session();
            if (!empty($this->request->getPost('razorpay_payment_id')) && !empty($this->request->getPost('merchant_order_id'))) {

        		$razorpay_payment_id = $this->request->getPost('razorpay_payment_id');
                $merchant_order_id 	= $this->request->getPost('merchant_order_id');
                
                $CartTotals = (object) $this->calculateCartTotals();
                
                $alltax=$CartTotals->tax;
                $subtotal=$CartTotals->subtotal;
                $shipping_charge=$CartTotals->shippingCost;
                $discount=$CartTotals->DiscountPrice;
                $totalcheck=$subtotal+$alltax+$shipping_charge-$discount;
                
                $session->set('razorpay_payment_id', $this->request->getPost('razorpay_payment_id'));
                $session->set('merchant_order_id', $this->request->getPost('merchant_order_id'));
                $currency_code = 'INR';
                $amount = $this->request->getPost('amount');
                
                // $amount = intval(100*$amount, 10);

                // Check if the amount is already in the smallest unit
                // if ($amount > 0 && strpos($amount, '.') !== false) {
                //     $amount = intval(100 * floatval($amount), 10); // Convert to paise/cents
                // } else {
                //     $amount = intval($amount, 10); // Already in smallest unit
                // }
                
                if ($amount > 0) {
                    $amount = floatval($amount); // Ensure it's a float without converting to the smallest unit
                }
                
                $success = false;
                $error = '';
                try {                
                    $ch = $this->razorpay_curl_handler($razorpay_payment_id, $amount);
                    //execute post
                    // print_r($ch);die;
                    $result = curl_exec($ch);
                    //   print_r($result);die;
                    $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                    if ($result === false) {
                        $success = false;
                        $error = 'Curl error: '.curl_error($ch);
                    } else {
                        $response_array = json_decode($result, true);
                        
                            //Check success response
                            if ($http_status === 200 and isset($response_array['error']) === false) {
                                $success = true;
                            } else {
                                $success = false;
                                if (!empty($response_array['error']['code'])) {
                                    $error = $response_array['error']['code'].':'.$response_array['error']['description'];
                                } else {
                                    $error = 'RAZORPAY_ERROR:Invalid Response <br/>'.$result;
                                }
                            }
                    }
                    curl_close($ch);
                } catch (Exception $e) {
                    $success = false;
                    $error = 'Request to Razorpay Failed';
                }

                if ($success == true) {
                    if(!empty($session->get('ci_subscription_keys'))) {
                        $session->unset('ci_subscription_keys');
                    }
                        $cart = session()->get('cart');
                        $userid = session()->get('user_id');
                        $fname = $this->request->getPost('fname');
                        $lname = $this->request->getPost('lname');
                        $emails = $this->request->getPost('email');
                        $phoneno = $this->request->getPost('phoneno');
                        $country = $this->request->getPost('CountryID');
                        $state = $this->request->getPost('state-province');
                        $city = $this->request->getPost('city-province');
                        $address1 = $this->request->getPost('address1');
                        $address2 = $this->request->getPost('address2');
                        $zipcode = $this->request->getPost('postcode');
                        $company = $this->request->getPost('company_name');
                        $OrderDate = date('d-m-Y');
                        $TotalAmount = $this->request->getPost('amount');
                        $payment = $this->request->getPost('patment_method');
                        $OrderStatus = 'Pending';
                        $orderno = rand(10000,99999);
                        
                        $CartTotals = (object) $this->calculateCartTotals();
                        $alltax=$CartTotals->tax;
                        $subtotal=$CartTotals->subtotal;
                        $shipping_charge=$CartTotals->shippingCost;
                        $discount=$CartTotals->DiscountPrice;
                        $totalcheck=$subtotal+$alltax+$shipping_charge-$discount;
                        
                        $ordrdata=[
                            "UserID"=>$userid,
                            "fname"=>$fname,
                            "lname"=>$lname,
                            "email"=>$emails,
                            "phoneno"=>$phoneno,
                            "country"=>$country,
                            'city'=>$city,
                            "state"=>$state,
                            "address1"=>$address1,
                            "address2"=>$address2,
                            "zipcode"=>$zipcode,
                            "company"=>$company,
                            "OrderDate"=>$OrderDate,
                            "TotalAmount"=>$totalcheck,
                            "payment"=>"RazorPay",
                            "OrderStatus"=>$OrderStatus,
                            "OrderNumber"=>$orderno,
                            "is_read" => 0,
                        ];
                        
                        $orddata = $this->Ordermodel->insert($ordrdata);

                        $tras_data  = [
                            "Transation_id" => "raz_" . uniqid(),
                            "UserID" => $userid,
                            "OrderID" => $orddata,
                            "PaymentType" => "RazorPay",
                            "Amount" => $totalcheck,
                            "PaymentDate" => date("Y-m-d H:i:s"),
                            "PaymentStatus" => 'success',
                        ];
                       
                        $paydata = $this->paymentmodel->insert($tras_data);

                        foreach($cart as $cdata)
                            {$vari_d="";
                                if(isset($cdata['vari_data']) && !empty($cdata['vari_data'])) {
                                $vari_array=[];
                                $vari_array['VariationTypeID']=array_column($cdata['vari_data'],'VariationTypeID');
                                $vari_array['VariationVlueID']=array_column($cdata['vari_data'],'VariationVlueID');
                                $vari_array['VariationTypeName']=array_column($cdata['vari_data'],'VariationTypeName');
                                $vari_array['VariationName']=array_column($cdata['vari_data'],'VariationName');
                            
                                $vari_d=json_encode($vari_array);
                            }
                                $orditem=["OrderID"=> $orddata,
                                "ProductID"=>$cdata['id'],
                                "Quantity"=>$cdata['quantity'],
                                "Price"=>$cdata['unit_price'],
                                "variation_table_id"=>$cdata['variationId'],
                                "variation_details"=>$vari_d
                                ];
                                $this->Orderitemmodel->insert($orditem);
                            }
                        
                       //OrderNumber
                       $surl = base_url().'checkout/razorpay_payment_success?OrderNumber='.$orderno;
                        return redirect()->to($surl);
                        } else {
                            $furl = base_url().'checkout/razorpay_payment_faild';
                            return redirect()->to($furl);
                        }
                	} else {
                        echo 'An error occured. Contact site administrator, please!';
                    }
            
                    $data['catdata'] = $this->Categorymodel->findAll();
                    $data['subdata']=[];
                    foreach($data['catdata'] as $cat)
                    {
                        $subcategories = $this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
                        $data['subdata'][$cat['CategoryID']] = $subcategories;
                    }
                    echo view('razorpay_payment_success',[
                    'ord' => $data['ord'],
                    'ordedata'=>$data['ordedata'],
                    'catdata'=> $data['catdata'],
                    'subdata'=> $data['subdata']
                ]);
            }
   
    public function razorpay_payment_success()  
    {
        
        $orderNumber = $this->request->getGet('OrderNumber'); 
        $data['ord'] = array();
        $data['orditm'] = array();
        $data['catdata'] = array();
        $data['subdata'] = array();
        if($orderNumber){
            $data['ord']=$this->Ordermodel->where('OrderNumber', $orderNumber)->orderBy('OrderID','DESC')->limit(1)->get()->getRow();
            $data['orditm'] = $this->Orderitemmodel->where('OrderID', $data['ord']->OrderID)->get()->getResult('array');
            $data['catdata'] = $this->Categorymodel->findAll();
            $data['subdata']=[];
            foreach($data['catdata'] as $cat)
            {
                //$data['subdata']=$this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
                $subcategories = $this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
                $data['subdata'][$cat['CategoryID']] = $subcategories;
            }
            session()->remove('cart');
            session()->remove('OrderNumber');
            session()->remove('couponCode');
            session()->remove('shipping_price');
        }
       
        echo view('stripe_payment_success',[
            'ord' => $data['ord'],
            'orditm'=>$data['orditm'],
            'catdata'=> $data['catdata'],
            'subdata'=> $data['subdata']
        ]);
        
    }
    
    public function razorpay_payment_faild(){
    
            $data['catdata'] = $this->Categorymodel->findAll();
            $data['subdata']=[];
            foreach($data['catdata'] as $cat)
            {
                //$data['subdata']=$this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
                $subcategories = $this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
                $data['subdata'][$cat['CategoryID']] = $subcategories;
            }
        echo view('razorpay_payment_faild',[
            'catdata'=> $data['catdata'],
            'subdata'=> $data['subdata']
        ]);
    }
    
    private function razorpay_curl_handler($payment_id, $amount)  {
    $key_id = "rzp_test_9UrkTeo8gsGo77";
    $key_secret = "rOG3EgOvfgOTlRIPSvjuFn8T";
    
    // Fetch Payment Gateway details from the database
    $paymentGatewayModel = new \App\Models\Paymentgatewaymodel();
    $paymentgateway = $paymentGatewayModel->findAll();
    
    if (!empty($paymentgateway)) {
        foreach ($paymentgateway as $pgateway) {
            if ($pgateway['status'] == 1 && $pgateway['type'] == 5) {
                $pdata = json_decode($pgateway['details'], true);
                $key_id = 'rzp_test_9UrkTeo8gsGo77';
                $key_secret = 'rOG3EgOvfgOTlRIPSvjuFn8T';
            }
        }
    }
    
    $url = 'https://api.razorpay.com/v1/payments/' . $payment_id . '/capture';
    $fields_string = "amount=$amount";
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_USERPWD, $key_id . ':' . $key_secret); // Set Razorpay credentials
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true); // Verify SSL
    
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/x-www-form-urlencoded'
    ));
    
    return $ch;
}
    


    public function placeOrder()
    {
        $out = array('status'=>0,'msg'=>'Something wrong','data'=>array());
      
        $cart = session()->get('cart');
        $userid = session()->get('user_id');
        // echo "<pre>";
        // print_r($cart);
        // echo "<pre>";
        //  print_r( session()->get('shipping_price'));die;
         
        $fname = $this->request->getPost('fname');
        $lname = $this->request->getPost('lname');
        $emails = $this->request->getPost('email');
        $phoneno = $this->request->getPost('phoneno');
        $country = $this->request->getPost('CountryID');
        $state = $this->request->getPost('state-province');
        $city = $this->request->getPost('city-province');
        $address1 = $this->request->getPost('address1');
        $address2 = $this->request->getPost('address2');
        $zipcode = $this->request->getPost('postcode');
        $company = $this->request->getPost('company_name');
        $OrderDate = date('d-m-Y');
        $TotalAmount = $this->request->getPost('amount');
        $payment = $this->request->getPost('patment_method');
        $OrderStatus = 'Pending';
        $orderno = rand(10000,99999);
        
        $CartTotals = (object) $this->calculateCartTotals();
        // echo "<pre>";
        // print_r($CartTotals);
         $alltax=$CartTotals->tax;
         $subtotal=$CartTotals->subtotal;
         $shipping_charge=$CartTotals->shippingCost;
         $discount=$CartTotals->DiscountPrice;
        $totalcheck=$subtotal+$alltax+$shipping_charge-$discount;
        $ordrdata=[
            "UserID"=>$userid,
            "fname"=>$fname,
            "lname"=>$lname,
            "email"=>$emails,
            "phoneno"=>$phoneno,
            "country"=>$country,
            'city'=>$city,
            "state"=>$state,
            "address1"=>$address1,
            "address2"=>$address2,
            "zipcode"=>$zipcode,
            "company"=>$company,
            "OrderDate"=>$OrderDate,
            "TotalAmount"=>$totalcheck,
            "payment"=>"Cash On Delivery",
            "OrderStatus"=>$OrderStatus,
            "OrderNumber"=>$orderno,
            "totalTax"=>$alltax,
            "totalShipingCost"=>$shipping_charge,
            "totalDiscount"=>$discount,
            "is_read" => 0,
        ];

        //  echo "<pre>";
        // print_r($ordrdata);
        // die;

        $orddata = $this->Ordermodel->insert($ordrdata);

        $orderid = $this->Ordermodel->getInsertID();

        $tras_data  = [
            "Transation_id" => "cod_" . uniqid(),
            "UserID" => $userid,
            "OrderID" => $orderid,
            "PaymentType" => "Cash On Delivery",
            "Amount" => $TotalAmount,
            "PaymentDate" => date("Y-m-d H:i:s"),
            "PaymentStatus" => $OrderStatus,
            // "PaymentKey" => $orderid,
        ];
       
        
        $paydata = $this->paymentmodel->insert($tras_data);

        
        if($orderid){
            $ordrdata['OrderStatus'] = $OrderStatus;
            $out['status']='1';
            $out['msg']='Your order has been placed successfully.';
            $out['data']=["OrderNumber" => $orderno];
        }
        
        foreach($cart as $cdata)
        { $vari_d="";
            if(isset($cdata['vari_data']) && !empty($cdata['vari_data'])) {
            $vari_array=[];
            $vari_array['VariationTypeID']=array_column($cdata['vari_data'],'VariationTypeID');
            $vari_array['VariationVlueID']=array_column($cdata['vari_data'],'VariationVlueID');
            $vari_array['VariationTypeName']=array_column($cdata['vari_data'],'VariationTypeName');
            $vari_array['VariationName']=array_column($cdata['vari_data'],'VariationName');
            
           
            $vari_d=json_encode($vari_array);
        }
            $orditem=[
                "OrderID"=> $orderid,
                "ProductID"=>$cdata['id'],
                "Quantity"=>$cdata['quantity'],
                "Price"=>$cdata['unit_price'],
                "variation_table_id"=>$cdata['variationId'],
                "variation_details"=>$vari_d
            ];
            $this->Orderitemmodel->insert($orditem);
        }
       
       $dt['ord']=$this->Ordermodel->where('OrderID',$orderid)->get()->getRow();

       $dt['orditm']=$this->Orderitemmodel->where('OrderID',$dt['ord']->OrderID)->get()->getResult('array');
       
       $smtp_email_data = $this->emailsmtp_model->first();

            $smtp_email_host = $smtp_email_data['host'];
            $smtp_email_username = $smtp_email_data['username'];
            $smtp_email = $smtp_email_data['email'];
            $smtp_email_password = $smtp_email_data['password'];
            $smtp_email_port = $smtp_email_data['port'];
            $smtp_email_protocol = $smtp_email_data['protocol'];
            
            $tomail=$emails;
        
           $email = \Config\Services::email();
           
            $email->initialize([
                        'protocol' => 'smtp',
                        'SMTPHost' => $smtp_email_host,
                        'SMTPUser' => $smtp_email,
                        'SMTPPass' => $smtp_email_password,
                        'SMTPPort' => $smtp_email_port,  // Adjust the port as needed
                        'SMTPCrypto' => $smtp_email_protocol,  // Use 'tls' or 'ssl' based on your SMTP server configuration
            ]);

            // $from='fableadtechnolabs.com';
              $from=$smtp_email;
            $subject='New order confirmation';
    	   
            
            // $email->initialize($config);
            $email->setTo($tomail);
            // $email->setFrom('fableadtechnolabs.com', 'Order detail');
              $email->setFrom($smtp_email, 'Ecom');
           
            $email->setSubject($subject);
                
            $email->setmailType('html');
            
            // $messages = "<html><body>";
            // $messages .= "<h2 style='text-decoration:unset; color:black!important;'>Order details</h2>";
                       
            // $messages .= "</body></html>";
            $body = view('sentmaildata', $dt);
           
            $email->setMessage($body);
            
           if($email->send()) 
    		{
               // echo 1;
            } 
            else 
            {
            }
               
        echo json_encode($out);   
    }

    public function get_state()
    {
        $CountryID = $this->request->getVar('CountryID'); 
        $StateModel = new StateModel();
        $satats = $StateModel->where('CountryID',$CountryID)->findAll();
        echo json_encode($satats);
    }

    public function payment_success()
    {
        $session = \Config\Services::session();
        $cart = array();
        if ($session->has('cart')) {
            
            $cart = $session->get('cart');
            
        }
        
        //$cart = $this->session->userdata('cart');
        $userid = session()->get('user_id');
        $fname = $this->request->getGet('first_name');
        $lname = $this->request->getGet('last_name');
        $emails = $this->request->getGet('payer_email');
        $phoneno = $this->request->getGet('phone_number');
        $country = $this->request->getGet('address_country_code');
        $state = $this->request->getGet('address_state');
        $city = $this->request->getGet('address_city');
        $address1 = $this->request->getGet('address_name');
        $address2 = $this->request->getGet('address_city');
        $zipcode = $this->request->getGet('address_zip');
        $company = $this->request->getGet('company');
        $OrderDate = $this->request->getGet('payment_date');
        $TotalAmount = $this->request->getGet('amt');
        $payment = 'Paypal';
        $OrderStatus = $this->request->getGet('st');
        $orderno = rand(10000,99999);
        
         $CartTotals = (object) $this->calculateCartTotals();
         $alltax=$CartTotals->tax;
         $shipping_charge=$CartTotals->shippingCost;
         $discount=$CartTotals->DiscountPrice;

        $ordrdata=[
            "UserID"=>$userid,
            "fname"=>$fname,
            "lname"=>$lname,
            "email"=>$emails,
            "phoneno"=>$phoneno,
            "country"=>$country,
            "state"=>$state,
            "city"=>$city,
            "address1"=>$address1,
            "address2"=>$address2,
            "zipcode"=>$zipcode,
            "company"=>$company,
            "OrderDate"=>$OrderDate,
            "TotalAmount"=>$TotalAmount,
            "payment"=>$payment,
            "OrderStatus"=>$OrderStatus,
            "OrderNumber"=>$orderno,
            "totalTax"=>$alltax,
            "totalShipingCost"=>$shipping_charge,
            "totalDiscount"=>$discount,
            "is_read" => 0,
        ];
        
        $orddata = $this->Ordermodel->insert($ordrdata);

        $orderid = $this->Ordermodel->getInsertID();

        $tras_data  = [
            "Transation_id" => "cod_" . uniqid(),
            "UserID" => $userid,
            "OrderID" => $orderid,
            "PaymentType" => "Paypal",
            "Amount" => $TotalAmount,
            "PaymentDate" => date("Y-m-d H:i:s"),
            "PaymentStatus" => 'success',
            // "PaymentKey" => $orderid,
        ];
       
        

        $paydata = $this->paymentmodel->insert($tras_data);

        
        foreach($cart as $cdata)
        { $vari_d="";
            if(isset($cdata['vari_data']) && !empty($cdata['vari_data'])) {
            $vari_array=[];
            $vari_array['VariationTypeID']=array_column($cdata['vari_data'],'VariationTypeID');
            $vari_array['VariationVlueID']=array_column($cdata['vari_data'],'VariationVlueID');
            $vari_array['VariationTypeName']=array_column($cdata['vari_data'],'VariationTypeName');
            $vari_array['VariationName']=array_column($cdata['vari_data'],'VariationName');
            $vari_d=json_encode($vari_array);
        }
            $orditem=["OrderID"=> $orderid,
            "ProductID"=>$cdata['id'],
            "Quantity"=>$cdata['quantity'],
            "Price"=>$cdata['unit_price'],
            "variation_table_id"=>$cdata['variationId'],
            "variation_details"=>$vari_d
            ];
            $this->Orderitemmodel->insert($orditem);
        }
        $dt['ord']=$this->Ordermodel->where('OrderID',$orderid)->get()->getRow();
       $dt['orditm']=$this->Orderitemmodel->where('OrderID',$dt['ord']->OrderID)->get()->getResult('array');
       
        $smtp_email_data = $this->emailsmtp_model->first();
            
        $smtp_email_host = $smtp_email_data['host'];
        $smtp_email_username = $smtp_email_data['username'];
        $smtp_email = $smtp_email_data['email'];
        $smtp_email_password = $smtp_email_data['password'];
        $smtp_email_port = $smtp_email_data['port'];
        $smtp_email_protocol = $smtp_email_data['protocol'];
            
            
        $tomail=$emails;
            
        $email = \Config\Services::email();
    
        $email->initialize([
                'protocol' => 'smtp',
                'SMTPHost' => $smtp_email_host,
                'SMTPUser' => $smtp_email,
                'SMTPPass' => $smtp_email_password,
                'SMTPPort' => $smtp_email_port,  // Adjust the port as needed
                'SMTPCrypto' => $smtp_email_protocol,  // Use 'tls' or 'ssl' based on your SMTP server configuration
        ]);



            // $from='fableadtechnolabs.com';
             $from=$smtp_email;
            $subject='New order confirmation';
    	   
            
          
            // $email->initialize($config);
            $email->setTo($tomail);
            // $email->setFrom('fableadtechnolabs.com', 'Order detail');
            $email->setFrom($smtp_email, 'ECOM');
           
            $email->setSubject($subject);
                
            $email->setmailType('html');
            
            $body = view('sentmaildata', $dt);
           
            $email->setMessage($body);
            
           if($email->send()) 
    		{
                echo 1;
            } 
            else 
            {
                // $data = $email->printDebugger(['headers']);
                //print_r($data);
            }
            
        session()->remove('cart');
        session()->remove('shipping_price');
        $dt['ord']=$this->Ordermodel->orderBy('OrderID','DESC')->limit(1)->get()->getRow();
        $dt['catdata'] = $this->Categorymodel->findAll();
        $dt['subdata']=[];
        foreach($dt['catdata'] as $cat)
        {
            //$data['subdata']=$this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $subcategories = $this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $dt['subdata'][$cat['CategoryID']] = $subcategories;
        }
        
        echo view('payment_success',$dt);
    }
    
    
    public function payment_cancel()
    {
        echo view('payment_cancel');
    }
    
    public function order_success()
    {
        session()->remove('cart');
        session()->remove('shipping_price');
        $data['ord']=$this->Ordermodel->orderBy('OrderID','DESC')->limit(1)->get()->getRow();
        $data['ordedata'] = $this->Orderitemmodel->where('OrderID', $data['ord']->OrderID)->get()->getResult('array');
        $data['catdata'] = $this->Categorymodel->findAll();
        $data['subdata']=[];
        foreach($data['catdata'] as $cat)
        {
            //$data['subdata']=$this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $subcategories = $this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $data['subdata'][$cat['CategoryID']] = $subcategories;
        }
        echo view('order_success',[
            'ord' => $data['ord'],
            'ordedata'=>$data['ordedata'],
            'catdata'=> $data['catdata'],
            'subdata'=> $data['subdata']
        ]);
    }
    
    
    public function checkout_login()
    {
        $session = session();
        $emails = $this->request->getPost('emailids');
        $pass = md5($this->request->getPost('passwords'));
       
        $logdata = $this->UserModel->where('UserEmail',$emails)->where('UserPassword',$pass)->where('UserType',2)->first();
        if(!empty($logdata))
        {
            $ses_data = [
                    'user_id'       => $logdata['UserID'],
                    'email'     => $logdata['UserEmail'],
                    'type'        => $logdata['UserType'],
                    'logged_in'     => TRUE
                ];
                
                $session->set($ses_data);
            echo '2';
        }
        else 
        {
            echo '0';
        }
    }
    
//   public function createPayment()
//     {
        
//         $session = session();
        
//         // $amountValue = $this->request->getPost('amount');
//         $amountValue = $this->request->getPost("10.00");
        
        
        
//         $payer = new Payer();
//         $payer->setPaymentMethod("paypal");
//         // print_r('wewe');die;

//         $amount = new Amount();
//         $amount->setCurrency("USD")
//             ->setTotal("10.00"); 

//         $transaction = new Transaction();
//         $transaction->setAmount($amount)
//             ->setDescription("Payment description");

//         $redirectUrls = new RedirectUrls();
//         $redirectUrls->setReturnUrl(base_url("paypal/executePayment"))
//             ->setCancelUrl(base_url("paypal/cancelPayment"));
//             $payment = new Payment();
//             $payment->setIntent("sale")
//             ->setPayer($payer)
//             ->setTransactions(array($transaction))
//             ->setRedirectUrls($redirectUrls);
//             // echo '<pre>';
            
//              $data =    $payment->create($this->apiContext);
//              if ($data) {
//                 return redirect()->to($payment->getApprovalLink()); 
//              }
             
      
//             return $this->response->setJSON(['error' => "getMessage"()]);
        
//     }
    public function createPayment()
    {
        $session = session();
        
        // Retrieve POST data and store in session
        $session->set('fname', $this->request->getPost('fname'));
        $session->set('lname', $this->request->getPost('lname'));
        $session->set('email', $this->request->getPost('email'));
        $session->set('phoneno', $this->request->getPost('phoneno'));
        $session->set('CountryID', $this->request->getPost('CountryID'));
        $session->set('state_province', $this->request->getPost('state-province'));
        $session->set('city', $this->request->getPost('city-province'));
        $session->set('address1', $this->request->getPost('address1'));
        $session->set('address2', $this->request->getPost('address2'));
        $session->set('postcode', $this->request->getPost('postcode'));
        $session->set('company_name', $this->request->getPost('company_name'));
        // $session->set('amount', $this->request->getPost('amount'));
        // ------------
        $CartTotals = (object) $this->calculateCartTotals();
        $alltax=$CartTotals->tax;
         $subtotal=$CartTotals->subtotal;
         $shipping_charge=$CartTotals->shippingCost;
         $discount=$CartTotals->DiscountPrice;
        $totalcheck=$subtotal+$alltax+$shipping_charge-$discount;
        // ==========================
        $session->set('OrderDate', date('d-m-Y'));
        $session->set('OrderStatus', 'Pending');
        $session->set('OrderNumber', rand(10000, 99999));

        $amountValue = $totalcheck;

        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        // Set amount and currency
        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal($amountValue); 

        // Set transaction
        $transaction = new Transaction();
        $transaction->setAmount($amount)
                    ->setDescription("Payment for order");

        // Set return and cancel URLs
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(base_url("paypal/executePayment"))  // Success page
                    ->setCancelUrl(base_url("paypal/cancelPayment"));  // Cancel page

        // Create the payment
        $payment = new Payment();
        $payment->setIntent("sale")
                ->setPayer($payer)
                ->setTransactions([$transaction])
                ->setRedirectUrls($redirectUrls);

        try {
            // Create payment and get the approval link
            $payment->create($this->apiContext);

            // Instead of redirecting here, return the approval URL
            return $this->response->setJSON(['approval_url' => $payment->getApprovalLink()]);
            
        } catch (Exception $ex) {
            // Handle any errors (log them for debugging)
            return $this->response->setJSON(['error' => $ex->getMessage()]);
        }
    }


    public function executePayment()
    {
        $session = session();
        $paymentId = $this->request->getGet('paymentId');
        $payerId = $this->request->getGet('PayerID');
        
        $payment = Payment::get($paymentId, $this->apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);
        
        try {
            $result = $payment->execute($execution, $this->apiContext);
            
            if ($result) {
                // Payment successful, save order data
                $cart = session()->get('cart');
                $userid = $session->get('user_id');
                
                $CartTotals = (object) $this->calculateCartTotals();
                // echo "<pre>";
                // print_r($CartTotals);
                $alltax=$CartTotals->tax;
                $subtotal=$CartTotals->subtotal;
                $shipping_charge=$CartTotals->shippingCost;
                $discount=$CartTotals->DiscountPrice;
                $totalcheck=$subtotal+$alltax+$shipping_charge-$discount;
                
                // Prepare order data array
                $ordrdata = [
                    "UserID" => $userid,
                    "fname" => $session->get('fname'),
                    "lname" => $session->get('lname'),
                    "email" => $session->get('email'),
                    "phoneno" => $session->get('phoneno'),
                    "country" => $session->get('CountryID'),
                    "city" => $session->get('city'),
                    "state" => $session->get('state_province'),
                    "address1" => $session->get('address1'),
                    "address2" => $session->get('address2'),
                    "zipcode" => $session->get('postcode'),
                    "company" => $session->get('company_name'),
                    "OrderDate" => $session->get('OrderDate'),
                    "TotalAmount" => $totalcheck,
                    "payment" => 'PayPal',  // Payment method
                    "OrderStatus" => $session->get('OrderStatus'),
                    "OrderNumber" => $session->get('OrderNumber'),
                    "totalTax"=>$alltax,
                    "totalShipingCost"=>$shipping_charge,
                    "totalDiscount"=>$discount
                ];
                $orderno = $session->get('OrderNumber');

                // Insert order into database
                $order_id = $this->Ordermodel->insert($ordrdata);

                $tras_data  = [
                    "Transation_id" => "paypal_" . uniqid(),
                    "UserID" => $userid,
                    "OrderID" => $order_id,
                    "PaymentType" => "PayPal",
                    "Amount" => $totalcheck,
                    "PaymentDate" => date("Y-m-d H:i:s"),
                    // "PaymentStatus" => $session->get('OrderStatus'),
                    "PaymentStatus" => 'success',
                    // "PaymentKey" => $orderid,
                ];
               
                
        
                $paydata = $this->paymentmodel->insert($tras_data);

                

                foreach($cart as $cdata)
                { $vari_d="";
                    if(isset($cdata['vari_data']) && !empty($cdata['vari_data'])) {
                    $vari_array=[];
                    $vari_array['VariationTypeID']=array_column($cdata['vari_data'],'VariationTypeID');
                    $vari_array['VariationVlueID']=array_column($cdata['vari_data'],'VariationVlueID');
                    $vari_array['VariationTypeName']=array_column($cdata['vari_data'],'VariationTypeName');
                    $vari_array['VariationName']=array_column($cdata['vari_data'],'VariationName');
                    $vari_d=json_encode($vari_array);
                }
                    $orditem=["OrderID"=> $order_id,
                    "ProductID"=>$cdata['id'],
                    "Quantity"=>$cdata['quantity'],
                    "Price"=>$cdata['unit_price'],
                    "variation_table_id"=>$cdata['variationId'],
                    "variation_details"=>$vari_d
                    ];
                    $this->Orderitemmodel->insert($orditem);
                }
                
                // Redirect to success page
                return redirect()->to(base_url().'checkout/paypal_payment_success?OrderNumber='.$orderno);
            }

        } catch (Exception $ex) {
            // Handle error if payment execution fails
            return $this->response->setJSON(['error' => $ex->getMessage()]);
        }
    }


    // Method for payment cancellation
    public function cancelPayment()
    {
        return redirect()->to(base_url().'checkout/paypal_payment_fail');
    }

    public function paypal_payment_success()
    {
         $orderNumber = $this->request->getGet('OrderNumber'); 
        $data['ord'] = array();
        $data['orditm'] = array();
        $data['catdata'] = array();
        $data['subdata'] = array();
        if($orderNumber){
            $data['ord']=$this->Ordermodel->where('OrderNumber', $orderNumber)->orderBy('OrderID','DESC')->limit(1)->get()->getRow();
            $data['orditm'] = $this->Orderitemmodel->where('OrderID', $data['ord']->OrderID)->get()->getResult('array');
            $data['catdata'] = $this->Categorymodel->findAll();
            $data['subdata']=[];
            foreach($data['catdata'] as $cat)
            {
                //$data['subdata']=$this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
                $subcategories = $this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
                $data['subdata'][$cat['CategoryID']] = $subcategories;
            }
            session()->remove('cart');
            session()->remove('OrderNumber');
            session()->remove('couponCode');
            session()->remove('shipping_price');
        }
       
        echo view('stripe_payment_success',[
            'ord' => $data['ord'],
            'orditm'=>$data['orditm'],
            'catdata'=> $data['catdata'],
            'subdata'=> $data['subdata']
        ]);
    }
}