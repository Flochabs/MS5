<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $table = 'matchs';

    public function matchPlayers()
    {
        return $this->belongsToMany('App\Model\Player');
    }
}

