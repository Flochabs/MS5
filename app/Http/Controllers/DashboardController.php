<?php

namespace App\Http\Controllers;

use App\Model\Match;
use App\Model\Player;
use App\Model\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //Récupere le pseudo de l'utilisateur
        $user_id = Auth::user()->id;


        //-------------------------------------  RECUPERATION DONNES UTILISATEUR -------------------------------------//
        // récupération des données users
        $user = Auth::user();
        //dd($user);


        // league à laquelle appartient l'utilisateur
        $userLeagueId = $user->team->league_id;
        //dd($userLeagueId);

        // Le nom de la league à laquelle appartient l'utilisateur
        $userNameLeague = $user->team->getLeague->name;
        //dd($userNameLeague);

        // $team récupère l'équipe de l'utilisateur
        $userTeam = Team::where('user_id', $user->id)->first();
        //dd($userTeam);

        //-------------------------  RECUPERATION  DONNES JOEURS DE LA TEAM DE L'UTILISATEUR -------------------------//


        // $userPlayersTeam récupère tout joueurs de l'utilisateur dans ça team
        $userPlayersTeam = $userTeam->getPlayers;
        //dd($userPlayersTeam);

        //------------------------------------------  RECUPERATION DONNES  MATCH --------------------------------------//

        // $allMatchs récupère tout les matchs présent dans match
        $allMatchs = Match::all();
        //dd($allMatchs);

        //  $AllHomeTeamsNames récupère tout les noms des équipes qui sont à domicile dans les matchs
        // $AllTeamsNames permet d'avoir un tableau avec tout les noms de tout les équipes.

        $AllHomeTeamsNames = [];
        $AllTeamsNames =  [];
        foreach ( $allMatchs as $match) {
            $AllHomeTeamsNames[] = $match->homeTeamName;
            $AllTeamsNames[] =  $AllHomeTeamsNames;
        }

        //  $AllAwayTeamsNames  récupère tout les noms des équipes qui sont en tant que visiteur dans les matchs
        $AllAwayTeamsNames = [];
        foreach ( $allMatchs as $match) {
            $AllAwayTeamsNames[] = $match->awayTeamName;
            $AllTeamsNames[] =   $AllAwayTeamsNames;
        }
        //dd($AllTeamsNames);


        // $userMatchs récupère tout les matchs jouer par l'utilisateur dans match
        $userMatchs  = Match::where([['league_id', $userLeagueId],['away_team_id', $userTeam->id]])->orwhere([['league_id', $userLeagueId],['home_team_id', $userTeam->id]])->get();
        //dd($userMatchs);

        //----------------------------------  RECUPERATION DONNES DU  PROCHAIN  MATCH --------------------------------//

        // $userNextMatchs récupère le prochain matchs jouer par l'utilisateur dans match
        $userNextMatchs = Match::whereNull('home_team_score')->where('league_id', $userLeagueId)->orderBy('start_at','asc')->first();
        //dd( $userNextMatchs );

        // $hometeamNextMatch récupère le nom de l'équipe home qui joue dans prochain matchs
        $hometeamNextMatch = Team::where('id', $userNextMatchs->home_team_id)
            ->get()
            ->first();
        //dd($hometeamNextMatch);

        //  $awayteamNextMatch récupère le nom de l'équipe away qui joue dans prochain matchs
        $awayteamNextMatch = Team::where('id', $userNextMatchs->away_team_id)
            ->get()
            ->first();
        //dd($awayteamNextMatch);


        //----------------------------------  RECUPERATION DONNES DU DERNIER  MATCH --------------------------------//

        // $userLastMatch récupère le dernière matchs jouer par l'utilisateur dans match
        $userLastMatch  = Match::where([['league_id', $userLeagueId],['away_team_id', $userTeam->id]])
            ->orwhere([['league_id', $userLeagueId],['home_team_id', $userTeam->id]])
            ->whereNotNull('home_team_score')
            ->orderBy('start_at','desc')
            ->get()
            ->first();
        //dd($userLastMatch);


        //  $hometeamLastMatch récupère le nom de l'équipe home qui à jouer dans le dernier matchs
        $hometeamLastMatch = Team::where('id', $userLastMatch->home_team_id)
            ->get()
            ->first();
        //dd($hometeamLastMatch);


        // $awayteamLastMatch récupère le nom de l'équipe away qui à jouer dans le dernier matchs
        $awayteamLastMatch = Team::where('id', $userLastMatch->away_team_id)
            ->get()
            ->first();
        //dd($awayteamLastMatch);



        $playersHomeTeamMatchs = Team::where('id', $userNextMatchs->home_team_id)
            ->get()
            ->first();
        //dd($playersHomeTeamMatchs);


        // Récupére tous les joeurs du dernier du matchs
        $allPlayers = $userLastMatch->matchPlayers;
        //dd($allPlayers);


        //------------------------------------- CALCUL DU SCORE D'UNE TEAM -------------------------------------------//






        //------------------------------------- SELECTION DES JOEURS POUR UNE D'UNE TEAM -------------------------------------------//




















        return view('dashboard.index')->with('user_id', $user_id);
    }

    public function profile($id)
    {
        $user = User::where('id', '=', $id)->first();
        return view('dashboard.profile', compact('user'));
    }

    public function  match_result()
    {
        return view('dashboard.match_result');
    }

}
