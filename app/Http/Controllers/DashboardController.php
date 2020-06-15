<?php

namespace App\Http\Controllers;

use App\Model\Match;
use App\Model\Player;
use App\Model\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //-------------  RECUPERATION DONNES UTILISATEUR ---------------//

        //récupération des données users
        $user = Auth::user();

        //league à laquelle appartient l'utilisateur qui fait sa draft
        $userLeagueId = $user->team->league_id;

        // $userTeam récupère l'équipe de l'utilisateur
        $userTeam = Team::where('user_id', $user->id)->first();
        //dd($userTeam);



        //-------------  RECUPERATION DONNES GENERALES  ---------------//


        //equipes présentent dans la ligue de l'utilisateur
        $leagueTeams = Team::where('league_id', $userLeagueId)->get();
        // dd($leagueTeams);


        // match récupère tout les matchs présent dans match
        //$match = Match::where([['league_id', $userLeagueId],['away_team_id', $userTeam->id]])->get();
        $match = Match::where([['league_id', $userLeagueId],['home_team_id', $userTeam->id]])->get();
        dd($match);





        return view('dashboard.index')
            ->with('user', $user)
            ->with('leagueTeams', $leagueTeams)
            ->with('userTeam', $userTeam);

    }





    public function profile()
    {
        return view('dashboard.profile');
    }

    public function  match_result()
    {
        return view('dashboard.match_result');
    }

}
