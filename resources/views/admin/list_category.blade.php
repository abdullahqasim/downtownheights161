@extends('layout.admin_layout')

@section('space-work')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List Sub Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List Sub Category</li>
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
                <h3 class="card-title">List Sub Category</h3>
                <a href="{{ route('add_category') }}" class="btn btn-success btn-sm" style="float: right;">Add Sub Category</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No#</th>
                    <th>Name</th>
                    <th>Main Category</th>
                    <th>Description</th>
                    <th>Image</th>
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
                    <td>@foreach ($Parent_category as $Parent_categorys)
                      @if($categoryes->p_cat_id==$Parent_categorys->id)
                          {{$Parent_categorys->name}}
                        @endif
                    @endforeach
                    </td>
                    <td>{{ $categoryes->description }}</td>
                    <td><img src="{{ asset('images/'.$categoryes->image.'') }}" alt="" width="100px"></td>
                    <td>
                      <a href="/edit-category/{{$categoryes->id}}" class="btn btn-primary btn-sm">Edit</a>
                     <a href="/delete-category/{{$categoryes->id}}" class="btn btn-danger btn-sm">Delete</a> 
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