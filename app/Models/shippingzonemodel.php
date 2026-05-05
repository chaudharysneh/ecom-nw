<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class shippingzonemodel extends Model
{
    protected $table = 'shipping_zones';
    protected $primaryKey = 'ZoneID';
    protected $allowedFields = ['RateID','ZoneName','is_check', 'Created_at','Updated_at'];
}
?>