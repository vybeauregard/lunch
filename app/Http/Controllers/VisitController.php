<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Visit;
use App\Models\Place;
use Carbon\Carbon;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $begin = Carbon::parse("2 mondays ago");
        $end = Carbon::parse("next Sunday");
        $visits = Visit::with('place')
            ->where('date', '>=', $begin)
            ->where('date', '<=', $end)
            ->get();
        $visits = $visits->keyBy('date');
        $datelist = [];
        while($begin->lte($end)) {
            $datelist[] = $begin->toDateString();
            $begin = $begin->addDay();
        }
        return view('visit.index', compact('visits', 'datelist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($date)
    {
        $udate = $date;
        $date = Carbon::createFromFormat('U', $date)->format('Y-m-d');
        $visit = Visit::where('date', '=', $date)->with('place')->first();
        if(!is_null($visit)) {
            return redirect()->route('visit.edit', [$udate]);
        } else {
            $visit = new Visit();
            $visit->date = $date;
            $visit->place = new Place();
            $places = Place::where('active', '=', 1)
                ->orderBy('placename')
                ->lists('placename', 'id')
                ->all();
            return view('visit.create', compact('visit', 'places'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $visit = new Visit;
        $visit->fill($input)->save();
        return redirect('/');
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
        $date = Carbon::createFromFormat('U', $date)->format('Y-m-d');
        $visit = Visit::where('date', '=', $date)->with('place')->first();
        $places = Place::where('active', '=', 1)->orderBy('placename')->lists('placename', 'id')->all();
        return view('visit._edit', compact('visit', 'places'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $date)
    {
        $date = Carbon::createFromFormat('U', $date)->format('Y-m-d');
        $visit = Visit::where('date', '=', $date)->with('place')->first();
        $input = $request->all();
        $visit->fill($input)->save();
        return redirect('/');
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
