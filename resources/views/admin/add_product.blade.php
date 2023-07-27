@extends('layout.admin_layout')

@section('space-work')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Product</li>
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
                <h3 class="card-title">Add Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             
                <form method="POST" action="{{ route('store_product') }}" enctype="multipart/form-data"> 
               @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Product Name">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Description</label>


                        <input type="text" name="description" class="form-control" placeholder="Description">
                      </div>
                    </div>
                    {{-- <div class="col-md-6">
                      <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" name="price" placeholder="Product Price">
                      </div>
                    </div> --}}
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Sub Category</label>
                        <select name="c_id" class="form-control"> 
                          <option>Select Sub Category</option>
                        @foreach($category as $val)
                        <option value="{{$val->id}}" >{{$val->name}} </option>
                      @endforeach
</select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Product Type</label>
                        <select name="product_type" class="form-control"> 
                          <option>Select Product Type</option>
                      
                        <option value="Control Types" >Control Types</option>
                        <option value="Styles" >Styles</option>
                        <option value="Headrails" >Headrails</option>
                        <option value="Light Controls" >Light Controls</option>
                        <option value="Light/Privacy" >Light/Privac</option>
                        <option value="Vane Sizes" >Vane Sizes</option>
                    
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