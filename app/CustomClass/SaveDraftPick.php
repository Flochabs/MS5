<?php


namespace App\CustomClass;


use App\Model\Auction;
use App\Model\Player;
use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\Date;

class SaveDraftPick extends Command
{
    protected $signature = 'SaveDraftPick';

    public function handle()
    {
        $auctions = Auction::orderBy('auction', 'desc')->get();
        $now = new \DateTime();

        foreach ($auctions as $auction){
            $limitTime = new \DateTime($auction->auction_time_limit);
            if($auction->bought === 0 && $limitTime <= $now) {
                //$auction->update(['bought' => 1]);
                $player = Player::where('id', $auction->player_id)->get()->first();

                $player->teams()->attach($auction->team_id);
            }
        }

    }
}
