<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $table='images';
    public $primaryKey='id';
    public  function rapport()
    {
        return $this->belongsTo(Rapport::class,'rapport_id');
    }
}
