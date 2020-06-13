<?php


namespace App\Http\Controllers;

use App\Model\Auction;
use App\Model\Player;
use App\Model\Team;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DraftController extends Controller
{
//$user = App\User::find(1);
//
//$user->roles()->updateExistingPivot($roleId, $attributes);
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        //récupération des données users
        $user = Auth::user();

        //league à laquelle appartient l'utilisateur qui fait sa draft
        $userLeague = $user->team->league_id;

        // $team récupère l'équipe de l'utilisateur
        $team = Team::where('user_id', $user->id)->first();


        $players = Player::where('price', '>', 1)->orderBy('price', 'desc')->simplePaginate(20);

        //Montrer/cacher les joueurs draftés
        if (request()->has('hide')) {
            $draftedPlayers = Player::all();

            $notDisplayedPlayers = [];
            foreach ($draftedPlayers as $draftedPlayer) {
                if (!empty($draftedPlayer->teams[0])) {
                    if ($draftedPlayer->teams[0]->league_id === $userLeague) {
                        $notDisplayedPlayers[] = $draftedPlayer->id;
                    }
                }
            }
            // retourne les joueurs qui ne sont pas présents dans le tableau des joueurs draftés dans la ligue
            $players = Player::whereNotIn('id', $notDisplayedPlayers)
                ->where('price', '>', 1)
                ->orderBy('price', 'desc')
                ->get();
        }

        //trier par prix
        if (request()->has('order')) {
            $players = Player::where('price', '>', 1)->orderBy('price', request('order'))->simplePaginate(50);
        }

        //trier par position
        if (request()->has('position')) {
            $allPlayersFromPosition = [];
            $players = Player::all();
            foreach ($players as $player) {
                $playerPosition = json_decode($player->data)->pl->pos;
                $playerPosition = substr($playerPosition, 0, 1);
                $hasPlayed = json_decode($player->data)->pl->ca->gp;
                if ($hasPlayed !== null && $playerPosition === request('position')) {
                    $allPlayersFromPosition[] = $player->id;
                }
            }

            $players = Player::whereIn('id', $allPlayersFromPosition)
                ->where('price', '>', 1)
                ->orderBy('price', 'desc')
                ->simplePaginate(50);

        }
        if (request()->has('position&order')) {
            dd('test');
        }

        //retourne toutes les enchères en cours de l'utilisateur

        //récupérer tous les nom sdes joueurs nba
        $playersNames = Storage::disk('public')->get('data/nbaplayers.json');
        //decode dans un object php
        $playersNames = json_decode($playersNames, false);
        //sert à afficher le nom des joueurs dans le tableau auction de la view
        $playersNames = $playersNames->league->standard;


        //retourne toutes les enchères en cours de l'utilisateur
        $auctions = Auction::where('team_id', $user->team->id)->get();

        //tableau qui permet d'associer les enchères aux noms des joueurs correspondants
        $auctionPlayersData = [];
//        foreach ($auctions as $auction) {
//            foreach ($playersNames as $playername) {
//                if($auction->player_id === $playername->personId) {
//                    dd($playername->firstName);
//                }
//            }
//
//        }

        //retourne les joueurs draftés par l'utilisateur
        $drafted = $team->getPlayers;
        //tableaux pour stocker les données des joueurs selon leurs positions pour les afficher dans la view en fonction
        $forwards = [];
        $guards = [];
        $centers = [];
        foreach($drafted as $draftedPlayer) {
            $draftedInfos = json_decode($drafted[0]->data);
            $position  = substr($draftedInfos->pl->pos, 0,1);

            if($position === "F") {
                $forwards[] =  $draftedPlayer;
            } elseif($position === "C") {
                $centers[] = $draftedPlayer;
            } else {
                $guards[] = $draftedPlayer;
            }
        }


        return view('draft.index')
            ->with('players', $players)
            ->with('team', $team)
            ->with('auctions', $auctions)
            ->with('drafted', $drafted)
            ->with('forwards', $forwards)
            ->with('guards', $guards)
            ->with('centers', $centers);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Add the auction to the table.
     *
     * @param int $id
     * @return Response
     */

    public function auction($id)
    {
        $auctions = Auction::all();
        $user = Auth::user();
        //recuperer l'équipe de l'utilisateur qui enregistre l'enchère
        $team = Team::where('user_id', $user->id)->first();
        $team = $team->id;

        $data = [[
            'team_id' => $team,
            'player_id' => $id,
            'auction' => 35,
        ]];

        Auction::insert($data);
        return redirect()->back();
    }

    /**
     * Supprime l'enchère de l'utilisateur sur le joueur sélectionné
     *
     * @param int $id
     * @return Response
     */

    public function deleteAuction($id){
        $auctions = Auction::all();
        $user = Auth::user();
        //recuperer l'équipe de l'utilisateur qui enregistre l'enchère
        $team = Team::where('user_id', $user->id)->first();
        $team = $team->id;
        Auction::where([['player_id',$id], ['team_id', $team]])->delete();
        return back();
    }

    public function confirmDraft(){

    }
    /**
     * Supprime l'enchère de l'utilisateur sur le joueur sélectionné
     *
     * @param int $id
     * @return Response
     */

}
