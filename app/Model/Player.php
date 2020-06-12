<?php

namespace App\Model;

use ArrayObject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use JasonRoman\NbaApi\Client\Client;
use JasonRoman\NbaApi\Request\Data\MobileTeams\Player\PlayerCardRequest;
use JasonRoman\NbaApi\Request\Data\Prod\Roster\LeagueRosterPlayersRequest;


class Player extends Model
{

    protected $fillable = ['injured'];

    public function teams()
    {
        return $this->belongsToMany('App\Model\Team');
    }

}
