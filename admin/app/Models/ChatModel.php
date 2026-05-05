<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class ChatModel extends Model
{
    protected $table = 'chat';
    protected $primaryKey = 'chat_id';
    protected $allowedFields = ['order_id', 'sender_id','receiver_id','message','msg_type','read_status','created_at'];
}
?>