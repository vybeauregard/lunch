@extends('layouts.master')

@section('title')
Edit Cuisine
@stop

@section('content')

{!! Form::model($cuisine, ['method' => 'PATCH', 'action' => ['CuisineController@update', $cuisine->id]]) !!}
    <div class="form-group">
        {!! Form::label('cuisinename', 'Cuisine:', null, ['class' => 'form-label']) !!}
        {!! Form::text('cuisinename', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('active', 'Active:', null, ['class' => 'form-label']) !!}
        {!! Form::checkbox('active', null, ['class' => 'form-control']) !!}
    </div>
    {!! Form::submit('Update Place', ['class' => 'btn btn-primary form-control']) !!}
{!! Form::close() !!}

    <hr />
    {{ $cuisine->cuisinename }} places:
    @foreach ($cuisine->location as $place)
        <a href="{{ url('/location') }}/{{ $place->id }}/edit" class="btn btn-default">{{ $place->placename }}</a>
    @endforeach
@stop