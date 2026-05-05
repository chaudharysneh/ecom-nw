<?php

namespace App\Models;

use CodeIgniter\Model;

class VariationValue extends Model
{
	protected $table = 'variation_value';

	protected $primaryKey = 'VariationID';

	protected $allowedFields = ['VariationID','VariationTypeID', 'VariationName','Variation_image'];


	


}



?>



