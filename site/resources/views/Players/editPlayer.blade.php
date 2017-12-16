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
{!! Form::open(array()) !!}
        <div>
          {{ Form::label('name')}}
          {{ Form::text('name', $player->name)}}
        </div>

        <div>
          {{ Form::label('height') }}
          {{ Form::number('height', $player->height)}}
        </div>

        <div>
          {{ Form::label('weight') }}
          {{ Form::number('weight', $player->weight)}}
        </div>

        <div>
            {{ Form::label('born') }}
            {{ Form::number('born', $player->born)}}
        </div>

        <div>
            {{ Form::label('Position') }}
            {{ Form::select('position', [
             'point_guard' => 'Point Gard',
             'shooting_guard' => 'Shooting guard',
             'small_forward' => 'Small forward',
             'power_forward' =>'Power forward',
             'center' =>'Center'], $player->position
          ) }}
             
        </div>
        
        <div>
            {{ Form::label('Points') }}
            {{ Form::number('points', $player->points)}}
        </div>

        <div>
            {{ Form::label('Rebounds') }}
            {{ Form::number('rebounds', $player->points)}}
        </div>

        <div>
            {{ Form::label('assists') }}
            {{ Form::number('assists', $player->points)}}
        </div>

        <div>
          {{ Form::label('Team') }}
          {{ Form::select('team_id', $teams, $team_id)}}
        </div>


        <div>
          {{ Form::submit('Update player!')}}
        </div>

{!! Form::close()!!}



@endsection