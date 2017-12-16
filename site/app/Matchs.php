<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matchs extends Model
{
    protected $fillable = ['id_receive_team', 'id_visitor_team', 'date', 'place', 'starters_receive', 'starters_visitor', 'state'];
    public $timestamps = false;


    
	public function receive_team()
	    {
	        return $this->belongsTo('App\Teams', 'id_receive_team');
	    }

	
	public function visitor_team()
	    {
	        return $this->belongsTo('App\Teams', 'id_visitor_team');

	    }

	public function receive_team_players(){
	 	return $this->hasMany('App\Players','team_id','id_receive_team' );
	 	}

	public function visitor_team_players(){
	 	return $this->hasMany('App\Players','team_id','id_visitor_team' );
	 	}

	public function statistics(){
		return $this->hasMany('App\MatchStats', 'match_id');
	}


	 








	


}


