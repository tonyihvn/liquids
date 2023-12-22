@extends('layouts.theme')

@section('content')
@php
    $pagename="Payment"
@endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="margin-top: 20px;">
                <div class="card-header"><h3>Make Payment</h3></div>

                <div class="card-body">

                    @if (isset($totalamount))

                        <p>Please pay the sum of ${{$totalamount}} ( US Dollars) to the account detail below; <br>
                        <span style="font-weight: bold;">
                            Account Name: Asobagun Agulu Monday
                        <br>Account number: 0247356065
                        <br>Bank Name: <br>Wema Bank
                        </span>
                        <hr>
                        Send a copy of the transaction receipt/screenshot to the email: accounts@liquidstoneonline.com
                        </p>
                        {{-- <p>
                            <h3>Online Payment - PAYSTACK LINK</h3>
                            <p>Click on the Link Below to pay online now. <i>Please, copy the amount above and enter it on the payment form to ensure there is no error.</i></p>
                            <a href="https://paystack.com/pay/qjl-122v7m" target="_blank" class="btn btn-primary">Pay Online Now</a>
                            <hr> --}}
                            <h3>PayStack Direct</h3>
                            <p>You click on the Pay button below to pay immediately</p>
                            <div class="panel panel-primary col-md-6">
                                <form id="paymentForm">
                                    <div class="form-group col-md-9">
                                      <label for="email">Email Address</label>
                                      <input type="hidden" id="email-address" class="form-control" value="{{auth()->user()->email}}" required />
                                    </div>
                                    <div class="form-group col-md-3">
                                      <label for="amount">Amount</label>
                                      <input type="tel" id="amount" class="form-control" value="{{$totalamount}}" required />
                                    </div>
                                    @php
                                        $nameParts = explode(' ', auth()->user()->name);
                                        $firstname = $nameParts[0];
                                        $lastname = $nameParts[1];
                                    @endphp
                                    <div class="form-group col-md-6">
                                      <label for="first-name">First Name</label>
                                      <input type="hidden" id="first-name" class="form-control" value="{{$firstname}}" />
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label for="last-name">Last Name</label>
                                      <input type="hidden" id="last-name" class="form-control" value="{{$lastname}}" />
                                    </div>
                                    <div class="form-submit">
                                      <button type="submit" onclick="payWithPaystack()" class="btn btn-info"> Make Payment </button>
                                    </div>
                                  </form>
                            </div>

                              <script src="https://js.paystack.co/v1/inline.js"></script>
                        </p>


                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
