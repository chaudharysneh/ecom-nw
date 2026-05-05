<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class shippingmethodmodel extends Model
{
    protected $table = 'shipping_methods';
    protected $primaryKey = 'MethodID';
    protected $allowedFields = ['MethodName', 'Created_at','Updated_at'];
}
?>