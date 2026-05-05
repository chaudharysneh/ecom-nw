<?php

namespace App\Controllers;
use App\Models\Categorymodel;
use App\Models\Subcategorymodel;
use App\Models\Productmodel;
use App\Models\Variationmodel;
use App\Models\variationtypemodel;
use App\Models\Optionmodel;
use App\Models\Wishlistmodel;

class Category extends BaseController
{
    protected $Categorymodel;
    protected $Productmodel;
    protected $Variation;
    protected $variationtype;
    protected $Optionmodel;
    protected $Subcategorymodel;
    protected $Wishlistmodel;
     protected $session;

    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->Categorymodel = new Categorymodel($db);
        $this->Productmodel = new Productmodel($db);
        $this->Variation = new Variationmodel($db);
        $this->variationtype = new variationtypemodel($db);
        $this->Optionmodel = new Optionmodel($db);
        $this->Subcategorymodel = new Subcategorymodel($db);
        $this->Wishlistmodel = new Wishlistmodel($db);
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        return view('category');
    }

    public function show_category_data($id)
    {
        $catid= base64_decode($id);
       $user_id = $this->session->get('user_id');
        $sort = base64_decode($this->request->getVar('sort'));
        $minprice = base64_decode($this->request->getVar('min_price'));
        $maxprice = base64_decode($this->request->getVar('max_price'));
        
        $catname = $this->Categorymodel->where('CategoryID',$catid)->get()->getRow();
        
        $catresQuery = $this->Productmodel->select('*')->where('CategoryID', $catid);
        if ($minprice > -1 && !empty($maxprice)) 
        {
            $catresQuery->where('ProductPrice >=', $minprice)->where('ProductPrice <=', $maxprice);
        }
        if (!empty($sort)) 
        {
            $catresQuery->orderBy('ProductPrice', $sort);
        }
        
        $catres = $catresQuery->paginate(8); 
        //  echo "<pre>";print_r($catres); die;
        $varprod=[];
        foreach($catres as $catdt)
        {
            $varprod[]=$this->Variation->where('ProductID',$catdt['ProductID'])->get()->getResult('array');
        }
        $wislist=[];
        foreach($catres as $prd)    
        {
            $wislist[] = $this->Wishlistmodel->where('UserID', $user_id)->where('ProductID',$prd['ProductID'])->first();
        } 
        $catdata= $this->Categorymodel->where('ParentCategoryID', '0')->findAll();
        $catprod=[];
        foreach($catdata as $cat)    
        {
            $catprod[] = $this->Productmodel->where('CategoryID',$cat['CategoryID'])->countAllResults();
        }  
        $data['catdata'] = $this->Categorymodel->findAll();
        $data['subdata']=[];
        foreach($data['catdata'] as $cat)
        {
            //$data['subdata']=$this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $subcategories = $this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $data['subdata'][$cat['CategoryID']] = $subcategories;
        }
        $data=[
                'sort' => $sort,
                'id' => $catid,
                'cat' =>$this->Categorymodel->where('ParentCategoryID', '0')->findAll(),
                'catres'=> $catres,
                'catname' => $catname,
                'countcat' => $catprod,
                'varprod'=>$varprod,
                'wishlist'=>$wislist,
                'minimum_price' => $minprice,
                'maximum_price' => $maxprice,
                'pager'=>$this->Productmodel->pager,
                'catdata'=>$data['catdata'],
                'subdata'=>$data['subdata']
            ];
            
         $data['variation'] = $this->variationtype
            ->where('VariationTypeName', 'color')
            ->first();
            
        return view('category_wise_product', $data);
    }
    
    public function show_subcategory_data($slg,$id)
    {   $id= base64_decode($id);
        $sort = base64_decode($this->request->getVar('sort'));
        $user_id = $this->session->get('user_id');
        $minprice = base64_decode($this->request->getVar('min_price'));
        $maxprice = base64_decode($this->request->getVar('max_price'));
        
        $catname = $this->Subcategorymodel->where('sub_category_id',$id)->get()->getRow();
        
        $catresQuery = $this->Productmodel->select('*')->where('SubCategoryID', $id); 
        if ($minprice > -1 && !empty($maxprice)) 
        {
            $catresQuery->where('ProductPrice >=', $minprice)->where('ProductPrice <=', $maxprice);
        }
        if (!empty($sort)) 
        {
            $catresQuery->orderBy('ProductPrice', $sort);
        }
        $catres = $catresQuery->paginate(8); 
        // echo "<pre>";print_r($catres); die;
        $varprod=[];
        foreach($catres as $catdt)
        {
            $varprod[]=$this->Variation->where('ProductID',$catdt['ProductID'])->get()->getResult('array');
        }
        $catdata= $this->Categorymodel->where('ParentCategoryID', '0')->findAll();
        $catprod=[];
        foreach($catdata as $cat)    
        {
            $catprod[] = $this->Productmodel->where('CategoryID',$cat['CategoryID'])->countAllResults();
        }  
         $wislist=[];
        foreach($catres as $prd)    
        {
            $wislist[] = $this->Wishlistmodel->where('UserID', $user_id)->where('ProductID',$prd['ProductID'])->first();
        } 
        $data['catdata'] = $this->Categorymodel->findAll();
        $data['subdata']=[];
        foreach($data['catdata'] as $cat)
        {
            //$data['subdata']=$this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $subcategories = $this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $data['subdata'][$cat['CategoryID']] = $subcategories;
        }
        $data=[
                'sort' => $sort,
                'id' => $id,
                'cat' =>$this->Categorymodel->where('ParentCategoryID', '0')->findAll(),
                'catres'=> $catres,
                'catname' => $catname,
                'countcat' => $catprod,
                'varprod'=>$varprod,
                'wishlist'=>$wislist,
                'minimum_price' => $minprice,
                'maximum_price' => $maxprice,
                'pager'=>$this->Productmodel->pager,
                'catdata'=>$data['catdata'],
                'subdata'=>$data['subdata']
            ];
        //  echo"<pre>";   print_r($data); die;
        return view('subcategory_wise_product',$data);
    }
    
}
