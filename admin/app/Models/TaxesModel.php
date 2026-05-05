<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class TaxesModel extends Model
{
    protected $table = 'taxes';
    protected $primaryKey = 'TaxID';
    protected $allowedFields = ['taxe_class_id', 'TaxName', 'Country','State','City','Zip','TaxRate','Shipping'];
}
?>