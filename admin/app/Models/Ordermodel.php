<?php namespace App\Models;

use CodeIgniter\Model;

class Ordermodel extends Model
{
    protected $table = 'orders';
    
    protected $primaryKey = 'OrderID';
    protected $allowedFields = [
        'UserID',
        'fname',
	    'lname',
	    'email',
	    'phoneno',
	    'country',
	    'state',
	    'city',
	    'address1',
	    'address2',
	    'zipcode',
	    'company',
        'OrderDate',
        'TotalAmount',
        'totalTax',
        'totalShipingCost',
        'payment',
        'OrderStatus',
        'OrderNumber',
        'is_read',
        'created_at',
        'Updated_at',
    ];
}