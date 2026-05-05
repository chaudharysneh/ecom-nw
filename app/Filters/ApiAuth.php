<?php 

namespace App\Filters;
 
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
 
class ApiAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // $auth = apache_request_headers();
        // if(array_key_exists("Authorization",$auth)){
        //     $valid = $auth['Authorization'];
        //     if (isset($valid) && $valid != 'hXuRUGsEGuhGf6KG') {
        //         echo json_encode([
        //             'status' => 0,
        //             'response' => 'Please enter valid Authorization value',
        //         ]);
                
        //         exit();
        //     }
        // }else{
        //      echo json_encode(['status' => 0, 'response' => 'Authorization not valid']);
        //     exit();
        // }
    }
 
    //--------------------------------------------------------------------
 
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
