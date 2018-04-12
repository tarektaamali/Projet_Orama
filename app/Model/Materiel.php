<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{


    public function projets()
    {
        return $this->belongsToMany('App\Model\Projet','projet_materiels');
    }

}
