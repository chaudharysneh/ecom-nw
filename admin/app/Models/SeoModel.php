<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class SeoModel extends Model
{
    protected $table = 'seo';
    protected $primaryKey = 'SEOID';
    protected $allowedFields = ['SEOTitle', 'SEODescription','SEOKeywords','Created_at','Updated_at'];
}
?>