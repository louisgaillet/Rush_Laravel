@extends('layouts.template')
<link href="{{ asset('css/Match/single-match.css') }}" rel="stylesheet">
 <link href="{{ asset('css/Match/list-match.css') }}" rel="stylesheet">
@section('content')

<div class="detail-match match">
	<div class="d-flex justify-content-around header-match">
		<span class="receive"> <img src=" {{ URL('/')}}/{{ $match->receive_team->flag}}" class="flag_big" alt="">{{$match->receive_team->country}} </span>
	@if ($match->state == 'finish')
		<span class="score and-place d-flex flex-column">
			<p>{{$match->score}}</p>
			<p class="date">{{$match->date}}</p>
			<p class="place">{{$match->place}}</p>
		</span>
	@else
		<span class="date and-place d-flex flex-column">
			<p>{{$match->date}}</p>
			<p class="place">{{$match->place}}</p>
		</span>
	@endif
		<span class="visitor">{{$match->visitor_team->country}} <img src=" {{ URL('/')}}/{{ $match->visitor_team->flag}}" class="flag_big" alt=""></span>
	</div>

	<div class="row">
		<div class="col-md-4">
			<div class="titulaires">
				<span class="title">Sarters</span>
				@foreach ($starters_receive as $players)
					@foreach ($players->starters as $player)
					<div class="item-player d-flex justify-content-between">
						<div class="d-flex">
							<span class="picture"><img src="http://localhost:8000/{{$player->picture}}" alt="{{$player->name}}"></span>
							<span class="name">{{$player->name}}</span>
						</div>
						<span class="position">{{$player->position}}</span>
					</div>
							
					@endforeach
				@endforeach
			</div>
		</div>
		<div class="col-md-4 bests-players and-stats ">
			@if(isset($match->statistics[0]->fault))
			<div>
					<span class="title">Match Stats</span>
			</div>
				<div class="col-md-12 col-xs-12  stats stats_after_match">
					<p><span class="stats-label">Fault <i class="fa fa-long-arrow-right" aria-hidden="true"></i></span> <span class="value">{{$match->statistics[0]->fault}}</span> </p>
					<p><span class="stats-label">3x <i class="fa fa-long-arrow-right" aria-hidden="true"></i></span> <span class="value">{{$match->statistics[0]->triple_points}}</span> </p>
					<p><span class="stats-label">2x <i class="fa fa-long-arrow-right" aria-hidden="true"></i></span> <span class="value">{{$match->statistics[0]->double_points}}</span> </p>
					<p><span class="stats-label">Public <i class="fa fa-long-arrow-right" aria-hidden="true"></i></span> <span class="value">{{$match->statistics[0]->public}}</span> </p>
				</div>
			@else
			<div>
					<span class="title">Teams best player</span>
			</div>
			<div class="col-md-12 col-xs-12 d-flex item_best_player">
				<span class="picture col-md-6 col-xs-12"><img src="http://localhost:8000/{{$match->receive_team_players[0]->picture}}" alt="{{$match->receive_team_players[0]->name}}"></span>
				<span class="stats col-md-6 col-xs-6">
					<p class="name ">{{$match->receive_team_players[0]->name}}</p>
					<p class="scored"><span class="chiffre">{{$match->receive_team_players[0]->points}}</span> Pts</p>
				</span>
			</div>
			<div class="col-md-12 col-xs-12 d-flex row-reverse best_visitor item-best-player">
				<span class="picture col-md-6 col-xs-12"><img src="http://localhost:8000/{{$match->visitor_team_players[0]->picture}}" alt="{{$match->visitor_team_players[0]->name}}"></span>
				<span class="stats col-md-6 col-xs-6">
					<p class="name ">{{$match->visitor_team_players[0]->name}}</p>
					<p class="scored"><span class="chiffre">{{$match->visitor_team_players[0]->points}}</span> Pts</p>
				</span>
			</div>
			@endif
		</div>
		<div class="col-md-4 ">
			<div class="titulaires">
				<span class="title">Sarters</span>
				@foreach ($starters_visitor as $players)
					@foreach ($players->starters as $player)
					<div class="item-player d-flex justify-content-between">
						<div class="d-flex">
							<span class="picture"><img src="http://localhost:8000/{{$player->picture}}" alt="{{$player->name}}"></span>
							<span class="name">{{$player->name}}</span>
						</div>
						<span class="position">{{$player->position}}</span>
					</div>
							
					@endforeach
				@endforeach
			</div>
		</div>
	</div>


	<div class="row classements">
		<h2 class="title-1">Olympic's ranking</h2>
		<table class="table table-dark table-striped table-bordered">
		  <thead class="thead-dark">
		  	<tr>
		      <th scope="col">#</th>
		      <th scope="col">Country</th>
		      <th scope="col">Flag</th>
		      <th scope="col">Win</th>
		      <th scope="col">Lose</th>
		      <th scope="col">Match_played</th>
		      <th scope="col">Goals_against</th>
		      <th scope="col">Goals_Scored</th>

		    </tr>
		  </thead>
		  <tbody>

		@foreach ($teams as $team)
		   
		<tr>
		  <th>{{ $team->id }}</th>
		  <td><a href="/team/stats/{{ $team->id }}">{{ $team->country }}</a></td>
		  <td><img src=" {{ URL('/')}}/{{ $team->flag}}" class="flag_mini" alt=""></td>
		  <td>{{ $team->win }}</td>
		  <td>{{ $team->lose }}</td>
		  <td>{{ $team->matchs_played }}</td>
		  <td>{{ $team->goals_against }}</td>
		  <td>{{ $team->goals_scored }}</td>
		</tr>
		  
		     
		@endforeach
		 </tbody>
		</table>
	</div>
</div>

@endsection