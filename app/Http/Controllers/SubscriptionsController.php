<?php

namespace App\Http\Controllers;

use App\plans;
use App\subscriptions;
use App\earnings;
use Illuminate\Http\Request;

class SubscriptionsController extends Controller
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
        $plans = plans::all();
        if(Auth()->user()->role=="Admin"){
            $subscriptions = subscriptions::all();
        }else{
            $subscriptions = subscriptions::where('subscriber',Auth()->user()->id)->get();
        }
        return view('subscriptions')->with(['plans'=>$plans,'subscriptions'=>$subscriptions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plans = plans::all();

        return view('addsubscriptions')->with(['plans'=>$plans]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // RECORD SUBSCRIPTION

        $enddate = date('Y-m-d', strtotime(date("Y-m-d"). ' + 90 days'));
        $sub = subscriptions::create([
            'plan_name'=>$request->plan_name,
            'subscriber'=>Auth()->user()->id,
            'quantity' => $request->quantity,
            'duration' => 90,
            'date_subscribed' =>date("Y-m-d"),
            'subscription_enddate' => $enddate,
            'status' => "Not Approved"
        ]);

        earnings::create([
            'subscription'=>$sub->id,
            'subscriber'=>Auth()->user()->id,
            'earning' => 0,
            'status' => 'Not Due'
        ]);

        $amountper = plans::where('id',$request->plan_name)->select('amount')->first()->amount;
        $subid = $sub->id;
        $totalamount = $request->quantity*$amountper;
        $message = "Your subscription was successful. Expect your 12% profit at the end of each month for a duration of 3 months. Thank you!";
        return view('make-payment')->with(['message'=>$message,'totalamount'=>$totalamount,'subid'=>$subid,'sub'=>$sub]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\subscriptions  $subscriptions
     * @return \Illuminate\Http\Response
     */
    public function show(subscriptions $subscriptions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\subscriptions  $subscriptions
     * @return \Illuminate\Http\Response
     */
    public function edit(subscriptions $subscriptions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\subscriptions  $subscriptions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, subscriptions $subscriptions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\subscriptions  $subscriptions
     * @return \Illuminate\Http\Response
     */
    public function destroy(subscriptions $subscriptions)
    {
        //
    }
}
