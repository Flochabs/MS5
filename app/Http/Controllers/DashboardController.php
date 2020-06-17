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
        //-------------------------------------  RECUPERATION DONNES UTILISATEUR -------------------------------------//
        // récupération des données users
        $user = Auth::user();

        // league à laquelle appartient l'utilisateur
        $userLeagueId = $user->team->league_id;
        //dd($userLeagueId);

        // Le nom de la league à laquelle appartient l'utilisateur
        $userNameLeague = $user->team->getLeague->name;
        //dd($userNameLeague);

        // $team récupère l'équipe de l'utilisateur
        $userTeam = Team::where('user_id', $user->id)->first();
        //dd($userTeam);

        $userPlayersTeam = $userTeam->getPlayers;
        //dd($userPlayersTeam);

        //-------------------------  RECUPERATION  DONNES JOEURS DE LA TEAM DE L'UTILISATEUR -------------------------//


        // $userPlayersTeam récupère tout joueurs de l'utilisateur dans ça team
        $userPlayersTeam = $userTeam->getPlayers;

        //------------------------------------------  RECUPERATION DONNES  MATCH --------------------------------------//

        // $allMatchs récupère tout les matchs présent dans match
        $allMatchs = Match::all();
        //dd($allMatchs);

        //  $AllHomeTeamsNames récupère tout les noms des équipes qui sont à domicile dans les matchs
        // $AllTeamsNames permet d'avoir un tableau avec tout les noms de tout les équipes.

        //$AllHomeTeamsNames = [];
        //$AllTeamsNames =  [];
        //foreach ( $allMatchs as $match) {
          //  $AllHomeTeamsNames[] = $match->homeTeamName;
            //$AllTeamsNames[] =  $AllHomeTeamsNames;
        //}

        //  $AllAwayTeamsNames  récupère tout les noms des équipes qui sont en tant que visiteur dans les matchs
        //$AllAwayTeamsNames = [];
        //foreach ( $allMatchs as $match) {
          //  $AllAwayTeamsNames[] = $match->awayTeamName;
            //$AllTeamsNames[] =   $AllAwayTeamsNames;
        //}
        //dd($AllTeamsNames);

        // $userMatchs récupère tout les matchs jouer par l'utilisateur dans match
        $userMatchs  = Match::where([['league_id', $userLeagueId],['away_team_id', $userTeam->id]])->orwhere([['league_id', $userLeagueId],['home_team_id', $userTeam->id]])->get();

        $homeTeamNextMatch = 0;

        //----------------------------------  RECUPERATION DONNES DU  PROCHAIN  MATCH --------------------------------//

        // $userNextMatchs récupère le prochain matchs jouer par l'utilisateur dans match
        $userNextMatchs = Match::whereNull('home_team_score')->where('league_id', $userLeagueId)->orderBy('start_at','asc')->first();

        if($userNextMatchs != null)
        {
            // $homeTeamNextMatch récupère le nom de l'équipe home qui joue dans prochain matchs
            $homeTeamNextMatch = Team::where('id', $userNextMatchs->home_team_id)
                ->get()
                ->first();

            //  $awayTeamNextMatch récupère le nom de l'équipe away qui joue dans prochain matchs
            $awayTeamNextMatch = Team::where('id', $userNextMatchs->away_team_id)
                ->get()
                ->first();

            // $userHomeNextMatch récupère l'utilisateur de l'équipe home qui à joue dans prochain matchs
            $userHomeNextMatch =  $homeTeamNextMatch->userTeam;

            // $userAwayNextMatch récupère l'utilisateur de l'équipe away qui à joue dans prochain matchs
            $userAwayNextMatch  =  $awayTeamNextMatch->userTeam;

        }else
        {
            $homeTeamNextMatch = 'Match fini';
            $awayTeamNextMatch = 'Match fini';
            $userHomeNextMatch =  'Pas d\'utilisateur';
            $userAwayNextMatch =  'Pas d\'utilisateur';

        }



        //----------------------------------  RECUPERATION DONNES DU DERNIER  MATCH --------------------------------//

        // $userLastMatch récupère le dernière matchs jouer par l'utilisateur dans match
        $userLastMatch  = Match::where(function ($query) use($userLeagueId,$userTeam) {
            $query->where(['league_id' => $userLeagueId , 'away_team_id' => $userTeam->id])
                ->orwhere(['league_id' => $userLeagueId, 'home_team_id' => $userTeam->id]);
        })
            ->whereNotNull('home_team_score')
            ->whereNotNull('away_team_id')
            ->orderBy('start_at','desc')
            ->first();

        // $homeTeamLastMatch récupère le nom de l'équipe home qui à jouer dans le dernier matchs
        $homeTeamLastMatch = Team::where('id', $userLastMatch->home_team_id)
            ->get()
            ->first();

        // $awayTeamLastMatch récupère le nom de l'équipe away qui à jouer dans le dernier matchs
        $awayTeamLastMatch = Team::where('id', $userLastMatch->away_team_id)
            ->get()
            ->first();

        // $userHomeLastMatch récupère l'utilisateur de l'équipe home qui à jouer dans le dernier matchs
        $userHomeLastMatch = $homeTeamLastMatch->userTeam;

        // $userAwayLastMatch récupère l'utilisateur de l'équipe away qui à jouer dans le dernier matchs
        $userAwayLastMatch = $awayTeamLastMatch->userTeam;



        return view('dashboard.index')
            ->with('user', $user)
            ->with('userPlayersTeam',  $userPlayersTeam)
            ->with('homeTeamNextMatch', $homeTeamNextMatch)
            ->with('userHomeNextMatch', $userHomeNextMatch)
            ->with('awayTeamNextMatch', $awayTeamNextMatch)
            ->with('userAwayNextMatch', $userAwayNextMatch)
            ->with('homeTeamLastMatch', $homeTeamLastMatch)
            ->with('userHomeLastMatch', $userHomeLastMatch)
            ->with('awayTeamLastMatch', $awayTeamLastMatch)
            ->with('userAwayLastMatch', $userAwayLastMatch)
            ->with('userLastMatch', $userLastMatch);

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
