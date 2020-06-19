<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Draft extends Model
{
    protected $fillable = ['is_over'];
    protected $dates = ['ends_at'];

    public function league()
    {
        return $this->belongsTo(League::class);
    }

}
