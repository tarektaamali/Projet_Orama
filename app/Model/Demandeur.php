<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Demandeur extends Model
{
    public  function chantiers()
    {
        return $this->hasMany('App\Model\Chantier');
    }
}
