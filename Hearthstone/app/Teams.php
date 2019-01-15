<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    protected $fillable = [
        'team_name', 'country', 'flag'
    ];

    function players(){
        return $this->hasMany('App\Players');
    }

    function matches()
    {
        return $this->hasMany('App\Matchs');
    }
}
