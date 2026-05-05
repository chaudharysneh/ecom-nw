<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class EmailsmtpModel extends Model
{
    protected $table = 'email_smtp';
    protected $primaryKey = 'id';
    protected $allowedFields = ['host', 'username','email','password','port','protocol'];
}
?>