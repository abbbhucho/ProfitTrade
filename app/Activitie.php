<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activitie extends Model
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
