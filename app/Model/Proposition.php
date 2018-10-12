<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Proposition extends Model
{
    public  function projet()
    {
        return $this->belongsTo('App\Model\Projet','projet_id');
    }
    public  function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
