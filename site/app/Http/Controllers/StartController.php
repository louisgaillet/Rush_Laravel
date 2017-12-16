<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teams;
use App\Players;

class StartController extends Controller
{
    public function index()
    {
    	$teams = Teams::with(['matchs_receive.receive_team', 'matchs_visit.visitor_team','players'])->get();
        $teams;
        return view('welcome',[
            'team' =>  $teams
        ]);
       
    }
}
