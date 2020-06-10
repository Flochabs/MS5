<?php


namespace App\CustomClass;


use App\Model\Player;
use Illuminate\Support\Facades\Storage;
use JasonRoman\NbaApi\Client\Client;
use JasonRoman\NbaApi\Request\Data\MobileTeams\Player\PlayerCardRequest;
use JasonRoman\NbaApi\Request\Data\Prod\Player\PlayerProfileRequest;

class StoreNbaPlayerData
{
    public function __invoke()
    {

        $players = Storage::disk('public')->get('data/nbaplayers.json');
        //decode dans un object php
        $players = json_decode($players, false);
        $players = $players->league->standard;

        //boucle pour enregistrer chaque jouer dans la db
        foreach ($players as $player) {
            if ($player->isActive == true) {

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
                    'price' => 0,
                    'score' => 0,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime(),
                    'data' => $generalStats,
                    'latest_stats' => $latestStats,
                ];

                Player::insert($data);
                }


        }
    }

}
