<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    // Recupérer les joueurs qui appartiennent une team
    public function getPlayers() {
        return $this->belongsToMany(Player::class);
    }

    // Recupérer la league qui appartiennent à seul team
    public function getLeague() {
        return $this->belongsTo(League::class, 'league_id');
    }
}
