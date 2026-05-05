<?php

namespace App\Models;

use CodeIgniter\Model;
//use App\Models\VariationValue;

class variationtypemodel extends Model
{
	protected $table = 'variation_type';

	protected $primaryKey = 'VariationTypeID';

	protected $allowedFields = ['VariationTypeName'];

	// public function values()
    // {
    //     return $this->hasMany(VariationValue::class, 'VariationTypeID', 'VariationTypeID');
    // }


}



?>
