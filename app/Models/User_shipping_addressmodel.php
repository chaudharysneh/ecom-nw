<?php namespace App\Models;

use CodeIgniter\Model;

class User_shipping_addressmodel extends Model
{
    protected $table = 'user_shipping_address';
    
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id',
        'first_name',
	    'last_name',
	    'city',
	    'state',
	    'country',
	    'zipcode',
	    'address',
	    'number',
        'Created_at',
        
    ];
}