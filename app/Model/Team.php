<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';

    protected $fillable = ['user_id', 'league_id', 'name', 'stadium_name'];

    // Recupérer les joueurs qui appartiennent une team
    public function getPlayers() {
        return $this->belongsToMany(Player::class);
    }

    // Recupérer la league qui appartiennent à seul team
    public function getLeague() {
        return $this->belongsTo(League::class, 'league_id');
    }

    // Recupérer l'utilisateur qui appartient à une team
    public function userTeam()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
