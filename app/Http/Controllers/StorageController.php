<?php

namespace App\Http\Controllers;

use App\Model\Nbateam;
use App\Model\Player;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use JasonRoman\NbaApi\Client\Client;
use JasonRoman\NbaApi\Request\Data\MobileTeams\Player\PlayerCardRequest;
use JasonRoman\NbaApi\Request\Data\Prod\Player\PlayerProfileRequest;
use JasonRoman\NbaApi\Request\Data\Prod\Roster\LeagueRosterPlayersRequest;
use JasonRoman\NbaApi\Request\Data\Prod\Teams\TeamsRequest;

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

    public function storeNbaPlayerData()
    {

        $players = Storage::disk('public')->get('data/nbaplayers.json');
        //decode dans un object php
        $players = json_decode($players, false);
        $players = $players->league->standard;

        //boucle pour enregistrer chaque jouer dans la db
        foreach ($players as $player) {

            $playerId = $player->personId;
            // (int) pour faire en sorte que le player id soit bien un integer et non une string
            $playerId = (int)$playerId;


            // Récupération des stats générales pour un joueur
            $client = new Client();

            $request = PlayerCardRequest::fromArray(
                ['format' => 'json',
                    'playerId' => $playerId,
                    'leagueSlug' => 'nba',
                    'year' => 2019,
                    'seasonTypeCode' => "02"
                ]
            );

            $response = $client->request($request);

            $generalStats = $response->getObjectFromJson();

            //encodage des stats en json pour stockage dans table data de la bdd
            $generalStats = json_encode($generalStats);


            // Récupération des stats sur les 3 derniers matchs du joueur

            $client = new Client();

            $request = PlayerProfileRequest::fromArray(

                ['format' => 'json',
                    'playerId' => $playerId,
                    'year' => 2019,
                ]

            );
            $response = $client->request($request);
            // récupération et dernieres stats en json
            $latestStats = $response->getObjectFromJson();
            $latestStats = json_encode($latestStats);

            $data = [
                'player_external_id' => $playerId,
         //       'price' => ,
                'score' => 0,
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
                'data' => $generalStats,
                'latest_stats' => $latestStats,
            ];
            //dd($data);
            // }
            //Player::insert($data);



            function calculatePrice() {


            }
            function calculateScore() {

            }


        }
    }

    public function storeAllNbaTeams() {
        $client = new Client();

        $request  = TeamsRequest::fromArray( [
            'year' => 2019,
        ]);
        $response = $client->request($request);

        $nbaTeams = $response->getObjectFromJson();

        $nbaTeams = $nbaTeams->league->standard;

        $dataTeam = json_encode($nbaTeams);

        foreach ($nbaTeams as $nbaTeam) {

            if($nbaTeam->isNBAFranchise == true){

                $data = [
                    'team_external_id' => $nbaTeam->teamId,
                    'name' => $nbaTeam->nickname,
                    'city' => $nbaTeam->city,
                    'stadium' => $nbaTeam->city,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime(),
                ];

                Nbateam::insert($data);

            }
        }


    }
}
