<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Etat extends Model
{
    public  function projets()
    {
        return $this->hasMany('App\Model\Projet');
    }
}
