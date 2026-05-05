<?php

namespace App\Models;

use CodeIgniter\Model;

class catagorymodel extends Model
{
	protected $table = 'categories';

	protected $primaryKey = 'CategoryID';

	protected $allowedFields = ['ParentCategoryID','CategoryName', 'CategoryDesc','Catagoryimage','ProductLive','industry_name','Created_at','Updated_at'];


	


}



?>



