<?php

namespace App\Models;

use CodeIgniter\Model;

class VariationsDetail extends Model
{
	protected $table = 'VariationsDetails';

	protected $primaryKey = 'VariationsDetailsID';

	protected $allowedFields = ['VariationID','VariationVlueID'];

}



?>



