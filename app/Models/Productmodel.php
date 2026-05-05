<?php namespace App\Models;

use CodeIgniter\Model;

class Productmodel extends Model
{
    protected $table = 'products';
    protected $primaryKey  = 'ProductID';

    protected $allowedFields = [
        'ProductSKU',
        'CategoryID',
        'SubCategoryID',
        'VariationTypeID',
        'VariationID',
        'BrandID',
        'TagID',
        'ProductName',
        'ProductPrice',
        'Sale_ProductPrice',
        'ProductShortDesc',
        'ProductLongDesc',
        'ProductImage',
        'ProductStock',
        'ProductLowStock',
        'Stock_Status',
        'ProductLive',
        'product_weight',
        'product_dimensions',
        'is_taxable',
        'tax_class_id',
        'slug',
        'Created_at',
        'Updated_at',
    ];
    public function __construct()
    {
        parent::__construct();
       // $this->join('brands', 'products.BrandID = brands.BrandID', 'left');
    }

    public function getProductWithVariation($productId, $variationId = null)
    {
        //  $query = $this->select('products.*, variations.VariationName, SUM(variations.VariationPrice) AS variationprice, variations.VariationStock')
        //     ->join('variations', 'products.ProductID = variations.ProductID')
        //    // ->join('brands', 'products.BrandID = brands.BrandID')
        //     ->where('products.ProductID', $productId);

        // do not change below code
        $query = $this->select('products.*,variations.product_variation_image, variations.VariationName,variations.VariationPrice AS variationprice,variations.Sale_VariationPrice AS VariationSalePrice, variations.VariationStock')
            ->join('variations', 'products.ProductID = variations.ProductID')
            ->where('products.ProductID', $productId);
       
        if ($variationId != "") {
            $query->where('variations.VariationID', $variationId);
        } else {
            //$query->where('variations.defaultProduct','1');
            $query->orderBy('variations.VariationID', 'asc')->limit(1);
        }

       // echo $query->getLastQuery()->getQuery();
        
        return $query->get()->getRow();
    }
    
    public function getProductWithVariationdata($productId)
    {
        //  $query = $this->select('products.*, variations.VariationName, SUM(variations.VariationPrice) AS variationprice, variations.VariationStock')
        //     ->join('variations', 'products.ProductID = variations.ProductID')
        //     ->where('products.ProductID', $productId)->orderBy('variations.VariationID', 'asc')->limit(1);

        // do not change below code
        $query = $this->select('products.*,variations.product_variation_image, variations.VariationName,variations.VariationPrice AS variationprice,variations.Sale_VariationPrice AS VariationSalePrice, variations.VariationStock')
            ->join('variations', 'products.ProductID = variations.ProductID')
            ->where('products.ProductID', $productId)->orderBy('variations.VariationID', 'asc')->limit(1);
        return $query->get()->getRow();
        
    }
    
}
