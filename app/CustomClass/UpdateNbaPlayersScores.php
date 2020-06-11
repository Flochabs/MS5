<?php


namespace App\CustomClass;


use App\Model\Player;
use Illuminate\Console\Command;

class UpdateNbaPlayersScores extends Command
{
    protected $signature = 'UpdateNbaPlayersScores';

    public function handle()
    {

        $players = Player::all();

        $generalScore = [];
        foreach ($players as $player) {

            $hasPlayed = json_decode($player->data)->pl->ca->gp;
            $statsExists = empty(json_decode($player->data)->pl->gls->glt);
            $atLeastThreeGames = isset(json_decode($player->data)->pl->gls->glt[0]->gl[2]);

            if ($hasPlayed !== null && !$statsExists && $atLeastThreeGames) {
                $latestGames = json_decode($player->data)->pl->gls->glt[0];

                //boucler pour récupérer uniquement les 3 derniers matchs
                for ($i = 0; $i < 3; $i++) {

                    $latestStats = $latestGames->gl[$i];
                    $assists = ($latestStats->ast) * 0.75;
                    $points = ($latestStats->pts) * 0.5;
                    $rebounds = ($latestStats->reb) * 0.6;
                    $steals = ($latestStats->stl) * 1.5;
                    $blocks = ($latestStats->blk) * 1.5;
                    $turnovers = ($latestStats->tov) * (-0.6);
                    $minutes = ($latestStats->min) * 0.2;

                    $generalGrade = ($assists + $points + $rebounds + $steals + $blocks + ($turnovers) + $minutes);
                    $generalGrade = round($generalGrade);

                    $generalScore[] = $generalGrade;

                }

                $generalNote = round(array_sum($generalScore) / $i);
                Player::where('id', $player->id)->update(['score' => $generalNote]);
                $generalScore = [];
                echo '.';

            }

        }


    }
}
