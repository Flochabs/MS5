<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    protected $table = 'leagues';

    protected $fillable = ['user_id', 'name', 'number_teams', 'public'];


//    /**
//     * Associe la league à l'utilisateur via la table pivot.
//     */
    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }

    public function users()
    {
        return $this->belongsToMany('App\Model\User');
    }
}
