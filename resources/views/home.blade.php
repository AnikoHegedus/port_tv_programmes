@extends('app')

@section('content')

<div class="form-group">
    {!! Form::open(['action' => 'SearchController@search', 'url' => 'search', 'method' => 'POST', 'class' =>
    'row text-center text-lg-left', 'id'=>'search', 'value'=>'{{ csrf_token() }}']) !!}
    {{ Form::label('date', 'Date', array('class' => 'date')) }}
    {{ Form::date('date', \Carbon\Carbon::now()) }}
    {{ Form::submit('Search', array('class' => 'btn btn-primary')) }}
    {!! Form::close() !!}
</div>


<h3 class="text-center">{{ isset($message) ? $message : "Choose a date" }}</h3>

@endsection