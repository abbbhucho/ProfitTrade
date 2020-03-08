<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Mongo;

class Activitie extends Mongo
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 
    ];
}
