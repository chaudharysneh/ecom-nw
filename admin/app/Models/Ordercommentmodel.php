<?php namespace App\Models;

use CodeIgniter\Model;

class Ordercommentmodel extends Model
{
    protected $table = 'order_comment';

    protected $allowedFields = [
        'order_id',
        'comments',
        'dates'
    ];
}