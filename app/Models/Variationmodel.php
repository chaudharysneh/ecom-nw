<?php namespace App\Models;

use CodeIgniter\Model;

class Variationmodel extends Model
{
    protected $table = 'variations';
    protected $primaryKey  = 'VariationID';

    protected $allowedFields = [
        'ProductID',
        'VariationTypeID',
        'VariationName',
        'VariationPrice',
        'Sale_VariationPrice',
        'VariationStock',
        'defaultProduct',
        'product_variation_image',
        'ProductLive',
        'Created_at',
        'Updated_at',
    ];

    public function variationsDetails()
    {
        return $this->hasMany('App\Models\VariationsDetails', 'VariationID');
    }
}
