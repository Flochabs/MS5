<?php

namespace App\Http\Controllers;

use App\Mail\Register;
use App\Model\League;
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
        return view('leagues/index');
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
            'name'             => 'string|required',
            'number_teams'     => 'integer|required',
            'public'           => 'integer|required',
        ];
        // Vérification de la validité des informations transmises par l'utilisateur
        $validator = Validator::make($values, $rules, [
            'name.string' => 'Le nom de la league ne doit pas contenir de caractères spéciaux.',
            'name.required' => 'Il faut choisir un nom de league !',
            'number_teams.required' => 'Il faut choisir un nombre de teams !',
            'public.required' => 'Privé ou public ???',

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
            $newLeague->token           = $token;
        }
        $newLeague->save();

        // On ajoute le role créateur de league
        Auth::user()->roles()->attach([3]);

        // Envoi d'un mail de confirmation
        $title = 'Confirmation de création league !';
        $content = 'Salut, ta league ' . $newLeague['name'] .
            'a bien été créée et comporte ' . $newLeague['number_teams'] . ' équipes.<br>';

            if ($publicLeague === 0) {
                $content .=  "Il s'agit d'une league publique, que tout le monde peut rejoindre";
            } else{
                $content .= "Pour inviter tes potes, donne leur le mot de passe :<br><br> $token";
            }
            $content .= "<br><br>Bonne route vers la gloire !";

            Mail::to($email)->send(new Register($title, $content));

//        return redirect('/companies')->with('success', 'L\'entreprise a été enregistrée.');
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

    public function publicLeagues()
    {
        $leagues = League::where('public', 0)->paginate(15);
//        dd($leagues);
        return view('leagues.public')->with('leagues', $leagues);
    }

    public function joinPrivateLeague(Request $request)
    {
        $league = League::where('name', $request);
        dd($league);
//        return view('leagues.public');
    }
}
