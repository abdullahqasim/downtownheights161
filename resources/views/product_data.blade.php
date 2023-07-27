<!-- <div class="popUp" id="add_to_cart_pop">
    <div class="inner_popUp">
        <a href="#" class="modal-close" aria-label="Close" role="button" onclick="hidePopup()">
            <span aria-hidden="true">×</span>
        </a>
    <div class="row p-3">
        <h4 class="text-center text-success success_heading">Product has been successfully added to your cart</h4>
        <div class="col-lg-9 col-md-6 col-sm-12">
            <table id="cart" class="table table-hover table-condensed">
                <tbody>
                    <tr>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-12 hidden-xs">
                                    <img src="{{ asset('images') }}/{{ $details['photo'] ?? '' }}" class="img-responsive"/>
                                </div>
                                
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-12 text_heading">
                                <h4 class="nomargin">{{ $details['product_name'] ?? '' }}</h4>
                                <h4 class="nomargin">
                                    {{ $details['quantity'] ?? 0 }} X  {{ $details['price'] ?? 0 }}
                                </h4>
                            </div>
                        </td>
                    </tr>
                </tbody>
               
            </table>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="cart_total_area p-4" id="cart_total_area">
                <tfoot>
                    <tr>
                        <a href="{{ route('checkout') }}" class="btn btn-danger">PROCEED TO CHECKOUT</a>
                        <hr>
                    </tr>
                    <tr>
                        <h4>Order Summary</h4>
                        <hr>
                    </tr>
                    <tr>
                        <div class="d-flex">
                            <div>
                                <p>Sub Total:</p>
                            </div>
                            <div class="text-end">
                                <p class="st">0</p>
                            </div>
                        </div>
                    </tr>
                    <tr>
                        <div class="d-flex">
                            <div>
                                <p>Shipping and handling:</p>
                            </div>
                            <div class="text-end">
                                <p>0</p>
                            </div>
                        </div>
                    </tr>
                    <tr>
                        <div class="d-flex">
                            <div>
                                <p>Tax:</p>
                            </div>
                            <div class="text-end">
                                <p>0</p>
                            </div>
                        </div>
                        <hr>
                    </tr>
                    <tr>
                        <div class="d-flex">
                            <div>
                                <h3><strong>Order Total:</strong></h3>
                            </div>
                            <div class="text-end">
                                <h3><strong class="mt">0</strong></h3>
                            </div>
                        </div>
                    </tr>
                    
                    <tr>
                        <td colspan="5" class="text-right">
                            <a href="{{ url('/') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continue Shopping</a>
                            <a href="{{ route('cart') }}"><button class="btn btn-success my-1"><i class="fa fa-money"></i> View or Edit Cart</button></a>
                        </td>
                    </tr>
                </tfoot>
            </div>
        </div>
    </div>
</div>
</div> -->
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
                    @if (!$category->isEmpty())
                        @foreach ($category as $categoryes)
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

<div class="row m-0 mt-4">
    <div class="col-lg-12 col-md-12">
        <h1 class="text-center SlatText">{{$product->name}}</h1>
    </div>
    <div class="col-lg-12 col-md-12">
        <p class="text-center product-description">{{$product->description}}.</p>
    </div>
</div>
<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div>
                    <img src="{{ asset('images/' . $product->image . '') }}" class="img-fluid" style="width:100%;">
                </div>
            </div>
            <div class="col-md-6">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item my-2">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Colors <span class="edit"><a href="" class="text-warning">edit</a></span>
                            </button>
                        </h2>
                        @if (!$varition->isEmpty())
                        @foreach ($varition as $key => $varitions)
                        @php
                        $data = json_decode($varitions->variation);
                        @endphp
                        @endforeach
                        @endif
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row mt-4">
                                    @if(count($color) > 0)
                                {{-- @foreach ($varition as $key => $varitions)   --}}
                                    @foreach ($color as $key => $value)
                                    @if($value->p_id==$product->id)
                                    <div class="col-md-3">
                                        <div class="text-center">
                                            <img src="{{ asset('images/' . $value->color_image . '') }}" alt="" class="img-fluid">
                                            <div class="radio-inline">
                                                <input type="radio" name="verity" required id="verity" value="{{$value->color_name}}">
                                                <span>{{$value->color_name}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    {{-- @endforeach --}}
                                    @endforeach
                                    @else
                                        <div class="text-center">
                                            <p>Color is not available in this product</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Mount -->
                    <div class="accordion-item my-2">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Mount <span class="edit"><a href="" class="text-warning ">edit</a></span>
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">
                                    @if (!$varition->isEmpty())
                                    <div class="col-md-6 d-flex justify-content-center align-items-center flex-column" onclick="InsideMount()">
                                        @if (!$varition->isEmpty())
                                        <div class="text-center">
                                            <img src="{{ asset('images/' . $varitions->inside_mount . '') }}" alt="" class="img-fluid">
                                            <div class="radio-inline">
                                                <input type="radio" name="mountRadio"/>
                                                <p id="insidemount" style="display:inline;">Inside Mount</p>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 d-flex justify-content-center align-items-center flex-column" onclick="OutsideMount()">
                                        <div class="text-center">
                                            @if (!$varition->isEmpty())
                                            <img src="{{ asset('images/' . $varitions->outside_mount . '') }}" alt="" class="img-fluid">
                                            <div class="radio-inline">
                                                <input type="radio" name="mountRadio"/>
                                                <p id="outsidemount" style="display:inline;">Outside Mount</p>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <input type="text" id="mount" name="mount" hidden />
                                    @else
                                     <div class="col-md-12 d-flex justify-content-center align-items-center flex-column">
                                         <p>Mount is not available in this product</p>
                                     </div>
                                     @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Measurment -->
                    <div class="accordion-item my-2">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                Measurment <span class="edit"><a href="" class="text-warning ">edit</a></span>
                            </button>
                        </h2>
                        <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="d-flex justify-content-center align-items-center flex-column">
                                            <img src="{{ asset('assets/img/ArrowRight.png') }}" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-md-8 d-flex justify-content-center align-items-center flex-column">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h5>Width (In.)</h5>
                                            </div>
                                            <div class="col-md-6 ">
                                                <select class="form-select" id="width" required aria-label="Default select example">
                                                    <option value="">Select Width</option>
                                                    @if (!$varition->isEmpty())
                                                    @php $remove_dublicate_width =[]; @endphp
                                                    @if(isset($data->width))
                                                    @foreach ($data->width as $width)
                                                    @if(!in_array($width,$remove_dublicate_width))
                                                    <option value="{{ $width}}">{{ $width}}</option>
                                                    @endif
                                                    @php $remove_dublicate_width[]=$width; @endphp
                                                    @endforeach
                                                     @endif
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <select class="form-select" id="width_friction" aria-label="Default select example">
                                                    <option value="">Select Fraction</option>
                                                    <option value="1/8">1/8</option>
                                                    <option value="1/4">1/4</option>
                                                    <option value="3/8">3/8</option>
                                                    <option value="1/2">1/2</option>
                                                    <option value="5/8">5/8</option>
                                                    <option value="3/4">3/4</option>
                                                    <option value="7/8">7/8</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="d-flex justify-content-center align-items-center flex-column">
                                            <img src="{{ asset('assets/img/ArrowDown.png') }}" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-md-8 d-flex justify-content-center align-items-center flex-column">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h5>Height (In.)</h5>
                                            </div>
                                            <div class="col-md-6 ">
                                                <select class="form-select" id="height" required aria-label="Default select example">
                                                    <option value="">Select Height</option>
                                                    @if (!$varition->isEmpty())
                                                    @php $remove_dublicate_height =[]; @endphp
                                                    @if(isset($data->height))
                                                    @foreach ($data->height as $height)
                                                    @if(!in_array($height,$remove_dublicate_height))
                                                    <option value="{{ $height}}">{{ $height}}</option>
                                                    @endif
                                                    @php $remove_dublicate_height[]=$height; @endphp
                                                    @endforeach
                                                    @endif
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <select class="form-select" id="hieght_friction" aria-label="Default select example">
                                                    <option value="">Select Fraction</option>
                                                    <option value="1/8">1/8</option>
                                                    <option value="1/4">1/4</option>
                                                    <option value="3/8">3/8</option>
                                                    <option value="1/2">1/2</option>
                                                    <option value="5/8">5/8</option>
                                                    <option value="3/4">3/4</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <!-- Valance Style -->
                    <div class="accordion-item my-2">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                Valance Style <span class="edit"><a href="" class="text-warning ">edit</a></span>
                            </button>
                        </h2>
                        <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">

                            <div class="accordion-body">
                                <div class="row">
                                     @if (empty($varitions->title1) && empty($varitions->title2))
                                        <div class="col-md-12 d-flex justify-content-center align-items-center flex-column">
                                         <p>Valance Style is not available in this product</p>
                                     </div>
                                    @else

                                     <div class="col-md-6 justify-content-center align-items-center flex-column  {{ !empty($varitions->title1) ? 'd-flex' : 'd-none' }}" onclick="ValanceFun1()">
                                        @if (!$varition->isEmpty())
                                        <img src="{{ asset('images/' . $varitions->image1 . '') }}" alt="" class="img-fluid" style="width: 60%; height: 60%;">
                                         <div class="radio-inline">
                                            <input type="radio" value="{{$varitions->title1}}" id="valanceStyle1" name="valance">
                                            <span>{{$varitions->title1}}</span>
                                        </div>
                                        @endif
                                    </div>
                                     <div class="col-md-6 d-flex justify-content-center align-items-center flex-column {{ $varitions->title2 == '' ? 'd-none' : '' }}" onclick="ValanceFun2()">
                                        @if (!$varition->isEmpty())
                                        <img src="{{ asset('images/' . $varitions->image2 . '') }}" alt="" class="img-fluid" style="width: 60%; height: 60%;">
                                         <div class="radio-inline">
                                            <input type="radio" value="{{$varitions->title2}}" id="valanceStyle2" name="valance">
                                            <span>{{$varitions->title2}}</span>
                                        </div>
                                        @endif
                                    </div>

                                     @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Cord -->
                    <div class="accordion-item my-2">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                            Control Type <span class="edit"><a href="" class="text-warning">edit</a></span>
                            </button>
                        </h2>
                        <div id="collapse6" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row  mt-4">
                                    @if (count($cord) > 0)
                                    @foreach ($cord as $key => $value)
                                    @if ($value->p_id==$product->id)
                                    <div class="col-md-3">
                                        <div class="text-center">
                                            <img src="{{ asset('images/' . $value->cord_image . '') }}" alt="" class="img-fluid">
                                            <div class="radio-inline">
                                                <input type="radio" value="{{$value->cord_name}}" id="cord" name="CordRadio">
                                                <span>{{$value->cord_name}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                    @else
                                        <div class="text-center">
                                           <p>Cord is not available in this product</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tilt -->
                    <div class="accordion-item my-2">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                                Style <span class="edit"><a href="" class="text-warning">edit</a></span>
                            </button>
                        </h2>
                        <div id="collapse7" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row  mt-4">
                                    @if (count($tilt) > 0)
                                    @foreach ($tilt as $key => $value)
                                    @if ($value->p_id==$product->id)
                                    <div class="col-md-3">
                                        <div class="text-center">
                                            <img src="{{ asset('images/' . $value->tilt_image . '') }}" alt="" class="img-fluid">
                                            <div class="radio-inline">
                                                <input type="radio" value="{{$value->tilt_name}}" id="tilt" name="TiltRadio">
                                                <span>{{$value->tilt_name}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                    @else
                                        <div class="text-center">
                                           <p>Tilt is not available in this product</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Position Control -->
                    <div class="accordion-item my-2">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse15" aria-expanded="false" aria-controls="collapse5">
                                Control Position<span class="edit"><a href="" class="text-warning ">edit</a></span>
                            </button>
                        </h2>
                        <div id="collapse15" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">

                            <div class="accordion-body">
                                <div class="row">
                                    @if(empty($varitions->position_left) && empty($varitions->position_right))
                                        <div class="radio-inline">
                                            <p>This product has no control position set yet</p>
                                        </div>
                                     @else
                                    <div class="col-md-6 justify-content-center align-items-center flex-column {{ !empty($varitions->position_left) ? 'd-flex' : 'd-none' }}" onclick="PositionLeftControl()">
                                        @if (!$varition->isEmpty())
                                         <div class="radio-inline">
                                            <input type="radio" value="{{$varitions->position_left}}" id="PositionLeftControl" name="position">
                                            <span>{{$varitions->position_left}}</span>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 justify-content-center align-items-center flex-column {{ !empty($varitions->position_right) ? 'd-flex' : 'd-none' }}" onclick="PositionRightControl()">
                                        @if (!$varition->isEmpty())
                                         <div class="radio-inline">
                                            <input type="radio" value="{{$varitions->position_right}}" id="PositionRightControl" name="positiont">
                                            <span>{{$varitions->position_right}}</span>
                                        </div>
                                        @endif
                                    </div>
                                 @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Product Label -->
                    <div class="accordion-item my-2">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse9" aria-expanded="false" aria-controls="collapse9">
                                Product Label <span class="edit"><a href="" class="text-warning ">edit</a></span>
                            </button>
                        </h2>
                        <div id="collapse9" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <h4>Room Type</h4>
                                        <select class="form-control" id="room_type" aria-label="Default select example">
                                            <option value="" selected>Please select</option>
                                            <option value="DINING ROOM">DINING ROOM</option>
                                            <option value="LIVING ROOM">LIVING ROOM</option>
                                            <option value="PRIMARY BEDROOM">PRIMARY BEDROOM</option>
                                            <option value="KIDS BEDROOM">KIDS BEDROOM</option>
                                            <option value="OTHER BEDROOM">OTHER BEDROOM</option>
                                            <option value="KITCHEN">KITCHEN</option>
                                            <option value="OFFICE">OFFICE</option>
                                            <option value="MISCELLANEOUS">MISCELLANEOUS</option>
                                            <option value="FAMILY ROOM">FAMILY ROOM</option>
                                            <option value="BATHROOM/POWDER ROOM">BATHROOM/POWDER ROOM</option>
                                            <option value="ENTRY/FOYER/HALLWAY">ENTRY/FOYER/HALLWAY</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12">
                                        <h4>Window Description</h4>
                                        <input type="text" class="form-control" id="window_description">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Personalize -->
                    <div class="accordion-item my-2">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                                Personalize Product Extension <span class="edit"><a href="" class="text-warning ">edit</a></span>
                            </button>
                        </h2>
                        <div id="collapse8" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <input type="text" name="personalize" id="personalize" class="form-control">
                                    {{--<div class="col-md--12">
                                            <h4>Ladder Style</h4>
                                        </div>
                                        <div class="col-md-6 d-flex justify-content-center align-items-center flex-column">
                                        <img src="{{ asset('assets/img/config_wb-no-ladder-tape.webp')}}" alt="">
                                            <p>Westchester Valance</p>
                                        </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->
<!-- Footer Start -->
<div class="container-fluid text-light footer mt-5 wow fadeIn" style="background-color: #454f9b;">
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-5 text-center text-md-start mb-3 mb-md-0">
                    <!-- <p style="color: #000000;"><img src="assets/img/refresh.png" class="img-fluid" style="width: 6%;"/>Refresh Image</p> -->
                </div>
                <input type="hidden" name="" id="product_id" value="{{ $product->id }}">
                <input type="hidden" name="" id="product_name" value="{{ $product->name }}">
                <input type="hidden" name="" id="product_des" value="{{ $product->description }}">
                <div class="col-md-7 text-center text-md-end">
                    <div class="footer-menu">
                        <span style="color: #fff; font-size: 26px;">Total : $<span id="PriceId" style="font-weight: bold;">--.--</span> </span>
                        <span style="color: #fff; font-size: 26px;margin: 0px 20px"> After Discount Total : $<span id="dPriceId" style="font-weight: bold;">--.--</span> </span>
                        <button class="btn btn-info add_to_cart" style="background-color: #fff; margin-left: 20px; border: none;">ADD TO CART</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
@endsection
<script src="https://code.jquery.com/jquery-3.6.4.js"></script>
<script>

    $(document).ready(function() {

    $('#width').change(function(){
       let height = $('#height').val();
       let width =$('#width').val();
       let product_id =$('#product_id').val();
       let discount = "{{$v_id->discount}}";
       let shipping = "{{$v_id->shipping}}";
       let tax = "{{$v_id->tax}}";
       if ($("#valanceStyle2").prop("checked")) {
            var valance = "double_valance";
        }else {
            var valance = "standard_valance";
        }
        // alert(valance);
       console.log(height);
       $.ajax({
                type: "get",
                url: "/get_price/",
                data: {
                    height: height,
                    width:width,
                    discount:discount,
                    shipping:shipping,
                    tax:tax,
                    product_id: product_id,
                    valance: valance,
                   
                },
                success: function(response) {
               $('#PriceId').text(response.price);
               $('#dPriceId').text(response.discount_price);
                }
            });
    });

     $('#height').change(function(){
       let height = $('#height').val();
       let width =$('#width').val();
       let product_id =$('#product_id').val();
       let discount = "{{$v_id->discount}}";
       let shipping = "{{$v_id->shipping}}";
       let tax = "{{$v_id->tax}}";
        if ($("#valanceStyle2").prop("checked")) {
            var valance = "double_valance";
        }else {
            var valance = "standard_valance";
        }
       console.log(height);
       $.ajax({
                type: "get",
                url: "/get_price/",
                data: {
                    height: height,
                    width:width,
                    discount:discount,
                    shipping:shipping,
                    tax:tax,
                    product_id: product_id,
                    valance:valance,
                   
                },
                success: function(response) {
               $('#PriceId').text(response.price);
               $('#dPriceId').text(response.discount_price);
                }
            });
    });

    $('#valanceStyle2').change(function(){
       let height = $('#height').val();
       let width =$('#width').val();
       let product_id =$('#product_id').val();
       let discount = "{{$v_id->discount}}";
       let shipping = "{{$v_id->shipping}}";
       let tax = "{{$v_id->tax}}";
       // alert(width)
       $.ajax({
                type: "get",
                url: "/double_price/",
                data: {
                    height: height,
                    width:width,
                    discount:discount,
                    shipping:shipping,
                    tax:tax,
                    product_id: product_id,
                   
                },
                success: function(response) {
               $('#PriceId').text(response.price);
               $('#dPriceId').text(response.discount_price);

                }
            });
    });

    $('#valanceStyle1').change(function(){
       let height = $('#height').val();
       let width =$('#width').val();
       let product_id =$('#product_id').val();
       let discount = "{{$v_id->discount}}";
       let shipping = "{{$v_id->shipping}}";
       let tax = "{{$v_id->tax}}";
       // alert(width)
       $.ajax({
                type: "get",
                url: "/single_price/",
                data: {
                    height: height,
                    width:width,
                    discount:discount,
                    shipping:shipping,
                    tax:tax,
                    product_id: product_id,
                   
                },
                success: function(response) {
               $('#PriceId').text(response.price);
               $('#dPriceId').text(response.discount_price);

                }
            });
    });
    // $("#replacement").change(function(){
    //   let replacement =   $(this).val()
    //   let price =  $('#PriceId').text();

    //   $('#PriceId').text(parseInt(replacement) + parseInt( price ));
    // });
        
    $('.add_to_cart').click(function() {
        var cartSelector = $('#cart');
        var cartTotal = $('#cart_total_area');
        var product_id = $('#product_id').val();
        var product_name = $('#product_name').val();
        var product_des = $('#product_des').val();
        var PriceId = $('#PriceId').text();
        var width = $('#width').val();
        var height = $('#height').val();
        var discount = $('#dPriceId').text();

        if($("input:radio[name=verity]").is(":checked")){
            var verity = $('input[name="verity"]:checked').val();
        }else {
            var verity = "color not selected";
        }
        
        var width_friction = $('#width_friction').val();
        var hieght_friction = $('#hieght_friction').val();
        if($("input:radio[name=mountRadio]").is(":checked")){
            var mount = $('#mount').val();
        }else {
            var mount = "Mount not selected";
        }

        if ($("#valanceStyle1").prop("checked")) {
            var valanceStyle1 = $('#valanceStyle1').val();    
        }else {
            var valanceStyle1 = "valance style not selected";
        }

        if ($("#valanceStyle2").prop("checked")) {
            var valanceStyle2 = $('#valanceStyle2').val();    
        }else {
            var valanceStyle2 = "valance style not selected";
        }

        if ($("#PositionLeftControl").prop("checked")) {
            var controlleftPosition = $('#PositionLeftControl').val();    
        }else {
            var controlleftPosition = "control position not selected";
        }

        if ($("#PositionRightControl").prop("checked")) {
            var controlrightPosition = $('#PositionRightControl').val();    
        }else {
            var controlrightPosition = "control position not selected";
        }
        // var valanceStyle1 = $('#valanceStyle1').val();
        // var valanceStyle2 = $('#valanceStyle2').val();
        // var controlleftPosition = $('#controlleftPosition').val();
        // var controlrightPosition = $('#controlrightPosition').val();
        if($("input:radio[name=mountRadio]").is(":checked")){
            var mount = $('#mount').val();
        }else {
            var mount = "Mount not selected";
        }

        if($("input:radio[name=CordRadio]").is(":checked")){
            var cord = $('input[name="CordRadio"]:checked').val();
        }else {
            var cord = "Cord not selected";
        }

        if($("input:radio[name=TiltRadio]").is(":checked")){
            var tilt = $('input[name="TiltRadio"]:checked').val();
        }else {
            var tilt = "Tilt not selected";
        }
        // var cord = $('#cord').val();
        // var tilt = $('#tilt').val();
        var personalize = $('#personalize').val();
        var room_type = $('#room_type').val();
        var window_description = $('#window_description').val();
        // alert(width_friction);
        // if ($("input:radio[name='valance']").is(":checked")) {

            if ( width != "" && height != "" && room_type != null) {
                $.ajax({
                type: "get",
                url: "/add-to-cart/",
                data: {
                    product_des: product_des,
                    product_id: product_id,
                    product_name: product_name,
                    PriceId: PriceId,
                    width: width,
                    height: height,
                    discount: discount,
                    verity: verity,
                    width_friction: width_friction,
                    hieght_friction: hieght_friction,
                    mount: mount,
                    valanceStyle1: valanceStyle1,
                    valanceStyle2: valanceStyle2,
                    controlleftPosition: controlleftPosition,
                    controlrightPosition: controlrightPosition,
                    cord: cord,
                    tilt: tilt,
                    personalize: personalize,
                    room_type: room_type,
                    window_description: window_description
                },
                success: function(response) {
                    // alert(response.msg);
                    console.log(response);
                    // cartSelector.find('.img-responsive').attr('src', '/images/'+response.photo);
                    // cartSelector.find('tr').find('h4:first-child').html(response.name);
                    // cartSelector.find('tr').find('h4:last-child').html('1 x'+response.price);
                    // cartTotal.find('.st').text(response.subtotal);
                    // cartTotal.find('.mt').text(response.subtotal);
                    
                    // document.getElementById('add_to_cart_pop').style.display = "block";
                    window.location.href = "{{ url('/cart') }}";
                }
            });
            }else {
                alert('Please select all required fields first. like width, height and Room type and than try to add to cart');
            }
        // } 
        // else {
        //   alert('Sorry this product has no valance style');
        // }
            
        });
    });

    function ValanceFun1() {
        var text1 = "standard valance";
        $("#valanceStyle1").val(text1);
    }

    function ValanceFun2() {
        var text2 = "double valance";
        $("#valanceStyle2").val(text2);
    }

    function PositionLeftControl() {
        var text3 = "position left";
        $("#PositionLeftControl").val(text3);
    }
    function PositionRightControl() {
        var text4 = "position right";
        $("#PositionRightControl").val(text4);
    }

    function InsideMount() {
        var inside = $('#insidemount').text();
        $("#mount").val(inside);
    }

    function OutsideMount() {
        var outside = $('#outsidemount').text();
        $("#mount").val(outside);
    }

    function hidePopup(){
        document.getElementById('add_to_cart_pop').style.display = "none";
    }


</script>