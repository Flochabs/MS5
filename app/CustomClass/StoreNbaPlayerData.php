<?php


namespace App\CustomClass;


use App\Model\Player;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use JasonRoman\NbaApi\Client\Client;
use JasonRoman\NbaApi\Request\Data\MobileTeams\Player\PlayerCardRequest;
use JasonRoman\NbaApi\Request\Data\Prod\Player\PlayerGameLogRequest;
use JasonRoman\NbaApi\Request\Data\Prod\Player\PlayerProfileRequest;


class StoreNbaPlayerData extends Command
{
    protected $signature = 'StoreNbaPlayerData';

    public function handle()
    {

        $players = Storage::disk('public')->get('data/nbaplayers.json');
        //decode dans un object php
        $players = json_decode($players, false);
        $players = $players->league->standard;

        //tableau qui stocke les id des joueurs trouvés dans le tableau des joueurs
        $foundIds = [];
        //boucle pour enregistrer chaque jouer dans la db
        foreach ($players as $player) {
            if ($player->isActive) {

                $playerId = $player->personId;
                // (int) pour faire en sorte que le player id soit bien un integer et non une string
                $playerId = (int)$playerId;

                // hasPlayer pour enregistrer l'id du joueur si déjà présent dans la table
                $hasPlayer = Player::where('player_external_id', $playerId)->first();

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

                $request = PlayerGameLogRequest::fromArray(

                    [
                        'playerId' => $playerId,
                        'year' => 2019,
                    ]

                );
                $response = $client->request($request);
                // récupération et dernieres stats en json
                $latestStats = $response->getObjectFromJson();
                $latestStats = json_encode($latestStats);

                if(!$hasPlayer) {
                    $hasPlayer = new Player();
                    $hasPlayer->player_external_id = $playerId;
                }

                $hasPlayer->price = 0;
                $hasPlayer->score = 0;
                $hasPlayer->data = $generalStats;
                $hasPlayer->latest_stats = $latestStats;
                $hasPlayer->save();

                $foundIds[] = $hasPlayer->id;
                echo '.';
            }
        }

        Player::whereNotIn('id',$foundIds)->delete();
    }

}
