<?php

namespace App\Http\Controllers;

use App\payments;
use App\subscriptions;
use Illuminate\Http\Request;

class PaymentsController extends Controller
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
        //
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

    public function makePayment($subid)
    {
        $sub = subscriptions::where('id',$subid)->first();
        $totalamount = $sub->quantity*$sub->plan->amount;
        return view('make-payment')->with(['sub'=>$sub,'totalamount'=>$totalamount]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        payments::create([
            'subscription'=>$request->subscription,
            'amount_paid'=>$request->amount_paid,
            'subscriber'=>$request->subscriber,
            'earning'=>$request->earning,
            'payment_method'=>$request->payment_method,
            'account_number'=>$request->account_number,
            'bank_name'=>$request->bank_name,
            'ref_number'=>$request->ref_number,
            'date_of_payment'=>$request->date_of_payment,
            'status'=>'Payment Not Approved'
        ]);

        return redirect()->back()->with(['message'=>'Payment recorded, we will confirm it ASAP']);
    }

    public function onlinePayment($subid,$payresponse)
    {
        $sub = subscriptions::where('id',$subid)->first();
        return view('new-payment')->with(['sub'=>$sub,'payresponse'=>$payresponse]);
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function show(payments $payments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function edit(payments $payments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, payments $payments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function destroy(payments $payments)
    {
        //
    }
}
