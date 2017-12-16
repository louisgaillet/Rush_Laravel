@extends('layouts.template')

@section('content')
{!! Form::open(array('url' => 'match/add')) !!}
        
        <div>
          {{ Form::label('Receive Team') }}
          {{ Form::select('id_receive_team', $teams), 1}}
        </div>

        <div>
          {{ Form::label('Visitor Team') }}
          {{ Form::select('id_visitor_team', $teams), 1}}
        </div>

        <div>
          {{ Form::label('Match date') }}
          {{ Form::date('date', \Carbon\Carbon::now()) }}
        </div>

          <div>
          {{ Form::label('Place') }}
          {{ Form::text('place') }}
        </div>


        <div>
          {{ Form::submit('Create Match!')}}
        </div>

{!! Form::close()!!}



@endsection