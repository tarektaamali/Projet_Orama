<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{


    public function projects()
    {
        return $this->belongsToMany('App\Model\Projet','projet_materiels')->withPivot('start_date','end_date');
    }

}
