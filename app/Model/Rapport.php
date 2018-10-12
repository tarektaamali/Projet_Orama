<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Image;

class Rapport extends Model
{

   
    
    public  function projets()
    {
        return $this->belongsTo('App\model\Projet','projet_id');
    }
    public  function images()

    {
        return $this->hasMany(Image::class);

    }
}
