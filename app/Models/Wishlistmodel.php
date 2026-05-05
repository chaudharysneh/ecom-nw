<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class Wishlistmodel extends Model
{
    protected $table = 'wishlist';
    protected $primaryKey = 'ID';
    protected $allowedFields = ['ProductID', 'UserID','Status'];
}
?>