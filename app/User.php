<?php

namespace App;

use App\Model\Article;
use App\Model\Equipe;
use App\Model\Feedback;
use App\Model\Materiel;
use App\Model\Rapport;
use App\Model\Region;
use App\Model\Reservation;
use App\Model\Service;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\App;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','lastname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    public function regions()
    {
        return $this->belongsToMany(Region::class);
    }
    public  function reservations()
    {
        return $this->hasMany('App\Model\Reservation');
    }
    public  function projets()
    {
        return $this->hasMany('App\Model\Projet');
    }
    public  function feedbacks()
    {
        return $this->hasMany('App\Model\Feedback');
    }
    /*public $table2='articles';
    public $primaryKey2='id';
    public  function article()
    {
        return $this->hasMany(Article::class);
    }
    public $table3='services';
    public $primaryKey3='id';
    public  function service()
    {
        return $this->hasMany(Service::class);
    }
    public $table4='rapports';
    public $primaryKey4='id';
    public  function rapport()
    {
        return $this->hasMany(Rapport::class);
    }
    public $table5='materiels';
    public $primaryKey5='id';
    public  function materiel()
    {
        return $this->hasMany(Materiel::class);
    }
    public $table6='feedbacks';
    public $primaryKey6='id';
    public  function feedback()
    {
        return $this->hasMany(Feedback::class);
    }*/

}
