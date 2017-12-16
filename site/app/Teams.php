<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    protected $fillable = ['country', 'name','flag', 'win', 'lose', 'matchs_played', 'goals_against', 'goals_scored'];
    public $timestamps = false;

    public function players()
	{
	    return $this->hasMany('App\Players', 'team_id');
	}

	public function matchs_receive()
	{
		return $this->hasMany('App\Matchs', 'id_receive_team');
	}

	public function matchs_visit()
	{
		return $this->hasMany('App\Matchs', 'id_visitor_team');
	}
}


