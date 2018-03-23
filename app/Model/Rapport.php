<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Rapport extends Model
{
    public $table='rapports';
    public $primaryKey='id';
    public  function image()
    {
        return $this->hasMany(Rapport::class);
    }
    public $table1='users';
    public $primaryKey1='id';
    public  function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
