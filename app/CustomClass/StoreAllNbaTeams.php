<?php

namespace App\CustomClass;

use App\Model\Nbateam;

use JasonRoman\NbaApi\Client\Client;
use JasonRoman\NbaApi\Request\Data\Prod\Teams\TeamsRequest;

class storeAllNbaTeams{
    public function __invoke() {
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
