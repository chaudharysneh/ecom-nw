<?php

namespace App\Models;

use CodeIgniter\Model;

class tagsmodel extends Model
{
	protected $table = 'tags';

	protected $primaryKey = 'tagid';

	protected $allowedFields = ['tagname','created_at'];


	


}