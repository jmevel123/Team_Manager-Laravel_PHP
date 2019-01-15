<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matchs extends Model
{
    protected $fillable = [
        'team1_id', 'team2_id', 'score_1', 'score_2', 'winner_id', 'placement'
    ];

    function team1()
    {
        return $this->belongsTo("App\Teams");
    }

    function team2()
    {
        return $this->belongsTo("App\Teams");
    }

    function winner()
    {
        return $this->belongsTo("App\Teams");
    }
}
