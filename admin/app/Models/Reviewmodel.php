<?php namespace App\Models;

use CodeIgniter\Model;

class Reviewmodel extends Model
{
    protected $table = 'review';
    protected $primaryKey  = 'review_id';

    protected $allowedFields = [
        'ProductID',
        'UserID',
        'rating',
        'name',
        'email',
        'description',
        'created_date'
    ];
   
}