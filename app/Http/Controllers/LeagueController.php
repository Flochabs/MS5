<?php

namespace App\Http\Controllers;

use App\Model\League;
use Illuminate\Http\Request;

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
        dd($request);
        $validatedData = $request->validate([
            'user_id' => 'numeric',
            'name' => 'required|max:255',
            'number_teams' => 'required|integer',
            'public' => 'required|boolean',
            'token' => 'required',
        ]);
        $show = League::create($validatedData);

//        $title = 'Confirmation d\'inscription';
//        $content = 'Bonjour, l\'entreprise ' . $validatedData['name'] . '<br>' .
//            'Votre inscription avec l\'adresse mail ' . $validatedData['email'] . ', '
//            . 'le logo ' . $validatedData['logo'] . ' et le site web ' . $validatedData['site_web']
//            . 'a bien été prise en compte.';
//
//        Mail::to($validatedData['email'])->send(new Inscription($title, $content));

        return redirect('/companies')->with('success', 'L\'entreprise a été enregistrée.');
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
