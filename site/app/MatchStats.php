<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatchStats extends Model
{
     protected $fillable = [
        'match_id', 'fault', 'triple-points', 'double-points', 'public'
    ];

    public $timestamps = false;

    public function match_stats()
	    {
	        return $this->belongsTo('App\Match', 'match_id' );
	    }
}
