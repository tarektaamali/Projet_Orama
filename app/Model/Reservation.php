<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{


    public  function services()
    {
        return $this->belongsTo('App\Model\Service','service_id');
    }
    public  function users()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public  function chefs()
    {
        return $this->belongsTo('App\Model\admin\admin','admin_id');
    }
    public  function rapports()
    {
        return $this->belongsTo('App\Model\Rapport','rapport_id');
    }
}
