<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
	protected $table = 'blog';

	protected $primaryKey = 'id';

	protected $allowedFields = ['title','image','description','category','tags','created_by','Created_at','Updated_at'];
}

?>
