@extends('labcoat.master')

@section('title')
Choose a Place!
@stop

@section('content')

<h3>{{ Carbon\Carbon::parse($visit->date)->format('m/d/Y') }}</h3>
{!! Form::model($visit, ['method' => 'POST', 'action' => ['VisitController@store']]) !!}
    {!! Form::hidden('date', $visit->date) !!}
    @include('visit.form')
{!! Form::close() !!}


@stop
