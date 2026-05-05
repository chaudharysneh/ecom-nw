<?php namespace App\Models;

use CodeIgniter\Model;

class CouponModel extends Model
{
    protected $table = 'coupons';
    protected $primaryKey  = 'CouponID';
     protected $allowedFields = [
        'CategoryID', 
        'ProductCoupon',
        'ProductID',
        'UserID',
        'CouponName', 
        'ProductSpecification',
        'CouponCode',
        'CouponType',
        'CouponValue',
        'MinimunPrice',
        'MaximunPrice',
        'UserStatus',
        'StartDate',
        'EndDate',
        'CouponLive',
        'Created_at',
        'Updated_at'
        ];
}
