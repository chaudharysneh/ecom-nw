<?php namespace App\Models;

use CodeIgniter\Model;

class Settings extends Model
{
    protected $table = 'all_settings';

    protected $allowedFields = ['ID','Title','Logo','Email','Phone'];
}