@extends('layouts.template')

@section('content')

{!! Form::open(array('url' => 'teams/add', 'files' => true)) !!}
        
        <div>
          {{ Form::label('Country')}}
          {{ Form::text('country')}}
        </div>

        <div>
          {{ Form::label('Name')}}
          {{ Form::text('name')}}
        </div>
        
        <div>
            {{ Form::label('Flag') }}
            {{ Form::file('flag')}}        
        </div>

        <div>
          {{ Form::label('Win') }}
          {{ Form::number('win', 0)}}
        </div>

        <div>
          {{ Form::label('Lose') }}
          {{ Form::number('lose', 0)}}
        </div>

        <div>
            {{ Form::label('matchs_played') }}
            {{ Form::number('matchs_played', 0)}}
        </div>

        <div>
          {{ Form::label('goals Against') }}
          {{ Form::number('goals_against', 0)}}
        </div>

        <div>
            {{ Form::label('goals Scored') }}
            {{ Form::number('goals_scored', 0)}}  
        </div>

        <div>
          {{ Form::submit('Create Team!')}}
        </div>

{!! Form::close() !!}
@endsection