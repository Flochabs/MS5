<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    protected $table = 'leagues';

    protected $fillable = ['user_id', 'name', 'number_teams', 'public'];
}
