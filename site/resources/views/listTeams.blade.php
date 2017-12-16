@extends('layouts/template')
@section('content')
 <table class="table table-dark table-striped table-bordered">
  <thead class="thead-dark">
  	<tr>
      <th scope="col">Name</th>
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
  <th><a href="/team/stats/{{ $team->id }}">{{ $team->name }}</a></th>
  <td>{{ $team->country }}</td>
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
@endsection
