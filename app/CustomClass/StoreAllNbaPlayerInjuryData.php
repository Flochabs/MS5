<?php


namespace App\CustomClass;


use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use JasonRoman\NbaApi\Client\Client;
use JasonRoman\NbaApi\Request\StatsProd\StatsCms\Rotowire\RotowirePlayersRequest;

class StoreAllNbaPlayerInjuryData  extends Command
{
    protected $signature = 'StoreAllNbaPlayerInjuryData';

    public function handle()
    {
        //envoi de la rêquete à l'api externe
        $client = new Client();

        $request = RotowirePlayersRequest::fromArray([
            'team'   => null,
            'limit'  => 500,
            'offset' => 0,
        ]);
        $response = $client->request($request);
        $objectResponse = $response->getObjectFromJson();

        //Pour stocker les données générales sur les joueurs nba sur notre storage
        Storage::disk('public')->put('data/nbaplayers_injury_status.json', json_encode($objectResponse));
        echo '.';
    }
}
