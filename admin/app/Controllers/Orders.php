<?php

namespace App\Controllers;
use App\Models\CouponModel;
use App\Models\FaqsModel;
use App\Models\SeoModel;
use App\Models\Ordermodel;
use App\Models\TestimonialModel;
use App\Models\EnquiryModel;
use App\Models\productmodel;
use App\Models\Orderitemmodel;
use App\Models\Ordercommentmodel;
use App\Models\catagorymodel;
use App\Models\UserModel;
use App\Models\shippingmethodmodel;
use App\Models\shippingratemodel;
use App\Models\shippingzonemodel;
use App\Models\CountryModel;
use App\Models\ChatModel;
use App\Models\ShippingDataModel;
use App\Models\Allsettingsmodel;
use App\Models\CityModel;
use App\Models\StateModel;
use App\Models\TaxesModel;


use App\Libraries\EmailSender;


class Orders extends BaseController
{
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
        $db = \Config\Database::connect();
        
            $this->coupons = new CouponModel($db);
            $this->faqs = new FaqsModel($db);
            $this->seo = new SeoModel($db);
            $this->Ordermodel = new Ordermodel($db);
            $this->testimonial = new TestimonialModel($db);
            $this->enquiry= new EnquiryModel($db);
            $this->product= new productmodel($db);
            $this->orderitem = new Orderitemmodel($db);
            $this->Ordercomment = new Ordercommentmodel($db);
            $this->catagory = new catagorymodel($db);
            $this->User = new UserModel($db);
            $this->shippingmethod = new shippingmethodmodel($db);
            $this->shippingrate = new shippingratemodel($db);
            $this->shippingzone = new shippingzonemodel($db);
            $this->country= new CountryModel($db);
            $this->ChatModel= new ChatModel($db);
            $this->Allsettings= new Allsettingsmodel($db);
            $this->ShippingDataModel= new ShippingDataModel($db);
            $this->cityModel= new CityModel($db);
            $this->stateModel= new StateModel($db);
            $this->taxModel= new TaxesModel($db);
            
            
    }
    
    
    public function index()
    {
        $data_arr=[];
        $all_trans_data = $this->Ordermodel->orderBy('OrderID','DESC')->get()->getResult('array');
        // print_r($all_trans_data);
        // die;
        foreach($all_trans_data as $single_trans_data){
            $user_id = $single_trans_data['UserID'];
            $user_data=$this->User->where('UserID',$user_id)->first();
            
            $user_first_name = !empty($user_data['UserFirstName'])?$user_data['UserFirstName']:'';
             $user_last_name = !empty($user_data['UserLastName'])?$user_data['UserLastName']:'';
            //   $user_email = $user_data['UserEmail'];
              
               $new_arr['UserFirstName']=$single_trans_data['fname'];
                $new_arr['UserLastName']=$single_trans_data['lname'];
                //  $new_arr['UserEmail']=$user_email;
                 
                 
                 
                 
            $new_arr['OrderNumber']=$single_trans_data['OrderNumber'];
            $new_arr['OrderID']=$single_trans_data['OrderID'];
            $new_arr['OrderDate']=$single_trans_data['OrderDate'];
            $new_arr['TotalAmount']=$single_trans_data['TotalAmount'];
            $new_arr['payment']=$single_trans_data['payment'];
            $new_arr['OrderStatus']=$single_trans_data['OrderStatus'];
          
            array_push($data_arr,$new_arr);
        }
       
        $data['orders']=$data_arr;
        return view('all_orders',$data);
    }


 


 public function search_order_filter_data_old()
    {
        // echo "hi";
        
        // print_r($_POST);
        $order_no = $this->request->getPost('order_no');
        $order_amount = $this->request->getPost('order_amount');
        $order_status = $this->request->getPost('order_status');
        $date_order_selecter = $this->request->getPost('date_order_selecter');
        
 
        
        $date=date('Y-m-d',strtotime($date_order_selecter));
    
        if (!empty($order_no) && empty($order_amount) && empty($order_status) && empty($date_order_selecter)) 
        {
            $qry_data = $this->Ordermodel->where('OrderNumber',$order_no)->findAll();
        }
        else if (empty($order_no) && !empty($order_amount) && empty($order_status) && empty($date_order_selecter)) 
        {
            $qry_data = $this->Ordermodel->where('TotalAmount',$order_amount)->findAll();
        }
        else if (empty($order_no) && empty($order_amount) && !empty($order_status) && empty($date_order_selecter)) 
        {
            $qry_data = $this->Ordermodel->where('OrderStatus',$order_status)->findAll();
        }
        else if (empty($order_no) && empty($order_amount) && empty($order_status) && !empty($date_order_selecter)) 
        {
            $qry_data = $this->Ordermodel->where('OrderDate',$date)->findAll();
        }
        else if (empty($order_no) && empty($order_amount) && !empty($order_status) && !empty($date_order_selecter)) 
        {
            $qry_data = $this->Ordermodel->where('OrderStatus',$order_status)->where('OrderDate',$date)->findAll();
        }
        else if (empty($order_no) && !empty($order_amount) && empty($order_status) && !empty($date_order_selecter)) 
        {
            $qry_data = $this->Ordermodel->where('TotalAmount',$order_amount)->where('OrderDate',$date)->findAll();
        }
        else if (!empty($order_no) && empty($order_amount) && empty($order_status) && !empty($date_order_selecter)) 
        {
            $qry_data = $this->Ordermodel->where('OrderNumber',$order_no)->where('OrderDate',$date)->findAll();
        }
        elseif(!empty($order_no) && empty($order_amount) && !empty($order_status) && empty($date_order_selecter)) 
        {
            $qry_data = $this->Ordermodel->where('OrderNumber',$order_no)->where('OrderStatus',$order_status)->findAll();
        }
        elseif(!empty($order_no) && empty($order_amount) && empty($order_status) && !empty($date_order_selecter))
        {
            $qry_data = $this->Ordermodel->where('OrderNumber',$order_no)->where('OrderDate',$date)->findAll();
        }
        elseif(!empty($order_no) && !empty($order_amount) && empty($order_status) && empty($date_order_selecter))
        {
             $qry_data = $this->Ordermodel->where('OrderNumber',$order_no)->where('TotalAmount',$order_amount)->findAll();
        }
        elseif(!empty($order_no) && !empty($order_amount) && empty($order_status) && !empty($date_order_selecter))
        {
             $qry_data = $this->Ordermodel->where('OrderNumber',$order_no)->where('TotalAmount',$order_amount)->where('OrderDate',$date)->findAll();
        }
        elseif(!empty($order_no) && empty($order_amount) && !empty($order_status) && !empty($date_order_selecter))
        {
             $qry_data = $this->Ordermodel->where('OrderNumber',$order_no)->where('OrderStatus',$order_status)->where('OrderDate',$date)->findAll();
        }
        elseif(!empty($order_no) && !empty($order_amount) && !empty($order_status) && empty($date_order_selecter))
        {
             $qry_data = $this->Ordermodel->where('OrderNumber',$order_no)->where('TotalAmount',$order_amount)->where('OrderStatus',$order_status)->findAll();
        }
        elseif(!empty($order_no) && !empty($order_amount) && !empty($order_status) && !empty($date_order_selecter))
        {
             $qry_data = $this->Ordermodel->where('OrderNumber',$order_no)->where('TotalAmount',$order_amount)->where('OrderStatus',$order_status)->where('OrderDate',$date)->findAll();
        }
        else
        {
           
            $qry_data = $this->Ordermodel->orderBy('OrderID','DESC')->findAll();
        }
      
        $i = 1;
        if(!empty($qry_data)){
        foreach($qry_data as $query) {
            $users = $this->User->where('UserID',$query['UserID'])->get()->getRow();
            ?>
           <tr>
                <td><?php echo $i; ?></td>
                 <td><?php echo $query['OrderNumber']; ?></td>
                 <td>
                <?php 
                    if ($users) {
                        // Check if UserFirstName and UserLastName are not '--' and display accordingly
                        echo ($users->UserFirstName != '--') ? $users->UserFirstName : 'N/A';
                        echo ' '; // Add space between first and last name
                        echo ($users->UserLastName != '--') ? $users->UserLastName : 'N/A';
                    } else {
                        echo 'User data not available'; // Default message if $users is null
                    }
                ?>
                </td>
                <td><?php echo $query['payment']; ?></td>
                <td><?php echo date("d M, Y",strtotime($query['OrderDate'])); ?></td>
                <td><?php echo $query['TotalAmount']; ?></td>
                <td><?php echo $query['OrderStatus']; ?></td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
                        <div class="dropdown-menu" style="">
                            <a class="dropdown-item" href="<?php echo base_url('view_order_details/'.$query['OrderID']); ?>"><i class="bx bx-trash me-2"></i> View Details</a>
                        
                            <a class="dropdown-item remove_order" data-id="<?php echo $query['OrderID'];  ?>" href="#" ><i class="bx bx-trash me-1"></i> Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
            <?php
            $i++;
        }
        }
         else{
         ?>   
            <tr>
                <td colspan = "8" class="text-center"> No Data Available
                </td>
                </tr>
            <?php 
        
    }


}

    public function search_order_filter_data()
    {
        // Get POST parameters
        $order_no = $this->request->getPost('order_no');
        $order_amount = $this->request->getPost('order_amount');
        $order_status = $this->request->getPost('order_status');
        $date_order_selecter = $this->request->getPost('date_order_selecter');

        // Convert the date format to match database format (d-m-Y)
        $date = !empty($date_order_selecter) ? date('d-m-Y', strtotime($date_order_selecter)) : null;


        if (!empty($order_no) && empty($order_amount) && empty($order_status) && empty($date_order_selecter)) 
        {
            $qry_data = $this->Ordermodel->where('OrderNumber',$order_no)->findAll();
        }
        else if (empty($order_no) && !empty($order_amount) && empty($order_status) && empty($date_order_selecter)) 
        {
            $qry_data = $this->Ordermodel->where('TotalAmount',$order_amount)->findAll();
        }
        else if (empty($order_no) && empty($order_amount) && !empty($order_status) && empty($date_order_selecter)) 
        {
            $qry_data = $this->Ordermodel->where('OrderStatus',$order_status)->findAll();
        }
        else if (empty($order_no) && empty($order_amount) && empty($order_status) && !empty($date_order_selecter)) 
        {
            $qry_data = $this->Ordermodel->where('OrderDate',$date)->findAll();
        }
        else if (empty($order_no) && empty($order_amount) && !empty($order_status) && !empty($date_order_selecter)) 
        {
            $qry_data = $this->Ordermodel->where('OrderStatus',$order_status)->where('OrderDate',$date)->findAll();
        }
        else if (empty($order_no) && !empty($order_amount) && empty($order_status) && !empty($date_order_selecter)) 
        {
            $qry_data = $this->Ordermodel->where('TotalAmount',$order_amount)->where('OrderDate',$date)->findAll();
        }
        else if (!empty($order_no) && empty($order_amount) && empty($order_status) && !empty($date_order_selecter)) 
        {
            $qry_data = $this->Ordermodel->where('OrderNumber',$order_no)->where('OrderDate',$date)->findAll();
        }
        elseif(!empty($order_no) && empty($order_amount) && !empty($order_status) && empty($date_order_selecter)) 
        {
            $qry_data = $this->Ordermodel->where('OrderNumber',$order_no)->where('OrderStatus',$order_status)->findAll();
        }
        elseif(!empty($order_no) && empty($order_amount) && empty($order_status) && !empty($date_order_selecter))
        {
            $qry_data = $this->Ordermodel->where('OrderNumber',$order_no)->where('OrderDate',$date)->findAll();
        }
        elseif(!empty($order_no) && !empty($order_amount) && empty($order_status) && empty($date_order_selecter))
        {
            $qry_data = $this->Ordermodel->where('OrderNumber',$order_no)->where('TotalAmount',$order_amount)->findAll();
        }
        elseif(!empty($order_no) && !empty($order_amount) && empty($order_status) && !empty($date_order_selecter))
        {
            $qry_data = $this->Ordermodel->where('OrderNumber',$order_no)->where('TotalAmount',$order_amount)->where('OrderDate',$date)->findAll();
        }
        elseif(!empty($order_no) && empty($order_amount) && !empty($order_status) && !empty($date_order_selecter))
        {
            $qry_data = $this->Ordermodel->where('OrderNumber',$order_no)->where('OrderStatus',$order_status)->where('OrderDate',$date)->findAll();
        }
        elseif(!empty($order_no) && !empty($order_amount) && !empty($order_status) && empty($date_order_selecter))
        {
            $qry_data = $this->Ordermodel->where('OrderNumber',$order_no)->where('TotalAmount',$order_amount)->where('OrderStatus',$order_status)->findAll();
        }
        elseif(!empty($order_no) && !empty($order_amount) && !empty($order_status) && !empty($date_order_selecter))
        {
            $qry_data = $this->Ordermodel->where('OrderNumber',$order_no)->where('TotalAmount',$order_amount)->where('OrderStatus',$order_status)->where('OrderDate',$date)->findAll();
        }
        else
        {
        
            $qry_data = $this->Ordermodel->orderBy('OrderID','DESC')->findAll();
        }

        // Prepare the response data for DataTable
        $response = [];
        $i = 1;
        foreach ($qry_data as $query) {
            $users = $this->User->where('UserID', $query['UserID'])->get()->getRow();
            $user_fullname = ($users) ? ($query->UserFirstName != '--' ? $query->UserFirstName : 'N/A') . ' ' . ($query->UserLastName != '--' ? $query->UserLastName : 'N/A') : 'User data not available';
            $lname = !empty($query['lname']) ? $query['lname'] : '';

            $response[] = [
                '<div class="text-center">' . $i++ . '</div>',
                '<div>' . $query['OrderNumber'] . '</div>',
                '<div>' . $query['fname'] ." ". $lname .'</div>',
                '<div>' . $query['payment'] . '</div>',
                '<div>' . date("d M, Y", strtotime($query['OrderDate'])) . '</div>',
                '<div>' . $query['TotalAmount'] . '</div>',
                '<div>' . $query['OrderStatus'] . '</div>',
                '<td class="text-center">
                    <div class="dropdown text-center">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="' . base_url('view_order_details/' . $query['OrderID']) . '">
                                <i class="fa fa-eye me-2"></i> View Details
                            </a>
                            <a class="dropdown-item" href="' . base_url('invoice/' . $query['OrderID']) . '">
                                <i class="fa fa-file-pdf-o me-2"></i> Invoice download
                            </a>
                            <a class="dropdown-item remove_order" data-id="' . $query['OrderID'] . '" href="#">
                    <i class="bx bx-trash me-1"></i> Delete
                </a>
                        </div>
                    </div>
                </td>'  // Actions
            ];
        }
        // Return the response as JSON
        return $this->response->setJSON($response);
        
    }


    


    // public function add_products()
    // {
    //     return view('add_products');
    // }

    // public function view_product_details()
    // {
    //     return view('view_product_details');
    // }

    // public function edit_product_details(){
    //     return view('edit_product_details');
    // }
    
    
    public function view_order_details($id)
    {
        $data['order_det'] = $this->Ordermodel->where('OrderID',$id)->get()->getRow();

        $data['customer_data'] =  $this->Ordermodel->select('orders.*,users.*')
                                                ->join('users','orders.UserID = users.UserID','left')
                                                ->where('orders.OrderID',$id)
                                                ->first();

       
        $currency = $this->Allsettings->first();

        $data['currency'] = $currency['currency']; 
        
        
        // echo '<pre>';
        // print_r($data['currency']);die;
        return view('view_order_details',$data);
    }
    public function all_shipping()
    {
       $enable_disable = $this->shippingzone->orderby('ZoneID','DESC')->first();

       $data['enable_disable'] =  $enable_disable['is_check'];
                                  
        $data['all_shipping_data'] = $this->shippingmethod
        ->select('*') 
        ->join('shipping_rates', 'shipping_rates.MethodID = shipping_methods.MethodID')
        ->join('shipping_zones', 'shipping_zones.RateID = shipping_rates.RateID')
            ->orderBy('shipping_rates.MethodID', 'desc')
        ->findAll();
        
        return view('all_shipping_details', $data);
    }

    public function add_shipping()
    {
        $data['all_shipping_methods'] = $this->shippingmethod->orderBy('MethodID', 'desc')->findAll();
        $data['country'] = $this->country->findAll();
        // $data['zipcode'] = json_decode(file_get_contents(FCPATH . 'app/Views/zipcodes/zipcodes_in.json'));
        // print_r($zipcode);die;
        // $zipcode
        return view('add_shipping_details',$data);
    }
    


    
//     public function save_shipping()
// {
//     $last_insert_id = $this->request->getPost('shipping_name');
//     $zone_name = $this->request->getPost('zone_name');
//     $shipping_rate = $this->request->getPost('shipping_rate');
    
//     $shipping_data = $this->shippingrate->where('MethodID', $last_insert_id)->findAll();
  
    
//     if ($shipping_data) {
//         foreach ($shipping_data as $single_shipping_data) {
          
            
//             $zone_data = $this->shippingzone->where('RateID', $single_shipping_data['RateID'])->first();
           
             
//           $zones_dt = [];
//             if ($zone_data) {
//                 $zone_array =  $zone_data['ZoneName'];
                
//                 $zone_datas = '';
//                 if(!empty($zone_array)) {
//                     $zone_datas = json_decode($zone_array);
//                     foreach($zone_name as $zones) {
//                         if (!in_array($zones, $zone_datas)) 
//                         {
//                             $zones_dt[]= $zones;
//                         }
//                         else{
//                             $zones_dt = [];
//                         }
                          
//                     }
//                 }
//                 else {
//                  $zones_dt =  $zone_name;
                    
//                 }
                
//               print_r($zones_dt);
//             //   die;
               
                
//                 if (empty($zones_dt)) {
//                     echo "2"; // Zone already exists
//                 } else
//                 {
//                     $data_insert2 = [
//                         'MethodID' => $last_insert_id,
//                         'Price' => $shipping_rate,
//                     ];

//                     $shippingrate_data = $this->shippingrate->insert($data_insert2);
//                     $last_insert_id2 = $this->shippingrate->getInsertId();

//                     $data_insert3 = [
//                         'RateID' => $last_insert_id2,
//                         'ZoneName' => json_encode($zones_dt),
//                     ];

//                     $shippingzone_data = $this->shippingzone->insert($data_insert3);

//                     if ($shippingzone_data) {
//                         echo 1; // Success
//                     } else {
//                         echo 0; // Failure
//                     }
//                 }
//             }
//         }
//     }
// }

// public function save_shipping()
// {
//     $last_insert_id = $this->request->getPost('shipping_name');
//     $zone_name = $this->request->getPost('zone_name');
//     $shipping_rate = $this->request->getPost('shipping_rate');
   
//     $shipping_data = $this->shippingrate->where('MethodID', $last_insert_id)->findAll();
  
//     if ($shipping_data) {
//         foreach ($shipping_data as $single_shipping_data) {
//             $zone_data = $this->shippingzone->where('RateID', $single_shipping_data['RateID'])->first();
            
//             $zones_dt = [];
//             if ($zone_data) {
//                 $zone_array = json_decode($zone_data['ZoneName'], true);
                
//                 foreach ($zone_name as $zone) {
//                     if (in_array($zone, $zone_array)) {
//                         echo "2"; // Zone already exists
//                         return;
//                     } else {
//                         $zones_dt[] = $zone;
//                     }
//                 }

//                 $data_insert2 = [
//                     'MethodID' => $last_insert_id,
//                     'Price' => $shipping_rate,
//                 ];

//                 $shippingrate_data = $this->shippingrate->insert($data_insert2);
//                 $last_insert_id2 = $this->shippingrate->getInsertId();

//                 $updated_zones = array_merge($zone_array, $zones_dt);

//                 $data_insert3 = [
//                     'RateID' => $last_insert_id2,
//                     'ZoneName' => json_encode($updated_zones),
//                 ];

//                 $shippingzone_data = $this->shippingzone->insert($data_insert3);

//                 if ($shippingzone_data) {
//                     echo 1; // Success
//                 } else {
//                     echo 0; // Failure
//                 }
//             }
//         }
//     }
// }

public function save_shipping()
{  
    $last_insert_id = $this->request->getPost('shipping_name');
    $zone_name = $this->request->getPost('zone_name');
    $shipping_rate = $this->request->getPost('shipping_rate');
    
    
    $zipCodeToCheck = $zone_name[0];
    foreach($zone_name as $key=>$val){
    $results = $this->shippingzone
        ->join('shipping_rates', 'shipping_rates.RateID = shipping_zones.RateID')
        ->where('shipping_rates.MethodID',$last_insert_id)
        ->like('shipping_zones.ZoneName', $val)->findAll();
        // print_r($results);
        if(count($results) > 0){
             unset($zone_name[$key]);
        }
    }
    $zone_name = array_values($zone_name);
    // PRINT_R($zone_name);
    // die;
   
    // $shipping_data = $this->shippingrate->where('MethodID', $last_insert_id)->findAll();
  
    // if ($shipping_data) {
        // foreach ($shipping_data as $single_shipping_data) {
            // $zone_data = $this->shippingzone->where('RateID', $single_shipping_data['RateID'])->first();
          
            // $zones_dt = [];
            // if ($zone_data) {
            //     $zone_array =  json_decode($zone_data['ZoneName']);
            //     print_r($zone_array);die;
            //     $zone_datas = '';
            //     if(!empty($zone_array)) {
            //         $zone_datas = json_decode($zone_array);
            //         foreach($zone_name as $zones) {
            //             if (!in_array($zones, $zone_datas)) {
            //                 $zones_dt[] = $zones;
            //             }
            //         }
            //     } else {
            //         $zones_dt = $zone_name;
            //     }
// print_r($zones_dt);die;
                // Check if zip code already exists in shippingzone
                // $existingZip = $this->shippingzone->where('ZoneName', json_encode($zones_dt))->first();
                // echo $this->shippingzone->getLastQuery();
                // die;
                

                // if ($existingZip) {
                //     echo "2"; // Zip code already exists
                // } else {
                if(count($zone_name)>0){
                    $data_insert2 = [
                        'MethodID' => $last_insert_id,
                        'Price' => $shipping_rate,
                    ];

                    $shippingrate_data = $this->shippingrate->insert($data_insert2);
                    $last_insert_id2 = $this->shippingrate->getInsertId();

                    $data_insert3 = [
                        'RateID' => $last_insert_id2,
                        'ZoneName' => json_encode($zone_name),
                    ];


// }

                    $shippingzone_data = $this->shippingzone->insert($data_insert3);

                    if ($shippingrate_data && $shippingzone_data) {
                        echo 1; // Success
                    } else {
                        echo 0; // Failure
                    // }
                }
                
                }else{
                    echo 3;
                }
            // }
        // }
    // }
}


// public function save_shipping()
// {
//     $last_insert_id = $this->request->getPost('shipping_name');
//     $zone_name = $this->request->getPost('zone_name');
//     $shipping_rate = $this->request->getPost('shipping_rate');
    
//     $shipping_data = $this->shippingrate->where('MethodID', $last_insert_id)->findAll();
  
//     if ($shipping_data) {
//         foreach ($shipping_data as $single_shipping_data) {
//             $zone_data = $this->shippingzone->where('RateID', $single_shipping_data['RateID'])->first();
          
//             $zones_dt = [];

//             if ($zone_data) {
//                 $zone_array = $zone_data['ZoneName'];
                
//                 if (!empty($zone_array)) {
//                     $zone_datas = json_decode($zone_array, true);

//                     foreach ($zone_name as $zone) {
//                         if (!in_array($zone, $zone_datas)) {
//                             $zones_dt[] = $zone;
//                         }
//                     }
//                 } else {
//                     $zones_dt = $zone_name;
//                 }

//                 // Check if zone already exists in shippingzone
//                 $existingZone = $this->shippingzone->where('RateID', $single_shipping_data['RateID'])->first();

//                 if ($existingZone) {
//                     // Update existing zone
//                     $this->shippingzone->update(['ZoneName' => json_encode($zones_dt)], ['RateID' => $single_shipping_data['RateID']]);
//                     echo "2"; // Updated existing zone
//                 } else {
//                     // Insert new zone
//                     $data_insert3 = [
//                         'RateID' => $single_shipping_data['RateID'],
//                         'ZoneName' => json_encode($zones_dt),
//                     ];

//                     $shippingzone_data = $this->shippingzone->insert($data_insert3);

//                     if ($shippingzone_data) {
//                         echo "1"; // Success
//                     } else {
//                         echo "0"; // Failure
//                     }
//                 }
//             }
//         }
//     }
// }


      


    // coupons..
    
    
     public function edit_shipping($id=null){
    //   $data['single_shipping_data'] = $this->shippingzone
    // ->select('*') // Select all fields from certificates_and_docs
    // ->join('shipping_rates', 'shipping_rates.RateID = shipping_zones.RateID')
    //   ->join('shipping_zones', 'shipping_zones.MethodID = shipping_methods.MethodID')
    //     ->orderBy('shipping_zones.ZoneID', 'desc')
    //     ->where('shipping_zones.ZoneID', $id)
    // ->first();
    $data['single_shipping_data'] = $this->shippingzone
    ->select('*')
    ->join('shipping_rates', 'shipping_rates.RateID = shipping_zones.RateID')
    ->join('shipping_methods', 'shipping_methods.MethodID = shipping_rates.MethodID') // Assuming 'shipping_methods' is the correct table name
    ->orderBy('shipping_zones.ZoneID', 'desc')
    ->where('shipping_zones.ZoneID', $id)
    ->first();

    $data['all_shipping_methods'] = $this->shippingmethod->orderBy('MethodID', 'desc')->findAll();
    // print_r($data['single_shipping_data']);
    // die;
    
    $data['country'] = $this->country->findAll();
    
        return view('edit_shipping_details', $data);
    }
     
//   public function update_shipping()
// {
//     // Get data from the form
//         $shipping_id = $this->request->getPost('shipping_id');
//         $shipping_name = $this->request->getPost('shipping_name');
//         $zone_name = $this->request->getPost('zone_name');
//         $shipping_rate = $this->request->getPost('shipping_rate');
    
  
//         $data_update=[
//             'MethodName'  => $shipping_name,
        
//         ];
        

//         $shipping_data=$this->shippingmethod->update($shipping_id,$data_update);
    
//   $data_update2=[
            
//             'Price'  => $shipping_rate,
        
//         ];
//         $shipping_data2=$this->shippingrate->update($shipping_id,$data_update2);
        
//         $data = $this->shippingrate->where('MethodID',$shipping_id)->first();
        
//         $rate_id = $data['RateID'];
        

        
//          $data_update3=[
            
//             'ZoneName'  => $zone_name,
        
//         ];
//         $shipping_data3=$this->shippingzone->update($shipping_id,$data_update3);
//          if($shipping_data && $shipping_data2 && $shipping_data3){
//             echo 1;
//         }else{
//             echo 0;
//         } 
// }
public function update_shipping()
{
    // Get data from the form
     $ZoneID = $this->request->getPost('zone_id');
    $RateID = $this->request->getPost('rate_id');
    $shipping_name = $this->request->getPost('shipping_name');
    $zone_name = $this->request->getPost('zone_name');
    $shipping_rate = $this->request->getPost('shipping_rate');
    
        $zipCodeToCheck = $zone_name[0];
    foreach($zone_name as $key=>$val){
    $results = $this->shippingzone
        ->join('shipping_rates', 'shipping_rates.RateID = shipping_zones.RateID')
        ->where('shipping_rates.MethodID',$shipping_name)
         ->where('shipping_zones.ZoneID !=', $ZoneID)  // Add this line
        ->like('shipping_zones.ZoneName', $val)->findAll();
        
        // echo $this->shippingzone->getLastQuery();
        // // print_r($results);
        // die;
        
        if(count($results) > 0){
             unset($zone_name[$key]);
        }
    }
    $zone_name = array_values($zone_name);
    // PRINT_R($zone_name);
    // die;
    

    // $data_update1 = [
    //     'MethodName' => $shipping_name,
    // ];
     $data_update2 = [
                        'MethodID' => $shipping_name,
                        'Price' => $shipping_rate,
                    ];

                    // $shippingrate_data = $this->shippingrate->insert($data_insert2);
                     $shipping_data2 = $this->shippingrate->update($RateID, $data_update2);
                    // $last_insert_id2 = $this->shippingrate->getInsertId();

                    $data_update3 = [
                        'RateID' => $RateID,
                        'ZoneName' => json_encode($zone_name),
                    ];


// }

                    // $shippingzone_data = $this->shippingzone->insert($data_insert3);
                    $shipping_data3 = $this->shippingzone->update($ZoneID, $data_update3);

                    if ($shipping_data2 && $shipping_data3) {
                        echo 1; // Success
                    } else {
                        echo 0; // Failure
                    // }
                }
                

    // $data_update2 = [
    //     'MethodID' => $shipping_name,
    //     'Price' => $shipping_rate,
    // ];

    // $data_update3 = [
    //     'RateID' => $RateID,
    //     'ZoneName' => json_encode($zone_name),
    // ];

    // // Update the first table (shippingmethod)
    // // $shipping_data1 = $this->shippingmethod->update($shipping_id, $data_update1);

    // // Update the second table (shippingrate) using a different method
    // // $data2 = $this->shippingrate->where('MethodID', $shipping_id)->first();
    // // $rate_id = $data2['RateID'];
    // $shipping_data2 = $this->shippingrate->update($RateID, $data_update2);
    // // Update the third table (shippingzone)
    // $data3 = $this->shippingzone->where('RateID', $RateID)->first();
    // $zone_id = $data3['ZoneID'];
    // $shipping_data3 = $this->shippingzone->update($zone_id, $data_update3);
    
    // // if ($shipping_data1 && $shipping_data2 && $shipping_data3) {
    // if ($shipping_data2 && $shipping_data3) {
    //     echo 1;
    // } else {
    //     echo 0;
    // }
}



public function delete_shipping() {
    $zone_id = $this->request->getPost('zone_ids');
    
    $data = $this->shippingzone->where('ZoneID', $zone_id)->first();
    
     $rate_id = $data['RateID'];
    
    
    $this->shippingrate->where('RateID', $rate_id);
    $delete1 = $this->shippingrate->delete(); 
    

    $this->shippingzone->where('ZoneID', $zone_id);
    $delete2 = $this->shippingzone->delete(); 
    
    if ($delete1 && $delete2) {
        echo 1;
    } else {
        echo 0;
    }
}



  
     public function all_faqs()
    {
        $data['all_faqs_data']=$this->faqs->orderby('FaqID','desc')->findAll();
        return view('all_faqs',$data);
    }
     public function add_faqs()
    {
        return view('add_faqs');
    }
    
       public function save_faqs()
    {
        // print_r($_POST); die;
        $faqs_que = $this->request->getPost('faqs_que');
        $faqs_ans = $this->request->getPost('faqs_ans');
        
        
        $all_feild=[
            'FaqQuestion'  => $this->request->getVar('faqs_que'),
            'FaqAnswer'  => $this->request->getVar('faqs_ans'),
            
            // 'CouponLive' =>
            ];
        
        $faqs_data=$this->faqs->insert($all_feild);
        if($faqs_data){
            echo 1;
        }else{
            echo 0;
        }
        
    }
    public function edit_faqs($id=null){
        $data['all_faqs_data']=$this->faqs->where('FaqID',$id)->first();
        // print_r($data); die;
        return view('edit_faqs',$data);
    }
      public function update_faqs()
    {
        // print_r($_POST); die;
        $id = $this->request->getPost('id');
        $faqs_que = $this->request->getPost('faqs_que');
        $faqs_ans = $this->request->getPost('faqs_ans');
        
        
        $all_feild=[
            'FaqQuestion'  => $this->request->getVar('faqs_que'),
            'FaqAnswer'  => $this->request->getVar('faqs_ans'),
            
            // 'CouponLive' =>
            ];
        
        $faqs_data=$this->faqs->update($id,$all_feild);
        if($faqs_data){
            echo 1;
        }else{
            echo 0;
        }
        
    }
    public function delete_faqs_type(){
        $faqs_ids=$this->request->getpost('faqstype_ids');
        $this->faqs->where('FaqID',$faqs_ids);
            $delete=$this->faqs->delete(); 
       
       
            if($delete){
                echo 1;
            }else{
                echo 0;
            }
        
    }
    
     public function all_testimonial()
    {
        $data['all_testimonial_data']=$this->testimonial->orderby('TestimonialID','desc')->findAll();
        return view('all_testimonial',$data);
    }
     public function add_testimonial()
    {
        return view('add_testimonial');
    }
    
       public function save_testimonial()
    {
        // print_r($_POST); die;
        $testi_content = $this->request->getPost('testi_content');
        $testi_author = $this->request->getPost('testi_author');
        $testi_company = $this->request->getPost('testi_company');
        $testi_position = $this->request->getPost('testi_position');
        
        $file_image = $this->request->getFile('testi_image');
        $imgname=$file_image->getName();
        // print_r($imgname); die;
        if(!empty ($imgname))
        {
        $fileName = $file_image->getRandomName();
        $file_image->move('public/upload_images', $fileName);
        }else{
            $fileName="default.jpg";
        }
        
        
        $all_feild=[
            'TestimonialContent'  => $this->request->getVar('testi_content'),
            'TestimonialAuthor'  => $this->request->getVar('testi_author'),
             'TestimonialCompany'  => $this->request->getVar('testi_company'),
              'TestimonialPosition'  => $this->request->getVar('testi_position'),
               'TestimonialImage'  => $fileName
            
            // 'CouponLive' =>
            ];
        
        $testimonial_data=$this->testimonial->insert($all_feild);
        if($testimonial_data){
            echo 1;
        }else{
            echo 0;
        }
        
    }
    
     public function edit_testimonial($id=null){
        $data['all_testimonial_data']=$this->testimonial->where('TestimonialID',$id)->first();
        // print_r($data); die;
        return view('edit_testimonial',$data);
    }
    
     public function update_testimonial()
    { 
        // echo ("hii"); die;
        // print_r($_POST); die;
         $id = $this->request->getPost('id');
        //  print_r($id); die;
        $testi_content = $this->request->getPost('testi_content');
        $testi_author = $this->request->getPost('testi_author');
        $testi_company = $this->request->getPost('testi_company');
        $testi_position = $this->request->getPost('testi_position');
        
         $old_testi_pic= $this->request->getPost('old_testi_pic');
        
        $file_image = $this->request->getFile('testi_image');
        $imgname=$file_image->getName();
        if(!empty($imgname)){
            $fileName = $file_image->getRandomName();
        $file_image->move('public/upload_images', $fileName);
        }else{
            $fileName= $old_testi_pic;
        }
        
        
        // $all_feild=[
        //     'TestimonialContent'  => $this->request->getVar('testi_content'),
        //     'TestimonialAuthor'  => $this->request->getVar('testi_author'),
        //      'TestimonialCompany'  => $this->request->getVar('testi_company'),
        //       'TestimonialPosition'  => $this->request->getVar('testi_position'),
        //       'TestimonialImage'  => $fileName
            
        //     // 'CouponLive' =>
        //     ];
            
             $data = [
                         'TestimonialContent'  => $this->request->getVar('testi_content'),
            'TestimonialAuthor'  => $this->request->getVar('testi_author'),
             'TestimonialCompany'  => $this->request->getVar('testi_company'),
              'TestimonialPosition'  => $this->request->getVar('testi_position'),
               'TestimonialImage'  => $fileName,  
                        ];    
                        // print_r($data); die;
                                $db= \Config\Database::connect();
                                $builder = $db->table('testimonials');
                                    $builder->set($data);
                                    $builder->Where('TestimonialID',$id);
                                    $builder->update(); 
        
      
        if($builder){
            echo 1;
        }else{
            echo 0;
        }
        
    }
    
     public function del_testimonial(){
        $testimonial_ids=$this->request->getpost('testimonial_ids');
        $this->testimonial->where('TestimonialID',$testimonial_ids);
            $delete=$this->testimonial->delete(); 
       
       
            if($delete){
                echo 1;
            }else{
                echo 0;
            }
        
    }
    
    public function all_manage_enquries(){
        $data['all_enquiry_data']=$this->enquiry->findAll();
        return view('all_manage_enquries',$data);
    }
     public function view_detail_enquiry($id){
         $data['all_enquiry_data']=$this->enquiry->where('EnquiriID',$id)->first();
         return view('view_detail_enquiry',$data);
     }
     public function del_enquiry(){
         $enquiry_ids=$this->request->getpost('enquiry_ids');
        //  print_r($enquiry_ids); die;
        $this->enquiry->where('EnquiriID',$enquiry_ids);
            $delete=$this->enquiry->delete(); 
       
       
            if($delete){
                echo 1;
            }else{
                echo 0;
            }
     }
     
     public function rmv_order()
     {
        $id = $this->request->getpost('orderid');
        $this->orderitem->where('OrderID',$id);
        $this->orderitem->delete();
        $this->Ordermodel->where('OrderID',$id);
        $delete=$this->Ordermodel->delete(); 
       
       
            if($delete){
                echo 1;
            }else{
                echo 0;
            } 
     }
     
    //  public function savecomments()
    //  { 
    //     $order_id = $this->request->getpost('order_id');
    //     $comments = $this->request->getpost('comments');
    //     $order_status = $this->request->getPost('order_status');
    //     $user_id = $this->request->getPost('user_id');
        
    //     $usermail = $this->User->where('UserID',$user_id)->get()->getRow();
    //     // print_r($usermail); die;
    //     $toemail=$usermail->UserEmail; 
    //     $data=['order_id'=>$order_id,'comments'=>$comments];
        
    //     $order_data=['OrderStatus'=>$order_status];
    //     $this->Ordermodel->update($order_id,$order_data);
        
    //     // $this->Ordermodel->set('OrderStatus',$order_status,false);
    //     // $this->Ordermodel->where('OrderID',$order_id);
    //     // $this->Ordermodel->update();
    //     $status='';
    //     if($order_status=='1')
    //     {
    //         $status = 'Proof Approved';
    //     }
    //     else if($order_status=='2')
    //     {
    //         $status = 'Pending';
    //     }
    //     else if($order_status=='3')
    //     {
    //         $status = 'Order Processing';
    //     }
    //     else if($order_status=='4')
    //     {
    //         $status = 'File Review';
    //     }
    //     else if($order_status=='5')
    //     {
    //         $status = 'Waiting for file';
    //     }
    //     else if($order_status=='6')
    //     {
    //         $status = 'Art work completed';
    //     }
    //     else if($order_status=='7')
    //     {
    //         $status = 'File ready for printing';
    //     }
    //     else if($order_status=='8')
    //     {
    //         $status = 'CS alert';
    //     }
    //     else if($order_status=='9')
    //     {
    //         $status = 'On Hold';
    //     }
    //     else if($order_status=='10')
    //     {
    //         $status = 'Pre-Press';
    //     }
    //     else if($order_status=='11')
    //     {
    //         $status = 'In production';
    //     }
    //     else if($order_status=='12')
    //     {
    //         $status = 'Out of Production';
    //     }
    //     else if($order_status=='13')
    //     {
    //         $status = 'Order Cancelled';
    //     }
    //     else if($order_status=='14')
    //     {
    //         $status = 'Printing Done';
    //     }
    //     else if($order_status=='15')
    //     {
    //         $status = 'Ready for pickup';
    //     }
    //     else if($order_status=='16')
    //     {
    //         $status = 'Shipped';
    //     }
    //     else if($order_status=='17')
    //     {
    //         $status = 'Picked Up';
    //     }
    //     else if($order_status=='18')
    //     {
    //         $status = 'Proof Sent - Waiting for approval';
    //     }
    //     else if($order_status=='19')
    //     {
    //         $status = 'Pending order cancelled';
    //     }
    //     // print_r($order_status);die;
    //     $to=$toemail;
    //     $from='info@fableadtechnolabs.com';
    //     $subject='Order details';
    //     $headers  = 'MIME-Version: 1.0' . "\r\n";
    //     $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    //     $headers .= 'From:  '.$from."\r\n".
    //          'Reply-To: '.$from."\r\n" .
    //         'X-Mailer: PHP/' . phpversion();
            
    //     $email = \Config\Services::email();
    //     $email->setTo($to);
    //     $email->setFrom('info@fableadtechnolabs.com', 'Order Comments');
        
    //     $email->setSubject($subject);
        
    //     $email->setmailType('html');
        
    //     $message = "<html><body>";
    //     $message .= "<h2 style='text-decoration:unset; color:black!important;'>Order details</h2>";
    //     $message .="<p><strong>Order Id :</strong>$order_id  </p>";
    //     $message .="<p><strong>Order Status :</strong> $status</p>";
    //     $message .="<p><strong>Comment :</strong> $comments</p>";
    //     $message .= "</body></html>";
    //     $email->setMessage($message);
         
    //     if ($email->send()) 
	// 	{
    //          $res = $this->Ordercomment->insert($data);
    //          if($res)
    //          {
    //              echo 1;
    //          }
    //          else 
    //          {
    //              echo 0;
    //          }
    //     } 
	// 	else 
	// 	{
    //         $data = $email->printDebugger(['headers']);
    //         print_r($data);
    //     }
         
        
    //  }
    
    public function savecomments()
{
    // Retrieve posted data
    $order_id = $this->request->getPost('order_id');
    $comments = $this->request->getPost('comments');
    $order_status = $this->request->getPost('order_status');
    $user_id = $this->request->getPost('user_id');

    // Get user email based on user_id
    $usermail = $this->User->where('UserID', $user_id)->first();

    
    if (!$usermail) 
    {
      $email =  $this->Ordermodel->where('OrderID',$order_id)->first();
      $toemail =  $email['email'];
    }
    else
    {
        $toemail = $usermail['UserEmail'];

    }

    // Prepare data for comments and order update
    $data = ['order_id' => $order_id, 'comments' => $comments];
    $order_data = ['OrderStatus' => $order_status];
    
    // Update the order status
    $this->Ordermodel->update($order_id, $order_data);
    
    // Determine the order status message
    $status='';
        if($order_status=='1')
        {
            $status = 'Proof Approved';
        }
        else if($order_status=='2')
        {
            $status = 'Pending';
        }
        else if($order_status=='3')
        {
            $status = 'Order Processing';
        }
        else if($order_status=='4')
        {
            $status = 'File Review';
        }
        else if($order_status=='5')
        {
            $status = 'Waiting for file';
        }
        else if($order_status=='6')
        {
            $status = 'Art work completed';
        }
        else if($order_status=='7')
        {
            $status = 'File ready for printing';
        }
        else if($order_status=='8')
        {
            $status = 'CS alert';
        }
        else if($order_status=='9')
        {
            $status = 'On Hold';
        }
        else if($order_status=='10')
        {
            $status = 'Pre-Press';
        }
        else if($order_status=='11')
        {
            $status = 'In production';
        }
        else if($order_status=='12')
        {
            $status = 'Out of Production';
        }
        else if($order_status=='13')
        {
            $status = 'Order Cancelled';
        }
        else if($order_status=='14')
        {
            $status = 'Printing Done';
        }
        else if($order_status=='15')
        {
            $status = 'Ready for pickup';
        }
        else if($order_status=='16')
        {
            $status = 'Shipped';
        }
        else if($order_status=='17')
        {
            $status = 'Picked Up';
        }
        else if($order_status=='18')
        {
            $status = 'Proof Sent - Waiting for approval';
        }
        else if($order_status=='19')
        {
            $status = 'Pending order cancelled';
        }
    
    
    $status = $order_status ?? 'Unknown Status';
    
    // print_r( $toemail.$order_id.$comments );

    // Prepare the email
    $to = $toemail;
    $subject = 'Order details';
    $message = "<html><body>";
    $message .= "<h2 style='text-decoration:unset; color:black!important;'>Order details</h2>";
    $message .= "<p><strong>Order Id :</strong> $order_id</p>";
    $message .= "<p><strong>Order Status :</strong> $status</p>";
    $message .= "<p><strong>Comment :</strong> $comments</p>";
    $message .= "</body></html>";
    

    // Send the email
    $emailSender = new EmailSender();
    $emailSender->sendEmail($to, $subject, $message);

    $res = $this->Ordercomment->insert($data);

    if ($res) {
        echo 1; // Successfully added the comment
    } else {
        echo 2; // Failed to add the comment
    }

       
    
}


     
     
    public function export_order()
    {
        return view('export_order');
    }
     
    public function export_data()
    {
         helper(['form']);
         $session = \Config\Services::session();
        $rules = [
            'order_range' => 'required',
            'order_status' => 'required',
            'from_date' => 'required',
            'to_date'=> 'required',
        ];
          
            $orders = $this->request->getPost('order_range');
            $order_range = explode("-",$this->request->getpost('order_range'));
            $from_date = $this->request->getpost('from_date');
            $to_date = $this->request->getpost('to_date');
            $order_status = $this->request->getpost('order_status');
            
            // Convert dates from Y-m-d to d-m-Y
            if (!empty($from_date)) {
                $from_date = date('d-m-Y', strtotime($from_date));
            }
            if (!empty($to_date)) {
                $to_date = date('d-m-Y', strtotime($to_date));
            }
            
            // echo "<pre>";
            // print_r($from_date . ','. $to_date );die;
            // 2024-11-01,2024-12-02

            if(!empty($orders) && empty($order_status) && empty($from_date) && empty($to_date))
            {
                $usersData = $this->Ordermodel->select('OrderID,UserID,OrderNumber,OrderDate,TotalAmount,payment,OrderStatus,created_at,Updated_at')->where('OrderID >=',$order_range[0])->where('OrderID <=',$order_range[1])->findAll();
            }
            else if(empty($orders) && !empty($order_status) && empty($from_date) && empty($to_date))
            {
                $usersData = $this->Ordermodel->select('OrderID,UserID,OrderNumber,OrderDate,TotalAmount,payment,OrderStatus,created_at,Updated_at')->where('OrderStatus',$order_status)->findAll();
            }
            else if(empty($orders) && empty($order_status) && !empty($from_date) && empty($to_date))
            {
                $usersData = $this->Ordermodel->select('OrderID,UserID,OrderNumber,OrderDate,TotalAmount,payment,OrderStatus,created_at,Updated_at')->where('OrderDate >=',$from_date)->findAll();
            }
            else if(empty($orders) && empty($order_status) && empty($from_date) && !empty($to_date))
            {
                $usersData = $this->Ordermodel->select('OrderID,UserID,OrderNumber,OrderDate,TotalAmount,payment,OrderStatus,created_at,Updated_at')->where('OrderDate >=',$to_date)->findAll();
            }
            else if(!empty($orders) && !empty($order_status) && empty($from_date) && empty($to_date))
            {
                $usersData = $this->Ordermodel->select('OrderID,UserID,OrderNumber,OrderDate,TotalAmount,payment,OrderStatus,created_at,Updated_at')->where('OrderID >=',$order_range[0])->where('OrderID <=',$order_range[1])->where('OrderStatus',$order_status)->findAll();
            }
            else if(!empty($orders) && empty($order_status) && !empty($from_date) && empty($to_date))
            {
                $usersData = $this->Ordermodel->select('OrderID,UserID,OrderNumber,OrderDate,TotalAmount,payment,OrderStatus,created_at,Updated_at')->where('OrderID >=',$order_range[0])->where('OrderID <=',$order_range[1])->where('OrderDate',$from_date)->findAll();
            }
            else if(!empty($orders) && empty($order_status) && empty($from_date) && !empty($to_date))
            {
                $usersData = $this->Ordermodel->select('OrderID,UserID,OrderNumber,OrderDate,TotalAmount,payment,OrderStatus,created_at,Updated_at')->where('OrderID >=',$order_range[0])->where('OrderID <=',$order_range[1])->where('OrderDate',$to_date)->findAll();
            }
            else if(empty($orders) && !empty($order_status) && !empty($from_date) && empty($to_date))
            {
                $usersData = $this->Ordermodel->select('OrderID,UserID,OrderNumber,OrderDate,TotalAmount,payment,OrderStatus,created_at,Updated_at')->where('OrderStatus',$order_status)->where('OrderDate',$from_date)->findAll();
            }
            else if(empty($orders) && !empty($order_status) && empty($from_date) && !empty($to_date))
            {
                $usersData = $this->Ordermodel->select('OrderID,UserID,OrderNumber,OrderDate,TotalAmount,payment,OrderStatus,created_at,Updated_at')->where('OrderStatus',$order_status)->where('OrderDate',$to_date)->findAll();
            }
            else if(empty($orders) && empty($order_status) && !empty($from_date) && !empty($to_date))
            {
                $usersData = $this->Ordermodel->select('OrderID,UserID,OrderNumber,OrderDate,TotalAmount,payment,OrderStatus,created_at,Updated_at')->where('OrderDate >=',$from_date)->where('OrderDate <=',$to_date)->findAll();
            }
            else if(empty($orders) && !empty($order_status) && !empty($from_date) && !empty($to_date))
            {
                $usersData = $this->Ordermodel->select('OrderID,UserID,OrderNumber,OrderDate,TotalAmount,payment,OrderStatus,created_at,Updated_at')->where('OrderStatus',$order_status)->where('OrderDate >=',$from_date)->where('OrderDate <=',$to_date)->findAll();
            }
            else if(!empty($orders) && !empty($order_status) && !empty($from_date) && empty($to_date))
            {
                $usersData = $this->Ordermodel->select('OrderID,UserID,OrderNumber,OrderDate,TotalAmount,payment,OrderStatus,created_at,Updated_at')->where('OrderID >=',$order_range[0])->where('OrderID <=',$order_range[1])->where('OrderStatus',$order_status)->where('OrderDate',$from_date)->findAll();
            }
            else if(!empty($orders) && !empty($order_status) && !empty($from_date) && !empty($to_date))
            {
                $usersData = $this->Ordermodel->select('OrderID,UserID,OrderNumber,OrderDate,TotalAmount,payment,OrderStatus,created_at,Updated_at')->where('TotalAmount>=',$order_range[0])->where('TotalAmount<=',$order_range[1])->where('OrderStatus',$order_status)->where('OrderDate >=',$from_date)->orWhere('OrderDate <=',$to_date)->findAll();
            }
            else 
            {
                $usersData = $this->Ordermodel->select('OrderID,UserID,OrderNumber,OrderDate,TotalAmount,payment,OrderStatus,created_at,Updated_at')->findAll();
            }
           
            if(count($usersData) > 0)
            {
                $filename = 'Orders_'.date('Ymd').'.csv'; 
                header("Content-Description: File Transfer");
                header('Content-Type: text/csv');
                header('Content-Disposition: attachment; filename="' .$filename.'"');
                header("Pragma: no-cache");
                header("Expires: 0");
                ob_end_clean();
                
                 $file = fopen('php://output','w');
               
                 $header = array('OrderID','UserID','OrderNumber','OrderDate','TotalAmount','payment','OrderStatus','created_at','Updated_at');
                  
                 fputcsv($file, $header);
                 foreach($usersData as $key=>$line)
                 {
                    fputcsv($file,$line); 
                 }
                 fclose($file); 
                 exit;
            }
            else 
            {
                 $_SESSION['error'] = 'No record found';
                 $session = session();
                 $session->markAsFlashdata('error');
                 echo view('export_order');
            }     
    }
    
    public function upd_order()
{
    $orderid = $this->request->getPost('order');
    $orddata = $this->orderitem->where('OrderID', $orderid)->get()->getResult('array');
    ?>
    <div class="card-header">
        <div class="row">
            <div class="col-lg-3">
                <label for="defaultFormControlInput" class="form-label" style="margin-left:25px"><strong>Product</strong></label>
            </div>
            <div class="col-lg-3">
                <label for="defaultFormControlInput" class="form-label" style="margin-left:25px">Price</label>
            </div>
            <div class="col-lg-2">
                <label for="defaultFormControlInput" class="form-label" style="margin-left:25px">Quantity</label>
            </div>
            <div class="col-lg-2 text-end">
                <label for="defaultFormControlInput" class="form-label" style="margin-left:30px !important">Action</label>
            </div>
        </div>
    </div>
    <div class="card-body m-1">
        <?php
        foreach ($orddata as $odt) {
            $proddata = $this->product->where('ProductID', $odt['ProductID'])->get()->getRow();
            $images = !empty($proddata->ProductImage) ? json_decode($proddata->ProductImage) : ['18.png'];
            $imageSrc = base_url('public/assets/img/product_images/' . $images[0]);
        ?>
        <div class="row product-summery-headers mt-3 p-0">
            <div class="col-lg-3">
                <div class="product-img-box">
                    <img src="<?php echo $imageSrc; ?>" style="width: 20%; margin-right: 10px;" class="product-img" alt="Product Image">
                    <br/><span class="product-name"><?php echo !empty($proddata->ProductName) ? substr($proddata->ProductName, 0, 20) : ''; ?></span>
                </div>
            </div>
            <div class="col-lg-3">
                <input type="number" name="price[]" class="form-control" value="<?php echo $odt['Price']; ?>" />
            </div>
            <div class="col-lg-2">
                <input type="number" name="quantity[]" class="form-control" value="<?php echo $odt['Quantity']; ?>" readonly />
            </div>
            <div class="col-lg-2 ">
                <div class="mb-2">
                <input type="hidden" name="orderid" value="<?php echo $orderid; ?>" />
                <input type="hidden" name="productid" value="<?php echo $odt['ProductID']; ?>" />
                <button type="button" class="btn btn-primary upd_orddata" style="margin-left:83px">Save</button>
                </div>
            </div>
        </div>
        <?php 
        }
        ?>
    </div>
    <?php
}

    
    public function upload_template_dt()
    {
        $productid = $this->request->getPost('productid');
        $orderid = $this->request->getPost('orderid');
        
        $proddet = $this->product->where('ProductID',$productid)->get()->getRow();
        
        $prodimg = $this->request->getFileMultiple('upload_template');
        $productimage = "";
        
        if(!empty($this->request->getFileMultiple('upload_template')))
        {
            $files = $this->request->getFileMultiple('upload_template');
            
            $products_img_arr = [];
            foreach ($files as $file) {
                
                if ($file->isValid() && ! $file->hasMoved())
                {
                    $newName = $file->getRandomName();
                    $file->move('public/assets/img/product_images', $newName);

                    $products_img_arr[] = $newName;
                    // $filesUploaded++;
                }
                 
            }

           

            if(!empty($products_img_arr)){
                $productimage = json_encode($products_img_arr);
            }
        }
        else 
        {
            $productimage = $proddet->ProductImage;
        }
            $res = $this->product->set('ProductImage',$productimage)->where('ProductID',$productid)->update();
           
            if($res)
            {
                echo 1;
            }
            else
            {
                echo 0;
            }
      
        
    }
    
    public function all_methods(){
        $data['all_shipping_methods'] = $this->shippingmethod->orderBy('MethodID', 'desc')->findAll();
    
        return view('all_shipping_methods', $data);
    }
     
    public function edit_shipping_methods($id=null){
        $data['single_shipping_data'] = $this->shippingmethod->where('MethodID', $id)->orderBy('MethodID', 'desc')->first();
        
        return view('edit_shipping_methods', $data);
    }
    
    public function update_shipping_methods(){
        // Get data from the form
        $shipping_id = $this->request->getPost('shipping_id');
        $shipping_name = $this->request->getPost('shipping_name');
    
        $data_update1 = [
            'MethodName' => $shipping_name,
        ];
    
    
        // Update the first table (shippingmethod)
        $shipping_data1 = $this->shippingmethod->update($shipping_id, $data_update1);
    
    
        if ($shipping_data1) {
            echo 1;
        } else {
            echo 0;
        }
    }
    
    
    public function add_shipping_methods()
    {
        return view('add_shipping_methods');
    }
    
    public function save_shipping_methods()
    {
        $shipping_name = $this->request->getPost('shipping_name');
        
        $data_insert=[
            'MethodName'  => $shipping_name,
        
        ];
        $shipping_data=$this->shippingmethod->insert($data_insert);
        
        if($shipping_data){
            echo 1;
        }else{
            echo 0;
        }
    }
    
    public function delete_shipping_methods() {
        $shipping_id = $this->request->getPost('shipping_ids');
        
        $this->shippingmethod->where('MethodID', $shipping_id);
        $delete = $this->shippingmethod->delete(); 
        
        if ($delete) {
            echo 1;
        } else {
            echo 0;
        }
    }
    public function all_chat() {
    
    $usersWithRole2 = $this->ChatModel
        ->select('chat.*, orders.OrderID, orders.OrderNumber, products.ProductImage, products.ProductName, users.UserFirstName') 
        ->join('orders', 'orders.OrderID = chat.order_id', 'left') 
        ->join('orderitems', 'orderitems.OrderID = orders.OrderID', 'left') 
        ->join('products', 'products.ProductID = orderitems.ProductID', 'left') 
        ->join('users', 'users.UserID = chat.sender_id', 'left') 
        ->where('users.UserType', 2)
        ->findAll();

    $uniqueChats = [];
    $seenCombinations = [];

    foreach ($usersWithRole2 as $chat) {
        $combinationKey = $chat['order_id'] . '_' . $chat['sender_id'];

        if (!in_array($combinationKey, $seenCombinations)) {
            $uniqueChats[] = $chat;
            $seenCombinations[] = $combinationKey;
        }
    }
    // echo '<pre>';
    // print_r($uniqueChats);die;
    return view('all_chat', ['chatData' => $uniqueChats]);
}

public function sendMessage()
{
    $chatModel = new ChatModel();
    $session = \Config\Services::session();
    $userId = $session->get('admin_id');
    $userprofile = $session->get('UserProfile');

    $receiverID = $this->request->getPost('user-id');
    $orderId = $this->request->getPost('order_id');
   
    
    $textMessage = $this->request->getPost('textMsg');
    $fileMessage = $this->request->getFile('file');
    $messageType = $this->request->getPost('mType');
    $success = false;
    $messageData = [];

    if ($fileMessage && $fileMessage->isValid() && !$fileMessage->hasMoved()) {
        $directory = FCPATH . 'admin/public/upload_images/';
        $newName = $fileMessage->getRandomName();
        $fileMessage->move($directory, $newName);
        $finalFileMessage = $newName;

        $success = $chatModel->insert([
            'sender_id' => $userId,
            'receiver_id' => $receiverID,
            'order_id' => $orderId,
            'msg_type' => $messageType, 
            'message' => $finalFileMessage,
            'read_status' => 0,
        ]);

        $messageData = [
            'sender_id' => $userId,
            'msg_type' => $messageType,
            'message' => base_url("admin/public/upload_images/" . $finalFileMessage),
            'created_at' => date('Y-m-d H:i:s')
        ];
    }

    if (!empty($textMessage)) {
        $textInsert = $chatModel->insert([
            'sender_id' => $userId,
            'receiver_id' => $receiverID,
            'order_id' => $orderId,
            'msg_type' => 1, 
            'message' => $textMessage,
            'read_status' => 0,
        ]);

        if ($textInsert) {
            $success = true;
            $messageData = [
                'sender_id' => $userId,
                'msg_type' => 1,
                'message' => $textMessage,
                'userprofile'=>$userprofile,
                'created_at' => date('Y-m-d H:i:s')
            ];
        }
    }
    
    if ($success) {
        return $this->response->setJSON(['status' => true, 'message' => 'Success', 'data' => $messageData]);
    } else {
        return $this->response->setJSON(['status' => false, 'message' => 'Fail']);
    }


}



public function view_chat($orderId) {
    $currentUserId = $this->session->get('user_id');
    
    $chatData = $this->ChatModel
        ->select('chat.*, 
                  orders.OrderID, orders.OrderNumber, 
                  products.ProductImage, products.ProductName, 
                  sender.UserFirstName as sender_name, sender.UserProfile as sender_image, 
                  receiver.UserFirstName as receiver_name, receiver.UserProfile as receiver_image')
        ->join('orders', 'orders.OrderID = chat.order_id', 'left')
        ->join('orderitems', 'orderitems.OrderID = orders.OrderID', 'left')
        ->join('products', 'products.ProductID = orderitems.ProductID', 'left')
        ->join('users as sender', 'sender.UserID = chat.sender_id', 'left')  // Alias for sender
        ->join('users as receiver', 'receiver.UserID = chat.receiver_id', 'left') // Alias for receiver
        ->where('chat.order_id', $orderId)  // Filter by order_id
        ->findAll();
    
    return view('view_chat', [
        'chatData' => $chatData,
        'currentUserId' => $currentUserId,
        'orderId' => $orderId
    ]);
}

// public function all_chat()
// {
   
//     $userId = $session->get("supplier_id");

//     // Fetch all users with role 3
//     $usersWithRole2 = $this->ChatModel
//         ->select('chat.*, orders.OrderID, orders.OrderNumber, products.ProductImage, products.ProductName, users.UserFirstName') 
//         ->join('orders', 'orders.OrderID = chat.order_id', 'left') 
//         ->join('orderitems', 'orderitems.OrderID = orders.OrderID', 'left') 
//         ->join('products', 'products.ProductID = orderitems.ProductID', 'left') 
//         ->join('users', 'users.UserID = chat.sender_id', 'left') 
//         ->where('users.UserType', 2)
//         ->findAll();
        
//          $uniqueChats = [];
//     $seenCombinations = [];

//     foreach ($usersWithRole2 as $chat) {
//         $combinationKey = $chat['order_id'] . '_' . $chat['sender_id'];

//         if (!in_array($combinationKey, $seenCombinations)) {
//             $uniqueChats[] = $chat;
//             $seenCombinations[] = $combinationKey;
//         }
//     }

//     foreach ($usersWithRole2 as &$user) {
//         $lastMessage = $chatModel->where("(from_id = {$user['id']} AND to_id = {$userId}) OR (from_id = {$userId} AND to_id = {$user['id']})")
//                         ->where('order_id', $orderId)
//                          ->orderBy('id', 'DESC')
//                          ->first();
//         if ($lastMessage) {
//             $user['last_message'] = [
//                 'message' => $lastMessage['massage'], 
//                 'massage' => $lastMessage['massage'] ?? '',
//                 'from_id' => $lastMessage['from_id'] ?? '',
//                 'to_id' => $lastMessage['to_id'] ?? '',
//                 'created_at' => $lastMessage['created_at'] 
//             ];
//         } else {
//             $user['last_message'] = null; 
//         }

       
//          $unreadCount = $chatModel->where('from_id', $user['id'])
//                                  ->where('to_id', $userId)
//                                  ->where('read_status', 0)
//                                  ->countAllResults();
        
//         $user['unread_count'] = $unreadCount;
//     }

//     usort($users, function($a, $b) {
//         $aLastMessageDate = $a['last_message']['created_at'] ?? '1970-01-01 00:00:00';
//         $bLastMessageDate = $b['last_message']['created_at'] ?? '1970-01-01 00:00:00';

//         return strtotime($bLastMessageDate) - strtotime($aLastMessageDate);
//     });

//     $data['users'] = $users;
//     return view('all_chat', ['chatData' => $uniqueChats]);
// }

public function fetchChatData()
{
    // Load the models
    $ChatModel = new ChatModel();
    $UserModel = new UserModel();

    $input = $this->request->getJSON(true);
    $userId = $input['userId'] ?? null;
    $order_id = $input['orderId'] ?? null;


  


    // Check if userId is provided
    if (!$userId) {
        return $this->response->setStatusCode(400)
            ->setJSON(['status' => 'error', 'message' => 'User ID is required']);
    }

    // Check if order_id is provided
    if (!$order_id) {
        return $this->response->setStatusCode(400)
            ->setJSON(['status' => 'error', 'message' => 'Order ID is required']);
    }
    $session = \Config\Services::session();
    
    $loggedInUserId = $session->get('admin_id');;  

    // Fetch user data
    $user = $UserModel->find($userId);
    if (!$user) {
        return $this->response->setStatusCode(404)
            ->setJSON(['status' => 'error', 'message' => 'User not found']);
    }
    
    try {
        $chatData = $ChatModel
        ->select('chat.*, users.UserFirstName as sender_username, users.UserID as sender_id, users.UserProfile as sender_profile')
            ->join('users', 'users.UserID = chat.sender_id')
            ->groupStart()
                ->where('chat.sender_id', $userId)
                ->where('chat.receiver_id', $loggedInUserId)
                ->orWhere('chat.sender_id', $loggedInUserId)
                ->where('chat.receiver_id', $userId)
            ->groupEnd()
            ->where('chat.order_id', $order_id)  // Filter by order ID
            ->orderBy('chat.chat_id', 'ASC')
            ->findAll();
           

        } catch (\Exception $e) {
        return $this->response->setStatusCode(500)
            ->setJSON(['status' => 'error', 'message' => 'Error fetching chat data: ' . $e->getMessage()]);
    }

    // Process chat data for display
    foreach ($chatData as &$chatUser) {
        if (!is_array($chatUser)) {
            continue;
        }

        $fromLoggedInUser = ($chatUser['sender_id'] == $loggedInUserId);
        $userDetails = $fromLoggedInUser ? $user : $UserModel->find($chatUser['sender_id']);

        $chatUser['class'] = $fromLoggedInUser ? 'justify-content-end' : 'justify-content-start';
        $chatUser['bgColor'] = $fromLoggedInUser ? '' : 'background-color: #f5f6f7 !important;';
        $chatUser['textColor'] = $fromLoggedInUser ? 'text-white' : '';
        $chatUser['mClass'] = $fromLoggedInUser ? 'me-3' : 'ms-3';
        $chatUser['textEnd'] = $fromLoggedInUser ? 'text-end' : '';

        $date = isset($chatUser['created_at']) ? new \DateTime($chatUser['created_at']) : new \DateTime();
        $chatUser['created_at'] = $date->format('d M g:i a');
        $chatUser['userName'] = $userDetails['UserFirstName'] ?? 'Unknown';
        $chatUser['userProfile'] = $userDetails['UserProfile'] ?? 'ava1-bg.webp';
    }

    // Return response
    if ($chatData) {
        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Successful',
            'user' => $user,
            'messages' => $chatData,
            'userId' => $loggedInUserId
        ]);
    } else {
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'No chat data found'
        ]);
    }
}


public function add_order()
{
    // Fetch all users with UserType 2
    $data['users'] = $this->User->where('UserType', '2')->findAll();
    // Fetch all products
    $data['products'] = $this->product->findAll();

    // Initialize selectedUser to null
    $data['selectedUser'] = null;

    // Check if a user is selected
    if ($this->request->getPost('UserFirstName')) {
        $userID = $this->request->getPost('UserFirstName');
        
        // Fetch selected user details from the database
        $data['selectedUser'] = $this->User->find($userID);
    }

    return view('add_order', $data);
}

public function save_order() 
{
    $user_id = $this->request->getPost('UserFirstName');
    $UserCity = $this->request->getPost('UserCity');
    $UserState = $this->request->getPost('UserState');
    $UserZip = $this->request->getPost('UserZip');
    $UserPhone = $this->request->getPost('UserPhone');
    $UserAddress = $this->request->getPost('UserAddress');
    $products = $this->request->getPost('product');
    $quantities = $this->request->getPost('Quantity');
    $prices = $this->request->getPost('Price');
    $total_prices = $this->request->getPost('totalprice');
    $grandTotal = $this->request->getPost('grandTotal');
    $paymentMethod = $this->request->getPost('paymentMethod');

    // $state = $this->stateModel->where('StateName', $UserState)->first();
    // if (!$state) {
    //     return $this->response->setJSON(['success' => 'state', 'message' => 'State not found!']);

    // }
    
    $inputState = strtolower(trim($this->request->getPost('UserState')));

// Get all states to compare
$allStates = $this->stateModel->findAll();
$matchedState = null;
$highestMatch = 0;

foreach ($allStates as $stateRow) {
    $dbState = strtolower($stateRow['StateName']);
    similar_text($inputState, $dbState, $percent);

    if ($percent > $highestMatch) {
        $highestMatch = $percent;
        $matchedState = $stateRow;
    }
}

// Set a matching threshold (e.g., 70%)
if ($highestMatch >= 70 && $matchedState) {
    $state = $matchedState;
    // print_r($state);
} else {
    return $this->response->setJSON(['success' => 'state', 'message' => 'State not found! Please check spelling.']);
}

    $country_id = $state['CountryID'];
    $state_id = $state['StateID'];

    // Fetch city data
    $city = $this->cityModel->where('StateID', $state_id)
                            ->where('CityName', $UserCity)
                            ->first();
    if (!$city) {
        // return $this->response->setJSON(['success' => 'city', 'message' => 'City not found!']);
    }

    $city_id = $city['CityID'] ?? '';

    // Fetch tax data
    // $tax = $this->taxModel->where('Country', $country_id)
    //                     ->where('State', $state_id)
    //                     ->where('City', $city_id)
    //                     ->where('Zip', $UserZip)
    //                     ->first();
    // if (!$tax) {
    //     return $this->response->setJSON(['success' => 'tax', 'message' => 'Please Use Another Zip Code!']);
    // }
    // $total_tax =  $tax['TaxRate'];
    
  // Fetch the applicable tax settings for Country/State/City
$tax = $this->taxModel->where('Country', $country_id)
    ->where('State', $state_id)
    ->where('City', $city_id)
    ->first();

// If no tax rule found for this region, reject


// Check if ZIP check is enabled
if ($tax['is_check'] == 1) {
    // Perform ZIP validation
    $zipMatch = $this->taxModel->where('Country', $country_id)
        ->where('State', $state_id)
        ->where('City', $city_id)
        ->where('Zip', $UserZip)
        ->first();

    if (!$zipMatch) {
        return $this->response->setJSON(['success' => 'tax', 'message' => 'Please Use Another Zip Code!']);
    }

    // ZIP matched, apply tax rate
    $total_tax = $zipMatch['TaxRate'];
} else {
    // Skip ZIP validation, apply 0 tax
    $total_tax = 0;
}


 
    
    $setting = $this->Allsettings->first();
    
    $products = is_array($products) ? $products : [];
    $quantities = is_array($quantities) ? $quantities : [];
    $prices = is_array($prices) ? $prices : [];
    $total_prices = is_array($total_prices) ? $total_prices : [];
    
    $count = count($products);
    
    if (count($quantities) !== $count || count($prices) !== $count || count($total_prices) !== $count) {
        return $this->response->setJSON(['success' => false, 'message' => 'Mismatch in input data.']);
    }
    
    $overall_result = true;
    $order_number = sprintf('%05d', mt_rand(0, 99999));
    $current_date = date('d-m-Y');
    
    // $shipping_rate_data = $this->ShippingDataModel->where('amount <', $grandTotal)->first();
    // $shipping_charge = !empty($shipping_rate_data) ? $shipping_rate_data['shipping_rate'] : 0;

    $shipping_zone_id = $this->shippingzone->where("JSON_CONTAINS(ZoneName, '\"$UserZip\"')", null, false)->first();

    if ($shipping_zone_id) {
        // Retrieve the state using the RateID from the shipping zone
        $state = $this->shippingrate->where('RateID', $shipping_zone_id['RateID'])->first();
    
        if ($state) {
            $shipping_charge = $state['Price'];
        } else {
            $shipping_charge = 100;
        }
    } else {
        $shipping_charge = 100;
    }
    
 
    $hcharge = $total_tax;
    
    $totalAmount = array_sum($total_prices) + $shipping_charge + $hcharge;
    
    if ($user_id) {
        $customer = $this->User->where('UserID', $user_id)->first();
        if ($customer) {
            $customerdata = [
                'UserID' => $user_id,
                'fname' => $customer['UserFirstName'] ?? '',
                'lname' => $customer['UserLastName'] ?? '',
                'email' => $customer['UserEmail'] ?? '',
                'phoneno' => $customer['UserPhone'] ?? '',
                'country' => $customer['UserCountry'] ?? '',
                'state' => $customer['UserState'] ?? '',
                'city' => $customer['UserCity'] ?? '',
                'address1' => $customer['UserAddress'] ?? '',
                'address2' => $customer['UserAddress2'] ?? '',
                'zipcode' => $customer['UserZip'] ?? '',
                'totalTax' => $total_tax,
                'totalShipingCost' => $shipping_charge,
                'TotalAmount' => $totalAmount,
                'OrderStatus' => 'Pending',
                'payment' => $paymentMethod,
                'OrderDate' => $current_date,
                'OrderNumber' => $order_number
            ];
        } else 
        {
            return $this->response->setJSON(['success' => false, 'message' => 'Customer not found.']);
        }
    } else {
        $customerdata = [
            'email' => $this->request->getPost('email'),
            'fname' => $this->request->getPost('UserFirstNameInput'),
            'country' => $country_id,
            'city' => $city_id,
            'state' => $state_id,
            'zipcode' => $UserZip,
            'phoneno' => $UserPhone,
            'address1' => $UserAddress,
            'address2' => $this->request->getPost('UserAddress2') ?? null,
            'totalTax' => $total_tax,
            'totalShipingCost' => $shipping_charge,
            'TotalAmount' => $totalAmount,
            'payment' => $paymentMethod,
            'OrderStatus' => 'Pending',
            'OrderDate' => $current_date,
            'OrderNumber' => $order_number
        ];
    }
    
    // print_r($customerdata);die;
    $result = $this->Ordermodel->insert($customerdata);
    
    if ($result) {
        $id = $this->Ordermodel->insertID();

        foreach ($products as $index => $product_id) {
            $order_data = [
                'OrderID' => $id,
                'ProductID' => $product_id,
                'Quantity' => $quantities[$index],
                'Price' => $prices[$index],
            ];

            $item_result = $this->orderitem->insert($order_data);
            if (!$item_result) {
                $overall_result = false;
                break;
            }
        }
    } else {
        $overall_result = false;
    }

    if ($overall_result) {
        $emailSender = new \App\Libraries\EmailSender();
$subject = 'New Order Confirmation';
$logo = "http://localhost/ecomweb/admin/public/upload_images/811579-middle.png";

$message = "
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; }
        .order, .product { border-collapse: collapse; width: 100%; border: 1px solid black; margin-bottom: 20px; }
        .order th, .order td, .product th, .product td { padding: .625em; text-align: left; border: 1px solid #ddd; }
        .order th { background-color: #f8f8f8; }
        .product th { background-color: #f8f8f8; text-align: center; }
        h3, h4 { text-align: center; }
        .footer { width: 100%; background-color: #f7941d; padding: 1px; margin-top: 15px; border-radius: 5px; text-align: center; color: white; }
        .footer a { color: white; text-decoration: underline; }
    </style>
</head>
<body>
    <div style='text-align:center'>
        <img src='$logo' alt='Logo' style='max-width: 100%; height: auto;'/>
    </div>
    <div>
        <h3>Thank you! Your order has been placed successfully.</h3>
    </div>
    <div>
        <h3>Your order details are as follows:</h3>
    </div>



 <div style='width: 100%; display: flex; justify-content: space-between;border: 1px solid #ccc; '>
        <div style='border-right: 1px solid #ccc; padding: 10px;width:49%;'>
            <h4 style='margin: 0;'>SUMMARY:</h4>
            <table class='order' width='100%' style='border: none; border-collapse: collapse;'>
                <tr style='border: none;'>
                    <td style='border: none;'><strong>Order No.:</strong></td>
                    <td style='border: none;'>#{$order_number}</td>
                </tr>
                <tr style='border: none; font-weight: bold;'>
                    <td style='border: none;'><strong>Total Product Price:</strong></td>
                    <td style='border: none;'>₹{$grandTotal}</td>
                </tr>";

if ($shipping_charge > 0) {
    $message .= "
                <tr style='border: none;'>
                    <td style='border: none;'><strong>Shipping Cost:</strong></td>
                    <td style='border: none;'>(+ ₹{$shipping_charge})</td>
                </tr>";
}

if ($hcharge > 0) {
    $message .= "
                <tr style='border: none;'>
                    <td style='border: none;'><strong>Handling Charge:</strong></td>
                    <td style='border: none;'>(+ ₹{$hcharge})</td>
                </tr>";
}

if (isset($customer)) 
{
    $customeName = $customer['UserFirstName']?? " ";
    $customelast = $customer['UserLastName']?? " ";
    $customeEmail = $customer['UserEmail']?? " ";
    $customePhone = $customer['UserPhone']?? " ";
    $customeAddess = $customer['UserAddress']?? " ";
   
}
else
{

    $customeName = $customerdata['fname'] ?? " ";
    $customelast = " ";
    $customeEmail = $customerdata['email'] ?? " ";
    $customePhone = $customerdata['phoneno'] ?? " ";
    $customeAddess = $customerdata['address1']?? " ";

}



$message .= "
                <tr style='border: none; font-weight: bold;'>
                    <td style='border: none;'><strong>Total Amount:</strong></td>
                    <td style='border: none;'>₹{$totalAmount}</td>
                </tr>
                <tr style='border: none;'>
                    <td style='border: none;'><strong>Placed On:</strong></td>
                    <td style='border: none;'>{$current_date}</td>
                </tr>
            </table>
        </div>
        <div style='width:49%; padding: 25px;'>
            <h4 style='margin: 1;'>SHIPPING ADDRESS:</h4>
            <table class='order' width='100%' style='border: none; border-collapse: collapse;'>
                <tr style='border: none;'> 
                    <td style='border: none;'><strong>Name :</strong> {$customeName}" ." "." ". ($customelast) . "</td>
                </tr>
                <tr style='border: none;'>
                    <td style='border: none;'><strong>Email :</strong> " . ($customeEmail ?? 'N/A') . "</td>
                </tr>
                <tr style='border: none;'>
                    <td style='border: none;'><strong>Phone :</strong> " . ($customePhone ??  'N/A') . "</td>
                </tr>
                <tr style='border: none;'>
                    <td style='border: none;'><strong>Address :</strong> " . 
                    ($customeAddess  ?? 'N/A') . ", " . 
                    (isset($UserZip) ? $UserZip : 'N/A') . ", " . 
                    (isset($UserCity) ? $UserCity : 'N/A') . ", " . 
                    (isset($UserState) ? $UserState : 'N/A') . 
                "</td>
                </tr>
            </table>
        </div>
    </div>

    <div>
        <h3>PRODUCT DETAILS:</h3>
        <table class='product'>
            <thead>
                <tr><th>Image</th><th>Name</th><th>Quantity</th><th>Price</th><th>Subtotal</th></tr>
            </thead>
            <tbody>";

foreach ($products as $index => $product_id) {
    $productdata = $this->product->where('ProductID', $product_id)->first();
    $productImageArray = isset($productdata['ProductImage']) ? json_decode($productdata['ProductImage'], true) : null;
    // Set default image if not found
    $productImage = (is_array($productImageArray) && !empty($productImageArray)) ? 
                    base_url('public/assets/img/product_images/') . $productImageArray[0] : 
                    'http://localhost/ecomweb/admin/public/assets/img/product_images/default_img.jpeg';
    
    $productName = isset($productdata['ProductName']) ? $productdata['ProductName'] : 'Product Name Not Available';
    $productPrice = isset($prices[$index]) ? (float)$prices[$index] : 0;
    $quantity = isset($quantities[$index]) ? (int)$quantities[$index] : 0;
    $subtotal = $productPrice * $quantity;

    $message .= "
        <tr>
            <td><img src='{$productImage}' alt='{$productName}' style='width: 50px; height: 50px;'></td>
            <td>{$productName}</td>
            <td>{$quantity}</td>
            <td>₹" . number_format($productPrice, 2) . "</td>
            <td>₹" . number_format($subtotal, 2) . "</td>
        </tr>";
}

$message .= "
            </tbody>
        </table>
    </div>
    <div style='width:100%;background-color:#f7941d;padding:1px;margin-top:15px;border-radius:5px;text-align:center'>
        <h3 style='text-align:center;color:white;'>Call us at <a href='tel:+9051294444' style='color:white;'>+9051294444</a> for any support.</h3>
    </div>
</body>
</html>";


        $emailSender->sendEmail($customeEmail, $subject, $message);
        return $this->response->setJSON(['success' => '1', 'message' => 'Order placed successfully!']);
    }

    return $this->response->setJSON(['success' => '2', 'message' => 'Failed to place order.']);
}

// public function save_order() 
// {
//     $user_id = $this->request->getPost('UserFirstName');
//     $UserCity = $this->request->getPost('UserCity');
//     $UserState = $this->request->getPost('UserState');
//     $UserZip = $this->request->getPost('UserZip');
//     $UserPhone = $this->request->getPost('UserPhone');
//     $UserAddress = $this->request->getPost('UserAddress');
//     $products = $this->request->getPost('product');
//     $quantities = $this->request->getPost('Quantity');
//     $prices = $this->request->getPost('Price');
//     $total_prices = $this->request->getPost('totalprice');
//     $grandTotal = $this->request->getPost('grandTotal');
//     $paymentMethod = $this->request->getPost('paymentMethod');

//     $inputState = strtolower(trim($UserState));
//     $allStates = $this->stateModel->findAll();
//     $matchedState = null;
//     $highestMatch = 0;

//     foreach ($allStates as $stateRow) {
//         $dbState = strtolower($stateRow['StateName']);
//         similar_text($inputState, $dbState, $percent);
//         if ($percent > $highestMatch) {
//             $highestMatch = $percent;
//             $matchedState = $stateRow;
//         }
//     }

//     if ($highestMatch >= 70 && $matchedState) {
//         $state = $matchedState;
//     } else {
//         return $this->response->setJSON(['success' => 'state', 'message' => 'State not found! Please check spelling.']);
//     }

//     $country_id = $state['CountryID'];
//     $state_id = $state['StateID'];
//     $city = $this->cityModel->where('StateID', $state_id)->where('CityName', $UserCity)->first();
//     $city_id = $city['CityID'] ?? null;

//     $tax = $this->taxModel->where('Country', $country_id)
//                           ->where('State', $state_id)
//                           ->where('City', $city_id)
//                           ->where('Zip', $UserZip)
//                           ->first();

//     if (!$tax) {
//         return $this->response->setJSON(['success' => 'tax', 'message' => 'Please Use Another Zip Code!']);
//     }

//     $total_tax =  $tax['TaxRate'];
//     $setting = $this->Allsettings->first();

//     $products = is_array($products) ? $products : [];
//     $quantities = is_array($quantities) ? $quantities : [];
//     $prices = is_array($prices) ? $prices : [];
//     $total_prices = is_array($total_prices) ? $total_prices : [];

//     $count = count($products);
//     if (count($quantities) !== $count || count($prices) !== $count || count($total_prices) !== $count) {
//         return $this->response->setJSON(['success' => false, 'message' => 'Mismatch in input data.']);
//     }

//     $overall_result = true;
//     $order_number = sprintf('%05d', mt_rand(0, 99999));
//     $current_date = date('d-m-Y');

//     $shipping_zone_id = $this->shippingzone->where("JSON_CONTAINS(ZoneName, '\"$UserZip\"')", null, false)->first();
//     $shipping_charge = 100;
//     if ($shipping_zone_id) {
//         $rate = $this->shippingrate->where('RateID', $shipping_zone_id['RateID'])->first();
//         if ($rate) $shipping_charge = $rate['Price'];
//     }

//     $hcharge = $total_tax;
//     $totalAmount = array_sum($total_prices) + $shipping_charge + $hcharge;

//     if ($user_id) {
//         $customer = $this->User->where('UserID', $user_id)->first();
//         if (!$customer) return $this->response->setJSON(['success' => false, 'message' => 'Customer not found.']);

//         $customerdata = [
//             'UserID' => $user_id,
//             'fname' => $customer['UserFirstName'] ?? '',
//             'lname' => $customer['UserLastName'] ?? '',
//             'email' => $customer['UserEmail'] ?? '',
//             'phoneno' => $customer['UserPhone'] ?? '',
//             'country' => $customer['UserCountry'] ?? '',
//             'state' => $customer['UserState'] ?? '',
//             'city' => $customer['UserCity'] ?? '',
//             'address1' => $customer['UserAddress'] ?? '',
//             'address2' => $customer['UserAddress2'] ?? '',
//             'zipcode' => $customer['UserZip'] ?? '',
//             'totalTax' => $total_tax,
//             'totalShipingCost' => $shipping_charge,
//             'TotalAmount' => $totalAmount,
//             'OrderStatus' => 'Pending',
//             'payment' => $paymentMethod,
//             'OrderDate' => $current_date,
//             'OrderNumber' => $order_number
//         ];
//     } else {
//         $customerdata = [
//             'email' => $this->request->getPost('email'),
//             'fname' => $this->request->getPost('UserFirstNameInput'),
//             'country' => $country_id,
//             'city' => $city_id,
//             'state' => $state_id,
//             'zipcode' => $UserZip,
//             'phoneno' => $UserPhone,
//             'address1' => $UserAddress,
//             'address2' => $this->request->getPost('UserAddress2'),
//             'totalTax' => $total_tax,
//             'totalShipingCost' => $shipping_charge,
//             'TotalAmount' => $totalAmount,
//             'payment' => $paymentMethod,
//             'OrderStatus' => 'Pending',
//             'OrderDate' => $current_date,
//             'OrderNumber' => $order_number
//         ];
//     }

//     $result = $this->Ordermodel->insert($customerdata);

//     if ($result) {
//         $id = $this->Ordermodel->insertID();
//         foreach ($products as $index => $product_id) {
//             $order_data = [
//                 'OrderID' => $id,
//                 'ProductID' => $product_id,
//                 'Quantity' => $quantities[$index],
//                 'Price' => $prices[$index],
//             ];
//             if (!$this->orderitem->insert($order_data)) {
//                 $overall_result = false;
//                 break;
//             }
//         }
//     } else {
//         $overall_result = false;
//     }

//     if ($overall_result) {
//         $emailSender = new \App\Libraries\EmailSender();
//         $subject = 'New Order Confirmation';
//         $logo = base_url('public/upload_images/811579-middle.png');

//         // Email values assignment (customer vs guest)
//         $customeName = $customerdata['fname'] ?? ' ';
//         $customelast = $customerdata['lname'] ?? ' ';
//         $customeEmail = $customerdata['email'] ?? ' ';
//         $customePhone = $customerdata['phoneno'] ?? ' ';
//         $customeAddess = $customerdata['address1'] ?? ' ';

//         // Generate email HTML template
//         $message = view('emails/order_confirmation', compact(
//             'order_number', 'grandTotal', 'shipping_charge', 'hcharge', 'totalAmount', 'current_date',
//             'customeName', 'customelast', 'customeEmail', 'customePhone', 'customeAddess',
//             'UserZip', 'UserCity', 'UserState', 'products', 'prices', 'quantities'
//         ));

//         $emailSender->sendEmail($customeEmail, $subject, $message);
//         return $this->response->setJSON(['success' => '1', 'message' => 'Order placed successfully!']);
//     }

//     return $this->response->setJSON(['success' => '2', 'message' => 'Failed to place order.']);
// }

public function getUserDetails()
{
    $userId = $this->request->getPost('userId');
    
    if (!empty($userId)) {
        $userDetails = $this->User->find($userId);

        $UserCity =  $this->cityModel->where('CityID',$userDetails['UserCity'])->where('StateID',$userDetails['UserState'])->first();
        $UserState =  $this->stateModel->where('CountryID',$userDetails['UserCountry'])->where('StateID',$userDetails['UserState'])->first();
        
        
        if ($userDetails) 
        {
            $userDetails['UserCity'] = $UserCity['CityName']?? " ";
            $userDetails['UserState'] = $UserState['StateName']?? " ";

            return $this->response->setJSON(['success' => true, 'data' => $userDetails]);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'User not found']);
        }
    } else {
        return $this->response->setJSON(['success' => false, 'message' => 'No user ID provided']);
    }
}


public function invoice($orderId)
{

    $builder = $this->Ordermodel
                  ->select('orders.*, 
                            orderitems.Quantity, orderitems.Price, products.ProductName, products.ProductSKU')
                  ->join('orderitems', 'orderitems.OrderID = orders.OrderID', 'left')
                  ->join('products', 'products.ProductID = orderitems.ProductID', 'left')
                  ->where('orders.OrderID', $orderId);
    
    $data['order_det'] = $builder->get()->getRowArray();
    // echo '<pre>';
    // print_r($data['order_det']);die;
    
    $country = $this->country->where('CountryID',$data['order_det']['country'])->first();
    $state = $this->stateModel->where('StateID',$data['order_det']['state'])->first();
    $city = $this->cityModel->where('CityID',$data['order_det']['city'])->first();

    
    $data['order_det']['country'] = $country['CountryName'];
    $data['order_det']['state'] = $state['StateName'];
    $data['order_det']['city'] = $city['CityName'] ?? "Surat";

    $itemsBuilder = $this->Ordermodel
                  ->select('orderitems.Quantity, orderitems.Price,orderitems.package_date,orderitems.exprice_date as ex_date, products.ProductName, products.ProductSKU, products.exprice_date, products.batch')
                  ->join('orderitems', 'orderitems.OrderID = orders.OrderID', 'left')
                  ->join('products', 'products.ProductID = orderitems.ProductID', 'left')
                  ->where('orders.OrderID', $orderId);
    
    $data['order_items'] = $itemsBuilder->get()->getResultArray();

// $dat
    $subtotal = 0;
    foreach ($data['order_items'] as $item) {
        $subtotal += $item['Quantity'] * $item['Price'];
    }
    $data['subtotal'] = $subtotal;

    $data['handling_charges'] = $data['order_det']['totalTax'];

    $data['shipping_cost'] = $data['order_det']['totalShipingCost'];
    $data['discount'] = $data['order_det']['totalDiscount'];
    $data['referDis'] = $data['order_det']['referDis'];

    $total = $subtotal + $data['handling_charges'] + $data['shipping_cost'] - $data['discount'] - $data['referDis'];
    $data['total'] = $total;

    $data['settings'] = $this->Allsettings->findAll();

    return view('invoice', $data);
}


public function shipping_getStatus()
{
    $shippingzonemodel = new ShippingZoneModel();
    
    $data = $shippingzonemodel->first(); 
    
    if ($data) {
        // Return the current status (1 for enabled, 0 for disabled)
        return $this->response->setJSON(['success' => true, 'status' => $data['is_check']]);
    } else {
        return $this->response->setJSON(['success' => false, 'message' => 'Unable to fetch shipping status.']);
    }
}

public function shipping_toggleStatus()
{
    $shippingzonemodel = new ShippingZoneModel(); 

    $newStatus = $this->request->getPost('status');

    $builder = $shippingzonemodel->builder();

    // Update the 'is_check' field with the new status
    $result = $builder->set('is_check', $newStatus)->update();

    if ($result) {
        return $this->response->setJSON(['success' => true, 'status' => $newStatus, 'message' => 'Shipping status updated successfully.']);
    } else {
        return $this->response->setJSON(['success' => false, 'message' => 'Failed to update the shipping zone status.']);
    }
}



    


}