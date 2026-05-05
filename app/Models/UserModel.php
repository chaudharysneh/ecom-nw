<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'userID';
    protected $allowedFields = ['UserType', 'UserEmail','UserPassword','UserFirstName','UserLastName','DOB','UserGander','UserProfile','UserCity','UserState','UserZip','UserEmailVerified','forgot_pass_key','UserRegistrationDate','UserVerificationCode','UserPhone','UserCountry','UserAddress','UserAddress2','Created_at','Updated_at'];
}
?>