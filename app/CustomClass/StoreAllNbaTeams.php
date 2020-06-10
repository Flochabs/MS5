<?php

namespace App\CustomClass;

use App\Model\Nbateam;

use App\Model\Player;
use Illuminate\Console\Command;
use JasonRoman\NbaApi\Client\Client;
use JasonRoman\NbaApi\Request\Data\Prod\Teams\TeamsRequest;

class StoreAllNbaTeams extends Command{

    protected $signature = 'StoreAllNbaTeams';


    public function handle() {
        $client = new Client();

        $request  = TeamsRequest::fromArray( [
            'year' => 2019,
        ]);
        $response = $client->request($request);

        $nbaTeams = $response->getObjectFromJson();

        $nbaTeams = $nbaTeams->league->standard;

        $foundIds = [];
        foreach ($nbaTeams as $nbaTeam) {

            if($nbaTeam->isNBAFranchise){

                $teamId = $nbaTeam->teamId;
                $hasTeam = Nbateam::where('team_external_id', $teamId)->first();

                if(!$hasTeam) {
                    $hasTeam = new Nbateam();
                    $hasTeam->team_external_id = $teamId;
                }

                $hasTeam->name = $nbaTeam->nickname;
                $hasTeam->city = $nbaTeam->city;
                $hasTeam->stadium = $nbaTeam->city;

                $hasTeam->save();

                $foundIds[] = $hasTeam->id;
                echo '.';

            }
        }
        Nbateam::whereNotIn('id',$foundIds)->delete();
    }
}

