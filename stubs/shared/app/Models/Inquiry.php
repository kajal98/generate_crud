<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $table = 'inquiries';

    protected $fillable = ['full_name', 'email', 'message', 'ip'];
}
