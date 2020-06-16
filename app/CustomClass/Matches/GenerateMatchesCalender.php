<?php


namespace App\CustomClass\Matches;


use App\Model\Auction;
use App\Model\Draft;
use App\Model\Match;
use App\Model\Player;
use App\Model\Team;
use Carbon\Carbon;
use Illuminate\Console\Command;
use ScheduleBuilder;

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
                //$draft->update(['is_over' => 1]);

                //récupérer tous les ID des équipes présentes dans la ligue
                $matches = [];

                $allTeams = Team::where('league_id',$draft->league_id)->orderBy('id')->get();
                $allTeamsIDs = [];
                foreach ($allTeams as $teamid) {
                    $allTeamsIDs[] = $teamid->id;
                }

                $scheduleBuilder = new ScheduleBuilder($allTeamsIDs);
                $scheduleGames = $scheduleBuilder->build();

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
//                $allMatches = Match::where('league_id',$draft->league_id)->get();
////                $matchUpdatedAway = [];
////                $matchUpdatedHome = [];
//                $matchTime = now()->addDay();
//                $matchUpdated = [];
//                $i = 0 ;
//                $gamesPerWeek = $allTeams->count()/2;
//
//                foreach ($allMatches as $match) {
//                    $match->start_at = $matchTime->format('Y-m-d 20:00:00');
//                    $match->save();
//                    $allMatches2 = Match::where('league_id',$draft->league_id)
//                        ->where(function($query) use($match){
//                            $query->where(function($subQuery) use($match){
//                                $subQuery->where('home_team_id','!=', $match->home_team_id)
//                                    ->where('away_team_id','!=', $match->home_team_id);
//                            })
//                            ->where(function($subQuery) use($match){
//                                $subQuery->where('home_team_id','!=', $match->away_team_id)
//                                    ->where('away_team_id','!=', $match->away_team_id);
//                            });
//                        })
//                        ->whereNull('start_at')->get();
//                    if($gamesPerWeek === 0){
//                        //dd($matchUpdated);
//                        $matchTime = $matchTime->addWeek();
//                        $gamesPerWeek = $allTeams->count()/2;
//                        $matchUpdated = [];
//                    }
//                    foreach ($allMatches2 as $match2) {
//                        if(!$match2->start_at){
//                            $match2->start_at = $matchTime->format('Y-m-d 20:00:00');
//                            $match2->save();
//                        }
//
//                        //$matchUpdatedHome[$match->home_team_id] = $match->away_team_id;
//                        //$matchUpdatedAway[$match->away_team_id] = $match->home_team_id;
//                        //if(!in_array($match->home_team_id, $matchUpdated, true)
//                            //&& !in_array($match->away_team_id, $matchUpdated, true)){
////                            $matchUpdated[] = $match->home_team_id;
////                            $matchUpdated[] = $match->away_team_id;
//
//                        //}
//
//                    }
//
//                $i++;
//                $gamesPerWeek--;
//                }
            }
        }
    }
}
