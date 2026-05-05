<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class CountryModel extends Model
{
    protected $table = 'countries';
    protected $primaryKey = 'CountryID';
    protected $allowedFields = ['CountryCode', 'CountryName','StateLive','Created_at','Updated_at'];
}
?>