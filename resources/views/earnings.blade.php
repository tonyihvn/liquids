@extends('layouts.theme')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h2>My Earnings</h2>
            <div class="col-md-12">
                <div class="card" style="margin-top: 20px;">
                    <div class="card-body">
                        <table class="table responsive-table" id="datatable">
                            <thead>
                                <tr style="color: ">
                                    <th>Subscription</th>
                                    <th>Due Date</th>
                                    <th>Total Amount</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($earnings))

                                    @foreach ($earnings as $earn)
                                        <tr>
                                            <td>{{ $earn->sub->plan->plan_name }}</td>
                                            <td>{{ $earn->sub->subscription_enddate }}</td>
                                            <td>{{ ($earn->sub->plan->amount / 100) * 12 * $earn->sub->quantity }}
                                            </td>
                                            <td>{{ $earn->status }}</td>

                                            <td width="90">
                                                <div class="btn-group">

                                                    @php
                                                        $subdate = date_create($earn->sub->subscription_enddate);
                                                        $today = date_create(date('Y-m-d'));
                                                        $diff = date_diff($subdate, $today, true);
                                                    @endphp
                                                    @if ($diff->days >= 0)
                                                        <a href="{{ url('/claim/' . $earn->id) }}"
                                                            class="btn btn-sm btn-success left">Withdraw</a>
                                                    @endif
                                                    <a href="{{ url('/delearn/' . $earn->id) }}/"
                                                        class="btn btn-sm btn-success">Delete</a>
                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach
                                @endif
                            <tfoot>
                                <tr style="color: ">
                                    <th>Subscription</th>
                                    <th>Due Date</th>
                                    <th>Total Amount</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>


                            </tbody>
                        </table>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
