<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class shippingratemodel extends Model
{
    protected $table = 'shipping_rates';
    protected $primaryKey = 'RateID';
    protected $allowedFields = ['MethodID', 'Price','Created_at','Updated_at'];
}
?>