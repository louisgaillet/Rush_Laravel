@extends('layouts.template')
<link href="{{ asset('css/Match/single-match.css') }}" rel="stylesheet">
<link href="{{ asset('css/Match/list-match.css') }}" rel="stylesheet">
<link href="{{ asset('css/Teams/single-team.css') }}" rel="stylesheet">
@section('content')
<div class="header-team row">
	<div class="col-md-12 infos">
		<div class="header d-flex justify-content-center">
				<img src=" {{ URL('/')}}/{{ $team->flag}}" class="flag_big" alt="{{$team->country}}">
				<h3>{{$team->name}}</h3>
		</div>
		<div class="col-md-6 col-xs-12 block">
			<span class="title">Statistics : </span>
			<p><strong>Win :</strong> {{$team->win}}</p>
			<p><strong>Lose :</strong> {{$team->lose}}</p>
			<p><strong>Match played :</strong> {{$team->matchs_played}}</p>
		</div>
		<div class="col-md-6 col-xs-12">
			<span class="title">Next games : </span>
			@if ($team->matchs_receive[0]->state == 'unstarted')
			<div class="row item-match finish match ">
				<a href="/match/{{ $team->matchs_receive[0]->id }}">
					<div class="d-flex justify-content-around">
						<span class="receive"> <img src=" {{ URL('/')}}/{{ $team->matchs_receive[0]->receive_team->flag}}" class="flag_mini" alt="">{{$team->matchs_receive[0]->receive_team->country}} </span>
						<span class="date">	{{$team->matchs_receive[0]->date}}</span>
						<span class="visitor">{{$team->matchs_receive[0]->visitor_team->country}} <img src=" {{ URL('/')}}/{{ $team->matchs_receive[0]->visitor_team->flag}}" class="flag_mini" alt=""></span>
					</div>
				</a>
			</div>
			@endif

			@if ($team->matchs_visit[0]->state == 'unstarted')
			<div class="row item-match finish match ">
				<a href="/match/{{ $team->matchs_visit[0]->id }}">
					<div class="d-flex justify-content-around">
						<span class="receive"> <img src=" {{ URL('/')}}/{{ $team->matchs_visit[0]->receive_team->flag}}" class="flag_mini" alt="">{{$team->matchs_visit[0]->receive_team->country}} </span>
						<span class="date">	{{$team->matchs_visit[0]->date}}</span>
						<span class="visitor">{{$team->matchs_visit[0]->visitor_team->country}} <img src=" {{ URL('/')}}/{{ $team->matchs_visit[0]->visitor_team->flag}}" class="flag_mini" alt=""></span>
					</div>
				</a>
			</div>
			@endif
		</div>
	</div>
</div>

<div class="row">
	<div class="content-player  col-xs-12 block">
		<div>
			<span class="title"> Players </span>
		</div>
		@foreach ($team->players as $player)
		<div class="col-md-2 col-sm-4 col-xs-12 item-player">
			<figure>
				<div class="wrapper-img">
					<img src=" {{ URL('/')}}/{{ $player->picture}}" alt="{{$player->name}}">
				</div>
				<figcaption><a href="/player/{{$player->id}}">{{$player->name}}</a></figcaption>
			</figure>
		  
		</div>    
		@endforeach
	</div>
</div>
@endsection
