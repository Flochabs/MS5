<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';

    protected $fillable = ['user_id', 'league_id', 'name', 'stadium_name'];
    //
    public function getPlayers() {
        return $this->belongsToMany(Player::class);
    }

    public function getLeague() {
        return $this->belongsTo(League::class, 'league_id');
    }

    public function userTeam()
    {
        return $this->belongsTo('App\Model\User');
    }
}
