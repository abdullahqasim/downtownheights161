<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Fast Pro Blinds</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico')}}" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@600;700&family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-icons.css')}}">
    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/style1.css')}}" rel="stylesheet">
</head>

<body>
    <!-- Topbar End -->
    <div class="row mt-5 p-0 m-0">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="input-group has-search" style="width: 70%;">
                <input type="text" class="form-control SearchInput no-outline" placeholder="Search">
                <span class="input-group-append fa fa-search form-control-feedback"></span>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 text-center">
            <!-- <a href="{{route('cat_index')}}">
                <img src="{{ asset('assets/img/logo.png')}}" class="img-fluid logo" alt="Fast Pro Blinds"></a> -->
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12" style="text-align: right;">
            <!--<a href="#" style="color: #db5151;">833.793.1608</a> |-->
            <!-- <a href="#" style="color: #db5151;">SING IN &nbsp; <img src="{{ asset('assets/img/cart1.png') }}" /> </a> -->
            <a href="{{ route('cart') }}" style="color: #db5151;"><img src="{{ asset('assets/img/cart1.png') }}" /> </a>
            <span class="badge badge-pill badge-danger cart_count">{{ count((array) session('cart')) }}</span>

            <div class="dropdown-menu">
                    <div class="row total-header-section">
                        @php $total = 0 @endphp
                        @foreach((array) session('cart') as $id => $details)
                            @php $total += (int)$details['price'] * $details['quantity'] @endphp
                        @endforeach
                        <div class="col-lg-12 col-sm-12 col-12 total-section text-right">
                            <p>Total: <span class="text-info">$ {{ $total }}</span></p>
                        </div>
                    </div>
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            <div class="row cart-detail">
                                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                    <img src="{{ asset('img') }}/{{ $details['photo'] }}" />
                                </div>
                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                    <p>{{ $details['product_name'] }}</p>
                                    <span class="price text-info"> ${{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                            <a href="{{ route('cart') }}" class="btn btn-primary btn-block">View all</a>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <hr>
    <div class="row p-0 m-0">
        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
            <a href="{{route('cat_index')}}">
                <img src="{{ asset('assets/img/logo.png')}}" class="img-fluid" style="width: 50%;" alt="Fast Pro Blinds">
            </a>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-6" style="text-align:right;">
            <a href="{{route('cat_index')}}">
                <img src="{{ asset('assets/img/graber-logo.png')}}" class="img-fluid" style="width: 50%; margin-top: 6%;" alt="Fast Pro Blinds">
            </a>
        </div>
    </div>
    <div class="container">
   
    @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div> 
    @endif
</div>
    @yield('space_work');

    <!-- JavaScript Libraries -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Template Javascript -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
