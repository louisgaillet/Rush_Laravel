@extends('layouts.template')
 <link href="{{ asset('css/Match/list-match.css') }}" rel="stylesheet">
@section('content')
<div class="col-md-6 col-xs-12 offset-md-3 list-matchs">
	<h3>Olympic program's</h3>
	@foreach ($matchs as $match)
	@if ($match->state == 'finish')
	<div class="row item-match finish match item-match-admin">
	@else
	<div class="row item-match match item-match-admin">
	@endif
	@admin
	
			<div class="d-flex justify-content-around ">
				<span class="edit"><a href="/match/configuration/{{ $match->id }}">Edit</a></span>
				<span class="receive"> <img src=" {{ URL('/')}}/{{ $match->receive_team->flag}}" class="flag_mini" alt="">{{$match->receive_team->country}} </span>
				@if ($match->state == 'finish')
				<span class="score">{{$match->score}}</span>
				@else
				<span class="date">	{{$match->date}}</span>
				@endif
				<span class="visitor">{{$match->visitor_team->country}} <img src=" {{ URL('/')}}/{{ $match->visitor_team->flag}}" class="flag_mini" alt=""></span>
				<span class="view"><a href="/match/{{ $match->id }}">View</a></span>
			</div>
		</div>
	@else
		<a href="/match/{{ $match->id }}">
			<div class="d-flex justify-content-around">
				<span class="receive"> <img src=" {{ URL('/')}}/{{ $match->receive_team->flag}}" class="flag_mini" alt="">{{$match->receive_team->country}} </span>
				@if ($match->state == 'finish')
				<span class="score">{{$match->score}}</span>
				@else
				<span class="date">	{{$match->date}}</span>
				@endif
				<span class="visitor">{{$match->visitor_team->country}} <img src=" {{ URL('/')}}/{{ $match->visitor_team->flag}}" class="flag_mini" alt=""></span>
			</div>
		</a>
	</div>
	@endadmin
	@endforeach
</div>

@endsection