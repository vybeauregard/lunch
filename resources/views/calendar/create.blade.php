@extends('layouts.master')

@section('title')
Choose a Place!
@stop

@section('content')

<h3>{{ $visit->date->format('m/d/Y') }}</h3>
{!! Form::model('visit') !!}
    @include('calendar.form')
{!! Form::close() !!}


@stop