<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class CityModel extends Model
{
    protected $table = 'cities';
    protected $primaryKey = 'CityID';
    protected $allowedFields = ['StateID', 'CityName','CityLive','Created_at','Updated_at'];
}
?>