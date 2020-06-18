<?php


namespace App\CustomClass\Matches;


use App\Model\Auction;
use App\Model\Draft;
use App\Model\Match;
use App\Model\Player;
use App\Model\Team;
use Carbon\Carbon;
use Illuminate\Console\Command;

class GenerateMatchesCalender extends Command
{
    protected $signature = 'GenerateMatchesCalender';

    public function handle()
    {
        $drafts = Draft::all();

        foreach ($drafts as $draft){

            //date limite à partir de laquelle la draft prend fin et le calendrier des matches est généré
            $limitTime = $draft->ends_at;

            if($draft->is_over === 0 && $limitTime <= now()) {

                // booléen bought pour enregistrer la draft comme terminée
                $draft->update(['is_over' => 1]);

                //récupérer tous les ID des équipes présentes dans la ligue
                $matches = [];

                $allTeams = Team::where('league_id',$draft->league_id)->orderBy('id')->get();
                $teams = [];
                foreach ($allTeams as $teamid) {
                    $teams[] = $teamid->id;
                }

                $teamCount = count($teams);
                $byeTeam = -1;
                $rounds = ['guest' => [], 'visitor' => []];
                if ($teamCount % 2 === 1) {
                    $teams[] = $byeTeam;
                    ++$teamCount;
                }
                for ($round = 0; $round < $teamCount - 1; ++$round) {
                    $rounds['guest'][$round] = [];
                    $rounds['visitor'][$round] = [];
                    for ($i = 0; $i < $teamCount / 2; ++$i) {
                        if ($teams[$i] !== $byeTeam && $teams[$teamCount - 1 - $i] !== $byeTeam) {
                            $rounds['guest'][$round][] = [$teams[$i], $teams[$teamCount - 1 - $i]];
                            $rounds['visitor'][$round][] = [$teams[$teamCount - 1 - $i], $teams[$i]];
                        }
                    }
                    array_splice($teams, 1, 0, array_pop($teams));
                }
                $scheduleGames = $rounds['guest'];
                array_push($scheduleGames, ...$rounds['visitor']);
                shuffle($scheduleGames);


                $i = 0;
                foreach ($scheduleGames as $scheduleGame) {

                    if($i === 0){
                        $matchTime = now()->addDay();
                    } else {
                        $matchTime = now()->addWeeks($i);
                    }


                    foreach ($scheduleGame as $game) {
                        $matchDatas = [
                            [
                                'home_team_id' => $game[0],
                                'away_team_id' => $game[1],
                                'league_id' => $draft->league_id,
                                'start_at' => $matchTime->format('Y-m-d 20:00:00'),
                            ]
                        ];
                        //insert les données des matchs dans
                        Match::insert($matchDatas);
                    }
                    $i++;
                }
            }
        }
    }
}
