@extends('layout.admin_layout')

@section('space-work')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Variants</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Add Variants</li>
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
              <h3 class="card-title">Add Variants</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <form method="POST" action="{{ route('store_variants') }}" enctype="multipart/form-data">
              @csrf
              <div class="card-body">

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Product</label>
                      <select name="product_id" id="" class="form-control" required>
                        <option value="">Select Product</option>
                        @foreach($product as $products)
                        <option value="{{$products->id}}">{{$products->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>

                <hr>
                <!-- FINISH -->
                <div class="row">
                  <div class="col-md-12">
                    <h4>FINISH</h4>
                  </div>
                  <div class="color_body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Name</label>
                          <input type="text" name="name[]" class="form-control" required placeholder="Name" />
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Image</label>
                          <input type="file" name="images_multiple[]"  class="form-control-file" />
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <br>
                          <button type="button" id="add_color" class="btn btn-success add_color">Add</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <hr>
                <!-- MOUNT -->
                <div class="row">
                  <div class="col-md-12">
                    <h4>MOUNT</h4>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputFile">Inside Mount</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" required name="inside" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputFile">OutSide Mount</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" required name="outside" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                        </div>
                      </div>
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
                      <input type="number" name="discount" class="form-control" placeholder="Product discount in %">
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
                      <input type="number" name="shipping" class="form-control" placeholder="Product shipping like 5">
                    </div>
                  </div>
                </div>
                <hr>

                 <!-- Product Tax -->
                <div class="row">
                  <div class="col-md-12">
                    <h4 style="text-transform: uppercase;">Product tax in %</h4>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Product Tax</label>
                      <input type="number" name="tax" class="form-control" placeholder="Product Tax in %">
                    </div>
                  </div>
                </div>
                <hr>
                <!-- MEASURMENT -->
                <div class="row">
                  <div class="col-lg-12">
                    <h4>MEASURMENT</h4>
                  </div>
                </div>
                <div class="appned_body">
                  <div class="row">
                    <div class="col-md-2">
                        <label>Width 1</label>
                        <input type="number" name="width[]" required class="form-control kamran" placeholder="Width">
                    </div>
                    <div class="col-md-2">
                        <label>Hieght</label>
                        <input type="number" name="height[]" required class="form-control" placeholder="Hieght">
                    </div>
                    <div class="col-md-2">
                        <label>Price</label>
                        <input type="number" name="price[]" required class="form-control" placeholder="Price">
                    </div>
                    <div class="col-md-3">
                        <label>Double Valance Price</label>
                        <input type="number" name="double_valance[]" class="form-control" placeholder="Double Valance Price">
                    </div>
                    <div class="col-md-3">
                        <br>
                        <button type="button" class="btn btn-success add_price_row">Add Row</button>
                    </div>
                  </div>
                </div>                
               
                <hr>
               
                <!-- Valance Style -->
                <div class="row">
                  <div class="col-md-12">
                    <h4 style="text-transform: uppercase;">Valance Style</h4>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Title</label>
                      <input type="text" name="title1" class="form-control" placeholder="Title1">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputFile">Image</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="image1" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12"></div>
                    <div class="col-md-6">
                    <div class="form-group">
                      <label>Title</label>
                      <input type="text" name="title2" class="form-control" placeholder="Title2">
                    </div>
                  </div>
                    <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputFile">Image</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="image2" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <!-- CORD -->
                <div class="row">
                  <div class="col-md-12">
                    <h4>CORD</h4>
                  </div>
                  <div class="body_cord">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Cord</label>
                          <input type="text" name="cord[]" class="form-control" placeholder="Cord">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Cord Image</label>
                          <input type="file" name="cord_image[]"  class="form-control-file" />
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label>&nbsp;</label><br>
                          <button type="button" id="add_cord" class="btn btn-success add_cord">Add</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <hr>
                <!-- TILT -->
                <div class="row">
                  <div class="col-md-12">
                    <h4>Tilt</h4>
                  </div>
                   <div class="body_tilt">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Tilt</label>
                          <input type="text" name="tilt[]" class="form-control" placeholder="Tilt">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Cord Image</label>
                          <input type="file" name="tilt_image[]"  class="form-control-file" />
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label>&nbsp;</label><br>
                          <button type="button" id="add_tilt" class="btn btn-success add_tilt">Add</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <hr>
               
                <!-- Control Position -->
                <div class="row">
                  <div class="col-md-12">
                    <h4 style="text-transform: uppercase;">Control Position</h4>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Left</label>
                      <input type="text" name="position_left" class="form-control" placeholder="Left">
                    </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                        <label>Right</label>
                        <input type="text" name="position_right" class="form-control" placeholder="Right">
                      </div>
                  </div> 
                </div>
               
                <!-- /.card-body -->
                <div class="card-footer text-right">
                  <button type="submit" class="btn btn-primary">Add Variants</button>
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
    
    // Replacement Valance
    $('.add_replacement_valance_row').click(function() {
      var html = `
        <div class="row remove_valnc">
            <div class="col-md-8 ">
                <div class="form-group">
                    <label>Replacement valance</label>
                    <input type="text" name="replacement_valance[]"  class="form-control" placeholder="Replacement valance">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>&nbsp;</label><br>
                    <button type="button" class="btn btn-danger remove_valncBtn">X</button>
                </div>
            </div>
        </div>`;
      $('.replacement_valance').append(html);
    });
    $("body").on("click",".remove_valncBtn",function(e){
       $(this).parents('.remove_valnc').remove();
    });
    // Replacement Valance
    
    // Color
    $('.add_color').on("click", function() {
      $html = `
          <div class="row color_row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name[]" class="form-control" placeholder="Name" >
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Image</label>
                <input type="file" name="images_multiple[]"  class="form-control"  >
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <br>
                <button type="button" id="remove_color" class="btn btn-danger remove_color">X</button>
              </div>
            </div>
          </div>
            `;
      $('.color_body').append($html);
    });
    $("body").on("click",".remove_color",function(e){
       $(this).parents('.color_row').remove();
    });
    // Color
    // Maurement
    var i = 2;
    $('.add_price_row').click(function() {
      var html = `<div class="row remove_price">
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Width `+i+`</label>
                        <input type="number" name="width[]" class="form-control" placeholder="Width">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Hieght</label>
                        <input type="number" name="height[]" class="form-control" placeholder="Hieght">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Price</label>
                        <input type="number" name="price[]" class="form-control" placeholder="Price">
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
                  i++;
      $('.appned_body').append(html);
    });
    $("body").on("click",".remove_price",function(e){
       $(this).parents('.remove_price').remove();
    });
    // Maurement
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
            <div class="col-md-4">
              <div class="form-group">
                <label>Cord Image</label>
                <input type="file" name="cord_image[]"   class="form-control-file" />
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label>&nbsp;</label><br>
                <button type="button" id="add_cord" class="btn btn-danger remove_cordBtn">X</button>
              </div>
            </div>
          </div>`;
      $('.body_cord').append($html);
    });
    $("body").on("click",".remove_cordBtn",function(e){
       $(this).parents('.remove_cord').remove();
    });
    // Cord
    
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
            <div class="col-md-4">
              <div class="form-group">
                <label>Cord Image</label>
                <input type="file" name="tilt_image[]"   class="form-control-file" >
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label>&nbsp;</label><br>
                <button type="button" id="remove_tiltBtn" class="btn btn-danger remove_tiltBtn">X</button>
              </div>
            </div>
          </div> `;
      $('.body_tilt').append($html);
    });
    $("body").on("click",".remove_tiltBtn",function(e){
       $(this).parents('.remove_tilt').remove();
    });    
  });
</script>