@extends('layouts.master')
@section('title')
Cuisine
@stop

@section('content')
{{ $cuisine->cuisinename }}
{{ $cuisine->active }}
@stop