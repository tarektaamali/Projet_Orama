<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Rapport extends Model
{

    public  function photo()
    {
        return $this->hasMany(Photo::class);
    }

    public  function chefs()
    {
        return $this->belongsTo('App\Model\admin\admin','admin_id');
    }
    public  function reservation()
    {
        return $this->hasMany(Reservation::class);
    }
    public  function projets()
    {
        return $this->belongsTo('App\model\Projet','projet_id');
    }
}
