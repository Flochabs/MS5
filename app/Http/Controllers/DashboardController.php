<?php

namespace App\Http\Controllers;

use App\Model\Match;
use App\Model\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Récupere le pseudo de l'utilisateur
        $user_pseudo = Auth::user()->pseudo;

        //Récupere la team de l'utilisateur
        $user_team = Team::all();
       // dd($user_team);

        return view('dashboard.index')->with('user_pseudo', $user_pseudo);
    }

    public function profile()
    {
        return view('dashboard.profile');
    }

    public function  match_result()
    {
        return view('dashboard.match_result');
    }
}
