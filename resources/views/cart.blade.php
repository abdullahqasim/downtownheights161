@include('layout.layout_comon')

<div class="popUp" id="add_to_cart_popUp">
    
</div>
   
<div>
    <div class="row m-0">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <table id="cart" class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th style="width:35%">Product</th>
                        <th style="width:20%">Description</th>
                        <th style="width:10%">Price</th>
                        <th style="width:8%">Quantity</th>
                        <th style="width:8%">Shipping</th>
                        <th style="width:10%" class="text-center">Sub Total</th>
                        <th style="width:10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; $quantity = 0; @endphp
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            @php
                             $total += (float) $details['discount'] * $details['quantity'];
                             $quantity += $details['quantity']; 
                             $shipping = App\Models\varition::where('product_id',$details['product_id'])->first();
                             // dd($shipping);
                             @endphp
                            <tr data-id="{{ $id }}">
                                <td data-th="Product">
                                    <div class="row">
                                        <div class="col-sm-3 hidden-xs"><img src="{{ asset('images') }}/{{ $details['photo'] }}" width="100" height="100" class="img-responsive"/></div>
                                        <div class="col-sm-9">
                                            <h4 class="nomargin">{{ $details['product_name'] }}</h4>
                                            <p style="margin-bottom:0px;"><span class="bold_h">Color: </span>{{$details['verity']}}</p>
                                            <p style="margin-bottom:0px;"><span class="bold_h">Width: </span>{{$details['width']}}</p>
                                            <p style="margin-bottom:0px;"><span class="bold_h">Height: </span>{{$details['height']}}</p>
                                            <p style="margin-bottom:0px;"><span class="bold_h">Mount: </span>{{$details['mount']}}</p>
                                            <p style="margin-bottom:0px;" class="{{ $details['valanceStyle1'] == 'valance style not selected' ? 'd-none' : 'd-block' }}"><span class="bold_h">Valance Style: </span>{{$details['valanceStyle1']}}</p>
                                            <p style="margin-bottom:0px;" class="{{ $details['valanceStyle2'] == 'valance style not selected' ? 'd-none' : 'd-block' }}"><span class="bold_h">Valance Style: </span>{{$details['valanceStyle2']}}</p>
                                            <p style="margin-bottom:0px;" class="{{ $details['controlrightPosition'] == 'control position not selected' ? 'd-none' : 'd-block' }}"><span class="bold_h">Control Position: </span>{{$details['controlrightPosition']}}</p>
                                            <p style="margin-bottom:0px;" class="{{ $details['controlleftPosition'] == 'control position not selected' ? 'd-none' : 'd-block' }}"><span class="bold_h">Control Position: </span>{{$details['controlleftPosition']}}</p>
                                            <p style="margin-bottom:0px;"><span class="bold_h">Cord: </span>{{$details['cord']}}</p>
                                            <p style="margin-bottom:0px;"><span class="bold_h">tilt: </span>{{$details['tilt']}}</p>
                                            <p style="margin-bottom:0px;"><span class="bold_h">Personalize: </span>{{$details['personalize']}}</p>
                                            <p style="margin-bottom:0px;"><span class="bold_h">Room type: </span>{{$details['room_type']}}</p>
                                            <p style="margin-bottom:0px;"><span class="bold_h">Window description: </span>{{$details['window_description']}}</p>

                                        </div>
                                    </div>
                                </td>
                                <td data-th="Description">{{  $details['product_description']}}</td>
                                <td data-th="Price">${{ $details['discount'] }}</td>
                                <td data-th="Quantity">
                                    <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity cart_update" min="1" />
                                </td>
                                <td data-th="Shipping" class="text-center">${{ $details['quantity']*$shipping->shipping }}</td>
                                <td data-th="Subtotal" class="text-center">${{ (float) $details['discount'] * $details['quantity']+ $details['quantity']*$shipping->shipping}}</td>
                                <td class="actions">
                                    <button class="btn btn-danger btn-sm cart_remove"><i class="fa fa-trash-o"></i> Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
                <!-- <tfoot>
                    <tr>
                        <td colspan="5" class="text-right"><h3><strong>Total ${{ $total }}</strong></h3></td>
                    </tr>
                    <tr>
                        <td colspan="5" class="text-right">
                            <a href="{{ url('/') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continue Shopping</a>
                            <button class="btn btn-success"><i class="fa fa-money"></i> Checkout</button>
                        </td>
                    </tr>
                </tfoot> -->
            </table>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="cart_total_area p-4" style="text-align: right;">
                    <h3><strong>Total Price : ${{ $total+$quantity*$shipping->shipping }}</strong></h3>
                    <tr>
                        <td colspan="5" class="text-right">
                            <a href="{{ url('/') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continue Shopping</a>
                            <a href="{{ route('checkout') }}"><button class="btn btn-success"><i class="fa fa-money"></i> Checkout</button></a>
                        </td>
                    </tr>
                </tfoot>
            </div>
        </div>
    </div>
</div>  
   
<script type="text/javascript">
   
    $(".cart_update").change(function (e) {
        e.preventDefault();
   
        var ele = $(this);
   
        $.ajax({
            url: '{{ route('update_cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
   
    $(".cart_remove").click(function (e) {
        e.preventDefault();
   
        var ele = $(this);
   
        if(confirm("Do you really want to remove?")) {
            $.ajax({
                url: '{{ route('remove_from_cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
   
</script>