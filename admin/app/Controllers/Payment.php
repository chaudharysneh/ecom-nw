<?php

namespace App\Controllers;
use App\Models\catagorymodel;
use App\Models\variationmodel;
use App\Models\variationtypemodel;
use App\Models\subcategorymodel;
use App\Models\productmodel;
use App\Models\tagsmodel;
use App\Models\shippingmethodmodel;
use App\Models\optionvaluemodel;
use App\Models\BrandModel;
use App\Models\Paymentmodel;
use App\Models\TaxesModel;
use App\Models\Bannersmodel;
use App\Models\CountryModel;
use App\Models\StateModel;
use App\Models\CityModel;
use App\Models\Allsettingsmodel;
use App\Models\CmsModel;
use App\Models\UserModel;
use App\Models\Ordermodel;
use App\Models\Cmsfaqsmodel;
use App\Models\Paymentgatewaymodel;
use App\Models\TaxesclassModel;



class Payment extends BaseController
{
    
     public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
        $db = \Config\Database::connect();
        $this->catagory = new catagorymodel($db);
        $this->variation = new variationmodel($db);
        $this->variationtype= new variationtypemodel($db);
        $this->subcategory= new subcategorymodel($db);
        $this->product= new productmodel($db);
        $this->tags= new tagsmodel($db);
          $this->shippingmethod= new shippingmethodmodel($db);
           $this->optionvalue= new optionvaluemodel($db);
             $this->brand = new BrandModel($db);
             $this->Paymentmodel = new Paymentmodel($db);
                  $this->Banners = new Bannersmodel($db);
                   $this->country= new CountryModel($db);
        $this->state= new StateModel($db);
        $this->city= new CityModel($db);
        $this->taxes= new TaxesModel($db);
           $this->Allsettings= new Allsettingsmodel($db);
           $this->cms= new CmsModel($db);
           $this->Cmsfaqs= new Cmsfaqsmodel($db);
           
            $this->user_model = new UserModel($db);
             $this->Order = new Ordermodel($db);
             $this->Paymentgatewaymodel = new Paymentgatewaymodel($db);
             $this->TaxesclassModel = new TaxesclassModel($db);
        
    }
    
    
    public function index1()
    {
        return view('all_payment_getway');
    }
    
    public function index()
    {
        $data = [];
        $data['Paymentgateway'] =$this->Paymentgatewaymodel->findAll();
        // print_r($data['Paymentgateway']);die;
        return view('all_payment_getway1',$data);
    }
    
    public function updatePaymentGetway()
    {
        $request = $this->request->getPost();
        if(isset($request['status'])){
            $data = ['status' => $request['status']];
            $result =  $this->Paymentgatewaymodel->set($data)->Where('id', $request['id'])->update();
        }else if(isset($request['live_sts'])){
            
            if($request['live_sts'] == 1){
                $live_sts = 0;
                $live_sts1 = 1;
            }else{
                $live_sts = 1;
                $live_sts1 = 0;
            }
            $db = \Config\Database::connect();
            // $sql = "UPDATE payment_getway SET details = REPLACE(details,'"live_sts":"1"', '"live_sts":"0"') WHERE id = 3;";
        $sql = "UPDATE payment_getway
        SET details = REPLACE(details, '\"live_sts\":\"".$live_sts."\"', '\"live_sts\":\"".$live_sts1."\"')
        WHERE id = ".$request['id'];

    //   $db->query($sql);
        $result = $db->query($sql);
        }else{
            $type = $request['type'];
            unset($request['type']);
            $data = ['details' => json_encode($request)];
            
            $result =  $this->Paymentgatewaymodel->set($data)->Where('type',$type)->update();
        }
        if($result) {
            $res = array('status'=>true);
        }
        else
        {
            $res = array('status'=>false);
        }
        return json_encode($res);
    }
    
    public function all_transactions()
    {
        $data_arr=[];
        $all_trans_data = $this->Paymentmodel->orderby('PaymentID','desc')->findAll();
        $data['all_amount_data'] = $this->Paymentmodel->orderby('PaymentID','desc')->groupBy('Amount')->findAll();
        //  echo "<pre>"; 
        //       print_r($data['all_amount_data']);  die;
        foreach($all_trans_data as $single_trans_data)
        {
            $user_id = $single_trans_data['UserID'] ?? null;
            $OrderID = $single_trans_data['OrderID'];
            
            // Attempt to get user data if UserID is available
            $user_data = $user_id ? $this->user_model->where('UserID', $user_id)->first() : null;
            
            // Get order data regardless
            $order_data = $this->Order->where('OrderID', $OrderID)->first();
            
            // Assign names and email based on available data
            $user_first_name = $user_data['UserFirstName'] ?? $order_data['fname'] ?? 'N/A';
            $user_last_name = $user_data['UserLastName'] ?? $order_data['lname'] ?? 'N/A';
            $user_email = $user_data['UserEmail'] ?? $order_data['email'] ?? 'N/A';
            
            $new_arr['UserFirstName'] = $user_first_name;
            $new_arr['UserLastName'] = $user_last_name;
            $new_arr['UserEmail'] = $user_email;
                 
                 
                 
                 
            $new_arr['OrderID']=$single_trans_data['OrderID'];
            $new_arr['PaymentType']=$single_trans_data['PaymentType'];
            $new_arr['Amount']=$single_trans_data['Amount'];
            $new_arr['PaymentDate']=$single_trans_data['PaymentDate'];
            $new_arr['PaymentStatus']=$single_trans_data['PaymentStatus'];
            $new_arr['Transation_id']=$single_trans_data['Transation_id'];
          
            array_push($data_arr,$new_arr);
        }
              
              
            //   print_r($data_arr);   
        
        
        $data['trans_data']=$data_arr;
        return view('all_transactions',$data);
    }
    
    
     public function search_trans_filter_data_old()
    {
        // echo "hi";
        
        // print_r($_POST);
        // $search_trans_data = $this->request->getPost('search_trans_data');
        $payment_status = $this->request->getPost('payment_status');
        $trans_amount = $this->request->getPost('trans_amount');
        $all_trans = $this->request->getPost('all_trans');
        $date_trans_selecter = $this->request->getPost('date_trans_selecter');
     
        
 
        
        
         if(!empty($all_trans) && empty($payment_status) && empty($trans_amount) && empty($date_trans_selecter))
        {
            // echo 'fghetyrturt';
            $this->Paymentmodel->select('payments.PaymentID,payments.OrderID,payments.UserID,payments.PaymentType,payments.Amount,payments.PaymentDate,payments.PaymentStatus,users.UserID, users.UserFirstName,users.UserLastName, users.UserEmail');
        $this->Paymentmodel->join('users', 'users.UserID  = payments.UserID');
            $qry_data = $this->Paymentmodel->where('OrderID',$all_trans)->findAll();
            
        }
        
         elseif(!empty($all_trans) && !empty($trans_amount) && empty($payment_status) && empty($date_trans_selecter))
        {
            // echo 'fghetyrturt';
            $this->Paymentmodel->select('payments.PaymentID,payments.OrderID,payments.UserID,payments.PaymentType,payments.Amount,payments.PaymentDate,payments.PaymentStatus,users.UserID, users.UserFirstName,users.UserLastName, users.UserEmail');
          $this->Paymentmodel->join('users', 'users.UserID  = payments.UserID');
            $qry_data = $this->Paymentmodel->where('OrderID',$all_trans)->where('Amount',$trans_amount)->findAll();
            
        }
        
         elseif(!empty($all_trans) && !empty($trans_amount) && !empty($payment_status) && empty($date_trans_selecter))
        {
            // echo 'fghetyrturt';
            $this->Paymentmodel->select('payments.PaymentID,payments.OrderID,payments.UserID,payments.PaymentType,payments.Amount,payments.PaymentDate,payments.PaymentStatus,users.UserID, users.UserFirstName,users.UserLastName, users.UserEmail');
          $this->Paymentmodel->join('users', 'users.UserID  = payments.UserID');
            $qry_data = $this->Paymentmodel->where('OrderID',$all_trans)->where('Amount',$trans_amount)->where('PaymentStatus',$payment_status)->findAll();
            // echo $this->Paymentmodel->getLastQuery();
            
        }
    
     elseif(!empty($all_trans) && !empty($trans_amount) && !empty($payment_status) && !empty($date_trans_selecter))
        {
            // echo 'fghetyrturt';
            $this->Paymentmodel->select('payments.PaymentID,payments.OrderID,payments.UserID,payments.PaymentType,payments.Amount,payments.PaymentDate,payments.PaymentStatus,users.UserID, users.UserFirstName,users.UserLastName, users.UserEmail');
        $this->Paymentmodel->join('users', 'users.UserID  = payments.UserID');
            $qry_data = $this->Paymentmodel->where('OrderID',$all_trans)->where('Amount',$trans_amount)->where('PaymentStatus',$payment_status)->where('DATE(PaymentDate)',$date_trans_selecter)->findAll();
            
        }
    
      elseif(!empty($all_trans) && empty($trans_amount) && empty($payment_status) && !empty($date_trans_selecter))
        {
            // echo 'fghetyrturt';
            $this->Paymentmodel->select('payments.PaymentID,payments.OrderID,payments.UserID,payments.PaymentType,payments.Amount,payments.PaymentDate,payments.PaymentStatus,users.UserID, users.UserFirstName,users.UserLastName, users.UserEmail');
        $this->Paymentmodel->join('users', 'users.UserID  = payments.UserID');
            $qry_data = $this->Paymentmodel->where('OrderID',$all_trans)->where('DATE(PaymentDate)',$date_trans_selecter)->findAll();
            
        }
    
    elseif(!empty($all_trans) && empty($trans_amount) && !empty($payment_status) && empty($date_trans_selecter))
        {
            // echo 'fghetyrturt';
            $this->Paymentmodel->select('payments.PaymentID,payments.OrderID,payments.UserID,payments.PaymentType,payments.Amount,payments.PaymentDate,payments.PaymentStatus,users.UserID, users.UserFirstName,users.UserLastName, users.UserEmail');
        $this->Paymentmodel->join('users', 'users.UserID  = payments.UserID');
            $qry_data = $this->Paymentmodel->where('OrderID',$all_trans)->where('PaymentStatus',$payment_status)->findAll();
            
        }
    
        
        
        
        elseif(!empty($trans_amount) && empty($payment_status) && empty($date_trans_selecter))
        {
            $this->Paymentmodel->select('payments.PaymentID,payments.OrderID,payments.UserID,payments.PaymentType,payments.Amount,payments.PaymentDate,payments.PaymentStatus,users.UserID, users.UserFirstName,users.UserLastName, users.UserEmail');
            $this->Paymentmodel->join('users', 'users.UserID  = payments.UserID');
            $qry_data = $this->Paymentmodel->where('Amount',$trans_amount)->findAll();
            
        }
        
         elseif(!empty($trans_amount) && !empty($payment_status) && empty($date_trans_selecter))
        {
            $this->Paymentmodel->select('payments.PaymentID,payments.OrderID,payments.UserID,payments.PaymentType,payments.Amount,payments.PaymentDate,payments.PaymentStatus,users.UserID, users.UserFirstName,users.UserLastName, users.UserEmail');
            $this->Paymentmodel->join('users', 'users.UserID  = payments.UserID');
            $qry_data = $this->Paymentmodel->where('Amount',$trans_amount)->where('PaymentStatus',$payment_status)->findAll();
            
        }
        
         elseif(!empty($trans_amount) && !empty($payment_status) && !empty($date_trans_selecter))
        {
            $this->Paymentmodel->select('payments.PaymentID,payments.OrderID,payments.UserID,payments.PaymentType,payments.Amount,payments.PaymentDate,payments.PaymentStatus,users.UserID, users.UserFirstName,users.UserLastName, users.UserEmail');
            $this->Paymentmodel->join('users', 'users.UserID  = payments.UserID');
            $qry_data = $this->Paymentmodel->where('Amount',$trans_amount)->where('PaymentStatus',$payment_status)->where('DATE(PaymentDate)',$date_trans_selecter)->findAll();
            
        }
        
           elseif(!empty($trans_amount) && empty($payment_status) && !empty($date_trans_selecter))
        {
            $this->Paymentmodel->select('payments.PaymentID,payments.OrderID,payments.UserID,payments.PaymentType,payments.Amount,payments.PaymentDate,payments.PaymentStatus,users.UserID, users.UserFirstName,users.UserLastName, users.UserEmail');
            $this->Paymentmodel->join('users', 'users.UserID  = payments.UserID');
            $qry_data = $this->Paymentmodel->where('Amount',$trans_amount)->where('DATE(PaymentDate)',$date_trans_selecter)->findAll();
            
        }
        
        
        
        
         elseif(!empty($payment_status) && empty($date_trans_selecter))
        {
            $this->Paymentmodel->select('payments.PaymentID,payments.OrderID,payments.UserID,payments.PaymentType,payments.Amount,payments.PaymentDate,payments.PaymentStatus,users.UserID, users.UserFirstName,users.UserLastName, users.UserEmail');
            $this->Paymentmodel->join('users', 'users.UserID  = payments.UserID');
            $qry_data = $this->Paymentmodel->where('PaymentStatus',$payment_status)->findAll();
            
        }
        
        
         
         elseif(!empty($payment_status) && !empty($date_trans_selecter))
        {
            $this->Paymentmodel->select('payments.PaymentID,payments.OrderID,payments.UserID,payments.PaymentType,payments.Amount,payments.PaymentDate,payments.PaymentStatus,users.UserID, users.UserFirstName,users.UserLastName, users.UserEmail');
            $this->Paymentmodel->join('users', 'users.UserID  = payments.UserID');
            $qry_data = $this->Paymentmodel->where('PaymentStatus',$payment_status)->where('DATE(PaymentDate)',$date_trans_selecter)->findAll();
            
        }
        
        
        
        
         elseif(!empty($date_trans_selecter) && empty($payment_status) && empty($trans_amount) && empty($all_trans))
        {
            // echo "hii";
             $this->Paymentmodel->select('payments.PaymentID,payments.OrderID,payments.UserID,payments.PaymentType,payments.Amount,payments.PaymentDate,payments.PaymentStatus,users.UserID, users.UserFirstName,users.UserLastName, users.UserEmail');
        $this->Paymentmodel->join('users', 'users.UserID  = payments.UserID');
            $qry_data = $this->Paymentmodel->where('DATE(PaymentDate)',$date_trans_selecter)->findAll();
            // echo $this->Paymentmodel->getLastQuery();
            // die;
            
        }
        
       
        
        else{
            
          
            
            $this->Paymentmodel->select('payments.PaymentID,payments.OrderID,payments.UserID,payments.PaymentType,payments.Amount,payments.PaymentStatus,payments.PaymentDate,payments.PaymentStatus,users.UserID, users.UserFirstName,users.UserLastName, users.UserEmail');
        $this->Paymentmodel->join('users', 'users.UserID  = payments.UserID');

            $qry_data = $this->Paymentmodel->findAll();
                
            
        }
        
        // echo $this->Paymentmodel->getLastQuery();
            
        $i = 1;
        if(!empty($qry_data)){
            // print_r($qry_data);
        foreach($qry_data as $query) {
            // print_r($query);
            $order = $this->Order->where('OrderID',$query['OrderID'])->get() ->getRow();
            
            ?>
          <tr>
             <td> <strong> <?php echo $i; ?></strong></td>
             
            
                               
                                
             
             <td><?php echo $order->OrderNumber; ?></td>
          
             
              <td>
                 <strong>Name : </strong><?php echo $query['UserFirstName']; ?> <?php echo $query['UserLastName']; ?><br>
                 <strong>Email : </strong><?php echo $query['UserEmail']; ?>
                 </td>
          
            
         <td>
              <?php  if($query['PaymentType']==1) {echo "Credit card";} ?>
              <?php if($query['PaymentType']==2) {echo "Paypal";} ?>
             <?php if($query['PaymentType']==3) {echo "Bank transfer";} ?>
             </td>
             
           <td><?php echo $query['Amount']; ?></td>
          <td>
              <?php  if($query['PaymentStatus']==1) {echo "Success";} ?>
              <?php if($query['PaymentStatus']==2) {echo "Pending";} ?>
             <?php if($query['PaymentStatus']==3) {echo "Failed";} ?>
             </td>
             
             <td><?php echo $query['PaymentDate']; ?></td>
        
        </tr>
        
            <?php
            $i++;
        }
        }
        else{
         ?>   
            <tr>
                <td colspan = "7" class="text-center"> No Data Available
                </td>
                </tr>
            <?php 
            
        }
        
        
      
        
       
    }

    public function search_trans_filter_data()
{
    $payment_status = $this->request->getPost('payment_status');
    $trans_amount = $this->request->getPost('trans_amount');
    $all_trans = $this->request->getPost('all_trans');
    $date_trans_selecter = $this->request->getPost('date_trans_selecter');

    $payment_status_text = '';
    if ($payment_status == 1) {
        $payment_status_text = "success";
    } elseif ($payment_status == 2) {
        $payment_status_text = "Pending";
    } elseif ($payment_status == 3) {
        $payment_status_text = "Failed";
    }

    $this->Paymentmodel->select('
        payments.PaymentID, 
        payments.Transation_id,
        payments.OrderID, 
        payments.UserID AS PaymentUserID, 
        payments.PaymentType, 
        payments.Amount, 
        payments.PaymentDate, 
        payments.PaymentStatus, 
        orders.UserID AS OrderUserID,
        orders.fname, 
        orders.lname, 
        orders.email
    ');
    $this->Paymentmodel->join('orders', 'orders.OrderID = payments.OrderID', 'left');

    if (!empty($all_trans)) {
        $this->Paymentmodel->where('payments.OrderID', $all_trans);
    }
    if (!empty($trans_amount)) {
        $this->Paymentmodel->where('payments.Amount', $trans_amount);
    }
    if (!empty($payment_status)) {
        $this->Paymentmodel->where('payments.PaymentStatus', $payment_status_text);
    }
    if (!empty($date_trans_selecter)) {
        $this->Paymentmodel->where('DATE(payments.PaymentDate)', $date_trans_selecter);
    }

    // Execute query
    $qry_data = $this->Paymentmodel->findAll();

    $response = [];
    $i = 1;

    if (!empty($qry_data)) {
        foreach ($qry_data as $query) {
            $order = $this->Order->where('OrderID', $query['OrderID'])->get()->getRow();

            $response[] = [
                'index' => $i,
                'orderNumber' => $order ? '<a style="color: #697a8d;" href="' . base_url('view_order_details/' . $query['OrderID']) . '">' . $order->OrderNumber . '</a>' : 'N/A',
                'customerdetails' => '<strong>Name: </strong>' . $query['fname'] . ' ' . $query['lname'] . '<br><strong>Email: </strong>' . $query['email'],
                'paymentType' => $query['PaymentType'] == 1 ? 'Credit card' : ($query['PaymentType'] == 2 ? 'Paypal' : 'Bank transfer'),
                'amount' => $query['Amount'],
                'paymentStatus' => $query['PaymentStatus'] == 'success' ? 'Success' : ($query['PaymentStatus'] == 'Pending' ? 'Pending' : 'Failed'),
                'paymentDate' => date("d M, Y", strtotime($query['PaymentDate'])),
                'transationId' => !empty($query['Transation_id']) ? $query['Transation_id'] : '-'
            ];
            $i++;
        }
    } else {
        $response = [
            'noData' => true,
            'message' => 'No Data Available'
        ];
    }

    // Return JSON response
    return $this->response->setJSON($response);
}

    
    
    public function all_taxes()
    {
        $data_arr=[];
        // $data['all_taxclass_data'] = $this->TaxesclassModel->orderby('')->findAll();
        // print_r($data['all_taxclass_data']);

        $enable_disable = $this->taxes->orderby('TaxID','desc')->first();

        $data['enable_disable']  =  $enable_disable['is_check'];

        
        $all_data=$this->taxes->orderby('TaxID','desc')->findAll();
        foreach($all_data as $single_data){
            // print_r($single_data);
            $country_id=$single_data['Country'];
            // $country_id=$single_data['State'];
            // $country_id=$single_data['City'];
            // $country_id=$single_data['Zip'];
            
            // print_r($country_id); die;
            $country_data=$this->country->where('CountryID',$country_id)->first();
              
            $country_name=isset($country_data['CountryName']) && !empty($country_data['CountryName']) ? $country_data['CountryName'] :'';
            
            $new_arr['CountryName']=$country_name;
            
            
             $state_data=$this->state->where('StateID',$single_data['State'])->first();
             
            $state_name=isset($state_data['StateName']) && !empty($state_data['StateName']) ? $state_data['StateName'] :'';
            
            $new_arr['StateName']=$state_name;
            
             $city_data=$this->city->where('CityID',$single_data['City'])->first();
             
            $city_name=isset($city_data['CityName']) && !empty($city_data['CityName']) ? $city_data['CityName'] :'';
            
            $new_arr['CityName']=$city_name;
            
            
         
            
          $new_arr['TaxID']=$single_data['TaxID'];
          $new_arr['TaxName']=$single_data['TaxName'];
          $new_arr['TaxRate']=$single_data['TaxRate'];
            
          $new_arr['Zip']=$single_data['Zip'];
          $new_arr['taxe_class_id']=$single_data['taxe_class_id'];
          
            array_push($data_arr,$new_arr);
        }
        
        
        $data['all_taxes_data']=$data_arr;


        // echo "<pre>"; 
        // print_r($data); 
        // die;
        return view('all_taxes',$data);
    }
    
    
     public function all_taxe_class()
    {
      
        $data['all_taxclass_data'] = $this->TaxesclassModel->findAll();
        // print_r($data['all_taxclass_data']);
        
       
        return view('all_taxe_class',$data);
    }
    
    public function add_tax_class () {
        return view('add_tax_class');
        
    }
    
    public function  save_taxes_class() {
        
        $taxclass_name = $_POST['taxclass_name'];
        
         $data = [
            
             'class_name' => $taxclass_name,
             
             ];
        
        $taxclass_data = $this->TaxesclassModel->insert($data);
        
        if($taxclass_data)
        {
            echo '1';
        }
        else{
            echo '0';
        }
        
        //   return view('add_tax_class');
        
    }
    public function edit_tax_class ($id) {
        $data['single_tax_class_data'] = $this->TaxesclassModel->where('taxe_class_id', $id)->first();
        return view('edit_tax_class', $data);
        
    }
    public function update_taxes_class () {
        $tax_class_id = $_POST['tax_class_id'];
         $taxclass_name = $_POST['taxclass_name'];
         $data = [
             'class_name' => $taxclass_name,
             ];
        
        $taxclass_data = $this->TaxesclassModel->update($tax_class_id,$data);
        if($taxclass_data) {
            echo '1';
            
        }
        else {
            echo '0';
            
        }
        
    }
    

    
    // public function del_taxes_class(){
    //      $tax_class_ids=$this->request->getPost('tax_class_ids');
    //     $this->TaxesclassModel->where('taxe_class_id',$tax_class_ids);
    //         $delete=$this->TaxesclassModel->delete(); 
       
       
    //         if($delete){
    //             echo 1;
    //         }else{
    //             echo 0;
    //         }
    // }
    
    public function del_taxes_class() {
    $tax_class_ids = $this->request->getPost('tax_class_ids');

    // Check if there are related records in another table
    $relatedRecordsExist = $this->taxes->where('taxe_class_id',$tax_class_ids)->findAll();

    if ($relatedRecordsExist) {
        echo '2';
        return;
    }

    $this->TaxesclassModel->where('taxe_class_id', $tax_class_ids);
    $delete = $this->TaxesclassModel->delete();

    if ($delete) {
        echo 1;
    } else {
        echo 0;
    }
}

public function tax_getStatus()
{
    $taxesModel = new TaxesModel(); 
    
    $data = $taxesModel->first(); 
    
    if ($data) {
        return $this->response->setJSON(['success' => true, 'status' => $data['is_check']]);
    } else {
        return $this->response->setJSON(['success' => false, 'message' => 'Unable to fetch shipping status.']);
    }
}


public function Tax_toggleStatus()
{
    // print_r('dg');die;
    $taxesModel = new TaxesModel(); 

    $newStatus = $this->request->getPost('status');

    $builder = $taxesModel->builder();

    $result = $builder->set('is_check', $newStatus)->update();

    if ($result) {
        return $this->response->setJSON(['success' => true, 'status' => $newStatus, 'message' => 'Tax status updated successfully.']);
    } else {
        return $this->response->setJSON(['success' => false, 'message' => 'Failed to update the Tax status.']);
    }
}








    public function get_table_data (){
 

$tab_id =$_POST['tab_id'];

   $all_data=$this->taxes->where('taxe_class_id',$tab_id)->findAll();
   
       


// Assuming $data is an array of rows, construct HTML
$html = '';
$i=1;
if(!empty($all_data)){
 foreach($all_data as $single_data){
     
      $country_id=$single_data['Country'];
            // print_r($country_id); die;
            $country_data=$this->country->where('CountryID',$country_id)->first();
              
            $country_name=isset($country_data['CountryName']) && !empty($country_data['CountryName']) ? $country_data['CountryName'] :'';
            
            $state_data=$this->state->where('StateID',$single_data['State'])->first();
             
            $state_name=isset($state_data['StateName']) && !empty($state_data['StateName']) ? $state_data['StateName'] :'';
            

            
             $city_data=$this->city->where('CityID',$single_data['City'])->first();
             
            $city_name=isset($city_data['CityName']) && !empty($city_data['CityName']) ? $city_data['CityName'] :'';
            

            

   
    $html .= '<tr>';
$html .= '<td>' . $i++ . '</td>';
$html .= '<td>' . (!empty($country_name) ? $country_name : '*') . '</td>';
$html .= '<td>' . (!empty($state_name) ? $state_name : '*') . '</td>';
$html .= '<td>' . (isset($single_data["Zip"]) && $single_data["Zip"] == '*' ? '*' : $single_data["Zip"]) . '</td>';
$html .= '<td>' . (!empty($city_name) ? $city_name : '*') . '</td>';
$html .= '<td>' . (isset($single_data['TaxRate']) ? $single_data['TaxRate'] : 'NA') . '</td>';
$html .= '<td>' . (isset($single_data['TaxName']) ? $single_data['TaxName'] : 'NA') . '</td>';



    $html .= '<td><div class="dropdown"><button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button><div class="dropdown-menu" style="">';
                           $html .= '<a class="dropdown-item" href="' . base_url() . 'edit-taxes/' . $single_data["TaxID"] . '/'.$tab_id.'"><i class="bx bx-edit-alt me-1"></i> Edit</a>';

                           $html .= ' <a class="dropdown-item del_taxes_type" href="javascript:void(0);" data-id="'.$single_data["TaxID"].'"> <i class="bx bx-trash me-1"></i> Delete</a>';
                        $html .= ' </div></div></td>'; // Add your actions column
    $html .= '</tr>';
}
}


echo $html;


    }
    
    
    public function add_tax()
    {
              $data['country'] = $this->country->findAll();
            //   $data['tax_class_id'] = $id;
        return view('add_tax',$data);
    }
    public function save_taxes()

    {
            //   print_r($_POST); die;
            
            
            // $tax_class_id = $this->request->getPost('tax_class_id');
             $tax_name = $this->request->getPost('tax_name');
        $tax_rate = $this->request->getPost('tax_rate');
        $country = $this->request->getPost('country');
        $state = $this->request->getPost('state');
        $city = $this->request->getPost('city');
        $tax_zip = $this->request->getPost('tax_zip');
        $shipping = $this->request->getPost('shipping');
        
        
        $country = empty($country) ? '*' : $country;
    $state = empty($state) ? '*' : $state;
    $city = empty($city) ? '*' : $city;
    $tax_zip = empty($tax_zip) ? '*' : $tax_zip;
    
        $existingRecord = $this->taxes->where([
        // 'taxe_class_id' => $tax_class_id,
        'TaxName'       => $tax_name,
        'Country'       => $country,
        'State'         => $state,
        'City'          => $city,
        'Zip'           => $tax_zip
    ])->first();

    if ($existingRecord) {
        // Record already exists, handle accordingly (display an error message, etc.)
        echo "2";
    } else {
        // City doesn't exist, proceed with insertion
        $all_fields = [
            // 'taxe_class_id'  => $tax_class_id,
            'TaxName'  => $tax_name,
            'TaxRate'  => $tax_rate,
            'Country'  => $country,
            'State'    => $state,
            'City'     => $city,
            'Zip'      => $tax_zip,
            'Shipping' => $shipping,
            // 'CouponLive' =>
        ];
      
        

        $taxes_data = $this->taxes->insert($all_fields);

        if ($taxes_data) {
            echo 1; // Success
        } else {
            echo 0; // Failure
        }
    }
    
        
        
    }
    
    public function edit_taxes($id)
    {
         $data['country'] = $this->country->findAll();
        $data['state'] = $this->state->findAll();
        $data['city'] = $this->city->findAll();
        $data['taxes_data']= $this->taxes->where('TaxID',$id)->first();
        // $data['tax_class_id'] = $tax_class_id;
        // print_r($data['customer_data']); die;
        return view('edit_taxes',$data);
    }
    
  
    
    public function update_taxes()
{
    $tax_id = $this->request->getPost('id');
    //  $tax_class_id = $this->request->getPost('tax_class_id');
    $tax_name = $this->request->getPost('tax_name');
    $tax_rate = $this->request->getPost('tax_rate');
    $country = $this->request->getPost('country');
    $state = $this->request->getPost('state');
    $city = $this->request->getPost('city');
    $tax_zip = $this->request->getPost('tax_zip');
    $shipping = $this->request->getPost('shipping');


$country = empty($country) ? '*' : $country;
    $state = empty($state) ? '*' : $state;
    $city = empty($city) ? '*' : $city;
    $tax_zip = empty($tax_zip) ? '*' : $tax_zip;
    
    // Check if the city already exists in the database excluding the current record being updated
     $existingRecord = $this->taxes->where([
        // 'taxe_class_id' => $tax_class_id,
        'TaxName'       => $tax_name,
        'Country'       => $country,
        'State'         => $state,
        'City'          => $city,
        'Zip'           => $tax_zip
    ])->where('TaxID <>',$tax_id)
    ->first();
// print_r($existingRecord); die;
    if ($existingRecord) {
        // Record already exists, handle accordingly (display an error message, etc.)
        echo "2";
    } else {
        // City doesn't exist for another record, proceed with the update
        $data = [
            'TaxName'  => $tax_name,
            'TaxRate'  => $tax_rate,
            'Country'  => $country,
            'State'    => $state,
            'City'     => $city,
            'Zip'      => $tax_zip,
            'Shipping' => $shipping,
        ];

        $db = \Config\Database::connect();
        $builder = $db->table('taxes');
        $builder->set($data);
        $builder->where('TaxID', $tax_id);
        $builder->update();

        if ($builder) {
            echo 1; // Success
        } else {
            echo 0; // Failure
        }
    }
}


    public function del_taxes(){
         $taxes_ids=$this->request->getPost('taxes_ids');
        $this->taxes->where('TaxID',$taxes_ids);
            $delete=$this->taxes->delete(); 
       
       
            if($delete){
                echo 1;
            }else{
                echo 0;
            }
    }
    
    
    
    
    
    

    
    public function all_dicsounts_coupons()
    {
        return view('all_dicsounts_coupons');
    }
    public function create_discounts_and_coupons()
    {
        return view('create_discounts_and_coupons');
    }

    
    public function all_attributes()
    {
        return view('all_attributes');
    }

    public function all_cms()
    {
        $data['all_cms_data'] = $this->cms->orderby('CmsID','desc')->findAll();
        return view('all_cms', $data);
    }


 public function view_cms($id)
    {
        // print_r($id);
        $data['cms_data'] = $this->cms->where('CmsID',$id)->first();
        // print_r($data['cms_data']);
        return view('view_cms', $data);
    }
    public function edit_cms($id)
    {
        $data['cms_data'] = $this->cms->where('CmsID',$id)->first();
        // print_r($data['cms_data']);
        return view('edit_cms', $data);
    }
    
    

    public function add_cms()
    {
        return view('add_cms');
    }
//     public function save_cms(){
// //         ini_set('display_errors', 1);
// // ini_set('display_startup_errors', 1);
// // error_reporting(E_ALL);
//         // print_r($_POST);
//         // die;
//         // print_r($data);die;
//         $title=$this->request->getpost('title');
//         $content=$this->request->getpost('editor_data');
//         //  $content='<img alt="" src="https://ecom-demo.fableadtech.com/admin//uploads/1689143400_aab5fa7ac9dff2cd8e72.jpg" style="height:340px; width:534px" />';
//         // $sanitizedContent = htmlspecialchars($content, ENT_QUOTES, 'UTF-8');
//         // print_r($content);
//     //   die;
        
// //         $content = preg_replace('/<img(.*?)src=["\'](.*?)["\'](.*?)>/', function($match) {
// //     $src = preg_replace('/\s+/', '', $match[2]);
// //     return '<img' . $match[1] . 'src="' . $src . '"' . $match[3] . '>';
// // }, $content);

//         // print_r($content);
//         // die;
        
//         $all_filed=[
//             'CmsTitle'=> $title,
//             'CmsContent'=>$content
//             ];
//             print_r($all_filed);die;
            
//             $data=$this->cms->insert($all_filed);
//             // echo $this->cms->getLastQuery();
//             // die;
//             if($data){
//                 echo 1;
//             }else{
//                 echo 0;
//             }
        
//     }
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    // public function update_cms(){
    //     // print_r($_POST); die;
    //     $cms_id=$this->request->getpost('id');
    //     $title=$this->request->getpost('title');
    //     $content=$this->request->getpost('editor_data');
        
    //     $all_filed=[
    //         'CmsTitle'=> $title,
    //         'CmsContent'=>$content
    //         ];
    //         //   print_r($all_filed);
            
    //         $data=$this->cms->update($cms_id,$all_filed);
    //         if($data){
    //             echo 1;
    //         }else{
    //             echo 0;
    //         }
        
    // }
    
      public function delete_cms(){
         $cms_id=$this->request->getPost('cms_ids');
        $this->cms->where('CmsID',$cms_id);
        $this->Cmsfaqs->where('CmsID',$cms_id);
            $delete=$this->cms->delete();
            
       
       
            if($delete){
                echo 1;
            }else{
                echo 0;
            }
    }
    
    
    
   
    
      public function upload_image()
    {
        // echo "hii";
        $file = $this->request->getFile('upload');
        // print_r($file);

        // if ($file->isValid() && !$file->hasMoved()) {
            if(isset($_FILES['upload']['name']) && !empty($_FILES['upload']['name'])) {
            // Generate a unique file name or use any desired logic
            $newName = $file->getRandomName();

            // Move the uploaded file to a desired directory
            $file->move('./uploads', $newName);
            $function_number = $_GET['CKEditorFuncNum'];
            // Get the URL of the uploaded image
            $imageUrl = base_url('uploads/' . $newName);
            $message = "";
            echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$imageUrl', '$message');</script>";
            // return $this->response->setJSON(['url' => $imageUrl]);
        } 
        // else {
        //     return $this->response->setStatusCode(400)->setBody('Invalid file');
        // }
    }
    
    
    // Check if file upload exists
//  public function upload_image()
//     {
//      if ($this->request->getFile('upload')->isValid()) {
//     $file = $this->request->getFile('upload');
//     print_r($file);
//     $file_name = $file->getName();

//     // Move uploaded file to the desired directory
//     $file->move('img', $file_name);

//     $function_number = $this->request->getVar('CKEditorFuncNum');
//     $url = site_url('uploads/' . $file_name);
//     $message = '';

//     echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
//       }
// }
    
     public function all_banners()
    {
        $data['allbannersdata'] = $this->Banners->orderby('BannerID','desc')->findAll();
        // print_r($data['allbannersdata']);
        // die;
        return view('all_banners',$data);
    }

    public function add_banners()
    {
        return view('add_banners');
    }
    
     public function save_banners()
    {
        // echo "hii";
        
         $file_image = $this->request->getFile('banner_image');
        // $fileName = $file_image->getRandomName();
        // $file_image->move('public/upload_images', $fileName);
        $bannerimg = "";

        if(isset($_FILES['banner_image']['name']) && !empty($_FILES['banner_image']['name'])){

            $fileName = $file_image->getRandomName();

            $file_image->move('public/upload_images', $fileName);
            $bannerimg=$fileName;
        }
        else{
            $bannerimg = "18.jpg";
        }
        
        
        $name = $this->request->getPost('name');
        $description = $this->request->getPost('description');
        $position = $this->request->getPost('position');
        $url = $this->request->getPost('url');


        $data = $this->Banners->where('BannerTitle', $name)->first();


      
            $data_insert=[
                'BannerTitle'	=>	 $name ?? '',
                'BannerPosition'	=>$position	?? '',
                 'BannerText'	=>	$description ?? '',
                 'BannerImg'	=>	$bannerimg,
                 'BannerUrl'	=> $this->request->getPost('url'),
                 
                 
            ];

    
            // print_r($data_insert);
            // die;
    
           
        $user_data = $this->Banners->insert( $data_insert);
            if($user_data) {
                echo 1;
            }
            else
            {
                echo 0;
    
            }
         
        
        
    }
    
    
     public function edit_banners($id)
    {
         $data['singlebannersdata'] = $this->Banners->where('BannerID',$id)->first();
        //  print_r($data['singlebannersdata']);
        return view('edit_banners',$data);
    }
    
    
     public function update_banners()
    {
        // echo "hii";
        
        // print_r($_POST);
        
          $banner_id = $this->request->getPost('banner_id');
        // print_r($banner_id);
        $name = $this->request->getPost('name');
        $description = $this->request->getPost('description');
         $position = $this->request->getPost('position');
        $url = $this->request->getPost('url');
          $old_image = $this->request->getPost('old_image');


        
        
         $file_image = $this->request->getFile('banner_image');
        // $fileName = $file_image->getRandomName();
        // $file_image->move('public/upload_images', $fileName);
        $bannerimg = "";

        if(isset($_FILES['banner_image']['name']) && !empty($_FILES['banner_image']['name'])){

            $fileName = $file_image->getRandomName();

            $file_image->move('public/upload_images', $fileName);
            $bannerimg=$fileName;
        }
        else{
            $bannerimg = $old_image;
        }
        
      



      
            $data_update=[
                'BannerTitle'	=>	$this->request->getVar('name'),
                'BannerPosition'	=>	$this->request->getPost('position'),
                 'BannerText'	=>	$this->request->getPost('description'),
                 'BannerImg'	=>	$bannerimg,
                 'BannerUrl'	=> $this->request->getPost('url'),
                 
                 
            ];
    
            // print_r($data_update);
            // die;
    
           
        $user_data = $this->Banners->update($banner_id, $data_update);
            if($user_data) {
                echo 1;
            }
            else
            {
                echo 0;
    
            }
         
        
        
    }
    
    
     public function del_banners(){
        //  echo "hii";
        $banner_id=$this->request->getPost('banners_ids');
        // print_r($banner_id);
        $this->Banners->where('BannerID', $banner_id);
            $delete=$this->Banners->delete(); 
       
       
            if($delete){
               
                echo 1;
            }else{
                echo 0;
            }
   
           }
    
    

    public function all_manage_enquries()
    {
        return view('all_manage_enquries');
    }
    
     public function get_state_from_country1()
     {
         $countryid=$_POST['countryid'];

         $state=$this->state->where('CountryID',$countryid)->findAll();
         print_r($state); die;
        echo json_encode($state);



    }
    
    

    
}