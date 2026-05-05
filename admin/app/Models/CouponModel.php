<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class CouponModel extends Model
{
    protected $table = 'coupons';
    protected $primaryKey = 'CouponID';
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
        'UserStatus',
        'StartDate',
        'EndDate',
        'CouponLive',
        'Created_at',
        'Updated_at'
        ];
}
?>