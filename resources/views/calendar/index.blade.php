@extends('layouts.master')

@section('title')
Lunch!
@stop

@section('content')
    <h5>Select a Day.</h5>
    <table class="table table-bordered"><tbody>
        <tr>
        @foreach ($datelist as $date)
            @if(Carbon\Carbon::parse($date)->dayOfWeek == Carbon\Carbon::SUNDAY)
                <tr>
            @else
                <td>
                    @if(Carbon\Carbon::parse($date)->dayOfWeek == Carbon\Carbon::SATURDAY)
                        <h4>{{Carbon\Carbon::parse($date)->format('m/d/Y')}}</h4>
                        <h4>{{ Carbon\Carbon::parse($date)->addDay()->format('m/d/Y') }}</h4>
                        Weekend!
                        </td>
                    </tr>
                    @else
                        <h3>{{Carbon\Carbon::parse($date)->format('m/d/Y')}}</h3>
                        @if($visits->has($date))
                        <a href="{{ url('/visit', Carbon\Carbon::parse($date)->format('U')) }}/edit">{{ $visits[$date]->place->placename }}</a><br />
                        ({{ $visits[$date]->place->location }})
                    </td>
                    @elseif(Carbon\Carbon::parse($date) < Carbon\Carbon::now())
                        <a href="{{ url('/visit', Carbon\Carbon::parse($date)->format('U')) }}/create" class="btn btn-default">Choose!</a>
                        @endif
                    @endif
            @endif
        @endforeach
    </tbody></table>
<a href="{{ url('/calendar', Carbon\Carbon::parse($datelist[0])->subDay()->format('U')) }}" class="btn btn-primary pull left">&lt; Previous Week</a>
@if(Carbon\Carbon::parse($date)->isPast())
<a href="#" class="btn btn-primary pull right">Next Week &gt;</a>
@endif
@stop
