<?php


namespace App\CustomClass;


use App\Model\Player;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class StoreNbaPlayerInjuryData extends Command
{
    protected $signature = 'StoreNbaPlayerInjuryData';

    public function handle()
    {
        //requete pour savoir si le joueur est blessé ou pas
        $injuryList = Storage::disk('public')->get('data/nbaplayers_injury_status.json');
        //decode dans un object php
        $injuryList = json_decode($injuryList, false);
        $injuryList = $injuryList->ListItems;

        //tableau qui stocke les id des joueurs trouvés dans dans tableau des blessés
        $foundInjuredIds = [];
        //tableau qui stocke les id des joueurs trouvés dans le tableau des joueurs blessés
        foreach ($injuryList as $injured) {
            if ($injured->Injured === "YES") {
                Player::where('player_external_id',$injured->PlayerID)->update(['injured' => 1]);
                echo '.';
            }

        }
    }

}
