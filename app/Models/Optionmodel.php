<?php namespace App\Models;

use CodeIgniter\Model;

class Optionmodel extends Model
{
    protected $table = 'option_value';

    protected $allowedFields = ['VariationTypeID', 'variationname'];
}
