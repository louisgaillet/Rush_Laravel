<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teams;
use App\Players;
use Validator;


class TeamsController extends Controller
{
    public $table = 'Teams';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('listTeams', ['teams' => Teams::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('Teams');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'country' => 'required'
        ]);
         
        if ($validator->fails()) {
            return redirect('teams/add')
                ->withErrors($validator);
        }else{

            $flag=$request->file('flag');
            $upload='uploads/flags';
            $filename=$flag->getClientOriginalName();
            $success=$flag->move($upload,$filename);

            $team = new Teams;
            $team->name = $request->name;
            $team->country = $request->country;
            $team->flag = $upload.'/'.$filename;
            $team->win = $request->win;
            $team->lose = $request->lose;
            $team->matchs_played = $request->matchs_played;
            $team->goals_against = $request->goals_against;
            $team->goals_scored = $request->goals_scored;

            $team->save();
            return redirect('teams');
        }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($n)
    {
        
        // return view('SingleTeam',['team' =>  Teams::find($n), 'players' =>Players::where('team_id', $n)->get()]);

        $teams = Teams::with(['matchs_receive.receive_team', 'matchs_visit.visitor_team','players'])->find($n);
        $teams;
        return view('SingleTeam',[
            'team' =>  $teams
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
