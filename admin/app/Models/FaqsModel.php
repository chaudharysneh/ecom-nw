<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class FaqsModel extends Model
{
    protected $table = 'faqs';
    protected $primaryKey = 'FaqID';
    protected $allowedFields = ['FaqQuestion', 'FaqAnswer','FaqLive','Created_at','Updated_at'];
}
?>