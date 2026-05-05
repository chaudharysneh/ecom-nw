<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class Cmsfaqsmodel extends Model
{
    protected $table = 'cms_faq';
    protected $primaryKey = 'FaqID';
    protected $allowedFields = ['CmsID','FaqQuestion', 'FaqAnswer'];
}
?>