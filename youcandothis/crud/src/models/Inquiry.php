<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Input;
class Inquiry extends Model
{
    protected $table='inquiries'; 
    protected $dates=['created_at'];
    protected $fillable = [
    'full_name', 'email', 'message', 'ip'
    ];
}