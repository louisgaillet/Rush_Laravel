<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teams;
use App\Players;
use App\Matchs;
use App\MatchPlayer;
use App\MatchStats;
use Validator;


class MatchsController extends Controller
{
    
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //$matchs =Matchs::with('id_receive_team')->receive_team()->first()->country;
    $matchs = Matchs::with(['receive_team', 'visitor_team'])
                ->orderBy('state', 'asc')
                ->get();

       return view('Matchs/index', 
            [
            'matchs' => $matchs
            ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        return view('Matchs/addMatch', ['teams' => Teams::pluck('country', 'id', 'flag')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	//dd($request);
    	$match = Matchs::create($request->all());
    	$id = $match->id;
        $MatchStats = MatchStats::create([
            'match_id' => $id]);
    	return redirect()->route('configuration-match', [$match->id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($n)
    {
        $match = Matchs::with([
                        'statistics',
                        'receive_team',
                        'visitor_team',
                        'receive_team_players' => function ($q) { $q->orderBy("points", "desc");},
                        'visitor_team_players'  => function ($q) { $q->orderBy("points", "desc");}
                    ])->find($n);
        $starters_receive= MatchPlayer::where('match_id', $n)
                ->with(['starters'])
                ->where('team_id', $match->id_receive_team)
                ->get();
        $starters_visitor= MatchPlayer::where('match_id', $n)
                ->with(['starters'])
                ->where('team_id', $match->id_visitor_team)
                ->get();
         $classement = Teams::orderBy("win", "desc")->get();

       return view('Matchs/showMatch', 
            [
            'match' => $match,
            'starters_receive' => $starters_receive,
            'starters_visitor' =>$starters_visitor,
            'teams' => $classement
            ]); 
    }


    /**
     * Configuration the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function configuration($n)
    {
    	$id_receive_team = Matchs::find($n)->id_receive_team;
    	$id_visitor_team = Matchs::find($n)->id_visitor_team;
        $match = Matchs::with(['statistics'])->find($n);
        $starters_receive = Players::whereIn('id',explode(",", $match->starters_receive))->pluck('id');
        $starters_visitor = Players::whereIn('id',explode(",", $match->starters_visitor))->pluck('id');
        $players_receive_team = Players::where('team_id', $id_receive_team)->pluck('name', 'id');
        $players_visitor_team = Players::where('team_id', $id_visitor_team)->pluck('name', 'id');
        
        
        return view('Matchs/configurationMatch',[
        	'match' =>  $match,
        	'receive_team'=>Teams::find($id_receive_team), 
        	'visitor_team'=>Teams::find($id_visitor_team),
        	'players_receive_team'=>$players_receive_team,
            'starters_receive'=> $starters_receive,
        	'players_visitor_team'=>$players_visitor_team,
            'starters_visitor'=> $starters_visitor,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($n)
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
        
        // Verif
        $match=Matchs::find($id);
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'place' => 'required',
            'starters_receive' => 'required',
            'starters_visitor' => 'required',
        ]);
         
        if ($validator->fails()) {
            return redirect()->route('configuration-match', [$id])
                ->withErrors($validator);
        }else{

            $match->date = $request->date;
            if($request->state != null)
                $match->state =  $request->state;
            else{
                $match->state = 'finish';
            }
            if($request->score)
                $match->score =  $request->score;
            else{
                $match->score = NULL;
            }
            //dd($request->starters_receive);
            $match->starters_receive =  implode(',',$request->starters_receive);
            $match->starters_visitor =  implode(',',$request->starters_visitor);
            $match->save();
            MatchPlayer::where('match_id', $id)->delete();
            $dataSet = [];
            foreach ($request->starters_receive as $starter) {
            $dataSet[] = [
                    'match_id'  => $id,
                    'team_id'    => $match->id_receive_team,
                    'player_id'       => $starter,
                ];
            }
            MatchPlayer::insert($dataSet);
            $dataSet = [];
            foreach ($request->starters_visitor as $starter) {
                $dataSet[] = [
                    'match_id'  => $id,
                    'team_id'    => $match->id_visitor_team,
                    'player_id'       => $starter,
                ];
            }
            MatchPlayer::insert($dataSet);

            $MatchStats = MatchStats::where('match_id',$id)->update([
                'fault'=>$request->fault,
                'triple_points'=>$request->triple_points,
                'double_points'=>$request->double_points,
                'public'=>$request->public,
            ]);;


            return redirect()->route('configuration-match', [$id])
                            ->with('success','Match updated successfully');
        }
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
