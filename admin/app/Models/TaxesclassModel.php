<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class TaxesclassModel extends Model
{
    protected $table = 'taxe_class';
    protected $primaryKey = 'taxe_class_id';
    protected $allowedFields = ['class_name', 'status'];
}
?>