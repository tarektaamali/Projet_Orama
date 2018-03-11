<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    public  $table='equipes';
    public $primaryKey='id';
    public  function user()
    {
        return $this->hasMany(User::class);
    }
}
