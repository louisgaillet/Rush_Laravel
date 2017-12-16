<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Players extends Model
{
    protected $fillable = ['name', 'picture', 'height', 'weight', 'born', 'position', 'team_id', 'points', 'rebounds', 'assists'];
    public $timestamps = false;

    public function teamId()
	    {
	        return $this->belongsTo('App\Teams', 'team_id','id');

	    }

}
