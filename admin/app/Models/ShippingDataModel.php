<?php

namespace App\Models;

use CodeIgniter\Model;

class ShippingDataModel extends Model
{
	protected $table = 'shipping_data';

	protected $primaryKey = 'id';

	protected $allowedFields = ['shipping_name','amount','shipping_rate','created_at','updated_at'];
}



?>