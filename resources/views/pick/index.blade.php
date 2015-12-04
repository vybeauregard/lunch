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
        {!! Form::submit('Sounds good!', ['class' => 'btn btn-lg btn-success']) !!}
        {!! form::close() !!}
    </div>
    <div class="row">
    <div class="row"><div class="col-md-12"></div></div>
        <div class="col-md-6">
            <a href="{{ route('pick.index') }}" class="btn btn-lg btn-warning">Not feeling it.<br />What else you got?</a>
        </div>
        <div class="col-md-6">
            <a href="{{ url('/visit', Carbon\Carbon::now()->format('U')) }}/create" class="btn btn-lg btn-primary">I'm an adult.<br />I do what I want.</a>
        </div>
    </div>
@stop
