@extends('app')

@section('content')

        <div class="form-group">
        {!! Form::open(['action' => 'SearchController@show', 'url' => 'show', 'method' => 'POST', 'class' =>
            'row text-center text-lg-left', 'id'=>'show', 'value'=>'{{ csrf_token() }}']) !!}
            {{ Form::label('channel', 'Channel', array('class' => 'channel')) }}
            {{ Form::select('channel_channel', $channels, array('class' => 'channel') ) }}
            {{ Form::submit('Show', array('class' => 'btn btn-primary')) }}
            {!! Form::close() !!}
        </div>

        <h3 class="text-center">{{ isset($message) ? $message : "" }}</h3>

        <div class="row">
            @if(isset($programmes))
            @foreach ($programmes as $programme)

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $programme["title"] . " - " .  $programme["age_limit"]}}</h4>
                        <p>{{ "Starts at: " . $programme["start"] }}</p>
                        <p>{{ $programme["description"] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <h3 class="text-center">{{ isset($message) ? "" : "Choose a date" }}</h3>
            @endif
        </div>
@endsection
