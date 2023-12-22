<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>LiquidStone | Login</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
        <link href="{{asset('css/jquery.dataTables.min.css')}}" rel="stylesheet" />
        <link href="{{asset('css/fixedHeader.dataTables.min.css')}}" rel="stylesheet" />
    </head>
    <body>
        <div class="d-flex" id="wrapper">



            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <h2 style="text-align: center;">Liquid Stone | Member Area</h2>
                <hr>

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
