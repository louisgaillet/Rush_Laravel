<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatchPlayer extends Model
{
    protected $fillable = ['match_id', 'team_id', 'player_id'];
    public $timestamps = false;

    public function starters()
		{
	    	return $this->hasMany('App\Players', 'id', 'player_id');
		}


}