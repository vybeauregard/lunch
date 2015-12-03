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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $begin = Carbon::parse("2 mondays ago")->format('U');
        return redirect()->route('calendar.show', [$begin]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show($date)
    {
        $begin = Carbon::createFromFormat('U', $date);
        $end = Carbon::createFromFormat('U', $date);
        $end->subWeeks(3);
        $datelist = [];
        while($begin->lte($end)) {
            $datelist[] = $begin->toDateString();
            $begin = $begin->addDay();
        }
        return $end;
        $visits = Visit::with('place')
            ->where('date', '>=', $begin)
            ->where('date', '<=', $end)
            ->get();
        $visits = $visits->keyBy('date');
        return view('calendar.index', compact('visits', 'datelist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
