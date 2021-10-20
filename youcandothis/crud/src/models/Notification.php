<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table='notifications'; 

    protected $fillable = [
    'sender_id', 'receiver_id', 'question_id', 'is_read','type'
    ];

    public function sender()
    {
        return $this->belongsTo('App\User','sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo('App\User','receiver_id');
    }


}