@extends('layouts.master')

@section('title')
Lunch!
@stop

@section('content')
    <h5>Select a Day.</h5>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-header">
                <tr>
                    @for($i = 0; $i < 5; $i++)
                        <th>{{ Carbon\Carbon::parse($datelist[$i])->format('l')}}</th>
                        @if(Carbon\Carbon::parse($datelist[$i])->dayOfWeek == Carbon\Carbon::FRIDAY)
                        <th>Weekend</th>
                        @endif
                    @endfor
                </tr>
            </thead>
            <tbody>
            @foreach ($datelist as $date)
                @if(Carbon\Carbon::parse($date)->dayOfWeek == Carbon\Carbon::MONDAY)
                    <tr>
                @endif
                @if(Carbon\Carbon::parse($date)->dayOfWeek == Carbon\Carbon::SATURDAY)
                    <td>
                        <h4>{{Carbon\Carbon::parse($date)->format('m/d/Y')}}</h4>
                        <h4>{{ Carbon\Carbon::parse($date)->addDay()->format('m/d/Y') }}</h4>
                        Weekend!
                    </td>
                </tr>
                @elseif(Carbon\Carbon::parse($date)->dayOfWeek != Carbon\Carbon::SUNDAY)
                    <td>
                        <h3>{{Carbon\Carbon::parse($date)->format('m/d/Y')}}</h3>
                        @if($visits->has($date))
                        <a href="{{ url('/visit', Carbon\Carbon::parse($date)->format('U')) }}/edit">
                            {{ $visits[$date]->place->placename }}</a><br />({{ trim($visits[$date]->place->location) }})
                        @elseif(Carbon\Carbon::parse($date)->isToday())
                            <a href="{{ url('pick') }}" class="btn btn-default">Help me pick!</a>
                        @elseif(Carbon\Carbon::parse($date) < Carbon\Carbon::now())
                            <a href="{{ url('/visit', Carbon\Carbon::parse($date)->format('U')) }}/create"
                                class="btn btn-default">Catch Up!</a>
                        @endif
                    </td>
                @endif {{-- weekdays --}}
            @endforeach {{-- datelist as date --}}
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-md-2 pull-left">
            <a href="{{ url('/calendar', Carbon\Carbon::parse($datelist[0])->subDays(20)->format('U')) }}"
                class="btn btn-primary pull left">&lt; Previous Week</a>
        </div>
        <div class="col-md-8"></div>
        <div class="col-md-2 pull-right">
            @if(Carbon\Carbon::parse($date)->isPast())
            <a href="{{ url('/calendar', Carbon\Carbon::parse($date)->endOfWeek()->addWeek()->format('U')) }}"
                class="btn btn-primary pull right">Next Week &gt;</a>
            @endif
        </div>
    </div>
@stop
