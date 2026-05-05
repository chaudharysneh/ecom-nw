<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class TestimonialModel extends Model
{
    protected $table = 'testimonials';
    protected $primaryKey = 'TestimonialID';
    protected $allowedFields = ['TestimonialContent', 'TestimonialAuthor','TestimonialCompany','TestimonialPosition','TestimonialImage','TestimonialLive','Created_at','Updated_at'];
}
?>