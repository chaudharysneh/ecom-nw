<?php

namespace App\Models;

use CodeIgniter\Model;

class Bannersmodel extends Model
{
	protected $table = 'banners';

	protected $primaryKey = 'BannerID';

	protected $allowedFields = ['BannerTitle','BannerPosition','BannerText','BannerImg','BannerUrl','BannerLive','Created_at','Updated_at'];


	


}



?>
