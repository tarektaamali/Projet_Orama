<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Rapport;

class Image extends Model
{
    public  function rapport()
    {
        return $this->belongsTo(Rapport::class,'rapport_id');
    }
}
