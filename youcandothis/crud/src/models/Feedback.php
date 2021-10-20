<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Input;
class Feedback extends Model
{
    protected $table='feedbacks'; 
    protected $dates=['created_at'];
    protected $fillable = [
    'name', 'feedback', 'email', 'type', 'status'
    ];
}