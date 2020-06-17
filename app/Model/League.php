<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    protected $table = 'leagues';

    protected $fillable = ['user_id', 'name', 'number_teams', 'public'];


//    /**
//     * Associe la league au créateur.
//     */
    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }

    //Associe les utilisateurs à leur league via la table pivot
    public function users()
    {
        return $this->belongsToMany('App\Model\User');
    }

    // Associe les teams à leur league
    public function teams() {
        return $this->hasMany('App\Model\Team');
    }
}
