<?php

namespace App\Controllers;
 
use App\Models\Categorymodel;
use App\Models\Productmodel;
use App\Models\Subcategorymodel;
use App\Models\Bannersmodel;
use App\Models\Settings;
use App\Models\BlogModel;
use App\Models\CountryModel;
use App\Models\StateModel;
use App\Models\CityModel;
use App\Models\UserModel;
use App\Models\Ordermodel;
use App\Models\Orderitemmodel;
use App\Models\Allsettingsmodel;



class Orders extends BaseController
{
    protected $Categorymodel;
    protected $Subcategorymodel;
    protected $Bannersmodel;
    protected $Settings;
    protected $BlogModel;
    protected $CountryModel;
    protected $StateModel;
    protected $CityModel;
    protected $UserModel;
    protected $Ordermodel;
     protected $Orderitemmodel;
    protected $session;
    protected $Allsettingsmodel;

    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->Categorymodel = new Categorymodel($db);
        $this->Productmodel = new Productmodel($db);
        $this->Subcategorymodel = new Subcategorymodel($db);
        $this->Bannersmodel = new Bannersmodel($db);
        $this->Settings = new Settings($db);
        $this->BlogModel = new BlogModel($db);
        $this->CountryModel = new CountryModel($db);
        $this->StateModel = new StateModel($db);
        $this->CityModel = new CityModel($db);
        $this->UserModel = new UserModel($db);
        $this->Ordermodel = new Ordermodel($db);
          $this->Orderitemmodel = new Orderitemmodel($db);
          $this->session = \Config\Services::session();
          $this->Allsettingsmodel = new Allsettingsmodel($db);
    }
    
    public function index()
    {
        $session = session();
        //   print_r($session);
         $auth_id = $session->get('user_id');
        // echo 'in';die;
        $data['all_order_data'] = $this->Ordermodel->where('UserID',$auth_id)->orderBy('OrderID','DESC')->findAll();
        // print_r($data['all_order_data']);
        // die;
         $data['catdata'] = $this->Categorymodel->findAll();
         $data['subdata']=[];
        foreach($data['catdata'] as $cat)
        {
            //$data['subdata']=$this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $subcategories = $this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $data['subdata'][$cat['CategoryID']] = $subcategories;
        }
        return view('my_orders', $data);
    }


    // public function invoice($orderId)
    // {
    //     // Fetch the order and product details
    //     $builder = $this->Ordermodel
    //                   ->select('orders.*, 
    //                             orderitems.Quantity, orderitems.Price, products.ProductName, products.ProductSKU')
    //                   ->join('orderitems', 'orderitems.OrderID = orders.OrderID', 'left')
    //                   ->join('products', 'products.ProductID = orderitems.ProductID', 'left')
    //                   ->where('orders.OrderID', $orderId);
        
    //     $data['order_det'] = $builder->get()->getRowArray(); 
    
    //     // Fetch order items for the invoice
    //     $itemsBuilder = $this->Ordermodel
    //                   ->select('orderitems.Quantity, orderitems.Price, products.ProductName, products.ProductSKU')
    //                   ->join('orderitems', 'orderitems.OrderID = orders.OrderID', 'left')
    //                   ->join('products', 'products.ProductID = orderitems.ProductID', 'left')
    //                   ->where('orders.OrderID', $orderId);
        
    //     $data['order_items'] = $itemsBuilder->get()->getResultArray();
    
    
    //     // Calculate subtotal
    //     $subtotal = 0;
    //     foreach ($data['order_items'] as $item) {
    //         $subtotal += $item['Quantity'] * $item['Price'];
    //     }
    //     $data['subtotal'] = $subtotal;
    
    //     $data['totalTax'] = $data['order_det']['totalTax'];
    
    //     $data['shipping_cost'] = $data['order_det']['totalShipingCost'];
    //     $data['discount'] = $data['order_det']['totalDiscount'];
        
    //     $data['TotalAmount'] = $data['order_det']['TotalAmount'];
    
    //     $data['settings'] = $this->Allsettingsmodel->findAll();
    
    //     return view('invoice', $data);
    // }

public function invoice($orderId)
{
    // Fetch the order and product details along with country, state, and city names
    $builder = $this->Ordermodel
                  ->select('orders.*, 
                            orderitems.Quantity, orderitems.Price, 
                            products.ProductName, products.ProductSKU, 
                            countries.CountryName as country_name, 
                            states.StateName as state_name, 
                            cities.CityName as city_name')
                  ->join('orderitems', 'orderitems.OrderID = orders.OrderID', 'left')
                  ->join('products', 'products.ProductID = orderitems.ProductID', 'left')
                  ->join('countries', 'countries.CountryID = orders.country', 'left')
                  ->join('states', 'states.StateID = orders.state', 'left')
                  ->join('cities', 'cities.CityID = orders.city', 'left')
                  ->where('orders.OrderID', $orderId);

    $data['order_det'] = $builder->get()->getRowArray(); 

    // Fetch order items for the invoice
    $itemsBuilder = $this->Ordermodel
                  ->select('orderitems.Quantity, orderitems.Price, products.ProductName, products.ProductSKU')
                  ->join('orderitems', 'orderitems.OrderID = orders.OrderID', 'left')
                  ->join('products', 'products.ProductID = orderitems.ProductID', 'left')
                  ->where('orders.OrderID', $orderId);

    $data['order_items'] = $itemsBuilder->get()->getResultArray();

    // Calculate subtotal
    $subtotal = 0;
    foreach ($data['order_items'] as $item) {
        $subtotal += $item['Quantity'] * $item['Price'];
    }
    $data['subtotal'] = $subtotal;

    // Fetch additional details
    $data['totalTax'] = $data['order_det']['totalTax'];
    $data['shipping_cost'] = $data['order_det']['totalShipingCost'];
    $data['discount'] = $data['order_det']['totalDiscount'];
    $data['TotalAmount'] = $data['order_det']['TotalAmount'];
    $data['settings'] = $this->Allsettingsmodel->findAll();

    return view('invoice', $data);
}



    public function customer_order($id)
    {
        // print_r($id);
        $id= base64_decode($id);
        $data['all_order_data'] = $this->Ordermodel->where('OrderID',$id)->first();
    //     echo "<pre>";
    //   print_r($data); die;
            $order_id = $data['all_order_data']['OrderID'];
            $user_id = $data['all_order_data']['UserID'];
            $data['all_order_items_data'] = $this->Orderitemmodel->where('OrderID',$order_id)->findAll();
    
         $data['all_product_data']=[];
          foreach($data['all_order_items_data'] as $key=>$single_data){
            $product_id = $single_data['ProductID'];
            $order_item_id= $single_data['OrderItemID'];

            $data_1 = $this->Productmodel->join('orderitems','orderitems.ProductID=products.ProductID')->where('products.ProductID',$product_id)->where('orderitems.OrderItemID',$order_item_id)->first();
           $data['all_product_data'][$key]=$data_1;
          }
          
            $data['all_user_data'] = $this->UserModel->where('UserID',$user_id)->first();
            $data['user_data']=$this->CountryModel->where('CountryID',$data['all_user_data']['UserCountry'])->get()->getRow();
        
            $data['catdata'] = $this->Categorymodel->findAll();
            $data['subdata']=[];
            foreach($data['catdata'] as $cat)
            {
                //$data['subdata']=$this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
                $subcategories = $this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
                $data['subdata'][$cat['CategoryID']] = $subcategories;
            }
            return view('customer-order' ,$data);
    }
    
    public function order_detail($id)
    {
        // print_r($id);
        $data['all_order_data'] = $this->Ordermodel->where('OrderID',$id)->first();
       
            $order_id = $data['all_order_data']['OrderID'];
            $user_id = $data['all_order_data']['UserID'];
            $quantity = $data['all_order_data']['Quantity'];
            $data['all_order_items_data'] = $this->Orderitemmodel->where('OrderID',$order_id)->first();
            $product_id = $data['all_order_items_data']['ProductID'];
    
            $data['all_product_data'] = $this->Productmodel->join('orderitems','orderitems.ProductID=products.ProductID')->where('orderitems.OrderID',$id)->findAll();
       
            $data['all_user_data'] = $this->UserModel->where('UserID',$user_id)->first();
            $data['user_data']=$this->CountryModel->where('CountryID',$data['all_user_data']['UserCountry'])->get()->getRow();
        
            $data['catdata'] = $this->Categorymodel->findAll();
            $data['subdata']=[];
            foreach($data['catdata'] as $cat)
            {
                //$data['subdata']=$this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
                $subcategories = $this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
                $data['subdata'][$cat['CategoryID']] = $subcategories;
            }
            return view('track-order' ,$data);
    }
}
