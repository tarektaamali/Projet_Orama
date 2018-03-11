<?php

namespace App;

use App\Model\Article;
use App\Model\Equipe;
use App\Model\Feedback;
use App\Model\Materiel;
use App\Model\Rapport;
use App\Model\Reservation;
use App\Model\Service;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public  function equipe()
    {
        return $this->belongsTo(Equipe::class,'equipe_id');
    }
    public $table1='reservations';
    public $primaryKey1='id';
    public  function reservation()
    {
        return $this->hasMany(Reservation::class);
    }
    public $table2='articles';
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
    }

}
