<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>LiquidStone | Member Area</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
        <link href="{{asset('css/jquery.dataTables.min.css')}}" rel="stylesheet" />
        <link href="{{asset('css/fixedHeader.dataTables.min.css')}}" rel="stylesheet" />
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">LiquidStone</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{url('home')}}"style="background-color: lightblue;" >Dashboard</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{url('addsubscriptions')}}">New Subscription</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{url('subscriptions')}}">My Subscriptions</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{url('earnings')}}">My Earnings</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{url('payments')}}">Payments</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{url('messages')}}">Message</a>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-primary" id="sidebarToggle"><i class="fa fa-menu"></i></button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item active"><a class="nav-link" href="http://liquidstone.com.ng/#faqs">How it Works</a></li>
                                <li class="nav-item"><a class="nav-link" href="http://liquidstone.com.ng/#contact">Support</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Welcome, @auth {{Auth()->user()->name}} @endauth</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="/home">My Account</a>
                                        <a class="dropdown-item" href="{{url('wallet')}}">Wallet</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{url('logout')}}">Logout</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid">
                    @if (Session::get('message'))
						<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
							<i class="fa fa-check-circle"></i> {!!Session::get('message')!!}
						</div>
					@endif
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('js/scripts.js')}}"></script>
        <script src="{{asset('js/jquery-3.5.1.js')}}"></script>
        <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('js/dataTables.fixedHeader.min.js')}}"></script>
    </body>
</html>
