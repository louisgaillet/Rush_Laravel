@extends('layouts.template')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{!! Form::open(array('url' => 'players/add', 'files' => true)) !!}
        
        <div>
          {{ Form::label('name')}}
          {{ Form::text('name')}}
        </div>
        
        <div>
            {{ Form::label('picture') }}
            {{ Form::file('picture')}}         
        </div>

        <div>
          {{ Form::label('height') }}
          {{ Form::number('height')}}
        </div>

        <div>
          {{ Form::label('weight') }}
          {{ Form::number('weight')}}
        </div>

        <div>
            {{ Form::label('Birth year') }}
            {{ Form::number('born')}}
        </div>

        <div>
            {{ Form::label('Position') }}
            {{ Form::select('position', [
             'point_guard' => 'Point Gard',
             'shooting_guard' => 'Shooting guard',
             'small_forward' => 'Small forward',
             'power_forward' =>'Power forward',
             'center' =>'Center']
          ) }}
             
        </div>

        <div>
          {{ Form::label('Team') }}
          {{ Form::select('team_id', $teams), 1}}
        </div>


        <div>
          {{ Form::submit('Create Player!')}}
        </div>

{!! Form::close()!!}



@endsection