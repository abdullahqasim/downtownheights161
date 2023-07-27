@extends('layout.admin_layout')

@section('space-work')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Variants</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Variants</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            @if(Session::has('success'))
            <small style="color: green">{{ Session::get('success')}}</small>
            @endif
            <div class="card-header">
              <h3 class="card-title">Edit Variants</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <form method="POST" action="{{ route('update_variant') }}" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <input type="hidden" name="id" value="{{$varition->id}}" id="">
                    <div class="form-group">
                      <label>Product</label>
                      <select name="product_id" id="" class="form-control">
                        <option value="">Select Product</option>
                        @foreach($all_product as $products)
                        <option value="{{$products->id}}" {{($products->id==$varition->product_id ? 'selected' : "")}}>{{$products->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <!-- Color -->
               
                <div class="row">
                  <div class="col-md-12">
                    <h4>COLOR</h4>
                  </div>
                  <div class="col-md-12">
                    <div class="color_body">
                      @if(isset($varition))
                        @foreach ($color as $key => $value)
                      <div class="row remove_color">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name[]" class="form-control" value="{{(isset($value->color_name) ? $value->color_name : '')}}" />
                          </div>
                        </div>
                        <div class="col-md-5">
                          <div class="form-group">
                            <label>Image</label>
                            <input type="text" name="color_id[]" value="{{$value->id}}" style="display:none;">
                            <input type="file" name="images_multiple[]" value="{{(isset($value->color_image) ? $value->color_image : '')}}" class="form-control-file" />
                            <img src="{{ asset('images/' . (isset($value->color_image) ? $value->color_image : ''). '') }}" width="100px" alt="">
                          </div>
                        </div>
                        <div class="col-md-1">
                          <br>
                          <button type="button" class="btn btn-danger remove_color">X</button>
                        </div>
                      </div>
                        @endforeach
                      @endif
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>&nbsp;</label><br>
                      <button type="button" id="add_color" class="btn btn-success add_color">Add Color</button>
                    </div>
                  </div>
                </div>

                <!-- Mount -->
                <hr>
                <div class="row">
                  <div class="col-12">
                    <h4>MOUNT</h4>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputFile">Inside Mount</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="inside" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile" value="{{(isset($varition->inside_mount) ? $varition->inside_mount : '') }}">Choose file</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                        </div>

                      </div>
                      <img src="{{ asset('images/' . $varition->inside_mount . '') }}" alt="" width="100px">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputFile">OutSide Mount</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="outside" value="{{(isset($varition->outside_mount) ? $varition->outside_mount : '') }}" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                        </div>
                      </div>
                      <img src="{{ asset('images/' . $varition->outside_mount . '') }}" alt="" width="100px">
                    </div>
                  </div>
                </div>
                 <hr>

                <!-- Product Discount -->
                <div class="row">
                  <div class="col-md-12">
                    <h4 style="text-transform: uppercase;">Product Discount in %</h4>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Product Disount</label>
                      <input type="number" name="discount" class="form-control" placeholder="Product discount in %" value="{{(isset($varition->discount) ? $varition->discount : '') }}">
                    </div>
                  </div>
                </div>
                <hr>

                <!-- Product Shipping -->
                <div class="row">
                  <div class="col-md-12">
                    <h4 style="text-transform: uppercase;">Product Shipping per item</h4>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Product Shipping</label>
                      <input type="number" name="shipping" class="form-control" placeholder="Product Shipping like 5" value="{{(isset($varition->shipping) ? $varition->shipping : '') }}">
                    </div>
                  </div>
                </div>
                <hr>

                <!-- Product Discount -->
                <div class="row">
                  <div class="col-md-12">
                    <h4 style="text-transform: uppercase;">Product Tax in %</h4>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Product Tax</label>
                      <input type="number" name="tax" class="form-control" placeholder="Product Tax in %" value="{{(isset($varition->tax) ? $varition->tax : '') }}">
                    </div>
                  </div>
                </div>
                <hr>
                <!-- Measurement -->
                @php
                $width = json_decode($varition->variation)->width;
                $height = json_decode($varition->variation)->height;
                $price = json_decode($varition->variation)->price;
                $double_valance = json_decode($varition->variation)->double_valance;
                @endphp
                <div class="row appned_body">
                  <div class="col-12">
                    <h4>MEASUREMENT</h4>
                  </div>
                 
                  @if (isset($varition))
                  @foreach ($width as $key => $value)
                  <div class="row remove_price w-100">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Width</label>
                        <input type="number" name="width[]" required class="form-control" value="{{(isset($value) ? $value : '')}}" />
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Hieght</label>
                        <input type="number" name="height[]" required class="form-control" value="{{$height[$key]}}" />
                      </div>
                    </div>
                    @if(isset($price[$key]))
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Price</label>
                        <input type="number" name="price[]" required class="form-control" value="{{$price[$key]}}" />
                      </div>
                    </div>
                    @else
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Price</label>
                        <input type="number" name="price[]" required class="form-control" value="" />
                      </div>
                    </div>
                    @endif
                    @if (isset($double_valance[$key]))
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Double Valance Price</label>
                        <input type="number" name="double_valance[]" class="form-control" value="{{$double_valance[$key]}}" />
                      </div>
                    </div>
                    @else
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Double Valance Price</label>
                        <input type="number" name="double_valance[]" class="form-control" value="" />
                      </div>
                    </div>
                    @endif
                    
                    <div class="col-md-1">
                      <br>
                      <button type="button" class="btn btn-danger remove_price">X</button>
                    </div>
                  </div>
                  @endforeach
                  @endif
                  <div class="col-md-12">
                    <div class="form-group">
                      <button type="button" class="btn btn-success add_price_row">Add Row</button>
                    </div>
                  </div>
                </div>

                <!-- Valance Style -->
                <hr>
                <div class="row">
                  <div class="col-12">
                    <h4 style="text-transform: uppercase;">Valance Style</h4>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Title</label>
                      <input type="text" value="{{(isset($varition->title1) ? $varition->title1 : '')}}" name="title1" class="form-control" placeholder="Title">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputFile">Image</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" value="{{(isset($varition->image1) ? $varition->image1 : '') }}" name="image1" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                        </div>
                      </div>
                      <img src="{{ asset('images/' . $varition->image1 . '') }}" alt="" width="100px">
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-12"></div>
                 <div class="col-md-6">
                    <div class="form-group">
                      <label>Title</label>
                      <input type="text" value="{{(isset($varition->title2) ? $varition->title2 : '')}}" name="title2" class="form-control" placeholder="Title2">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputFile">Image</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" value="{{(isset($varition->image2) ? $varition->image2 : '') }}" name="image2" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                        </div>
                      </div>
                      <img src="{{ asset('images/' . $varition->image2 . '') }}" alt="" width="100px">
                    </div>
                  </div>
                </div>

                <!-- Cord -->
                <hr>
                
                <div class="row">
                  <div class="col-md-12">
                    <h4>CORD</h4>
                  </div>
                  {{-- @php
                        $cord = json_decode($varition->variation)->cord;
                        $tilt = isset(json_decode($varition->variation)->tilt);
                      @endphp --}}
                  <div class="col-md-12">
                    <div class="body_cord">
                      @if (isset($varition))
                        @foreach ($cord as $key => $value)
                      <div class="row remove_cord">
                        <div class="col-md-6">
                          <label>Cord</label>
                          <input type="text" name="cord[]" class="form-control" value="{{(isset($value->cord_name) ? $value->cord_name : '')}}">
                        </div>
                        <div class="col-md-5">
                          <label>Cord Image</label>
                          <input type="text" name="cord_id[]" value="{{$value->id}}" style="display:none;">
                          <input type="file" name="cord_image[]" value="{{(isset($value->cord_image) ? $value->cord_image : '')}}" class="form-control-file" />
                          <img src="{{ asset('images/'. $value->cord_image.'') }}" width="100px" alt="">
                        </div>
                        <div class="col-md-1">
                            <br>
                            <button type="button" class="btn btn-danger remove_cord">X</button>
                        </div>
                      </div>
                        @endforeach
                      @endif
                    </div>
                  </div>

                  <div class="col-md-12">
                    <label>&nbsp;</label><br>
                    <button type="button" id="add_cord" class="btn btn-success add_cord">Add Cord</button>
                  </div>
                </div>

                <hr>
                
                <!-- TILT -->
                <div class="row">
                  <div class="col-md-12">
                    <h4>Tilt</h4>
                  </div>
                  <div class="col-md-12">
                    <div class="body_tilt">
                      @if (isset($varition))
                        @foreach ($tilt as $key => $value)
                      <div class="row remove_tilt">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Tilt</label>
                            <input type="text" name="tilt[]" class="form-control" value="{{(isset($value->tilt_name) ? $value->tilt_name : '')}}">
                          </div>
                        </div>
                        <div class="col-md-5">
                          <div class="form-group">
                            <label>Tilt Image</label>
                            <input type="text" name="tilt_id[]" value="{{$value->id}}" style="display:none;">
                            <input type="file" name="tilt_image[]" value="{{(isset($value->tilt_image) ?  $value->tilt_image : '')}}" class="form-control-file" />
                            <img src="{{ asset('images/' . (isset($value->tilt_image) ? $value->tilt_image : ''). '') }}" width="100px" alt="">
                          </div>
                        </div>
                        <div class="col-md-1">
                        <br>
                        <button type="button" class="btn btn-danger remove_tilt">X</button>
                      </div>
                      </div>
                        @endforeach
                      @endif
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>&nbsp;</label><br>
                      <button type="button" id="add_tilt" class="btn btn-success add_tilt">Add Tilt</button>
                    </div>
                  </div>
                </div>

                <!-- Control Position -->
                <div class="row">
                  <div class="col-md-12">
                    <h4 style="text-transform: uppercase;">Control Position</h4>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Control Position</label>
                      <input type="text" name="position_left" class="form-control" value="{{(isset($varition->position_left) ? $varition->position_left : '') }}" placeholder="left">
                    </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                        <label>Right</label>
                        <input type="text" name="position_right" class="form-control" value="{{(isset($varition->position_right) ? $varition->position_right : '') }}" placeholder="Right">
                      </div>
                  </div> 
                </div>

                <!-- /.card-body -->
                <div class="card-footer text-right">
                  <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
            @if($errors->any())
            @foreach($errors->all() as $error)
            <p style="color: red">{{ $error }}</p>
            @endforeach
            @endif
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    // Color
    $('.add_color').on("click", function() {
      $html = `
          <div class="row remove_color">
            <div class="col-md-6">
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name[]" class="form-control" placeholder="Name" >
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label>Image</label>
                <input type="file" name="images_multiple[]" class="form-control"  >
              </div>
            </div>
            <div class="col-md-1">
              <br>
              <button type="button" class="btn btn-danger remove_color">X</button>
            </div>
          </div>`;
      $('.color_body').append($html);
    });

    $("body").on("click",".remove_color",function(e){
       $(this).parents('.remove_color').remove();
    });

    // Cord
    $('.add_cord').on("click", function() {
      $html = `
          <div class="row remove_cord">       
            <div class="col-md-6">
              <div class="form-group">
                <label>Cord</label>
                <input type="text" name="cord[]" class="form-control" placeholder="Cord" >
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label>Cord Image</label>
                <input type="file" name="cord_image[]"   class="form-control-file" />
              </div>
            </div>
            <div class="col-md-1">
              <br>
              <button type="button" class="btn btn-danger remove_cord">X</button>
            </div>
          </div> `;
      $('.body_cord').append($html);
    });
    $("body").on("click",".remove_cord",function(e){
       $(this).parents('.remove_cord').remove();
    });
    // Replacement
    $('.add_replacement_valance_row').click(function() {
      var html = `
          <div class="col-md-8 ">
                    <div class="form-group">
                      <label>Replacement valance</label>
                      <input type="text" name="replacement_valance[]"  class="form-control" placeholder="Replacement valance">
                    </div>
                  </div>
          `;
      $('.replacement_valance').append(html);
    });
    // Price
    $('.add_price_row').click(function() {
      var html = `<div class="row w-100 remove_price">
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Width</label>
                        <input type="number" name="width[]" class="form-control" required  />
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Hieght</label>
                        <input type="number" name="height[]" required class="form-control" placeholder="Hieght" />
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Price</label>
                        <input type="number" name="price[]" required class="form-control" placeholder="Price" />
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Double Valance Price</label>
                        <input type="number" name="double_valance[]" class="form-control" placeholder="Double Valance Price">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <br>
                      <button type="button" class="btn btn-danger remove_price">X</button>
                    </div>
                    </div>`;
      $('.appned_body').append(html);
    });
    $("body").on("click",".remove_price",function(e){
       $(this).parents('.remove_price').remove();
    });
    // Tilt
    $('.add_tilt').on("click", function() {
      $html = `
          <div class="row remove_tilt">
            <div class="col-md-6">
              <div class="form-group">
                <label>Tilt</label>
                <input type="text" name="tilt[]"   class="form-control" placeholder="Tilt" >
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label>Cord Image</label>
                <input type="file" name="tilt_image[]"   class="form-control-file" >
              </div>
            </div>
            <div class="col-md-1">
              <br>
              <button type="button" class="btn btn-danger remove_tilt">X</button>
            </div>
          </div> `;
      $('.body_tilt').append($html);
    });
    $("body").on("click",".remove_tilt",function(e){
       $(this).parents('.remove_tilt').remove();
    });
  });
</script>