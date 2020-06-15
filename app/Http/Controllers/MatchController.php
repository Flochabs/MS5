<?php

namespace App\Http\Controllers;

use App\Model\Match;
use App\Model\Player;
use App\Model\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MatchController extends Controller
{
    //
    public function index()
    {
        //-------------  RECUPERATION DONNES UTILISATEUR ---------------//
        //récupération des données users
        $user = Auth::user();
        //dd($user);

        //league à laquelle appartient l'utilisateur qui fait sa draft
        $userLeagueId = $user->team->league_id;
        //dd($userLeagueId);

        // $team récupère l'équipe de l'utilisateur
        $userTeam = Team::where('user_id', $user->id)->first();
        //dd($userTeam);

        //-------------  RECUPERATION  DONNES JOEURS DE LA TEAM DE L'UTILISATEUR --------------//


        // $userPlayersTeam récupère tout joueurs de l'utilisateur dans ça team
        $userPlayersTeam = $userTeam->getPlayers;
        //dd($userPlayersTeam);


        //------------- CALCUL DU SCORE D'UNE TEAM ---------------//

        $scoreTeam = 0;
        foreach ($userPlayersTeam as $playersTeam){
            $scoreTeam += $playersTeam->score;
        }
        //dd($scoreTeam);




        return view('match.index');
    }
}
