<?php


namespace App\CustomClass\League;


use App\Model\League;
use App\Model\Match;
use Illuminate\Console\Command;

class EndOfLeague extends Command
{
    protected $signature = 'EndOfLeague';

    public function handle()
    {
        $allMatches = Match::all()->orderBy('desc');
        dd($allMatches);
    }
}
