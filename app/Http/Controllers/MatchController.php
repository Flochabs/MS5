<?php

namespace App\Http\Controllers;

use App\Model\Match;
use App\Model\Player;
use App\Model\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MatchController extends Controller
{
    //

    public function index()
    {
        //-------------------------------------  RECUPERATION DONNES UTILISATEUR -------------------------------------//
        // récupération des données user
        $user = Auth::user();

        // league à laquelle appartient l'utilisateur
        $userLeagueId = $user->team->league_id;
        //dd($userLeagueId);

        // Le nom de la league à laquelle appartient l'utilisateur
        $userNameLeague = $user->team->getLeague->name;
        //dd($userNameLeague);

        // $userTeam récupère l'équipe de l'utilisateur
        $userTeam = Team::where('user_id', $user->id)->first();
        //dd($userTeam);

        //-------------------------  RECUPERATION  DONNES JOEURS DE LA TEAM DE L'UTILISATEUR -------------------------//


        // $userPlayersTeam récupère tout joueurs de l'utilisateur dans ça team
        $userPlayersTeam = $userTeam->getPlayers;

        //----------------------------------  RECUPERATION DONNES DU  PROCHAIN  MATCH --------------------------------//

        // $userNextMatch récupère le prochain matchs jouer par l'utilisateur dans match

        $userNextMatch  = Match::whereNull('home_team_score')->where([['league_id', $userLeagueId],['away_team_id', $userTeam->id]])
            ->orwhere([['league_id', $userLeagueId],['home_team_id', $userTeam->id]])
            ->orderBy('start_at','asc')
            ->get()
            ->first();
        //dd($userNextMatch->homeTeamName);

        // récupérer les joueurs déjà enregistrés pour la composition du prochain match
        $playersSelected = [];
        $playersFromNextMatch = $userNextMatch->matchPlayers;

        foreach ($playersFromNextMatch as $playerFromNextMatch) {
            foreach ($playerFromNextMatch->teams as $team) {
                if($userTeam->id === $team->id ){
                    $playersSelected[] = $playerFromNextMatch;
                }
            }
        }


        return view('match.index')->with('userNextMatch',$userNextMatch)
                ->with('userPlayersTeam', $userPlayersTeam)
                ->with('playersSelected', $playersSelected);
    }

    public function store(Request $request){
        // récupération des données user
        $user = Auth::user();

        // league à laquelle appartient l'utilisateur
        $userLeagueId = $user->team->league_id;
        //dd($userLeagueId);

        // Le nom de la league à laquelle appartient l'utilisateur
        $userNameLeague = $user->team->getLeague->name;
        //dd($userNameLeague);

        // $userTeam récupère l'équipe de l'utilisateur
        $userTeam = Team::where('user_id', $user->id)->first();
        //dd($userTeam);

        //-------------------------  RECUPERATION  DONNES JOEURS DE LA TEAM DE L'UTILISATEUR -------------------------//


        // $userPlayersTeam récupère tout joueurs de l'utilisateur dans ça team
        $userPlayersTeam = $userTeam->getPlayers;
        $userNextMatch  = Match::whereNull('home_team_score')->where([['league_id', $userLeagueId],['away_team_id', $userTeam->id]])
            ->orwhere([['league_id', $userLeagueId],['home_team_id', $userTeam->id]])
            ->orderBy('start_at','asc')
            ->get()
            ->first();

        $values = $request->all();

        $rules = [
            'player' => 'integer',

        ];
        $messages = [
            'player.integer' => 'doit être un nombre',
        ];

        $validator = Validator::make($values, $rules, $messages);

        if ($validator->fails()) {
            // au lieu de retourner avec une session
            // on retourne avec un tableau
            // je passe le message erreur en début de tableau
            $json = $validator->errors()->all();
            array_unshift($json, 'Errors');

            return json_encode($json);
        }
        $playerID = (int) $values['player'];
        $playerInMatch = Player::where('id',$playerID)->get()->first();

        //créer le lie entre le joueur et l'équpe dans la table pivot
        $userNextMatch->matchPlayers()->attach($playerInMatch->id);

        $playerInfos = json_decode($playerInMatch->data);
        $playerName = $playerInfos->pl->fn;
        $json = [
            // Je récupère l'id qui vient d'être entré
            'id' => $playerInMatch->id,
            'name' => $playerName,
            'lastname' => $playerInfos->pl->ln,
            'position' => $playerInfos->pl->pos,
        ];
        return $json;
    }
}
