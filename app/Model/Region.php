<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public  function projets()
    {
        return $this->hasMany('App\Model\Projet');
    }
}
