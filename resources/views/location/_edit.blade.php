@extends('labcoat.master')

@section('title')
Edit Location
@stop

@section('content')

{!! Form::model($place, ['method' => 'PATCH', 'action' => ['LocationController@update', $place->id]]) !!}
    @include('location.form')
{!! Form::close() !!}
@stop
