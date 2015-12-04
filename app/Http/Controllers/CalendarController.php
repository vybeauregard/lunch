<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Visit;
use Carbon\Carbon;

class CalendarController extends Controller
{
    /**
     * Display a 3-week calendar starting from 2 weeks ago.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $begin = new Carbon("2 weeks ago");
        $begin = $begin->startOfWeek()->format('U');
        return redirect()->route('calendar.show', [$begin]);
    }

    /**
     * Display the specified 3-week calendar.
     *
     * @param  int  $date
     * @return \Illuminate\Http\Response
     */
    public function show($date)
    {
        $date = Carbon::createFromFormat('U', $date)->startOfWeek()->toDateString();
        $begin = Carbon::parse($date);
        $end = Carbon::parse($date);
        $end = $end->addDays(20);
        $datelist = [];
        while($begin->lte($end)) {
            $datelist[] = $begin->toDateString();
            $begin = $begin->addDay();
        }
        $begin = Carbon::parse($date);
        $end = Carbon::parse($date);
        $end = $end->addDays(20);
        $visits = Visit::with('place')
            ->where('date', '>=', $begin->format('Y-m-d'))
            ->where('date', '<=', $end->format('Y-m-d'))
            ->get();
        // return [$begin->format('Y-m-d'), $end->format('Y-m-d')];
        $visits = $visits->keyBy('date');
        return view('calendar.index', compact('visits', 'datelist'));
    }
}
