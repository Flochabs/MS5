<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    //
    protected $table = 'matchs';

    public function homeTeamName() {
        return $this->belongsTo(Team::class, 'home_team_id');
    }

    public function awayTeamName() {
        return $this->belongsTo(Team::class, 'away_team_id');
    }

}
