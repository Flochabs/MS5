<?php

namespace App\Http\Controllers;

use App\Model\Match;
use App\Model\Nbateam;
use App\Model\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nbaTeams = Nbateam::all();
        return view('teams.create')->with('nbaTeams', $nbaTeams);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        // Récupération des données du formulaire et association de l'id de l'utilisateur
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $league_id =$user->league->id;
        $values = $request->all();
        $rules = [
            'name'             => 'string|required|max:30|unique:teams',
            'stadium_name'     => 'string|required|max:30|unique:teams',
//            'public'           => 'integer|required',
        ];
        // Vérification de la validité des informations transmises par l'utilisateur
        $validator = Validator::make($values, $rules, [
            'name.string' => 'Le nom de la team ne doit pas contenir de caractères spéciaux.',
            'name.required' => 'Il faut choisir un nom de team !',
            'name.unique' => 'Il faut choisir un autre nom de team!',
            'stadium_name.string' => 'Le nom du stade ne doit pas contenir de caractères spéciaux.',
            'stadium_name.required' => 'Il faut choisir un nom de stade !',
            'stadium_name.unique' => 'Il faut choisir un autre nom de stade!',
//            'public.required' => 'Privée ou publique ???',

        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        // Création de la nouvelle league avec les informations transmises
        $newTeam = new Team();
        $newTeam->user_id         = $user_id;
        $newTeam->league_id       = $league_id;
        $newTeam->name            = $values['name'];
        $newTeam->stadium_name    = $values['stadium_name'];
//        $newTeam->public          = $publicLeague;

        $newTeam->save();

        $id = $newTeam->id;

        return redirect()->route('draft.index', $id)->with('success', 'La league a bien été créée.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        // récupération des données user
        $user = Auth::user();

        // league à laquelle appartient l'utilisateur
        $userLeagueId = $user->team->league_id;

        // $userTeam récupère l'équipe de l'utilisateur
        $userTeam = Team::where('user_id', $user->id)->first();

        // $userLastMatch récupère le dernière matchs jouer par l'utilisateur dans match
        $userLastMatch  = Match::where([['league_id', $userLeagueId],['away_team_id', $userTeam->id]])
            ->orwhere([['league_id', $userLeagueId],['home_team_id', $userTeam->id]])
            ->whereNotNull('home_team_score')
            ->orderBy('start_at','desc')
            ->get()
            ->first();

        // Récupère tous les joeurs du dernier du matchs
        $allPlayers = $userLastMatch->matchPlayers;
//        dd($allPlayers);
        //connecté au dashboard et renvoie les infos concernant son équipe à l'utilisateur sur une vue

        return view('teams.show')
            ->with('team', $team)
            ->with('allPLayers', $allPlayers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
