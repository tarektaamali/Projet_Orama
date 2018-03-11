<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public $table='reservations';
    public $primaryKey='id';
    public  function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}