<?php namespace App\Models;

use CodeIgniter\Model;

class Categorymodel extends Model
{
    protected $table = 'categories';

    protected $allowedFields = [
        'CategoryID',
        'ParentCategoryID',
        'CategoryName',
        'CategoryDesc',
        'ProductLive',
        'Created_at',
        'Updated_at',
    ];
}
