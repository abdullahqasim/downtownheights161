@extends('layout.layout_comon')
@section('space_work')
<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse" style="border-top: 1px solid lightgray;">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            @if(!$main_cat->isEmpty())
            @foreach($main_cat as $main_cats)
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{$main_cats->name}}</a>
                <div class="dropdown-menu fade-up m-0">
                    @if (!$category_all->isEmpty())
                        @foreach ($category_all as $categoryes)
                            @if($main_cats->id==$categoryes->p_cat_id)
                                <a href="/product-detail/{{ $categoryes->id }}" class="dropdown-item" style="font-size:14px;">{{ $categoryes->name }}</a>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
            @endforeach
            @endif
        </div>
        <div class="col-lg-3">
            <!-- <span class="px-lg-5 d-none d-lg-block">
                    <img src="{{ asset('assets/imgages/Tania_Datil.webp') }}" alt="" style="display: inline; width: 23%; float: left;">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" style="margin-left: 18%; color: #db5151; font-size: 14px; font-weight: 500;">Get free design help <br> from an expert like Tania</a>
                </span> -->
        </div>
    </div>
</nav>

<!-- Navbar End -->
<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="{{ asset('images/'.$category->image.'') }}" id="imgLocation" alt="Image">
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->

<!-- Service Start -->
<div class="container-xxl">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.1s">
                <div class="d-flex px-4">
                    <div class="ps-4">
                        <h5 class="mb-3">{{ $category->name}}</h5>
                        <p>{{ $category->description}}.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->
<!-- About Start -->
<div class="container-xxl py-5" style="background-color: #e9ebe6;">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-12 pt-4" style="min-height: 400px;">
                <div class="para text-center mb-5">
                    <h2>Product Options Available</h2>
                </div>
                <div class="position-relative h-100 wow fadeIn" data-wow-delay="0.1s">
                    <input type="hidden" id="category_id" value="{{$category->id}}" />
                    <div class="ProductsList">
                        <div class="tr-job-posted section-padding">
                            <div class="container">
                                <div class="job-tab text-center">
                                    <!--<ul class="nav nav-tabs justify-content-center" role="tablist">-->
                                    <!--    <li role="presentation" class="filter" data-filter_name="Styles">-->
                                    <!--        <a class="" href="#style" aria-controls="style" role="tab" data-toggle="tab" aria-selected="true">Styles</a>-->
                                    <!--    </li>-->
                                    <!--    <li role="presentation" class="filter" data-filter_name="Control Types">-->
                                    <!--        <a href="#control-types" aria-controls="control-types" role="tab" data-toggle="tab" class="" aria-selected="false">Control Types</a></li>-->
                                    <!--    <li role="presentation" class="filter" data-filter_name="Light Controls">-->
                                    <!--        <a href="#light-controls" aria-controls="popular-jobs" role="tab" data-toggle="tab" class="" aria-selected="false">Light Controls</a></li>-->
                                    <!--    <li role="presentation" class="filter" data-filter_name="Headrails">-->
                                    <!--        <a class="" href="#style" aria-controls="style" role="tab" data-toggle="tab" aria-selected="true">Headrails</a>-->
                                    <!--    </li>-->
                                    <!--    <li role="presentation" class="filter" data-filter_name="Light/Privacy">-->
                                    <!--        <a href="#control-types" aria-controls="control-types" role="tab" data-toggle="tab" class="" aria-selected="false">Light/Privacy</a></li>-->
                                    <!--    <li>-->
                                    <!--    <li role="presentation" class="filter" data-filter_name="Vane Sizes">-->
                                    <!--        <a href="#control-types" aria-controls="control-types" role="tab" data-toggle="tab" class="" aria-selected="false">Vane Sizes</a></li>-->
                                    <!--    </li>-->
                                    <!--</ul>-->
                                    <div class="tab-content text-left">
                                        <div role="tabpanel" class="tab-pane fade active show" id="style">
                                            <div class="row result">
                                                @foreach($product as $products)
                                                    @php
                                                        $variation = App\Models\varition::where('product_id',$products->id)->first();
                                                    @endphp
                                                    @if ($variation)
                                                    <div class="col-md-6 col-lg-3">
                                                        <a href="/products/{{$products->id}}">
                                                            <div class="job-item">
                                                                <div class="item-overlay">
                                                                    <div class="job-info">
                                                                        <ul class="tr-list job-meta text-center">
                                                                            <li>{{$products->description}}</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="job-info">
                                                                    <div class="company-logo">
                                                                        <img src="{{ asset('images/'.$products->image.'') }}" alt="images" class="img-fluid">
                                                                    </div>
                                                                    <ul class="tr-list job-meta text-center">
                                                                        <li>
                                                                            <h6>{{$products->name}}</h6>
                                                                        </li>
                                                                        @if($variation != null)
                                                                        <li>
                                                                            <h6>Discount {{ $variation->discount }} %</h6>
                                                                        </li>
                                                                        @else
                                                                        <li>
                                                                            <h6>Discount 0 %</h6>
                                                                        </li> 
                                                                        @endif
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    @endif
                                                @endforeach
                                            </div><!-- /.row -->
                                        </div>
                                        <!-- /.tab-pane -->
                                    </div>
                                </div><!-- /.job-tab -->
                            </div><!-- /.container -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('.filter').click(function() {
            var filter = $(this).attr('data-filter_name');
            var c_id = $('#category_id').val();
            $.ajax({
                type: 'get',
                url: '/filter_products/',
                data: {
                    c_id: c_id,
                    filter: filter,
                },
                success: function(response) {
                    console.log(response);
                    $('.result').html(response);
                }
            });
        });
    });
</script>
@endsection