@extends('layouts.theme')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="margin-top: 20px;">
                <div class="card-header"><h3>Subscriptions</h3></div>

                <div class="card-body">

                    @if ($subscriptions->count()<=0)
                        <form action="{{route('new-subscription')}}" method="POST">
                            @csrf

                            <small><i>You can subscribe multiple times for the same plan.</i></small>
                            <div class="row">
                                <div class="form-group col-md-8">
                                    <label for="Select Plan">Choose Plan</label>
                                    <select name="plan_name" id="plan_name" class="form-control">
                                        @foreach ($plans as $pl)
                                            <option value="{{$pl->id}}">{{$pl->plan_name}} - (${{$pl->amount}} - {{$pl->plan_info}})</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="col-md-4">
                                    <label for="quantity">No of Subscriptions</label>
                                    <input type="number" name="quantity" id="quantity" value="1" class="form-control" required>
                                </div>

                            </div>

                            <div class="row" style="display: flex; float: right; margin-top: 10px;">
                                <div class="col-md-4">
                                    <input type="submit" value="Subscribe" class="btn btn-primary">
                                </div>
                            </div>
                        </form>


                    @else
                    <table class="table responsive-table" id="datatable">
                        <thead>
                            <tr style="color: ">
                                <th>Subscriber</th>
                                <th>Plan</th>
                                <th>Subscriptions</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Total Amount</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subscriptions as $subs)
                                <tr>
                                    <td>{{$subs->subscribedby->name}}</td>
                                    <td>{{$subs->plan->plan_name}}</td>
                                    <td>{{$subs->quantity}}</td>
                                    <td>{{$subs->date_subscribed}}</td>
                                    <td>{{$subs->subscription_enddate}}</td>
                                    <td>{{$subs->quantity*$subs->plan->amount}}</td>
                                    <td>{{$subs->status}}</td>
                                    <td width="90">
                                        <div class="btn-group">
                                            <a href="{{url('/viewsub/'.$subs->id)}}" class="label label-primary left"><i class="lnr lnr-eye"></i></a>
                                            <a href="{{url('/del/'.$subs->id)}}/" class="label label-success"><i class="lnr lnr-remove"></i></a>
                                            @if ($subs->status!="Paid")
                                                <a href="{{ url('/make-payment/' . $subs->id) }}"
                                                    class="btn btn-sm btn-primary left">Make Payment</a>
                                            @endif
                                        </div>
                                    </td>

                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
