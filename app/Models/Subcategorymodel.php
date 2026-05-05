<?php namespace App\Models;

use CodeIgniter\Model;

class Subcategorymodel extends Model
{
    protected $table = 'subcategory';

    protected $allowedFields = [
        'category_id',
        'sub_category',
        'sub_category_img',
        'created_at',
        'updated_at',
    ];
}
