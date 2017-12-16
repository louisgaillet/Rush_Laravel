<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/laravel-multiselect.css') }}" rel="stylesheet">
  <script src="https://use.fontawesome.com/0622a1b619.js"></script>

</head>
<body>

<nav class="navbar navbar-toggleable-md navbar-light bg-faded shadow">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="{{route('start')}}">HelloSport</a>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="nav navbar-nav navbar-right">
        <li class="nav-item"><a href="{{route('teams')}}" class="nav-link {{ currentRoute(route('teams')) }}">Teams</a></li>
        <li class="nav-item"><a href="{{route('players')}}" class="nav-link {{ currentRoute(route('players')) }}">Players</a></li>
        <li class="nav-item"><a href="{{route('list-matchs')}}" class="nav-link {{ currentRoute(route('list-matchs')) }}">Matchs</a></li>
        @admin
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuAdmin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Manager
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuAdmin">
             <a href="{{route('add-team')}}" class="nav-link {{ currentRoute(route('add-team')) }}">Add team</a>
             <a href="../players/add" class="nav-link ">Add player</a>
             <a href="{{route('list-player-admin')}}" class="nav-link {{ currentRoute(route('list-player-admin')) }}">Gestion players</a>
             <a href="{{route('add-match')}}" class="nav-link {{ currentRoute(route('add-match')) }}">Add match</a>
             <a href="{{route('list-matchs')}}" class="nav-link {{ currentRoute(route('list-matchs')) }}">Gestion match</a>
          </div>
         </li>
        @endadmin
        <!-- Authentication Links -->
        @guest
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
        @else
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Logout
          </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
         <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
        </div>
      </li>
        @endguest
        
    </ul>

  </div>
</nav>


	
<div class="container">
  @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
  @endif
	@yield('content')
</div>


</body>

<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script src="{{ asset('js/global.js') }}"></script>
<script src="{{ asset('js/multiselect.js') }}"></script>
</html>