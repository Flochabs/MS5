<?php


namespace App\CustomClass;

use Illuminate\Support\Facades\Storage;
use JasonRoman\NbaApi\Client\Client;
use JasonRoman\NbaApi\Request\Data\Prod\Roster\LeagueRosterPlayersRequest;

class StoreAllNbaPlayers
{
    public function __invoke()
    {
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
}
