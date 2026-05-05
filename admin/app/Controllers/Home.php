<?php

namespace App\Controllers;


use App\Models\UserModel;
use App\Models\CountryModel;
use App\Models\StateModel;
use App\Models\CityModel;
use App\Models\catagorymodel;
use App\Models\Ordermodel;
use App\Models\productmodel;
use App\Models\EmailsmtpModel;
use App\Models\BlogModel;
use App\Models\EnquiryModel;
use App\Models\Allsettingsmodel;





class Home extends BaseController
{

    protected $catagory; 
    protected $country_modal; 
    protected $state_modal; 
    protected $city_modal; 
    protected $order_modal;
    protected $product_model;
    protected $emailsmtp_model;

    public function __construct(){
        $db = \Config\Database::connect();
        $this->user_model = new UserModel($db);
        $this->country_modal = new CountryModel($db);
        $this->state_modal = new StateModel($db);
        $this->city_modal = new CityModel($db);
        $this->catagory = new catagorymodel($db);
        $this->order_modal = new Ordermodel($db);
        $this->product_model = new productmodel($db);
        $this->emailsmtp_model = new EmailsmtpModel($db);
        $this->BlogModel = new BlogModel($db);
        $this->EnquiryModel = new EnquiryModel($db);
        $this->Allsettingsmodel = new Allsettingsmodel($db);


    }

//     public function index()

//     {


//         $data_arr=[];
//      $all_trans_data = $this->order_modal->orderBy('OrderID','DESC')->get()->getResult('array');
     
//     //  $data['all_products'] = $this->product_model->findAll();
//     //  print_r($data['all_products']);
//     //  die;

//      $data['all_products'] = $this->product_model->findAll();

//      $totalRevenue = 0; // Initialize the total revenue variable

// foreach ($data['all_products'] as $product) {
//     // print_r($product);
//     // die;

    
//     // Assuming 'ProductPrice' and 'ProductStock' are the fields in your product model representing price and stock quantity
//     $total_product_price = floatval($product['ProductPrice']);
//     // print_r($total_product_price);
   
//     $total_product_stock = intval($product['ProductStock']); 
//     // print_r($total_product_stock);
   

//     $total_revenue = $total_product_price * $total_product_stock;
//     // print_r($total_revenue);
//     // die;


//     // Add the total revenue for this product to the overall total revenue
//     $totalRevenue += $total_revenue;
// }
// // print_r($totalRevenue);
// // die;
// // Now $totalRevenue contains the total revenue for all products
// $data['total_revenue'] = $totalRevenue;


// // Store the total revenue in your data array
// $totalRevenues = 0; // Initialize the total revenue variable
// $currentMonth = date('Y-m'); // Get the current year and month in the 'YYYY-MM' format

// foreach ($data['all_products'] as $product) {
//     // Assuming 'ProductPrice' and 'ProductStock' are the fields in your product model representing price and stock quantity
//     $total_product_price = floatval($product['ProductPrice']);
//     $total_product_stock = intval($product['ProductStock']); // Assuming stock quantity is an integer
//     $productDate = date('Y-m', strtotime($product['Created_at'])); // Convert product date to 'YYYY-MM' format
//     // print_r($productDate);
//     // die;

//     // Check if the product was sold in the current month
//     if ($productDate === $currentMonth) {
//         // Calculate the total revenue for this product
//         $total_revenue = $total_product_price * $total_product_stock;

//         // Add the total revenue for this product to the overall total revenue
//         $totalRevenues += $total_revenue;
//     }
// }

// // Now $totalRevenue contains the total revenue for all products sold in the current month
// $data['total_revenue_this_month'] = $totalRevenues;
   
     

//      $data['product_count'] = count($data['all_products']);

//      $data['all_orders'] = $this->order_modal->findAll();
//      $data['orders_count'] = count($data['all_orders']);

//     //  print_r($data['orders_count']);
//     //  die;
//      foreach($all_trans_data as $single_trans_data){
//          $user_id = $single_trans_data['UserID'];
//          $user_data=$this->user_model->where('UserID',$user_id)->first();
         
//          $user_first_name = $user_data['UserFirstName'];
//           $user_last_name = $user_data['UserLastName'];
//          //   $user_email = $user_data['UserEmail'];
           
//             $new_arr['UserFirstName']=$user_first_name;
//              $new_arr['UserLastName']=$user_last_name;
//              //  $new_arr['UserEmail']=$user_email;
              
              
              
              
//               $new_arr['OrderNumber']=$single_trans_data['OrderNumber'];
//       $new_arr['OrderTrackingID']=$single_trans_data['OrderTrackingID'];
//       $new_arr['OrderID']=$single_trans_data['OrderID'];
//         $new_arr['OrderDate']=$single_trans_data['OrderDate'];
//          $new_arr['TotalAmount']=$single_trans_data['TotalAmount'];
//           $new_arr['payment']=$single_trans_data['payment'];
//          $new_arr['OrderStatus']=$single_trans_data['OrderStatus'];
       
//          array_push($data_arr,$new_arr);
//      }
//          // print_r($data_arr);  
//          // die;
           
    
//           $data['orders']=$data_arr;
//      return view('dashboard',$data);
//  }
 
public function index()
{
    $data_arr=[];
    
    // $all_trans_data = $this->order_modal->orderBy('OrderID','DESC')->get()->getResult('array');

    $today = date('Y-m-d');

    $all_trans_data = $this->order_modal
                        ->where('DATE(Created_at)', $today)
                        ->orderBy('OrderID', 'DESC')
                         ->limit(5)
                        ->find();
                      
    $data['today_order'] =  $all_trans_data;
                        
    // echo '<pre>';
    // print_r( $data['today_order']);die;


    //  $data['all_products'] = $this->product_model->findAll();
    //  print_r($data['all_products']);
    //  die;
    $blog_data =$this->BlogModel->findAll();

    $currency_symbol =$this->Allsettingsmodel->first();

    $EnquiryModel_data=$this->EnquiryModel->findAll();

    $product_data=$this->product_model->findAll();

    $cutomer_data = $this->user_model->where('UserType',2)->findAll();

    $data['pro_count']=count($product_data);

    $data['EnquiryModel_data']=count($EnquiryModel_data);

    $data['blog_count']=count($blog_data);

    $data['cutomer_count']=count($cutomer_data);

        $data['all_products'] = $this->order_modal->findAll();

        $totalRevenue = 0; // Initialize the total revenue variable

        foreach ($data['all_products'] as $product) {
            $totalRevenue += $product['TotalAmount']; // Accumulate the TotalAmount
        }

    // Now $totalRevenue contains the total revenue for all products
    $data['total_revenue'] = $totalRevenue;
    // print_r($data['total_revenue']);
    // die;





    $totalRevenues = 0; // Initialize the total revenue variable

    $currentMonth = date('Y-m'); // Get the current month in 'Y-m' format (e.g., '2023-09')

    foreach ($data['all_products'] as $product) {
        $orderDate = date('Y-m', strtotime($product['Created_at'])); // Extract the month from the order_date

        if ($orderDate === $currentMonth) {
            $totalRevenues += $product['TotalAmount']; // Accumulate the TotalAmount for orders in the current month
        }
    }

    // Now $totalRevenue contains the total revenue for the current month
    $data['total_revenue_this_month'] = $totalRevenues;
    $data['currency'] = $currency_symbol['currency'];

    // print_r($data['total_revenue']);
    // die;


    $data['product_count'] = count($data['all_products']);
        
    $data['all_orders_count'] = $this->order_modal->findAll();
    $data['all_orders'] = $this->order_modal->orderBy('OrderID', 'DESC')->limit(5)->find();

    $data['orders_count'] = count($data['all_orders_count']);

    $data_arr = []; 

    foreach ($data['all_orders'] as $single_trans_data) 
    {
        $user_id = $single_trans_data['UserID'] ?? null;
        $OrderID = $single_trans_data['OrderID'];
        
        // Attempt to get user data if UserID is available
        $user_data = $user_id ? $this->user_model->where('UserID', $user_id)->first() : null;
        
        // Get order data regardless
        $order_data = $this->order_modal->where('OrderID', $OrderID)->first();
        
        // Assign names and email based on available data
        $user_first_name = $user_data['UserFirstName'] ?? $order_data['fname'] ?? '';
        $user_last_name = $user_data['UserLastName'] ?? $order_data['lname'] ?? '';

        $new_arr = [
            'UserFirstName' => $user_first_name,
            'UserLastName'  => $user_last_name,
            'OrderNumber'   => $single_trans_data['OrderNumber'],
            'OrderID'       => $single_trans_data['OrderID'],
            'OrderDate'     => $single_trans_data['OrderDate'],
            'TotalAmount'   => $single_trans_data['TotalAmount'],
            'payment'       => $single_trans_data['payment'],
            'OrderStatus'   => $single_trans_data['OrderStatus'],

        ];

        array_push($data_arr, $new_arr);
}

$data['orders'] = $data_arr;

 return view('dashboard',$data);
}
 

    public function get_chart_data()
{
    $uid = session()->get('user_id');
    
    // Check if a year is selected, otherwise set the current year as the default
    $year = $this->request->getPost('year');
    if (empty($year)) {
        $year = date('Y');  // Set to the current year if no year is selected
    }

    $orders_data_arr = [];
    $product_data_arr = [];
    $all_months = [];

    // Define the months
    $month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];

    // Loop through each month
    foreach ($month as $index => $month_data) {
        $all_months[] = $month_data;

        // Convert the month name to its corresponding month number
        $monthNumber = $index + 1; // For example, Jan = 1, Feb = 2, ...

        // Query to get the number of orders for each month in the selected year
        $ordersCount = $this->order_modal
            ->where('YEAR(Created_at)', $year)
            ->where('MONTH(Created_at)', $monthNumber)
            ->countAllResults();

        // Query to get the number of products for each month in the selected year
        $productsCount = $this->product_model
            ->where('YEAR(Created_at)', $year)
            ->where('MONTH(Created_at)', $monthNumber)
            ->countAllResults();

        // Append the results to the arrays
        $orders_data_arr[] = $ordersCount;
        $product_data_arr[] = $productsCount;
    }

    // Return the data as a JSON response
    return json_encode(array("months" => $all_months, "orders" => $orders_data_arr, "products" => $product_data_arr));
}



    
 public function get_chart_data_old()
 {
     $uid = session()->get('user_id');
     $year = $this->request->getPost('year');
 
     $all_orders_data = $this->order_modal->findAll();
     $all_products_data = $this->product_model->findAll();

     $orderer_months = array_fill(1, 12, 0);
     $product_months = array_fill(1, 12, 0);
     $month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];
     $orders_data_arr = [];
     $product_data_arr = [];
     $all_months = [];


      foreach ($month as $month_data) {

        $all_months[] = $month_data;

        $monthNumber = date('n', strtotime($month_data));

// Output the month number
// echo $monthNumber;

        // $orders_data_arr[] = $this->order_modal->where('MONTH(Created_at)', $monthNumber)->countAllResults();
        // $product_data_arr[] = $this->product_model->where('MONTH(Created_at)', $monthNumber)->countAllResults();

        $ordersCount = $this->order_modal
                ->where('YEAR(Created_at)', $year)
                ->where('MONTH(Created_at)', $monthNumber)
                ->countAllResults();

            // Count products for the current month in the selected year
            $productsCount = $this->product_model
                ->where('YEAR(Created_at)', $year)
                ->where('MONTH(Created_at)', $monthNumber)
                ->countAllResults();
        
        // echo $this->order_modal->getLastQuery();
        // die;
    
    }
    // print_r($orders_data_arr);

    // foreach ($all_orders_data as $order_data) {
    //     // Assuming 'Created_at' is in the format 'Y-m-d H:i:s'
    //     $createMonth = date('n', strtotime($order_data['Created_at']));
    //     // print_r($order_data['Created_at']);die;
    //     $orderer_months[$createMonth]++;
    // }

    // foreach ($all_products_data as $product_data) {
    //     // Assuming 'Updated_at' is in the format 'Y-m-d H:i:s'
    //     $updateMonth = date('n', strtotime($product_data['Created_at']));
    //     $product_months[$updateMonth]++;
    // }
    //  $total_orders_arr = array_values($months);

     return json_encode(array("months"=>$all_months, "orders"=>$orders_data_arr,"products"=>$product_data_arr));
 }

 
 
 


    public function signin(){
        return view('login');
    }

    public function admin_login(){

        $session = session();
       
        $email = $this->request->getVar('email');
        $password = md5($this->request->getVar('password'));
        
   
        $data = $this->user_model->where('UserEmail', $email)->where('UserPassword',$password)->where('UserType',1)->first();
        // echo '<pre>';
        // print_r($data);
      
        if(!empty($data)){
           
                $ses_data = [
                    'admin_id'       => $data['UserID'],
                    'email'     => $data['UserEmail'],
                    'type'        => $data['UserType'],
                    'UserProfile'        => $data['UserProfile'],
                    'UserFirstName'        => $data['UserFirstName'],
                    'UserLastName'        => $data['UserLastName'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                echo "1";
        
        }else{
          
            echo "2";
        }
   
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('login');
    }

    public function change_password(){
        return view('change_password');
    }

    public function changepwd(){
        $session = session();

        $id = $session->get('admin_id');
        $current_password = md5($this->request->getPost('current_password')); 
        $new_password = $this->request->getPost('new_password'); 
        $confirm_password = $this->request->getPost('confirm_password'); 

        $data = $this->user_model->where('UserPassword',$current_password)->where('UserID', $id)->first();
        
        if(!empty($data)){
            if($new_password==$confirm_password){
                $data = array(
                    'UserPassword' => md5($new_password)
                );
                $this->user_model->set($data);
                $this->user_model->where('UserID', $id);
                $update_password = $this->user_model->update();
                if($update_password){
                    echo "1";
                }
                else{
                    echo "0";
                }
            }
            else{
               echo "2"; 
            }
        }
        else{
            echo "3"; 
        }

    }

    public function profile(){
        $session = session();
        $id = $session->get("admin_id");
        $data['profile_data'] = $this->user_model->where('UserID', $id)->first();
       
        return view('profile',$data);
    }

    public function edit_profile(){
        $session = session();
        $id = $session->get("admin_id");
        $data['profile_data'] = $this->user_model->where('UserID', $id)->first();
        $data['country_data'] = $this->country_modal->findAll();
        $data['state_data'] = $this->state_modal->findAll();
        $data['city_data'] = $this->city_modal->findAll();
        return view('edit_profile',$data);
    }    

    public function update_profile(){
        $session = session();
        $id = $session->get("admin_id");
        $old_img = $this->request->getPost('old_img');
        $firstname = $this->request->getPost('firstname');
        $lastname = $this->request->getPost('lastname');
        // $email = $this->request->getPost('email');
        $dob = $this->request->getPost('dob');
        $phone = $this->request->getPost('phone');
        $country = $this->request->getPost('country');
        $state = $this->request->getPost('state');
        $city = $this->request->getPost('city');
        $post_code = $this->request->getPost('post_code');
        $address1 = $this->request->getPost('address1');
        $address2 = $this->request->getPost('address2');

        $profileimg = "";
        
        if(isset($_FILES['profile_pic']['name']) && !empty($_FILES['profile_pic']['name'])){
            
            $validated = $this->validate([
                'profile_pic' => [
                    'uploaded[profile_pic]',
                    'mime_in[profile_pic,image/jpg,image/jpeg,image/gif,image/png]',
                ],
            ]); 

          
             if ($validated) {
                $profile_img = $this->request->getFile('profile_pic');
                $profileimg = $profile_img->getRandomName();
                $profile_img->move('public/assets/img/profile_images/',$profileimg);
              
             }else{
                echo "2";
                exit;
             }
            }
            else{
           
               $profileimg=$old_img;
            }


            $data = array(
                "UserFirstName" => $firstname,
                "UserLastName" => $lastname,
                // "UserEmail" => $email,
                "DOB" => $dob,
                "UserProfile" => $profileimg,
                "UserPhone" => $phone,
                "UserCountry" => $country,
                "UserState" => $state,
                "UserCity" => $city,
                "UserZip" => $post_code,
                "UserAddress" => $address1,
                "UserAddress2" => $address2,
            );

            $session->set($data);

            $this->user_model->set($data);
            $this->user_model->where('UserID', $id);
            $update_profile = $this->user_model->update();

            if($update_profile){
                echo "1";
            }
            else{
                echo "0";
            }

    }

public function all_email_smtp(){
    $data['all_email_smtp_data'] = $this->emailsmtp_model->first();
    
    
    return view('all_email_smtp', $data);
}

public function update_email_smtp() {
    // Make sure the request method is POST
    // if ($this->request->getMethod() === 'post') {
        // Retrieve data from $_POST
        $email_smtp_id = $this->request->getPost('email_smtp_id');
        $hostname = $this->request->getPost('hostname'); 
        $username = $this->request->getPost('username'); 
         $email = $this->request->getPost('email'); 
        $password = $this->request->getPost('password'); 
        $portname = $this->request->getPost('portname'); 
        $protocol = $this->request->getPost('protocol'); 
        
        // Initialize the data_update array with common fields
        $data_update = [
            'host' => $hostname,
            'username' => $username,
            'email' => $email, 
            'port' => $portname,
            'protocol' => $protocol
        ];

        // Check if the password is provided and not empty
        if (!empty($password)) {
            $data_update['password'] = $password;
        }

        // Update the SMTP email settings
        // $smtp_email_data = $this->emailsmtp_model->update($data_update, $email_smtp_id);
        $smtp_email_data = $this->emailsmtp_model->where('id', $email_smtp_id)->set($data_update)->update();
       
        

        // Check if the update was successful
        if ($smtp_email_data) {
            echo 1; // Success
        } else {
            echo 0; // Failure
        }
    // } else {
    //     // If the request method is not POST, handle accordingly
    //     echo 0; // For example, return 0 for invalid request method
    // }
}


// public function update_email_smtp() {
//     print_r($_POST);
//     // die;
    
    
//         $email_smtp_id = $_POST['email_smtp_id'];
//         $hostname = $this->request->getPost('hostname'); 
//         $username = $this->request->getPost('username'); 
//         $password = $this->request->getPost('password'); 
//         $portname = $this->request->getPost('portname'); 
//         $protocol = $this->request->getPost('protocol'); 
        
        
//         if(!empty($password)) {
//       $data_update = [
//                     'host'       => $hostname,
//                     'username'     => $username,
//                     'password'        => $password,
//                     'port'     => $portname,
//                     'protocol'     => $protocol
//                 ];
    
// }

// else {
    
//     $data_update = [
//                     'host'       => $hostname,
//                     'username'     => $username,
//                     // 'password'        => $password,
//                     'port'     => $portname,
//                     'protocol'     => $protocol
//                 ];
// }

//       $smtp_email_data = $this->emailsmtp_model->update($data_update,$email_smtp_id);

// if($smtp_email_data) {
//     echo 1;
    
// }
// else {
//     echo 0;
    
// }

    
// }

}
