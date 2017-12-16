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
<div class="row edit-match">
	<div class="col-xs-12">
		<div class="col-md-4 col-xs-12">
			{{ Form::label('Match date') }}
          	{{ Form::date('date', \Carbon\Carbon::now()) }}
		</div>
		<div class="col-md-4 col-xs-12">
			{{ Form::label('Place') }}
        	{{ Form::text('place',$match->place ) }}
		</div>
		<div class="col-md-4 col-xs-12">
			{{ Form::label('Status') }}
			@if ($match->state == 'finish')
				<span>Finish</span>
			@else
			Unstarded
				{{ Form::radio('state','unstarted', true) }}
				Finish
				{{ Form::radio('state','finish') }}
			@endif
		</div>
    </div>

   
	<div class="col-md-6 column-team ">
		 <div>
			<h2>{{$receive_team->country}} <img src=" {{ URL('/')}}/{{ $receive_team->flag}}" class="flag_mini" alt=""></h2>
	    </div>
	    <div class="starters_receive starters-wrapper">
	    	<span class="title"> Starters</span>
	    	<div class="row starters">
				{!! Multiselect::select(
					'starters_receive',
					 $players_receive_team,
					 $starters_receive
					)
				!!}
	    	</div>    
				
	    </div>
	</div>
	
	
	<div class="col-md-6 column-team">
		<h2>{{$visitor_team->country}} <img src=" {{ URL('/')}}/{{ $visitor_team->flag}}" class="flag_mini" alt=""></h2>
		<div class="starters_visitor starters-wrapper">
			<span class="title"> Starters</span>
			<div class="row  starters">
				{!! Multiselect::select(
					'starters_visitor',
					 $players_visitor_team,
					 $starters_visitor
					)
				!!}
			</div>
		</div>
	</div>


@if ($match->state == 'finish')
	<div class="stats col-md-4 offset-md-4 col-xs-12">
		<h2>Game statistics</h2>
		<div>
          {{ Form::label('Score') }}
          {{ Form::text('score', isset($match->score) ? $match->score : ''  )}}
        </div>
		<div>
          {{ Form::label('Fault') }}
          {{ Form::number('fault', isset($match->statistics[0]) ? $match->statistics[0]['fault'] : ''  )}}
        </div>

        <div>
          {{ Form::label('Triple points') }}
          {{ Form::number('triple_points', isset($match->statistics[0]) ? $match->statistics[0]['triple_points'] : ''  )}}
        </div>

        <div>
          {{ Form::label('Double points') }}
          {{ Form::number('double_points', isset($match->statistics[0]) ? $match->statistics[0]['double_points'] : ''  )}}
        </div>

        <div>
          {{ Form::label('public') }}
          {{ Form::number('public', isset($match->statistics[0]) ? $match->statistics[0]['public'] : ''  )}}
        </div>
	</div>
@endif
	
	<div class="col-xs-12 text-center" style="margin-top:2rem">
          {{ Form::submit('update Match!')}}
    </div>
</div>
{!! Form::close()!!}
@endsection