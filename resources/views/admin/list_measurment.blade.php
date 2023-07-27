@extends('layout.admin_layout')

@section('space-work')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Measurment List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Measurment List</li>
            </ol>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Measurment. List</h3>
                <a href="{{ route('add_Measurment') }}" class="btn btn-success btn-sm" style="float: right;">Add New Measurment.</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No#</th>
                    <th>Width</th>
                    <th>Hieght</th>
                    <th>Price</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                      $i=1;
                    @endphp
                    @foreach($measurment as $measurments)
                    @php
                      $data = json_decode($measurments->measurments); 
                      
                    @endphp
                  <tr>
                    <td>{{$i++}}</td>
                    <td>
                      @foreach ($data->width as $width)
                          {{$width.","}}
                      @endforeach
                    </td>
                    <td>
                      @foreach ($data->height as $height)
                          {{$height.","}}
                      @endforeach
                    </td>
                    <td>
                      @foreach ($data->price as $price)
                          {{$price.","}}
                      @endforeach
                    </td>
                    
                   
                    <td>
                      <a href="/edit-measurment/{{$measurments->id}}" class="btn btn-primary btn-sm">Edit</a>
                     <a href="/delete-measurment/{{$measurments->id}}" class="btn btn-danger btn-sm">Delete</a> 
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection