<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{

    public  function chefs()
    {
        return $this->belongsTo('App\Model\admin\admin','admin_id');
    }

}
