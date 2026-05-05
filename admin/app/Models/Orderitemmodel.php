<?php namespace App\Models;

use CodeIgniter\Model;

class Orderitemmodel extends Model
{
    protected $table = 'orderitems';

    protected $allowedFields = [
        'OrderID',
        'ProductID',
        'Quantity',
        'Price',
        'variation_table_id',
        'product_color',
        'product_size',
        'variation_details',
        'Created_at',
        'Updated_at'
    ];
}