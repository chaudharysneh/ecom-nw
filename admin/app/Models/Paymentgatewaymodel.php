<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class Paymentgatewaymodel extends Model
{
    protected $table = 'payment_getway';
    protected $primaryKey = 'id';
    protected $allowedFields = ['type', 'details', 'status'];
}
?>