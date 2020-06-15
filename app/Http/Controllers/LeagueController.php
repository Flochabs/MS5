<?php

namespace App\Http\Controllers;

use App\Mail\Register;
use App\Model\League;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeagueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leagues = League::all();
        return view('leagues.index');
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
        $token = md5(uniqid($user_id, true));
        $email = Auth::user()->email;
        $values = $request->all();
        $publicLeague = (int)$values['public'];
        $rules = [
            'name'             => 'string|required|unique:leagues',
            'number_teams'     => 'integer|required',
            'public'           => 'integer|required',
        ];
        // Vérification de la validité des informations transmises par l'utilisateur
        $validator = Validator::make($values, $rules, [
            'name.string' => 'Le nom de la league ne doit pas contenir de caractères spéciaux.',
            'name.required' => 'Il faut choisir un nom de league !',
            'name.unique' => 'Il faut choisir un autre nom de league!',
            'number_teams.required' => 'Il faut choisir un nombre de teams !',
            'public.required' => 'Privée ou publique ???',

        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        // Création de la nouvelle league avec les informations transmises
        $newLeague = new League();
        $newLeague->user_id         = $user_id;
        $newLeague->name            = $values['name'];
        $newLeague->number_teams    = $values['number_teams'];
        $newLeague->public          = $publicLeague;
        if ($publicLeague === 1) {
            $newLeague->token        = $token;
        }
        $newLeague->save();
        // On associe le joueur à la league dans la table pivot
        $newLeague->users()->sync(Auth::user()->id);

        // On ajoute le role créateur de league
        Auth::user()->roles()->attach([3]);

        // Envoi d'un mail de confirmation
        $title = 'Confirmation de création league !';
        $content = 'Salut, ta league ' . $newLeague['name'] .
            ' a bien été créée et comporte ' . $newLeague['number_teams'] . ' équipes.<br>';

            if ($publicLeague === 0) {
                $content .=  "Il s'agit d'une league publique, que tout le monde peut rejoindre";
            } else{
                $content .= "Pour inviter tes potes, donne leur le mot de passe :<br><br> $token";
            }
            $content .= "<br><br>Bonne route vers la gloire !";

            Mail::to($email)->send(new Register($title, $content));

            $id = $newLeague->id;

        return redirect()->route('leagues.show', $id)->with('success', 'La league a bien été créée.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(League $league)
    {
        // traite les infos d'une league en cours et renvoie les infos à l'utilisateur sur une vue
        return view('leagues.show', compact('league'));
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
        $data = League::find($id);
        $data->isActive = $request->isActive;
        $data->save();

        return redirect('teams.create')->with('success', 'La leaque est bien activée.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $league = League::findOrFail($id);
        $league->delete();

        return redirect('leagues.index')->with('success', 'La league a bien été supprimée.');
    }

    public function publicLeagues()
    {
        //permet d'afficher les leagues publiques
        $leagues = League::where('public', 0)->paginate(15);

        return view('leagues.public')->with('leagues', $leagues);
    }

    public function joinPublicLeague($id)
    {
        //permet de rejoindre une league publique
        $league_id = (int)$id;

            // insère les id dans la table pivot
            $user = Auth::user();
            $league = League::where('id', '=', $league_id)->first();
            $user->leagues()->sync([$league->id]);
            $id = $league->id;
            return redirect()->route('leagues.show', $id)->with('success', 'Rattachement à la league pris en compte.');
    }

    public function joinPrivateLeague(Request $request)
    {
        //permet de rejoindre une league privée
        if (League::where('token', '=', $request->token)->exists()) {
            // insère les id dans la table pivot
            $user = Auth::user();
            $league = League::where('token', '=', $request->token)->first();
            $user->leagues()->sync([$league->id]);
            $id = $league->id;
            return redirect()->route('leagues.show', $id)->with('success', 'Rattachement à la league pris en compte.');
        } else {
            return redirect('leagues')->withErrors('Cette league n\'existe pas');
        }
    }
}
