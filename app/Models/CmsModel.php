<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class CmsModel extends Model
{
    protected $table = 'cms';
    protected $primaryKey = 'CmsID';
    protected $allowedFields = ['CmsTitle', 'CmsContent','Created_at'];
}
?>