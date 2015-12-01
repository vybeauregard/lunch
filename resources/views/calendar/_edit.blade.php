@extends('layouts.master')

@section('title')
Edit Visit
@stop

@section('content')

{{$visit}}
{!! Form::model($visit) !!}
    @include('calendar.form')
{!! Form::close() !!}

@stop