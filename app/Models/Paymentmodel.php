<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class Paymentmodel extends Model
{
    protected $table = 'payments';
    protected $primaryKey = 'PaymentID';
    protected $allowedFields = ['Transation_id','OrderID','UserID','PaymentType','Amount','PaymentDate','PaymentStatus','PaymentKey','Created_at','Updated_at'];
}

?>