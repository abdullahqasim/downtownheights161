@extends('layout.admin_layout')

@section('space-work')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List Parent Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List Parent Category</li>
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
                <h3 class="card-title">List Parent Category</h3>
                <a href="{{ route('add_main_category') }}" class="btn btn-success btn-sm" style="float: right;">Add Parent Category</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No#</th>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  @php
                      $i=1;
                    @endphp
                  <tbody>
                    @foreach ($category as $categoryes)
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{ $categoryes->name }}</td>
                    <td>
                      <a href="/edit-parent-category/{{$categoryes->id}}" class="btn btn-primary btn-sm">Edit</a>
                     <a href="/delete-parent-category/{{$categoryes->id}}" class="btn btn-danger btn-sm">Delete</a> 
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