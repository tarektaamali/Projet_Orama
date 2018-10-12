<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    public  function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public  function fournisseur()
    {
        return $this->belongsTo('App\User','realisateur_id');
    }
}
