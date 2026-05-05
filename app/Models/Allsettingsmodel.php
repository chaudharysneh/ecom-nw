<?php

namespace App\Models;

use CodeIgniter\Model;

class Allsettingsmodel extends Model
{
	protected $table = 'all_settings';

	protected $primaryKey = 'ID';

	protected $allowedFields = ['Title','Logo','Email','Phone','Address','Description','Links','currency','google_analytics'];
}
?>
