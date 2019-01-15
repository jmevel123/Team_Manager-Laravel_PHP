<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Players extends Model
{
    protected $fillable = [
        'team_id', 'username'
    ];

    public function team(){
        return $this->belongsTo('App\Teams');
        
    }
}
