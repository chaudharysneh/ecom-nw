<?php

namespace App\Models;

use CodeIgniter\Model;

class TaxModel extends Model
{
    protected $table = 'taxes';
    protected $primaryKey = 'TaxID';
    protected $allowedFields = ['taxe_class_id', 'TaxName', 'Country', 'State', 'City', 'Zip', 'TaxRate', 'Shipping', 'is_check', 'Created_at'];

    public function getTaxRate($taxe_class_id,$country=null,$state=null,$city=null, $zip=null)
    {
        // First, try to match with zip
        $tax = $this->where('Zip', $zip)->where('taxe_class_id',$taxe_class_id)->findAll();

        // If not found, try to match with city
        if (!$tax) {
            //$tax = $this->where('City', $city)->first();
            $tax = $this->where('City', $city)
                    ->groupStart()
                        ->where('taxe_class_id',$taxe_class_id)
                        ->where('Zip', '*')
                    ->groupEnd()
                    ->findAll();

        }

        // If not found, try to match with state
        if (!$tax) {
            //$tax = $this->where('State', $state)->first();
            $tax = $this->where('State', $state)
                    ->groupStart()
                        ->where('taxe_class_id',$taxe_class_id)
                        ->where('City', '*')
                        ->where('Zip', '*')
                    ->groupEnd()
                    ->findAll();
        }

        // If not found, try to match with country
        if (!$tax) {
            //$tax = $this->where('Country', $country)->first();
            $tax = $this->where('Country', $country)
                    ->groupStart()
                        ->where('taxe_class_id',$taxe_class_id)
                        ->where('State', '*')
                        ->where('City', '*')
                        ->where('Zip', '*')
                    ->groupEnd()
                    ->findAll();
        }
        if (!$tax) {
            //$tax = $this->where('Country', $country)->first();
            $tax = $this->where('taxe_class_id',$taxe_class_id)->where('Country', '*')
                        ->where('State', '*')
                        ->where('City', '*')
                        ->where('Zip', '*')
                    ->findAll();
        }
        
        

        return $tax ? $tax : null;
    }
}
