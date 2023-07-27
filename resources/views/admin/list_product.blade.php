@extends('layout.admin_layout')

@section('space-work')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Products List</li>
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
                <h3 class="card-title">Products List</h3>
                <a href="{{ route('add_product') }}" class="btn btn-success btn-sm" style="float: right;">Add New Product</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No#</th>
                    <th>Name</th>
                    <th>Sub Categories</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  @php
                      $i=1;
                    @endphp
                  <tbody>
                    @foreach ($product as $products)
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{ $products->name }}</td>
                    <td>@foreach ($sub_category as $sub_categorys)
                      @if($products->c_id==$sub_categorys->id)
                          {{$sub_categorys->name,","}}
                        @endif
                    @endforeach
                    </td>
                    <td>{{ $products->description }}</td>
                    {{-- <td>{{ $products->price }}</td> --}}
                    <td><img src="{{ asset('images/'.$products->image.'') }}" alt="" width="100px"></td>
                    <td>
                     <a href="/edit-product/{{$products->id}}" class="btn btn-primary btn-sm">Edit</a>
                     <a href="/delete-product/{{$products->id}}" class="btn btn-danger btn-sm">Delete</a> 
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