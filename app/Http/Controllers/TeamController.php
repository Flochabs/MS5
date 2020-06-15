<?php

namespace App\Http\Controllers;

use App\Model\Nbateam;
use App\Model\Team;
use Illuminate\Http\Request;

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
        // Récupération des données du formulaire et association de l'id de l'utilisateur
        $user_id = Auth::user()->id;
        $values = $request->all();
        $rules = [
            'name'             => 'string|required|unique:leagues',
            'stadium_name'     => 'string|required|unique:leagues',
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
        $newTeam->name            = $values['name'];
        $newTeam->stadium_name    = $values['stadium_name'];
//        $newTeam->public          = $publicLeague;

        $newTeam->save();
        // On associe le joueur à la team dans la table pivot
        $newTeam->user()->sync(Auth::user()->id);

        // On ajoute le role créateur de league
        Auth::user()->roles()->attach([3]);


        $id = $newTeam->id;

        return redirect()->route('draft.index', $id)->with('success', 'La league a bien été créée.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
