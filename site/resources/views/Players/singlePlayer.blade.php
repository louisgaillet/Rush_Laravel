@extends('layouts.template')

@section('content')
	{{$player->name}}
	{{$player->picture}}
	{{$player->height}}
	{{$player->weight}}
	{{$player->born}}
	{{$player->position}}
	{{$player->team_id}}
@endsection
