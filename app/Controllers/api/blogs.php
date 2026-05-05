<?php

namespace App\Controllers\api;

use App\Models\Bannersmodel;
use App\Models\Categorymodel;
use App\Models\Productmodel;
use App\Models\Reviewmodel;
use App\Models\Wishlistmodel;
use App\Models\CartModel;
use App\Models\UserModel;
use App\Models\Ordermodel;
use App\Models\Orderitemmodel;
use App\Models\Variationmodel;
use App\Models\VariationsDetails;
use App\Models\variationtypemodel;
use App\Models\Variationvaluemodel;
use App\Models\User_shipping_addressmodel;
use App\Models\CityModel;
use App\Models\CountryModel;
use App\Models\StateModel;
use App\Models\Paymentmodel;
use App\Models\TaxModel;
use App\Models\shippingzonemodel;
use App\Models\shippingratemodel;
use App\Models\ShippingMethodModel;
use App\Models\BlogcommentModel;
use App\Models\BlogModel;
use App\Models\CouponModel;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

    class blogs extends BaseController
    {
    public function get_blog()
    {
        $blog = new BlogModel();
        $blog_comment = new BlogcommentModel();
    
        $base_image_url = "https://ecomweb.fableadtechnolabs.com/admin/public/upload_images/";
        
    
        // Fetching blogs with comments
        $data = $blog->select('blog.*, blog_comment.comments, blog_comment.name, blog_comment.email')
                     ->join('blog_comment', 'blog_comment.blog_id = blog.id', 'left')
                     ->findAll(); 
    
        // Initialize an array to hold the final results
        $result = [];
    
        if (!empty($data)) {
            foreach ($data as $item) {
                // Initialize blog data if not already in the result array
                if (!isset($result[$item['id']])) {
                    $result[$item['id']] = [
                        'id' => $item['id'],
                        'title' => $item['title'],
                        'image' => !empty($item['image']) ? $base_image_url . $item['image'] : null,
                        'description' => $item['description'],
                        'category' => $item['category'],
                        'tags' => $item['tags'],
                        'created_by' => $item['created_by'],
                        'created_at' => $item['created_at'],
                        'updated_at' => $item['updated_at'],
                        'comments' => [],
                    ];
                }
    
                // Append comments if they exist
                if (!empty($item['comments'])) {
                    $result[$item['id']]['comments'][] = [
                        'comment' => $item['comments'],
                        'name' => $item['name'] ?? "",
                        'email' => $item['email'] ?? "",
                    ];
                }
            }
    
            // Reset the result array to be numerically indexed
            $result = array_values($result);
    
            return json_encode(array('status' => 'success', 'data' => $result));
        } else {
            return json_encode(array('status' => 'fail', 'message' => 'No blogs found.'));
        }
    }


    public function get_recent_blog()
    {
        $blog = new BlogModel();
        $blog_comment = new BlogcommentModel();
    
        $base_image_url = "https://ecomweb.fableadtechnolabs.com/admin/public/upload_images/";
    
        $data = $blog->select('blog.*, blog_comment.comments, blog_comment.name, blog_comment.email')
                     ->join('blog_comment', 'blog_comment.blog_id = blog.id', 'left')
                     ->limit(5)
                     ->findAll();
    
        // Initialize an array to hold unique blog entries
        $unique_blogs = [];
    
        if (!empty($data)) {
            foreach ($data as &$item) {
                // Append image base URL
                if (!empty($item['image'])) {
                    $item['image'] = $base_image_url . $item['image'];
                }
    
                // Set empty strings for null values
                $item['comments'] = $item['comments'] ?? "";
                $item['name'] = $item['name'] ?? "";
                $item['email'] = $item['email'] ?? "";
    
                // Check if the blog id already exists in unique_blogs array
                if (!isset($unique_blogs[$item['id']])) {
                    $unique_blogs[$item['id']] = $item;
                }
            }
    
            // Return only unique blog entries as an array
            return json_encode(array('status' => 'success', 'data' => array_values($unique_blogs)));
        } else {
            return json_encode(array('status' => 'fail', 'message' => 'No blogs found.'));
        }
    }


    public function single_blog()
    {
        $session = \Config\Services::session(); // Start session
        $blog = new BlogModel();
        $blog_comment = new BlogcommentModel();
        $blog_id = $this->request->getPost('blog_id');
        $base_image_url = "https://ecomweb.fableadtechnolabs.com/admin/public/upload_images/";
    
        if ($blog_id) {
            // Select blog details and comments
            $data = $blog->select('blog.*, blog_comment.comments, blog_comment.name AS comment_name, blog_comment.email AS comment_email, users.UserFirstName AS author_name, categories.CategoryName AS category_name')
                         ->join('blog_comment', 'blog_comment.blog_id = blog.id', 'left')  
                         ->join('users', 'users.UserID = blog.created_by', 'left')  
                         ->join('categories', 'categories.CategoryID = blog.category', 'left')  
                         ->where('blog.id', $blog_id) 
                         ->findAll();
    
            if (!empty($data)) {
                // Prepare final response
                $response = [
                    'status' => 'success',
                    'data' => [
                        'id' => $data[0]['id'], // Single blog ID
                        'title' => $data[0]['title'],
                        'image' => !empty($data[0]['image']) ? $base_image_url . $data[0]['image'] : '',
                        'description' => $data[0]['description'],
                        'category' => $data[0]['category'],
                        'tags' => $data[0]['tags'],
                        'created_by' => $data[0]['created_by'],
                        'created_at' => $data[0]['created_at'],
                        'updated_at' => $data[0]['updated_at'],
                        'author_name' => $data[0]['author_name'],
                        'category_name' => $data[0]['category_name'],
                        'comments' => []
                    ]
                ];
    
                // Collect comments
                foreach ($data as $item) {
                    if (!empty($item['comments'])) {
                        $response['data']['comments'][] = [
                            'comments' => $item['comments'],
                            'comment_name' => $item['comment_name'] ?? "",
                            'comment_email' => $item['comment_email'] ?? ""
                        ];
                    }
                }
    
                return json_encode($response);
            } else {
                return json_encode(array('status' => 'fail', 'message' => 'No blogs found.'));
            }
        } else {
            return json_encode(array('status' => 'fail', 'message' => 'No blog ID in session.'));
        }
    }

    public function send_comment()
    {
        $blog_comment = new BlogcommentModel(); 
        
        $blog_id = $this->request->getPost('blog_id');
        $comments = $this->request->getPost('comments');
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        
       
        $data = [
            'blog_id'  => $blog_id,
            'comments' => $comments,
            'name'     => $name,
            'email'    => $email
        ];
    
        
        if ($blog_comment->insert($data)) {
           
            return json_encode(array('status' => 'success', 'message' => 'Comment added successfully.'));
        } else {
           
            return json_encode(array('status' => 'fail', 'message' => 'Failed to add comment.'));
        }
    }

    public function coupons()
    {
        $CouponModel = new CouponModel();
        
        $user_id = $this->request->getPost('user_id');
    
        if (!$user_id) {
            return json_encode(array('status' => 'fail', 'message' => 'user_id is required.'));
        }
    
        $data = $CouponModel->where('CouponLive', 1)->where('UserStatus', 1)->findAll();
    
        if (!empty($data)) {
            $filtered_coupons = [];
            $current_date = date('Y-m-d'); // Get the current date
    
            foreach ($data as $coupon) {
                // Check if the coupon's start date is in the past or equal to today
                // and the coupon's end date is either in the future or is today.
                $is_within_date_range = true;
    
                if (!empty($coupon['StartDate']) && $coupon['StartDate'] >= $current_date) {
                    // Coupon hasn't started yet
                    $is_within_date_range = false;
                }
    
                if (!empty($coupon['EndDate']) && $coupon['EndDate'] <= $current_date) {
                    // Coupon has already expired
                    $is_within_date_range = false;
                }
    
                // If the coupon is not within the date range, skip it
                if (!$is_within_date_range) {
                    continue;
                }
                
                  $coupon['coupon_desc'] = !empty($coupon['coupon_desc']) ? $coupon['coupon_desc'] : '';
    
                // Check if UserID is empty or if the current user is part of the allowed users
                if (empty($coupon['UserID'])) {
                    $filtered_coupons[] = $coupon;
                } else {
                    // If UserID is specified, check if the user_id is part of the comma-separated list
                    $user_ids = explode(',', $coupon['UserID']);
                    if (in_array($user_id, $user_ids)) {
                        $filtered_coupons[] = $coupon;
                    }
                }
            }
    
            // Check if any valid coupons were found for the given user_id
            if (!empty($filtered_coupons)) {
                return json_encode(array('status' => 'success', 'user_id' => $user_id, 'data' => $filtered_coupons));
            } else {
                return json_encode(array('status' => 'fail', 'message' => 'No valid coupons found for this user.'));
            }
        } else {
            return json_encode(array('status' => 'fail', 'message' => 'No live coupons found.'));
        }
    }


}