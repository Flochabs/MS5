<?php

namespace App\Http\Controllers;

use App\Model\Match;
use App\Model\Player;
use App\Model\Team;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MatchController extends Controller
{
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

        //verification qu'il n'y ait pas un joueur déjà sélectionné pour cette position
        //récupération des positions des joueurs déja sélectionnés dans un tableau
        $playersSelectedPositions = [];
        $playersSelectedIds = [];
        $playersFromNextMatch = $userNextMatch->matchPlayers;

        //boucle qui récupère toutes les positions des joueurs présents dans le match
        foreach ($playersFromNextMatch as $playerFromNextMatch) {
            foreach ($playerFromNextMatch->teams as $team) {
                if($userTeam->id === $team->id ){
                    $playersSelectedIds[] = $playerFromNextMatch->id;
                    $playerFromNextMatchPosition = json_decode($playerFromNextMatch->data);
                    $playersSelectedPositions[] = $playerFromNextMatchPosition->pl->pos;

                }
            }
        }

        $nbPlayersFromPositions = array_count_values($playersSelectedPositions);

        // récupération des informations sur le joueur qui l'utilisatuer cherche à enregistrer
        $playerInfos = json_decode($playerInMatch->data);
        $positionPlayer = $playerInfos->pl->pos;
        $positionPlayer  = substr($positionPlayer, 0,1);


         //vérifier que le joueur n'est pas déjà associé et qu'il n'y a pas déjà un joueur choisi pour sa position
        if( ( (!isset($nbPlayersFromPositions["F"]) || ($positionPlayer === "F" && $nbPlayersFromPositions["F"] < 2)) ||
              (!isset($nbPlayersFromPositions["C"]) || ($positionPlayer === "C" && $nbPlayersFromPositions["C"] < 1)) ||
              (!isset($nbPlayersFromPositions["C"]) || ($positionPlayer === "G" && $nbPlayersFromPositions["G"] < 2)) )
            &&  !in_array($playerInMatch->id, $playersSelectedIds) ){

            //créer le lie entre le joueur et l'équpe dans la table pivot
            $userNextMatch->matchPlayers()->attach($playerInMatch->id);

            $playerName = $playerInfos->pl->fn;
            $json = [
                // Je récupère l'id qui vient d'être entré
                'id' => $playerInMatch->id,
                'name' => $playerName,
                'lastname' => $playerInfos->pl->ln,
                'position' => $positionPlayer,
            ];
            return $json;
        }
        $json = [ 'test'];
        return $json;
    }



    /**
     * Supprime l'enchère de l'utilisateur sur le joueur sélectionné
     *
     * @param int $id
     * @return array
     */
    public function deletePlayer($id) {
        // récupération des données user
        $user = Auth::user();
        // league à laquelle appartient l'utilisateur
        $userLeagueId = $user->team->league_id;


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


        $json = [
            // Je récupère l'id qui vient d'être entré
            'id' => ($id),
        ];

        return $json;
    }
}
