@extends('layouts.theme')

@section('content')
@php
    $pagename="Payment"
@endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="margin-top: 20px;">


                <div class="card-header"><h3>Add Payment</h3></div>

                <div class="card-body">
                    <form action="{{ route('save-payment') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-8">
                                <label for="Select Plan">Choose Plan</label>
                                <select name="plan_name" id="plan_name" class="form-control">

                                        <option value="{{$sub->id}}">{{$sub->plan->plan_name}} - (${{$sub->plan->amount}} - {{$sub->plan->plan_info}})</option>

                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="amount_paid">Amount Paid:</label>
                                <input type="number" class="form-control" id="amount_paid" value="{{$sub->quantity*$sub->plan->amount}}" name="amount_paid">
                            </div>


                                <input type="hidden" value="{{auth()->user()->id}}" name="subscriber">


                                <input type="hidden" value="0" name="earning">


                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="account_number">Account Number:</label>
                                <input type="text" class="form-control" id="account_number" name="account_number">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="bank_name">Bank Name:</label>
                                <input type="text" class="form-control" id="bank_name" name="bank_name">
                            </div>
                        </div>

                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="swift_code">Swift Code:</label>
                                <input type="text" class="form-control" id="swift_code" name="swift_code">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="payment_method">Payment Method:</label>
                                <input type="text" class="form-control" id="payment_method" name="payment_method">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="date_of_payment">Date of Payment:</label>
                                <input type="date" class="form-control" id="date_of_payment" name="date_of_payment">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="ref_no">Reference Number:</label>
                                <input type="text" class="form-control" id="ref_no" name="ref_no" value="{{isset($payresponse) ? $payresponse : ''}}">
                            </div>
                        </div>
                        <div class="row" style="float: right; margin: 20px;">
                            <button type="submit" class="btn btn-primary">Submit Payment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
