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

//fonction static pour récupérer tous les joueurs nba (sans passer par une table)
// document json stocké dans notre bdd
    static function getAllNbaPlayers() {
        // a ne pas modifier
        $players = Storage::disk('public')->get('data/nbaplayers.json');
        //decode dans un object php
        $players = json_decode($players, false);

        //modifiable si besoin d'ajuster les données
        $players = $players->league->standard;
        return $players;
    }


}
