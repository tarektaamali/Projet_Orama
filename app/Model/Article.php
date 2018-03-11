<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $table='articles';
    public $primaryKey='id';
    public  function photo()
    {
        return $this->hasMany(Photo::class);
    }
    public $table1='users';
    public $primaryKey1='id';
    public  function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
