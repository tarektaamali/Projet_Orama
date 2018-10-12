<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    public  function service()
    {
        return $this->belongsTo('App\Model\Service','service_id');
    }
    public  function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public  function fournisseur()
    {
        return $this->belongsTo('App\User','realisateur_id');
    }
    public  function propositions()
    {
        return $this->hasMany(Proposition::class);
    }
    public function materiels()
    {
        return $this->belongsToMany('App\Model\Materiel','projet_materiels')->withPivot('start_date','end_date');
    }
    public  function rapports()

    {
        return $this->hasMany(Rapport::class);

    }
    public  function employes()
    {
        return $this->belongsToMany('App\Model\Employe','projet_employes');
    }
    public  function etat()
    {
        return $this->belongsTo('App\Model\Etat','etat_id');
    }

    public  function region()
    {
        return $this->belongsTo('App\Model\Region','region_id');
    }
}
