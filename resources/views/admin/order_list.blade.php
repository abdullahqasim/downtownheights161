@extends('layout.admin_layout')

@section('space-work')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Order List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Order List</li>
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
                <h3 class="card-title">Order List</h3>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No#</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>verity</th>
                    <th>Cord</th>
                    <th>Tilt</th>
                    <th>Room Type</th>
                    <th>Width</th>
                    <th>W.Fiction</th>
                    <th>Height</th>
                    <th>H.Fiction</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  @php
                      $i=1;
                    @endphp
                  <tbody>
                    @foreach ($order as $orders)
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{ $orders->product_name }}</td>
                    <td>{{ $orders->product_description }}</td>
                    <td>{{ $orders->price }}</td>
                    <td>{{ $orders->verity }}</td>
                    <td>{{ $orders->cord }}</td>
                    <td>{{ $orders->tilt }}</td>
                    <td>{{ $orders->room_type }}</td>
                    <td>{{ $orders->width }}</td>
                    <td>{{ $orders->width_friction }}</td>
                    <td>{{ $orders->hieght }}</td>
                    <td>{{ $orders->hieght_friction }}</td>
                   
                    <td>
                      <a href="/edit-order/{{$orders->id}}" class="btn btn-primary btn-sm">Edit</a>
                     <a href="/delete-order/{{$orders->id}}" class="btn btn-danger btn-sm">Delete</a> 
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