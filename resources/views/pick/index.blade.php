@extends('layouts.master')

@section('title')
Lunch!
@stop

@section('content')
    <h3>Today's random choice:</h3>
    <h1>{{ $place->placename }} ({{ $place->location}})</h1>
    <h3>
        @foreach ($place->cuisine as $cuisine)
        {{ $cuisine->cuisinename }}@unless ($cuisine == $place->cuisine->last()),
        @endunless
        @endforeach
    </h3>
    <div class="row">
        {!! Form::model($place, ['method' => 'POST', 'action' => ['PickController@store']]) !!}
        {!! Form::hidden('place_id', $place->id) !!}
        {!! Form::hidden('date', Carbon\Carbon::now()->format('Y-m-d')) !!}
        {!! Form::submit('Sounds good!', ['class' => 'btn btn-lg btn-primary']) !!}
        {!! form::close() !!}
    </div>
    <hr />
    <div class="row">
        <a href="{{ route('pick.index') }}" class="btn btn-lg btn-primary">I'm not feeling it. What else you got?</a>
    </div>
    <hr />
    <div class="row">
        <a href="{{ url('/visit', Carbon\Carbon::now()->format('U')) }}/create" class="btn btn-lg btn-primary">I'm an adult. I do what I want.</a>
    </div>
@stop
