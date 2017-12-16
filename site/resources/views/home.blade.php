@extends('layouts.app') @section('content')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/login.css">
  <title>Login | HelloBasketBall</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Dashboard</div>

          <div class="panel-body">
            @if (session('status'))
            <div class="alert alert-success">
              {{ session('status') }}
            </div>
            @endif Welcome !
          </div>
        </div>
         @admin
          <div>
            <a href="{{ url ('teams/add') }}"><button class="btn btn-info">Manage a team</button></a>
            <a href="{{ url ('players/add') }}"><button class="btn btn-info">Manage a player</button></a>
            <a href="{{ url ('match/add') }}"><button class="btn btn-info">Add a game</button></a>
            <a href="{{ url ('matchs') }}"><button class="btn btn-info">Watch a game</button></a>
          </div>
        @endadmin
      </div>   
    </div>
  </div>
</body>

</html>

@endsection