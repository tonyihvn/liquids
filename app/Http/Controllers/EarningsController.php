<?php

namespace App\Http\Controllers;

use App\earnings;
use Illuminate\Http\Request;

class EarningsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if(Auth()->user()->role=="Admin"){
            $earnings = earnings::all();
        }else{
            $earnings = earnings::where('subscriber',Auth()->user()->id)->get();
        }
        return view('earnings')->with(['earnings'=>$earnings]);
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
     * @param  \App\earnings  $earnings
     * @return \Illuminate\Http\Response
     */
    public function show(earnings $earnings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\earnings  $earnings
     * @return \Illuminate\Http\Response
     */
    public function edit(earnings $earnings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\earnings  $earnings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, earnings $earnings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\earnings  $earnings
     * @return \Illuminate\Http\Response
     */
    public function destroy(earnings $earnings)
    {
        //
    }
}
