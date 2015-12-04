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
                    @elseif(Carbon\Carbon::parse($date)->isToday())
                    <a href="{{ url('/visit', Carbon\Carbon::parse($date)->format('U')) }}/create" class="btn btn-default">Help me pick!</a>
                    @elseif(Carbon\Carbon::parse($date) < Carbon\Carbon::now())
                        <a href="{{ url('/visit', Carbon\Carbon::parse($date)->format('U')) }}/create" class="btn btn-default">Catch Up!</a>
                        @endif
                    @endif
            @endif
        @endforeach
    </tbody></table>
    <div class="row">
        <div class="col-md-2">
<a href="{{ url('/calendar', Carbon\Carbon::parse($datelist[0])->subDays(20)->format('U')) }}" class="btn btn-primary pull left">&lt; Previous Week</a>
        </div>
        <div class="col-md-8"></div>
        <div class="col-md-2">
@if(Carbon\Carbon::parse($date)->isPast())

<a href="{{ url('/calendar', Carbon\Carbon::parse($datelist[20])->addDay()->format('U')) }}" class="btn btn-primary pull right">Next Week &gt;</a>

@endif
    </div>
</div>
@stop
