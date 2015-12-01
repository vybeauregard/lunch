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
                    <h3>{{Carbon\Carbon::parse($date)->format('m/d/Y')}}</h3>
                    @if(Carbon\Carbon::parse($date)->dayOfWeek == Carbon\Carbon::SATURDAY)
                        <h3>{{ Carbon\Carbon::parse($date)->addDay()->format('m/d/Y') }}</h3>
                        Weekend!
                        </td>
                    </tr>
                    @elseif($visits->has($date))
                        <a href="{{ url('/visit/')}}/{{ Carbon\Carbon::parse($date)->format('U') }}/edit">{{ $visits[$date]->place->placename }}</a><br />
                        ({{ $visits[$date]->place->location }})
                    </td>
                    @else
                        <a href="{{ url('/visit/')}}/{{ Carbon\Carbon::parse($date)->format('U') }}/create" class="btn btn-default">Choose!</a>
                    @endif
            @endif
        @endforeach
    </tbody></table>
@stop
