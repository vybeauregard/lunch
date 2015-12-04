<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Place;
use App\Models\Visit;

class PickController extends Controller
{
    /**
     * Display a randomized place.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places = Place::where('active', '=', true)->get();
        $place = $places->random(1);
        return view('pick.index', compact('place'));
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
}
