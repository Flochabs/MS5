<?php

namespace App\Http\Controllers;

use App\Model\Match;
use App\Model\Player;
use App\Model\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MatchController extends Controller
{

    public function index()
    {
        return view('match.index');
    }
}
