<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogcommentModel extends Model
{
	protected $table = 'blog_comment';

	protected $primaryKey = 'id';

	protected $allowedFields = ['blog_id','comments','name','email','created_at'];
}

?>