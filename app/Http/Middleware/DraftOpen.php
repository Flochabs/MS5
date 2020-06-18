<?php

namespace App\Http\Middleware;

use App\Model\Draft;
use Closure;

// middleware qui empeche l'accès à la draft si la ligue n'est lancée
class DraftOpen
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // récupération des infos sur la liguqe de l'utilisateur pour savoir quand la draft prend fin
        if($request->user()) {
            if($request->user()->league->id){

                if($request->user()->team){

                    $leagueId = $request->user()->league->id;
                    $draft = Draft::where('league_id', $leagueId)->first();
                    $draftEnds = $draft->is_over;
                    if($request->user()->league->isActive === 1 && $draftEnds === 0 ) {

                        return $next($request);
                    }
                    return redirect()->back();
                }
                return redirect()->back();
            }
            return redirect()->back();
        }
            return redirect()->back();
    }

}
