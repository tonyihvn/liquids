@extends('layouts.theme')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="margin-top: 20px;">


                <div class="card-header"><h3>Add Subscription</h3></div>

                <div class="card-body">
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
