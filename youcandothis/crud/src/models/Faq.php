<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Input;
class Faq extends Model
{
    protected $table='faqs'; 
    protected $dates=['created_at'];
    protected $fillable = [
    'question','answer','status'
    ];
}