<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class Template extends Model
{
    protected $table = 'templates';
    protected $primaryKey = 'templateID';
    protected $allowedFields = ['ProductID', 'UserID','type','name','height','width','unit','mime_type','image','data','session','templateTo','created_at'];
}
?>