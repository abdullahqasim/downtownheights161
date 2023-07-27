<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Dashboard</title>

   <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">


  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"></span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> Name : {{auth()->user()->name}}
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> Email : {{auth()->user()->email}}
          </a>

          <div class="dropdown-divider"></div>
          <a href="{{route('logout')}}" class="dropdown-item dropdown-footer">Logout</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.html" class="brand-link">
      <span class="brand-text font-weight-light">Fast Pro</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ asset('pages/examples/profile.html')}}" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="/admin/dashboard" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
           <!---- Parent Category ----->
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p> Parent Category
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('add_main_category') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Parent Category</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('list_main_category')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List Parent Category</p>
                  </a>
                </li>
              </ul>
          </li>
          <!---- Sub Category ----->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>Sub Category
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('add_category') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Sub Category</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('list_category') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List Sub Category</p>
                  </a>
                </li>
    
              </ul>
    
          </li>
          <!---- Products ----->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p> Products
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('add_product') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('list_product') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product List</p>
                </a>
              </li>

            </ul>

           
          </li>
          <!---- Measurment ----->
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p> Measurment
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('add_Measurment') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Measurment</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('list_measurment') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Measurment List</p>
                  </a>
                </li>
                
                
              </ul>
    
          </li> -->
          <!---- Variants ----->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p> Variants
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('add_variants') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Variants</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('list_variants') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Variants List</p>
                  </a>
                </li>
              </ul>
          </li>
          <!---- Orders ----->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p> Order
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('order_list') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List Order</p>
                  </a>
                </li>
              </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
        @yield('space-work')
        <footer class="main-footer">
            <strong>Copyright &copy; 2022 <a href="https://cubicussytems.com">Cubicus Systems</a>.</strong> All rights reserved.
          </footer>

          <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

    </div>

        <!-- jQuery -->
        <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
        $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- ChartJS -->
        <script src="{{ asset('plugins/chart.js/Chart.min.js')}}"></script>
        <!-- Sparkline -->
        <script src="{{ asset('plugins/sparklines/sparkline.js')}}"></script>
        <!-- JQVMap -->
        <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
        <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
        <!-- daterangepicker -->
        <script src="{{ asset('plugins/moment/moment.min.js')}}"></script>
        <script src="{{ asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
        <!-- Summernote -->
        <script src="{{ asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
        <!-- overlayScrollbars -->
        <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('dist/js/adminlte.js')}}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('js/demo.js')}}"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{ asset('dist/js/pages/dashboard.js')}}"></script>
              <!-- DataTables  & Plugins -->
        <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{ asset('plugins/jszip/jszip.min.js')}}"></script>
        <script src="{{ asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
        <script src="{{ asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
        <!-- Page specific script -->
        <script>
          $(function () {
            $("#example1").DataTable({
              "responsive": true, "lengthChange": false, "autoWidth": false,
              "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": false,
              "ordering": true,
              "info": true,
              "autoWidth": false,
              "responsive": true,
            });
          });
        </script>
  </body>
</html>
