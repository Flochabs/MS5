<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    public function getPlayerName(){
        return $this->belongsTo(Player::class, 'player_id');
    }
}
