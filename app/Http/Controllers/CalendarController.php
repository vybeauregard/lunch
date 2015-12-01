<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Visit;
use App\Models\Place;
use Carbon\Carbon;

class CalendarController extends Controller
{
    /**
     * Display a calendar of the current month.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $begin = Carbon::parse("2 mondays ago");
        $end = Carbon::parse("next Sunday");
        $visits = Visit::with('place')
            ->where('date', '>', $begin)
            ->where('date', '<', $end)
            ->get();
        $visits = $visits->keyBy('date');
        $datelist = [];
//        for($i = $begin; $i->lte($end); $i = $i->addDay()){
        while($begin->lte($end)) {
            $datelist[] = $begin->toDateString();
            $begin = $begin->addDay();
        }
        return view('calendar.index', compact('visits', 'datelist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($date)
    {
        $visit = new Visit();
        $visit->date = Carbon::createFromFormat('U', $date);
        $visit->place = new Place();
        $places = Place::where('active', '=', 1)->orderBy('placename')->lists('placename', 'id')->all();
        return view('calendar.create', compact('visit', 'places'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($date)
    {
        $date = Carbon::createFromFormat('U', $date);
        $visit = Visit::where('date', '=', $date)->with('place')->first();
        $places = Place::where('active', '=', 1)->orderBy('placename')->lists('placename', 'id')->all();
        return view('calendar._edit', compact('visit', 'places'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
