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
        //all nba players name
        $players = Storage::disk('public')->get('data/nbaplayers.json');
        //decode dans un object php
        $players = json_decode($players, false);
        $players = $players->league->standard;

        //Authentification et données sur le salary cap
        $user = Auth::user();

        $userLeague = $user->team->league_id;

        // salary cap en cours
        $team = Team::where('user_id', $user->id)->first();


        $players = Player::where('price', '>', 1)->orderBy('price', 'desc')->simplePaginate(50);

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
        $auctions = Auction::where('team_id', $user->team->id)->get();

        //retourne les joueurs draftés par l'utilisateur
        $drafted = $team->getPlayers;


        return view('draft.index')
            ->with('players', $players)
            ->with('team', $team)
            ->with('auctions', $auctions)
            ->with('drafted', $drafted)
            ->with('players', $players);

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
     * Remove the specified resource from storage.
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
        return back();
    }
}
