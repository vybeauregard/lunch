@extends('labcoat.master')

@section('title')
Cuisine
@stop

@section('content')
<table class="table table-striped table-bordered">
    <thead><tr><th>Type</th><th>Number of Restaurants</th></tr></thead>
    <tbody>
@foreach ($cuisines as $cuisine)
        <tr>
            <td><a href="{{ url('/cuisine/')}}/{{ $cuisine->id}}/edit">{{ $cuisine->cuisinename}}</a></td>
            <td>{{ $cuisine->location->count() }}</td>
        </tr>
@endforeach
    </tbody>
</table>
@stop
