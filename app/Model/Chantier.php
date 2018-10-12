<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Chantier extends Model
{
    public  function service()
    {
        return $this->belongsTo('App\Model\Service','service_id');
    }
    public  function fournisseur()
    {
        return $this->belongsTo('App\Model\Fournisseur','fournisseur_id');
    }
    public  function demandeur()
    {
        return $this->belongsTo('App\Model\Demandeur','demandeur_id');
    }
    
    public  function rapports()
    {
        return $this->hasMany(Rapport::class);
    }
  
   
}
