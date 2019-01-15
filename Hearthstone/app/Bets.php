<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bets extends Model
{
    protected $fillable = [
        'team_id', 'user_id', 'match_id', 'bet'
    ];
}
