<?php

namespace App\Models;

use CodeIgniter\Model;

class productmodel extends Model
{
	protected $table = 'products';

	protected $primaryKey = 'ProductID';

	protected $allowedFields = ['ProductSKU','ProductType', 'CategoryID','SubCategoryID','VariationTypeID','VariationID','BrandID','TagID','ShippingID','ProductName','ProductPrice','Sale_ProductPrice','ProductCartDesc','ProductShortDesc','ProductLongDesc','ProductImage','ProductStock','ProductLowStock','Stock_Status','ProductLive','product_weight','product_dimensions','product_quantity','price_product','is_taxable','tax_class_id','slug','Created_at','Updated_at'];

	


}



?>



