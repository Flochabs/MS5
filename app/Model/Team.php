<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //
    public function getPlayers() {
        return $this->belongsToMany(Player::class);
    }

    public function getLeague() {
        return $this->belongsTo(League::class, 'league_id');
    }
}
