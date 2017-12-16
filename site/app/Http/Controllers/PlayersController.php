<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teams;
use App\Players;
use Validator;

class PlayersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Players/listPlayerUser',
            [
            'players' =>Players::with(['teamId'])
                ->orderBy('team_id', 'asc')
                ->get(),
            ]);
    }

     public function lists()
    {

         return view('Players/listPlayersAdmin',
            [
            'players' =>Players::with(['teamId',])
                ->orderBy('team_id', 'asc')
                ->get(),
            ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        return view('Players/addPlayer', ['teams' => Teams::pluck('country', 'id')]);
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
            'name' => 'required|max:25',
            'picture' => 'required',
            'team_id' => 'required',
            'height' => 'required',
            'weight' => 'required',
            'born' => 'required',
        ]);
         
        if ($validator->fails()) {
            return redirect('players/add')
                ->withErrors($validator);
        }else{
        	$picture=$request->file('picture');
            $upload='uploads/picture';
            $filename=$picture->getClientOriginalName();
            $success=$picture->move($upload,$filename);

            $player = new Players;

            $player->name = $request->name;
            $player->picture = $upload.'/'.$filename;
            $player->height = $request->height;
            $player->weight = $request->weight;
            $player->born = $request->born;
            $player->position = $request->position;
            $player->team_id = $request->team_id;


            $player->save();
            return redirect('players/add');
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
        return view('Players/singlePlayer',['player' =>  Players::find($n)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  
         return view('Players/editPlayer', [
            'teams' => Teams::pluck('country', 'id'),
            'player' => Players::find($id),
            'team_id' =>  Players::find($id)->teamId()->pluck('id'),
        ]);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:25',
            'team_id' => 'required',
            'height' => 'required',
            'weight' => 'required',
            'born' => 'required',
        ]);
         
        if ($validator->fails()) {
            return redirect()->route('edit-player', [$id])
                ->withErrors($validator);
        }else{
            $player = Players::find($id);
            $player->name = $request->name;
            $player->height = $request->height;
            $player->weight = $request->weight;
            $player->born = $request->born;
            $player->position = $request->position;
            $player->points = $request->points;
            $player->rebounds = $request->rebounds;
            $player->assists = $request->assists;
            $player->team_id = $request->team_id;
            $player->save();
             return redirect('players/lists/');
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
        Players::find($id)->delete();
        return redirect('players/lists/');
    }
}
