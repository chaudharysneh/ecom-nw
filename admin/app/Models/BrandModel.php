<?php

namespace App\Models;

use CodeIgniter\Model;

class BrandModel extends Model
{
	protected $table = 'brands';

	protected $primaryKey = 'BrandID';

	protected $allowedFields = ['BrandName'];


	


}



?>
