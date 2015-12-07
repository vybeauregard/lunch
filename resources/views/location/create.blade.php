@extends('labcoat.master')

@section('title')
Create Location
@stop

@section('content')
    <h1>Add a Place</h1>
    <hr />
    {!! Form::open(['method' => 'POST', 'action' => 'LocationController@store']) !!}
    @include('location.form');
    {!! Form::close() !!}
@stop
