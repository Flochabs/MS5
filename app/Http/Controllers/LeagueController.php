<?php

namespace App\Http\Controllers;

use App\Model\League;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leagues/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $token = md5(uniqid($user_id, true));
        $values = $request->all();
        $rules = [
            'name'             => 'string|required',
            'number_teams'     => 'integer|required',
            'public'           => 'integer|required',
        ];
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
        $newLeague = new League();
        $newLeague->user_id         = $user_id;
        $newLeague->name            = $values['name'];
        $newLeague->number_teams    = $values['number_teams'];
        $newLeague->public          = $values['public'];
        $newLeague->token           = $token;
        $newLeague->save();

        // On ajoute le role créateur de league
        Auth::user()->roles()->attach([3]);

//        $title = 'Confirmation d\'inscription';
//        $content = 'Bonjour, l\'entreprise ' . $validatedData['name'] . '<br>' .
//            'Votre inscription avec l\'adresse mail ' . $validatedData['email'] . ', '
//            . 'le logo ' . $validatedData['logo'] . ' et le site web ' . $validatedData['site_web']
//            . 'a bien été prise en compte.';
//
//        Mail::to($validatedData['email'])->send(new Inscription($title, $content));

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
}
