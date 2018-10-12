<?php
namespace App\Model\admin;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class admin extends Authenticatable
{
    use HasApiTokens, Notifiable;

    public  function reservations()
    {
        return $this->hasMany('App\Model\Reservation');
    }
    public  function projets()
    {
        return $this->hasMany('App\Model\Projet');
    }
   /* public  function employes()
    {
        return $this->hasMany('App\Model\Employes');
    }*/

    public  function rapports()
    {
        return $this->hasMany('App\Model\Rapport');
    }
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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
}
