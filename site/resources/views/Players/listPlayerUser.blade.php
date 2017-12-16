@extends('layouts.template')
@section('content')
 <table class="table table-dark table-striped table-bordered">
  <thead class="thead-dark">
  	<tr>
      <th scope="col">Name</th>
      <th scope="col">Picture</th>
      <th scope="col">height</th>
      <th scope="col">weight</th>
      <th scope="col">birth date</th>
      <th scope="col">position</th>
      <th scope="col">points</th>
      <th scope="col">rebounds</th>
      <th scope="col">assists</th>
      <th scope="col">Team</th>
    </tr>
  </thead>
  <tbody>

@foreach ($players as $player)
   
<tr>
  	<td>{{ $player->name }}</td>
  	<td><img src=" {{ URL('/')}}/{{ $player->picture}}" class="flag_mini" alt=""></td>
	<td>{{$player->height}}</td>
	<td>{{$player->weight}}</td>
	<td>{{$player->born}}</td>
	<td>{{$player->position}}</td>
	<td>{{$player->points}}</td>
	<td>{{$player->rebounds}}</td>
	<td>{{$player->assists}}</td>
	<td> <img src=" {{ URL('/')}}/{{ $player->teamId->flag}}" class="flag_mini" alt=""></td>
</tr>
  
     
@endforeach
 </tbody>
</table>
@endsection
