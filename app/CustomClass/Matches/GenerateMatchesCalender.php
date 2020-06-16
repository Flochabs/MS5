<?php


namespace App\CustomClass\Matches;


use App\Model\Auction;
use App\Model\Draft;
use App\Model\Match;
use App\Model\Player;
use App\Model\Team;
use Illuminate\Console\Command;

class GenerateMatchesCalender extends Command
{
    protected $signature = 'GenerateMatchesCalender';

    public function handle()
    {
        $drafts = Draft::all();

        $now = new \DateTime();

        foreach ($drafts as $draft){

            //date limite à partir de laquelle la draft prend fin et le calendrier des matches est généré
            $limitTime = new \DateTime($draft->ends_at);

            if($draft->is_over === 0 && $limitTime <= $now) {

                // booléen bought pour enregistrer la draft comme terminée
                $draft->update(['is_over' => 1]);

                //récupérer tous les ID des équipes présentes dans la ligue
                $matches = [];

                $allTeams = Team::where('league_id',$draft->league_id)->get();
                foreach ($allTeams as $home) {
                    foreach ($allTeams as $away) {
                        if ($home === $away) {
                            continue;
                        }
                        $matchDatas = [
                            [
                                'home_team_id' => $home->id,
                                'away_team_id' => $away->id,
                                'league_id' => $draft->league_id,
                                'start_at' => now(),
                            ]
                        ];
                        //insert les données des matchs dans
                        Match::insert($matchDatas);

                    }
                }
            }
        }
    }
}
