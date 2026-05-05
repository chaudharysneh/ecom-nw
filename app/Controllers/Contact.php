<?php

namespace App\Controllers;
use App\Models\Contactmodel;
use App\Models\UserModel;
use App\Models\Categorymodel;
use App\Models\Subcategorymodel;
use App\Models\EmailsmtpModel;
use App\Models\Settings;


class Contact extends BaseController
{
    protected $Contactmodel;
    protected $UserModel;
    protected $Categorymodel;
    protected $Subcategorymodel;
    protected $emailsmtp_model;
    protected $settings;
    
     public function __construct()
    {
        $session = \Config\Services::session();
        $db = \Config\Database::connect();
        $this->Contactmodel = new Contactmodel($db);
        $this->UserModel = new UserModel($db);
        $this->Categorymodel = new Categorymodel($db);
        $this->Subcategorymodel = new Subcategorymodel($db);
        $this->emailsmtp_model = new EmailsmtpModel($db);
        $this->settings = new Settings($db);
        $this->session = \Config\Services::session();
    }
    
    public function index()
    {
        $data['catdata'] = $this->Categorymodel->findAll();
        $data['subdata']=[];
        foreach($data['catdata'] as $cat)
        {
            //$data['subdata']=$this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $subcategories = $this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $data['subdata'][$cat['CategoryID']] = $subcategories;
        }
        return view('contact',$data);
    }
    
    public function savecontact()
    {
        // echo "hii";
    
        // print_r($_POST);
        $fullname = $this->request->getPost('fullname');
        $subject = $this->request->getPost('subject');
        $emailid = $this->request->getPost('email');
        $phoneno = $this->request->getPost('phoneno');
        $message = $this->request->getPost('message');
        $session = session();
       $cont_id = "";
     
        
         
            $id = $session->get('user_id');
            
            if(!empty($id))  {
               $cont_id = $id; 
                
            }
            
            else{
                $cont_id = 0;
                
            }
        
    //   echo $cont_id;
           
        
        
        $receivers_dt = $this->UserModel->where('UserType','1')->first();
        $receive_id = $receivers_dt['UserID'];
        $checkemail = $this->Contactmodel->where('Email',$emailid)->get()->getResult('array');
        if(count($checkemail) > 0)
        {
            echo 0;
        }
        else 
//         {
            
//             $setting_mail_data =  $this->settings->first();
//             $setting_mail = $setting_mail_data['Email'];
            
            
//             // print_r($setting_mail);
//             // die;
            
//             $smtp_email_data = $this->emailsmtp_model->first();
            
//             // print_r($smtp_email_data);
//             // die;
            
//             $smtp_email_host = $smtp_email_data['host'];
//             $smtp_email_username = $smtp_email_data['username'];
//             $smtp_email = $smtp_email_data['email'];
//             $smtp_email_password = $smtp_email_data['password'];
//             $smtp_email_port = $smtp_email_data['port'];
//             $smtp_email_protocol = $smtp_email_data['protocol'];
            
            
//             $tomail=$smtp_email;
//             // $tomail=$setting_mail;
           
//             // $from='info@fableadtechnolabs.com';
//              $from=$smtp_email;
//             // $from='akshayfablead@gmail.com';
//             $subject='Contact detail';
//     	    $headers  = 'MIME-Version: 1.0' . "\r\n";
//             $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
//             $headers .= 'From: Contact '.$from."\r\n".
//                      'Reply-To: '.$from."\r\n" .
//                     'X-Mailer: PHP/' . phpversion();
            
//             $email = \Config\Services::email();
            
// //             $email->initialize([
// //             'protocol' => 'smtp',
// //             'SMTPHost' => 'fableadtechnolabs.com',
// //             'SMTPUser' => 'smtp@fableadtechnolabs.com',
// //             'SMTPPass' => '#w8(_4@wdc0M',
// //             'SMTPPort' => 465,  // Adjust the port as needed
// //             'SMTPCrypto' => 'ssl',  // Use 'tls' or 'ssl' based on your SMTP server configuration
// // ]);

//  $email->initialize([
//             'protocol' => 'smtp',
//             'SMTPHost' => $smtp_email_host,
//             'SMTPUser' => $smtp_email,
//             'SMTPPass' => $smtp_email_password,
//             'SMTPPort' => $smtp_email_port,  // Adjust the port as needed
//             'SMTPCrypto' => $smtp_email_protocol,  // Use 'tls' or 'ssl' based on your SMTP server configuration
// ]);

// // print_r($email);
// // die;



//             $email->setTo($tomail);
//             // $email->setTo('akshayfablead@gmail.com');
//             // $email->setFrom('info@fableadtechnolabs.com', 'Contact detail');
//              $email->setFrom($smtp_email, $subject);
                
//             $email->setSubject($subject);
                
//             $email->setmailType('html');
            
            
//             $messages = '
//             <!doctype html>
//             <html lang="en-US">
            
            
            
//          <body>
                
//               <h2 style="text-decoration:unset; color:black!important;">Contact details</h2>
//             <p><strong>Full Name: </strong>"'.$fullname.'"</p>
//             <p><strong>Email: </strong>"'.$emailid.'"</p>
//             <p><strong>Mobile: </strong>"'.$phoneno.'"</p>
//              <p><strong>Message: </strong>"'.$message.'"</p>   
//              <p> Thanks You for contact us and giving your valuable time
//              we will back to you  as soon as possible! </p>
             
//                 <!--/100% body table-->
//             </body>
            
//             </html>';
            
            
            
            
            
            
//             // $messages = "<html><body>";
//             // $messages .= "<h2 style='text-decoration:unset; color:black!important;'>Contact details</h2>";
//             // $messages .="<p><strong>Full Name: </strong>".$fullname."</p>";
//             // $messages .="<p><strong>Email: </strong>".$emailid."</p>";
//             // $messages .="<p><strong>Mobile: </strong>".$phoneno."</p>";
//             // $messages .="<p><strong>Message: </strong>".$message."</p>";                
//             // $messages .= "</body></html>";
//             $email->setMessage($messages);
            
                    
//             $resdata=['SenderID'=>$cont_id,'RecipientID'=>$receive_id,'Fullname'=>$fullname,'Email'=>$emailid,'Mobile'=>$phoneno,'Subject'=>$subject,'Message'=>$message];
//             $res=$this->Contactmodel->insert($resdata);
//             if ($email->send()) 
//     		{
//                 echo 1;
//             } 
//     		else 
//     		{
//                 $data = $email->printDebugger(['headers']);
//                  print_r($data);
//             }
           
//         }
// {
// $setting_mail_data = $this->settings->first();
// $setting_mail = $setting_mail_data['Email'];

// $smtp_email_data = $this->emailsmtp_model->first();

// $smtp_email_host = $smtp_email_data['host'];
// $smtp_email_username = $smtp_email_data['username'];
// $smtp_email = $smtp_email_data['email'];
// $smtp_email_password = $smtp_email_data['password'];
// $smtp_email_port = $smtp_email_data['port'];
// $smtp_email_protocol = $smtp_email_data['protocol'];

// $from = $smtp_email;
// $subject = 'Contact detail';

// $headers  = 'MIME-Version: 1.0' . "\r\n";
// $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// $headers .= 'From: Contact ' . $from . "\r\n" .
//             'Reply-To: ' . $from . "\r\n" .
//             'X-Mailer: PHP/' . phpversion();

// $email = \Config\Services::email();

// $email->initialize([
//     'protocol' => 'smtp',
//     'SMTPHost' => $smtp_email_host,
//     'SMTPUser' => $smtp_email,
//     'SMTPPass' => $smtp_email_password,
//     'SMTPPort' => $smtp_email_port,
//     'SMTPCrypto' => $smtp_email_protocol,
// ]);

// $recipients = [$emailid, $setting_mail];
 
                 

// $messages = [
//     '<!doctype html>
//      <html lang="en-US">
//         <body>
//              <h2 style="text-decoration:unset; color:black!important;">Contact details</h2>
//             <p><strong>Full Name: </strong>"'.$fullname.'"</p>
//              <p><strong>Email: </strong>"'.$emailid.'"</p>             
//              <p><strong>Mobile: </strong>"'.$phoneno.'"</p>
//              <p><strong>Message: </strong>"'.$message.'"</p>   
//               <p> Thanks You for contact us and giving your valuable time
//               we will back to you  as soon as possible! </p>
                             
//         </body>
            
//      </html>',
          
//     '<!doctype html>
//      <html lang="en-US">
//         <body>
//             <h2 style="text-decoration:unset; color:black!important;">Contact details</h2>
//             <p><strong>Full Name: </strong>"'.$fullname.'"</p>
//              <p><strong>Email: </strong>"'.$emailid.'"</p>             
//              <p><strong>Mobile: </strong>"'.$phoneno.'"</p>
//              <p><strong>Message: </strong>"'.$message.'"</p>   
//              <p> One Enquiery had come I hope you received and 
//                  I wish u will contact them or answer as soon as possible!  </p>
                          
//         </body>
            
//     </html>',
 
        
// ];

// for ($i = 0; $i < count($recipients); $i++) {
//     $email->setTo($recipients[$i]);
//     $email->setFrom($from, $subject);
//     $email->setSubject($subject);
//     $email->setmailType('html');
//     $email->setMessage($messages[$i]);
//         if ($recipients[$i] == $emailid) {

//      $resdata = [
//         'SenderID' => $cont_id,
//         'RecipientID' => $receive_id,
//         'Fullname' => $fullname,
//         'Email' => $recipients[$i], // Use the recipient email
//         'Mobile' => $phoneno,
//         'Subject' => $subject,
//         'Message' => $messages[$i], // Use the correct variable name
//     ];


//     $res = $this->Contactmodel->insert($resdata);
//         }
        

//     if ($email->send()) {
//         echo 1;
//     } else {
//         $data = $email->printDebugger(['headers']);
//         print_r($data);
//     }
// }
// }
        $setting_mail_data = $this->settings->first();
$setting_mail = $setting_mail_data['Email'];

$smtp_email_data = $this->emailsmtp_model->first();

$smtp_email_host = $smtp_email_data['host'];
$smtp_email_username = $smtp_email_data['username'];
$smtp_email = $smtp_email_data['email'];
$smtp_email_password = $smtp_email_data['password'];
$smtp_email_port = $smtp_email_data['port'];
$smtp_email_protocol = $smtp_email_data['protocol'];

$from = $smtp_email;
$subject = 'Contact detail';

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: Contact ' . $from . "\r\n" .
            'Reply-To: ' . $from . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

$email = \Config\Services::email();

$email->initialize([
    'protocol' => 'smtp',
    'SMTPHost' => $smtp_email_host,
    'SMTPUser' => $smtp_email,
    'SMTPPass' => $smtp_email_password,
    'SMTPPort' => $smtp_email_port,
    'SMTPCrypto' => $smtp_email_protocol,
]);

$recipients = [$emailid, $setting_mail];

$messages = [
    '<!doctype html>
     <html lang="en-US">
        <body>
             <h2 style="text-decoration:unset; color:black!important;">Contact details</h2>
            <p><strong>Full Name: </strong>"' . $fullname . '"</p>
             <p><strong>Email: </strong>"' . $emailid . '"</p>             
             <p><strong>Mobile: </strong>"' . $phoneno . '"</p>
             <p><strong>Message: </strong>"' . $message . '"</p>   
              <p> Thanks You for contacting us and giving your valuable time
              we will get back to you  as soon as possible! </p>
        </body>
     </html>',

    '<!doctype html>
     <html lang="en-US">
        <body>
            <h2 style="text-decoration:unset; color:black!important;">Contact details</h2>
            <p><strong>Full Name: </strong>"' . $fullname . '"</p>
             <p><strong>Email: </strong>"' . $emailid . '"</p>             
             <p><strong>Mobile: </strong>"' . $phoneno . '"</p>
             <p><strong>Message: </strong>"' . $message . '"</p>   
             <p> One Enquiry has come. I hope you received it, and I wish you will contact them or answer as soon as possible!  </p>
        </body>
    </html>',
];

for ($i = 0; $i < count($recipients); $i++) {
    $email->setTo($recipients[$i]);
    $email->setFrom($from, $subject);
    $email->setSubject($subject);
    $email->setmailType('html');
    $email->setMessage($messages[$i]);

    // Insert data into the database only for the recipient with emailid
    if ($recipients[$i] == $emailid) {
        $resdata = [
            'SenderID' => $cont_id,
            'RecipientID' => $receive_id,
            'Fullname' => $fullname,
            'Email' => $recipients[$i], // Use the recipient email
            'Mobile' => $phoneno,
            'Subject' => $subject,
            'Message' => $messages[$i], // Use the correct variable name
        ];

        $res = $this->Contactmodel->insert($resdata);
    }

    if ($email->send()) {
        echo 1;
    } else {
        $data = $email->printDebugger(['headers']);
        print_r($data);
    }
}


    }
}
