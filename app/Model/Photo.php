<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    public  function rapport()
    {
        return $this->belongsTo(Rapport::class,'rapport_id');
    }
}
