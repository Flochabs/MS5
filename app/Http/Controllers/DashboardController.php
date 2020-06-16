<?php

namespace App\Http\Controllers;

use App\Model\Match;
use App\Model\Player;
use App\Model\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\User;

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
        $user_id = Auth::user()->id;
        return view('dashboard.index')->with('user_id', $user_id);
    }

    public function profile($id)
    {
        $user = User::where('id', '=', $id)->first();
        return view('dashboard.profile', compact('user'));
    }

    public function  match_result()
    {
        return view('dashboard.match_result');
    }

}
