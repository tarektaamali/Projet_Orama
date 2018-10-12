<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public  function reservations()
    {
        return $this->hasMany('App\Model\Reservation');
    }
    public  function projets()
    {
        return $this->hasMany('App\Model\Projet');
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
