<?php

namespace App\Http\Controllers;

use App\Model\Player;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class DraftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $players = Player::where('price', '>', 1)->orderBy('price', 'desc')->simplePaginate(50);

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
                ->get();

        }
        if(request()->has('position&order')){
            dd('test');
        }
        return view('draft.index', compact('players'));
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
}
