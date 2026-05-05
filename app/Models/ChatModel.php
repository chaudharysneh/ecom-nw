<?php 
namespace App\Models;

use CodeIgniter\Model;

class ChatModel extends Model
{
    protected $table = 'chat'; 
    protected $primaryKey = 'chat_id'; 

    protected $allowedFields = ['sender_id', 'receiver_id','order_id', 'message', 'read_status','msg_type','created_at'];
}

