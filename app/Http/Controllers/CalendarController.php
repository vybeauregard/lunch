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
        $begin = new Carbon();
        $begin = $begin->subWeeks(2)->startOfDay()->format('U');
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
        $datelist = $this->getDateList($date);
        $visits = Visit::with('place')
            ->where('date', '>=', head($datelist))
            ->where('date', '<=', last($datelist))
            ->get();
        $visits = $visits->keyBy('date');
        return view('calendar.index', compact('visits', 'datelist'));
    }

    /**
     * Get an array of dates
     *
     * @param int $date
     * @return array
     */
     protected function getDateList($date)
     {
         $date = Carbon::createFromFormat('U', $date)->startOfWeek()->toDateString();
         $begin = Carbon::parse($date);
         $end = Carbon::parse($date);
         $end = $end->addDays(19);
         while($begin->lte($end)) {
             $datelist[] = $begin->toDateString();
             $begin = $begin->addDay();
         }
         return $datelist;
     }
}
