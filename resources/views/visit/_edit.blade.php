@extends('labcoat.master')

@section('title')
Edit Visit
@stop

@section('content')

{!! Form::model($visit, ['method' => 'PATCH', 'action' => ['VisitController@update', Carbon\Carbon::parse($visit->date)->format('U')]]) !!}
    @include('visit.form')
{!! Form::close() !!}

@stop
