<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class StateModel extends Model
{
    protected $table = 'states';
    protected $primaryKey = 'StateID';
    protected $allowedFields = ['CountryID', 'StateName','StateLive','Created_at','Updated_at'];
}
?>