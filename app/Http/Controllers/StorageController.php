<?php

namespace App\Http\Controllers;

use App\Model\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use JasonRoman\NbaApi\Client\Client;
use JasonRoman\NbaApi\Request\Data\MobileTeams\Player\PlayerCardRequest;
use JasonRoman\NbaApi\Request\Data\Prod\Roster\LeagueRosterPlayersRequest;

class StorageController extends Controller
{
    public function storeAllNbaPlayers() {
        //envoi de la rêquete à l'api externe
        $client = new Client();
        $request = LeagueRosterPlayersRequest::fromArray([
            'year' => 2019,
        ]);

        $response = $client->request($request);
        $objectResponse = $response->getObjectFromJson();

        //Pour stocker les données générales sur les joueurs nba sur notre storage
        Storage::disk('public')->put('data/nbaplayers.json', json_encode($objectResponse));

    }

    public function storeNbaPlayerData() {

        $players = Storage::disk('public')->get('data/nbaplayers.json');
        //decode dans un object php
        $players = json_decode($players, false);
        $players = $players->league->standard;

        //boucle pour enregistrer chaque jouer dans la db
        foreach($players  as $player) {

            $playerId = $player->personId;
            // (int) pour faire en sorte que le player id soit bien un integer et non une string
            $playerId = (int)$playerId;

            $client = new Client();

            $request  = PlayerCardRequest::fromArray(
                ['format' => 'json',
                    'playerId' => $playerId,
                    'leagueSlug' => 'nba',
                    'year' => 2019,
                    'seasonTypeCode' => "02"]
            );

            $response = $client->request($request);

            $generalStats = $response->getObjectFromJson();
            dd($generalStats);
            $generalStats = json_encode($generalStats);

            $data = [
                'player_external_id' => $playerId,
                'data' => $generalStats,
                'price' => 0,
                //'created_at' => ,
                //'updated_at' =>
            ];
        }
        //Player::insert($data);
        $test = 0;

    }
}
