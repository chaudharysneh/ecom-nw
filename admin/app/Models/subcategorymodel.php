<?php

namespace App\Models;

use CodeIgniter\Model;

class subcategorymodel extends Model
{
	protected $table = 'subcategory';

	protected $primaryKey = 'sub_category_id';

	protected $allowedFields = ['category_id','sub_category','sub_category_img','Created_at','Updated_at'];


	


}



?>



