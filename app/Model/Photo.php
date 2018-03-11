<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public $table='photos';
    public $primaryKey='id';
    public  function rapport()
    {
        return $this->belongsTo(Article::class,'article_id');
    }
}
