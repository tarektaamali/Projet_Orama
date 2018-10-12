<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    public  function projects()
    {
        return $this->belongsToMany('App\Model\Projet','projet_employes');
    }
}
