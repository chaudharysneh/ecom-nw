<?php

namespace App\Controllers\api;

 // Configure PHPMailer
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;

use App\Models\UserModel;
use App\Models\Ordermodel;
use App\Libraries\EmailSender;
use App\Models\User_shipping_addressmodel;
class User extends BaseController
{
    protected $profileImagePath;
    
    protected $UserModel;
    protected $Ordermodel;
    protected $User_shipping_addressmodel;

    public function __construct()
    {
        
        $this->profileImagePath = base_url('admin/public/upload_images/');
        
        helper('text');
        
        $db = \Config\Database::connect();
        $this->UserModel = new UserModel($db);
        $this->Ordermodel = new Ordermodel($db);
        $this->User_shipping_addressmodel = new User_shipping_addressmodel($db);
        
    }

    public function SignUp()
    {
        $input = $this->request->getpost();
        if(!$input['firstName']){ return json_encode(array("status"=>"fail","message"=>"First name required")); }
        if(!$input['lastName']){ return json_encode(array("status"=>"fail","message"=>"Last name required")); }
        if(!$input['email']){ return json_encode(array("status"=>"fail","message"=>"Email required")); }
        if(!$input['phone']){ return json_encode(array("status"=>"fail","message"=>"Phone required")); }
        if(!$input['password']){ return json_encode(array("status"=>"fail","message"=>"Password required")); }
        
        $checkEmailIsExist = $this->UserModel->where("UserEmail",$input['email'])->first();
        if($checkEmailIsExist){
            return json_encode(array("status"=>"fail","message"=>"Email is already exist!"));
        }
        
        $userData = [
            'UserType'=>2,
            'UserFirstName'=>$input['firstName'],
            'UserLastName'=>$input['lastName'],
            'UserEmail'=>$input['email'],
            'UserPhone'=>$input['phone'],
            'UserPassword'=>md5($input['password'])
            ];
            
        $insert = $this->UserModel->insert($userData);
        $lastId = $this->UserModel->getInsertID();
        $user_shipping_feild=[
            'user_id' => $lastId,
            'first_name' => $input['firstName'],
            'last_name' => $input['lastName'],
            'number'=> $input['phone'],
            ];
            $user_shipping_data=$this->User_shipping_addressmodel->insert($user_shipping_feild);
        if($insert && $user_shipping_data){
            return json_encode(array("status"=>"success","message"=>"SignUp successfully","info"=>$insert));
        }else{
            return json_encode(array("status"=>"fail","message"=>"Fail to Signup! try again"));
        }
        
    }
    
    public function LogIn()
    { 
        $input = $this->request->getpost();
        if(!$input['email']){ return json_encode(array("status"=>"fail","message"=>"Email required")); }
        if(!$input['password']){ return json_encode(array("status"=>"fail","message"=>"Password required","userId"=>"")); }
        
        $checkEmailIsExist = $this->UserModel->where("UserEmail",$input['email'])->first();
        if(!$checkEmailIsExist){ return json_encode(array("status"=>"fail","message"=>"User not found!","userId"=>"")); }
        
        $login = $this->UserModel->where("UserEmail",$input['email'])->where("UserPassword",md5($input['password']))->first();
        if($login){
            return json_encode(array("status"=>"success","message"=>"Login successfully","userId"=>$login['UserID']));
        }else{
            return json_encode(array("status"=>"fail","message"=>"invalid email or password. please try again","userId"=>""));
        }
    }
    
    public function change_client_password(){
        
        $user_id= $this->request->getVar('user_id');
        $current_password = md5($this->request->getVar('current_password'));
        $new_password = $this->request->getVar('new_password');
        $confirm_password =$this->request->getVar('confirm_password');
        
        // $input = $this->request->getpost();
        if(!$user_id){ return json_encode(array("status"=>"fail","message"=>"user_id required")); }
        if(!$current_password){ return json_encode(array("status"=>"fail","message"=>"current_password required")); }
        if(!$new_password){ return json_encode(array("status"=>"fail","message"=>"new_password required")); }
        if(!$confirm_password){ return json_encode(array("status"=>"fail","message"=>"confirm_password required")); }
        
        
         if ($new_password !== $confirm_password) {
            echo json_encode(array('message'=>'password and confirm password not match','status'=> 'false'));
            exit;
          }
          
          $chk_pass=$this->UserModel->where('UserPassword',$current_password)->where('UserID',$user_id)->where('UserType','2')->first();
        //   print_r($chk_pass); die;
          if(!empty($chk_pass)){
              $data=[
                  "UserPassword"=> md5($new_password)
                  ];
              
              $upd_pass=$this->UserModel->update($user_id,$data);
              if($upd_pass){
                  echo json_encode(array('message'=>'password change successfully','status'=> 'success' ));
              }else{
                  echo json_encode(array('message'=>'password Error!','status'=> 'false'));
              }
              
          }else{
              echo json_encode(array('message'=>'Current password is wrong!','status'=> 'false'));
              
          }
          
          
        exit;
        
        
        
    }
        
    
    
    public function ForgetPassword()
    {
        $input = $this->request->getpost();
        if(!$input['email']){ return json_encode(array("status"=>"fail","message"=>"Email required")); }
        
        $checkEmailIsExist = $this->UserModel->where("UserEmail",$input['email'])->first();
        if(!$checkEmailIsExist){ return json_encode(array("status"=>"fail","message"=>"User not found!")); }
        
        $randomString = random_string('alnum', 15);
        
        $email = \Config\Services::email();
        $email->setTo("arunfablead@gmail.com");
        $email->setSubject('Ecommerce - Password Reset');
        $email->setMessage('Click the following link to reset your password: ' . site_url('reset-password/' . md5($randomString)));
        
        if($email->send()){
            return json_encode(array("status"=>"success","message"=>"Check your mail."));
        }else{
            return json_encode(array("status"=>"fail","message"=>"Email not sent."));
        }
        
    }
  
public function forgot_password_app()
{
    $forgot_mail = $_POST['forgotEmail'];
    $data = $this->UserModel->where('UserEmail', $forgot_mail)->first();

    if ($data) {
        // Generate random key
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $key = substr(str_shuffle($str_result), 0, 16);
        $id = $data['UserID'];
        $name = $data['UserFirstName'];

        // Update forgot password key in the database
        $this->UserModel->set('forgot_pass_key', $key)->where('UserEmail', $forgot_mail)->update();

        // Prepare email content
        $link = base_url();
        $subject = 'Forgot Password';
        $message = '
            <!doctype html>
            <html lang="en-US">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Reset Password</title>
                <style>
                    body {font-family: Arial, sans-serif; background-color: #f2f3f8; margin: 0; padding: 0;}
                    .container {max-width: 670px; margin: 0 auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 6px 18px rgba(0,0,0,0.06);}
                    .btn {background-color: #20e277; color: #fff; text-decoration: none; padding: 10px 20px; border-radius: 5px; display: inline-block;}
                    .btn:hover {background-color: #1d9a5b;}
                </style>
            </head>
            <body>
                <div style="background-color: #f2f3f8; padding: 20px;">
                    <div class="container">
                        <h2 style="text-align: center; color: #333;">Hi ' . $name . '!</h2>
                        <p style="color: #555;">Please use the link below to reset your password for your Ecom Account.</p>
                        <div style="text-align: center; margin: 20px 0;">
                            <a href="' . $link . 'api/reset_password_app/' . $key . '/' . $id . '" class="btn">Reset Password</a>
                        </div>
                        <p style="color: #777;">If you did not request a password reset, please ignore this email.</p>
                    </div>
                </div>
            </body>
            </html>';

        // Send the email
        $emailSender = new EmailSender();
        $isMailSent = $emailSender->sendEmail($forgot_mail, $subject, $message);

        if ($isMailSent) {
            echo json_encode(['status' => 'success', 'message' => 'Check your mail!']);
        } else {
            echo json_encode(['status' => 'fail', 'message' => 'Unable to send email. Please try again.']);
        }
    } else {
        echo json_encode(['status' => 'fail', 'message' => 'Email not registered']);
    }
}

    
      public function reset_password_app($reset_password_key,$id){
        $data['id']=$id;
        $data['reset_password_key']=$reset_password_key;
    //   print_r($reset_password_key); die;
        $check_reset_password_key = $this->UserModel->where('forgot_pass_key',$reset_password_key)->first();
        if(!empty($check_reset_password_key) && !empty($check_reset_password_key['forgot_pass_key'])){
            $data['forget_password_key'] = $check_reset_password_key['forgot_pass_key'];
        }
        else{
            $data['forget_password_key'] = NULL;
        }
        
        return view('API/reset_password',$data);
    }
    
       public function change_reset_password_app()
    {    //print_r('hhh'); die;
        $new_password = $this->request->getVar('new_password');
        $confirm_password = $_POST['confirm_password'];
        $id = $this->request->getVar('userid');
        $reset_password_key = $this->request->getVar('reset_password_key');
        
        if($confirm_password==$new_password){
            $data = array(
                "UserPassword" => md5($new_password),
                "forgot_pass_key" => NULL
            );
            
            $update_password = $this->UserModel->set($data)->where('UserID',$id)->where('forgot_pass_key',$reset_password_key)->update();
            
            if ($update_password) 
            {
                $response = array('status'=>'success','message'=>'Password Changed Successfully');
            }
            else 
            {
                $response = array('status'=>'fail','message'=>'Something went wrong');
            }
        }
        else{
            $response = array('status'=>'fail','message'=>'Confirm password does not matched with new password');
        }
        
        echo json_encode($response);
        
    }
    public function test_change_password(){
        print_r('hii');die;
    }


        

    
    public function userProfile()
    {
        $input = $this->request->getpost();
        if(!$input['userId']){ return json_encode(array("status"=>"fail","message"=>"User Id required")); }
        
        $userDetails = $this->UserModel->select("CONCAT('" . $this->profileImagePath . "', UserProfile) AS Profileimage,UserFirstName,UserLastName,UserGander,UserEmail,UserPhone,UserCity,UserState,UserAddress,UserAddress2")->where("UserID",$input['userId'])->first();
        
        if($userDetails){
            return json_encode(array("status"=>"success","message"=>"User found","profileDetails"=>$userDetails));
        }else{
            return json_encode(array("status"=>"fail","message"=>"User not found"));
        }
    }
    
    public function updateProfile()
    {
        $input = $this->request->getpost();
        if(!$input['userId']){ return json_encode(array("status"=>"fail","message"=>"User Id required")); }
        if(!$input['firstName']){ return json_encode(array("status"=>"fail","message"=>"firstName required")); }
        if(!$input['lastName']){ return json_encode(array("status"=>"fail","message"=>"lastName required")); }
        if(!$input['gender']){ return json_encode(array("status"=>"fail","message"=>"Gender required")); }
        if(!$input['phone']){ return json_encode(array("status"=>"fail","message"=>"Phone required")); }
        if(!$input['city']){ return json_encode(array("status"=>"fail","message"=>"City required")); }
        if(!$input['state']){ return json_encode(array("status"=>"fail","message"=>"State required")); }
        if(!$input['address']){ return json_encode(array("status"=>"fail","message"=>"Address required")); }
        $file_image=$this->request->getfile('profile_img');
        
        $user_data=$this->UserModel->where('UserID',$input['userId'])->first();
            // print_r($user_data);
            $old_img=$user_data['UserProfile'];
            if(!empty($file_image) && $file_image->isvalid()){
                
               
                 $fileName = $file_image->getRandomName();
                 $file_image->move('admin/public/upload_images/', $fileName);
              
            }else{
                $fileName=$old_img;
            }
            // print_r($fileName);
            
        $updateData =[
            'UserFirstName'=>$input['firstName'],
            'UserLastName'=>$input['lastName'],
            'UserGander'=>$input['gender'],
            'UserPhone'=>$input['phone'],
            'UserCity'=>$input['city'],
            'UserState'=>$input['state'],
            'UserAddress'=>$input['address'],
            'UserProfile'=>$fileName,
            ];
            
        $updateDetails = $this->UserModel->update($input['userId'],$updateData);
        
        if($updateDetails){
            return json_encode(array("status"=>"success","message"=>"Profile updated successfully."));
        }else{
            return json_encode(array("status"=>"fail","message"=>"Profile not updated."));
        }
    }
    
    public function userOrders()
    {
        $input = $this->request->getpost();
        if(!$input['userId']){ return json_encode(array("status"=>"fail","message"=>"User Id required")); }
        
        $userOrders = $this->Ordermodel->where("UserID",$input['userId'])->findAll();
        if($userOrders){
            return json_encode(array("status"=>"success","order_info"=>$userOrders));
        }else{
            return json_encode(array("status"=>"fail","message"=>"Order Data not found!"));
        }
    }
}