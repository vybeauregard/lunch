@extends('labcoat.master')

@section('title')
Places
@stop

@section('content')
<table class="table table-striped table-bordered">
    <thead>
        <tr><th>Place</th><th>Location</th><th>Cuisine</th><th>Visits</th><th>Last Visit</th></tr>
    </thead>
<tbody>
@foreach ($places as $place)
    <tr>
        <td>
<a href="{{ url('/location') }}/{{ $place->id }}/edit">{{ $place->placename }}</a>
        </td>
        <td>{{ $place->location }}</td>
        <td>
            @foreach ($place->cuisine as $cuisine)
            <a href="{{ url('cuisine')}}/{{ $cuisine->id }}/edit">{{ $cuisine->cuisinename }}</a>@unless ($cuisine == $place->cuisine->last()),
            @endunless
            @endforeach
        </td>
        <td>{{ $place->visit->count() }}</td>
        <td>
        @foreach($place->visit as $visit)
            @if($visit === $place->visit->last())
                {{ Carbon\Carbon::parse($visit->date)->format('m/d/Y') }}
            @endif
        @endforeach
        </td>
    </tr>
@endforeach
</tbody>
</table>
@stop
