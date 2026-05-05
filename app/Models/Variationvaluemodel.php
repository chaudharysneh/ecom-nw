<?php

namespace App\Models;

use CodeIgniter\Model;

class Variationvaluemodel extends Model
{
	protected $table = 'variation_value';

	protected $primaryKey = 'VariationID';

	protected $allowedFields = ['VariationTypeID','VariationName','Variation_image'];

}

?>