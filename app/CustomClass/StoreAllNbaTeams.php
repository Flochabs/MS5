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

        $twitterFeed = [
            1   =>  'https://twitter.com/ATLHawksFR?ref_src=twsrc%5Etfw',
            2   =>  'https://twitter.com/Celtics_Fra?ref_src=twsrc%5Etfw',
            3   =>  'https://twitter.com/BrooklynNets_Fr?ref_src=twsrc%5Etfw',
            4   =>  'https://twitter.com/HornetsFR?ref_src=twsrc%5Etfw',
            5   =>  'https://twitter.com/bullsfr?ref_src=twsrc%5Etfw',
            6   =>  'https://twitter.com/CavaliersFRA?ref_src=twsrc%5Etfw',
            7   =>  'https://twitter.com/CavaliersFRA?ref_src=twsrc%5Etfw',
            8   =>  'https://twitter.com/NuggetsFra?ref_src=twsrc%5Etfw',
            9   =>  'https://twitter.com/NuggetsFra?ref_src=twsrc%5Etfw',
            10  =>  'https://twitter.com/warriors?ref_src=twsrc%5Etfw',
            11  =>  'https://twitter.com/RocketsFr?ref_src=twsrc%5Etfw',
            12  =>  'https://twitter.com/PacersFRA?ref_src=twsrc%5Etfw',
            13  =>  'https://twitter.com/ClippersFR?ref_src=twsrc%5Etfw',
            14  =>  'https://twitter.com/LALakersFR?ref_src=twsrc%5Etfw',
            15  =>  'https://twitter.com/GrizzliesFR?ref_src=twsrc%5Etfw',
            16  =>  'https://twitter.com/HeatDeMiamiFR?ref_src=twsrc%5Etfw',
            17  =>  'https://twitter.com/BucksFR?ref_src=twsrc%5Etfw',
            18  =>  'https://twitter.com/TwolvesFRA?ref_src=twsrc%5Etfw',
            19  =>  'https://twitter.com/NolaPelicansFR?ref_src=twsrc%5Etfw',
            20  =>  'https://twitter.com/KnicksFr?ref_src=twsrc%5Etfw',
            21  =>  'https://twitter.com/OKCThunder_Fra?ref_src=twsrc%5Etfw',
            22  =>  'https://twitter.com/OrlandoMagicFR?ref_src=twsrc%5Etfw',
            23  =>  'https://twitter.com/FR_Sixers?ref_src=twsrc%5Etfw',
            24  =>  'https://twitter.com/SunsFR?ref_src=twsrc%5Etfw',
            25  =>  'https://twitter.com/trailblazers_fr?ref_src=twsrc%5Etfw',
            26  =>  'https://twitter.com/SacramentoFR?ref_src=twsrc%5Etfw',
            27  =>  'https://twitter.com/SASpursFr?ref_src=twsrc%5Etfw',
            28  =>  'https://twitter.com/Raptors_FR?ref_src=twsrc%5Etfw',
            29  =>  'https://twitter.com/JazzDeLUtahFR?ref_src=twsrc%5Etfw',
            30  =>  'https://twitter.com/WizardsFrance?ref_src=twsrc%5Etfw'
            ];

            $i = 1;
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

                 $hasTeam->twitter_feed = $twitterFeed[$i];


                $hasTeam->save();

                $foundIds[] = $hasTeam->id;
                echo '.';
                $i++;
            }

        }
        Nbateam::whereNotIn('id',$foundIds)->delete();
    }
}

