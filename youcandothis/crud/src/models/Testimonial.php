<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Input;
class Testimonial extends Model
{
    protected $table='testimonials'; 
    protected $dates=['created_at'];
    protected $fillable = [
    'name','designation','text', 'status'
    ];
}