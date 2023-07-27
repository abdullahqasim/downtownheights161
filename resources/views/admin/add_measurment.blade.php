@extends('layout.admin_layout')

@section('space-work')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Measurment</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Measurment</li>
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
                <h3 class="card-title">Add Measurment</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             
                <form method="POST" action="{{ route('store_measurment') }}" enctype="multipart/form-data"> 
               @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>category</label>
                        <select name="category_id" id="" required class="form-control">
                          <option value=""></option>
                          @foreach ( $Product_Category as $Product_Categories)
                            <option value="{{$Product_Categories->id}}">{{$Product_Categories->name}}</option>
                          @endforeach

                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row appned_body">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Width</label>
                        <input type="number" name="width[]" required class="form-control" placeholder="Width">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Hieght</label>
                        <input type="number" name="height[]" required class="form-control" placeholder="Hieght">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Price</label>
                        <input type="number" name="price[]" required class="form-control" placeholder="Price">
                      </div>
                    </div>
                    
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                     <button type="button" class="btn btn-success add_row">Add Row</button>
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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      $('.add_row').click(function(){
          var html = `<div class="col-md-4">
                      <div class="form-group">
                        <label>Width</label>
                        <input type="number" name="width[]" class="form-control" placeholder="Width">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Hieght</label>
                        <input type="number" name="height[]" class="form-control" placeholder="Hieght">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Price</label>
                        <input type="number" name="price[]" class="form-control" placeholder="Price">
                      </div>
                    </div>`;
                    $('.appned_body').append(html);

      });
    });
  </script>
@endsection