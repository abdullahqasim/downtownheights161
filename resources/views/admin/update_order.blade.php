@extends('layout.admin_layout')

@section('space-work')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Order</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Order</li>
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
                <h3 class="card-title">Edit Order</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             
                <form method="POST" action="{{ route('update_order') }}" enctype="multipart/form-data"> 
               @csrf
               <input type="hidden" name="id" id="" value="{{$order->id}}">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="name" class="form-control"  value="{{$order->product_name}}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Product Description</label>
                        <input type="text" name="description" class="form-control" value="{{$order->product_description}}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" name="price" value="{{$order->price}} ">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Virity</label>
                        <input type="text" name="verity" class="form-control" value="{{$order->verity}}">
        
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Width</label>
                        <select name="width" class="form-control"> 
                          <option>Select Width</option>
                          {{-- @if(!$measurment->isEmpty())
                          @foreach ($measurment as $measurments)
                            <option value="{{ $measurments->width}}" {{ ($measurments->width == $order->width ? "selected" : "") }} >{{ $measurments->width}}</option>
                          @endforeach
                          @endif --}}
                          <option value="24">24</option>
                          <option value="30">30</option>
                          <option value="36">36</option>
                          <option value="42">42</option>
                          <option value="48">48</option>
                          <option value="54">54</option>
                          <option value="60">60</option>
                          <option value="66">66</option>
                          <option value="72">72</option>
                          <option value="84">84</option>
                          <option value="96">96</option>
                          <option value="108">108</option>


                                
                         </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label>Height</label>
                          <select name="height" class="form-control"> 
                            <option>Select Height</option>
                            {{-- @if(!$measurment->isEmpty())
                            @foreach ($measurment as $measurments)
                            <option value="{{ $measurments->height}}" {{ ($measurments->height==$order->hieght ? "selected" : "") }} >{{ $measurments->height}}</option>
                          @endforeach --}}
                          {{-- @endif --}}

                          <option value="30">30</option>
                          <option value="36">36</option>
                          <option value="42">42</option>
                          <option value="48">48</option>
                          <option value="54">54</option>
                          <option value="60">60</option>
                          <option value="66">66</option>
                          <option value="72">72</option>
                      </select>
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