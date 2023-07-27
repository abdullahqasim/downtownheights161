@extends('layout.admin_layout')

@section('space-work')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Variants List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Variants List</li>
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
                <h3 class="card-title">Variants List</h3>
                <a href="{{ route('add_variants') }}" class="btn btn-success btn-sm" style="float: right;">Add New Variants</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No#</th>
                    <th style="width:30%;">Product Name</th>
                    <th>Inside Mount</th>
                    <th>Outside Mount</th>
                    <th>Valance Style</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                    @php
                      $i=1;
                    @endphp
                  <tbody>
                    @foreach ($varition as $varitions)
                    @php  $data = json_decode($varitions->variation); @endphp
                  <tr>
                    <td style="vertical-align: middle;">{{$i++}}</td>
                    <td style="vertical-align: middle;">@foreach ($Product as $Products)
                      @if($varitions->product_id==$Products->id)
                          {{$Products->name,","}}
                        @endif
                    @endforeach
                    </td>
                    <td style="vertical-align: middle; text-align:center;"><img src="{{ asset('images/' . $varitions->inside_mount . '') }}" alt="" width="70px"></td>
                    <td style="vertical-align: middle; text-align:center;"><img src="{{ asset('images/' . $varitions->outside_mount . '') }}" alt="" width="70px"></td>
                    <td style="vertical-align: middle; text-align:center;">{{$varitions->title1}}<br>
                      <img src="{{ asset('images/' . $varitions->image1 . '') }}" alt="" width="100px">
                    </td>
                    <td style="vertical-align: middle;">
                     <a href="/edit-variants/{{$varitions->id}}" class="btn btn-primary btn-sm">Edit</a>
                     <a href="/delete-variants/{{$varitions->id}}" class="btn btn-danger btn-sm">Delete</a> 
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