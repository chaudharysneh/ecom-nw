<?php

namespace App\Models;

use CodeIgniter\Model;

class variationmodel extends Model
{
	protected $table = 'variations';

	protected $primaryKey = 'VariationID';

	protected $allowedFields = ['ProductID','VariationTypeID', 'VariationName','VariationPrice','Sale_VariationPrice','VariationStock','defaultProduct','product_variation_image','variation_is_taxable','variation_tax_class_id','ProductLive','Created_at','Updated_at'];


	


}



?>



