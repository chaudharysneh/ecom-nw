<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class EnquiryModel extends Model
{
    protected $table = 'enquiries';
    protected $primaryKey = 'EnquiriID';
    protected $allowedFields = ['SenderID', 'RecipientID','ParentID','Fullname','Email','Mobile','Subject','Message','EnquiriLive','Created_at','Created_at'];
}
?>