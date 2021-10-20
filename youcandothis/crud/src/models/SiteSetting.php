<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model 
{
    protected $table='site_settings'; 
    protected $fillable = ['title','email','phone_1','phone_2','copy_right','site_visitors','doctor_phone_number'];
}
