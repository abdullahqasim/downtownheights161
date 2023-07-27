@include('layout.layout_comon')
   
<div>
    <div class="container-fluid">
        <div class="row m-0">
            <div class="col-lg-12"><h5 style="margin-left: 4%;">Note: This  is a custom made product and can take up to two weeks for delivery.</h5></div>
        </div>
    </div>
    <div class="row m-0">
        <div class="col-lg-9 col-md-6 col-sm-12">
            @php $total = 0; $quantity = 0; $ttotal = 0; @endphp
            @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                    @php
                     $total += (float) $details['discount'] * $details['quantity'];
                     $ttotal += (float) $details['price'] * $details['quantity'];
                     $quantity += $details['quantity']; 
                     $shipping = App\Models\varition::where('product_id',$details['product_id'])->first();
                    @endphp
                @endforeach
            @endif
            <form class="billing_form" action="{{ route('checkout') }}" method="post" id="contactForm" novalidate="novalidate">
            @csrf
            <div class="container">
                <div class="row p-4 m-0">
                    <div class="col-md-12">
                      @if(session()->has("success"))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          {!! session("success") !!}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      @endif
                      @if(session()->has("error"))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          {!! session("error") !!}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      @endif
                    </div>
                   
                    <div class="col-lg-12">
                        <div class="main_title">
                            <h2>Shipping Address Details</h2>
                        </div>
                        <div class="billing_form_area row m-0">
                                <div class="form-group col-md-6">
                                    <label for="first">First Name <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="first" name="first_name" placeholder="First Name" value="">
                                    @error('first_name')
                                        <div class="text-danger">{!! $message !!}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="last">Last Name </label>
                                    <input type="text" class="form-control" id="last" name="last_name" placeholder="Last Name" value="">
                                    @error('last_name')
                                        <div class="text-danger">{!! $message !!}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email Address <span style="color:red;">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" value="">
                                    @error('email')
                                        <div class="text-danger">{!! $message !!}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="phone">Phone <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="number" name="number" placeholder="Phone No." value="">
                                    @error('number')
                                        <div class="text-danger">{!! $message !!}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="address">Street Address <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="">
                                    @error('address')
                                        <div class="text-danger">{!! $message !!}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="zipcode">Zip Code <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="zipcode" value="">
                                    @error('zipcode')
                                        <div class="text-danger">{!! $message !!}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="state">State <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="state" name="state" placeholder="state" value="">
                                    @error('state')
                                        <div class="text-danger">{!! $message !!}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" id="city" name="city" placeholder="city" value="">
                                    @error('city')
                                        <div class="text-danger">{!! $message !!}</div>
                                    @enderror
                                </div>
                                
                                <div class="form-group col-md-12">
                                    <label for="phone">Order Notes</label>
                                    <textarea class="form-control" name="message" id="message" rows="1" placeholder="Note about your order. e.g. special note for delivery"></textarea>
                                   @error('message')
                                        <div class="text-danger">{!! $message !!}</div>
                                    @enderror
                                </div>
                                <button class="btn btn-primary" type="submit">Pay</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="cart_total_area p-4">
                <tfoot>
                    <tr>
                        <h4>Order Summary</h4>
                        <hr>
                    </tr>
                    @if($quantity >= 15)
                    <tr>
                        <div class="d-flex">
                            <div>
                                <p>Sub Total:</p>
                            </div>
                            <div class="text-end">
                                <p>${{ $ttotal-($ttotal*40/100) }}</p>
                            </div>
                        </div>
                    </tr>
                    @else
                    <tr>
                        <div class="d-flex">
                            <div>
                                <p>Sub Total:</p>
                            </div>
                            <div class="text-end">
                                <p>${{ $total }}</p>
                            </div>
                        </div>
                    </tr>
                    @endif
                    
                    <tr>
                        <div class="d-flex">
                            <div>
                                <p>Shipping:</p>
                            </div>
                            <div class="text-end">
                                <p>${{ $quantity*$shipping->shipping }}</p>
                            </div>
                        </div>
                    </tr>
                    @if($quantity >= 15)
                    <tr>
                        <div class="d-flex">
                            <div>
                                <p>Tax:</p>
                            </div>
                            <div class="text-end">
                                <p>${{ ( ($ttotal-($ttotal*40/100)) *$shipping->tax)/100 }}</p>
                            </div>
                        </div>
                        <hr>
                    </tr>
                    @else
                    <tr>
                        <div class="d-flex">
                            <div>
                                <p>Tax:</p>
                            </div>
                            <div class="text-end">
                                <p>${{ ($total*$shipping->tax)/100 }}</p>
                            </div>
                        </div>
                        <hr>
                    </tr>
                    @endif
                    @if($quantity >= 15)
                    <tr>
                        <div class="d-flex">
                            <div>
                                <h4><strong>Total Price:</strong></h4>
                            </div>
                            <div class="text-end">
                                <p><del style="font-size: 16px">${{ $ttotal}} </del><span class="text-danger">Save 40 %</span></p>
                                <h4><strong>${{ $ttotal-($ttotal*40/100)+$quantity*$shipping->shipping+ ( ($ttotal-($ttotal*40/100)) *$shipping->tax)/100}}</strong></h4>
                                
                            </div>
                        </div>
                    </tr>
                    @else
                    <tr>
                        <div class="d-flex">
                            <div>
                                <h4><strong>Total Price:</strong></h4>
                            </div>
                            <div class="text-end">
                                <p><del style="font-size: 16px">${{ $ttotal+($quantity*$shipping->shipping)+ (($total*$shipping->tax)/100)}} </del><span class="text-danger">Save 30 %</span></p>
                                <h4><strong>${{ $total+($quantity*$shipping->shipping)+ (($total*$shipping->tax)/100)}}</strong></h4>
                                
                            </div>
                        </div>
                    </tr>
                    @endif
                    <tr>
                        <td colspan="5" class="text-right">
                            <a href="{{ url('/') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continue Shopping</a>
                            {{-- <a href="{{ route('checkout') }}"><button class="btn btn-success"><i class="fa fa-money"></i> Pay with Paypal</button></a> --}}
                        </td>
                    </tr>
                </tfoot>
            </div>
        </div>
    </div>
</div>  