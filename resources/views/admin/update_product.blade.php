@extends('layout.admin_layout')

@section('space-work')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Product</li>
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
                <small style="color: green">{{  Session::get('success')}}</small>
               @endif
              <div class="card-header">
                <h3 class="card-title">Edit Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             
                <form method="POST" action="{{ route('update_product') }}" enctype="multipart/form-data"> 
               @csrf
                <div class="card-body">
                    <input type="hidden" name="id" class="form-control" value="{{$product->id}}">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{$product->name}}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" class="form-control" value="{{$product->description}}">
                      </div>
                    </div>
                    {{-- <div class="col-md-6">
                      <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" name="price" value="{{$product->price}}">
                      </div>
                    </div> --}}
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Sub Category</label>
                        <select name="c_id" class="form-control"> 
                          <option>Select Sub Category</option>
                        @foreach($category as $val)
                        <option value="{{$val->id}}" {{($product->c_id==$val->id) ? "selected" : "" }} >{{$val->name}} </option>
                      @endforeach
</select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Product Type</label>
                        <select name="product_type" class="form-control"> 
                          <option>Select Product Type</option>
                        <option value="Control Types" {{($product->product_type=="Control Types") ? "selected" : ""}} >Control Types</option>
                        <option value="Styles" {{($product->product_type=="Styles") ? "selected" : ""}} >Styles</option>
                        <option value="Headrails" {{($product->product_type=="Headrails") ? "selected" : ""}} >Headrails</option>
                        <option value="Light Controls" {{($product->product_type=="Light Controls") ? "selected" : ""}}>Light Controls</option>
                        <option value="Light/Privacy"{{($product->product_type=="Light/Privacy") ? "selected" : ""}} >Light/Privac</option>
                        <option value="Vane Sizes" {{($product->product_type=="Vane Sizes") ? "selected" : ""}} >Vane Sizes</option>
                    
</select>
                      </div>
                    </div>


                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                          
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                          </div>
                        </div>
                      </div>
                      <img src="{{asset('images/'.$product->image)}}" value="{{(isset($product->image) ? $product->image : "")}}" alt="" width="100px">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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