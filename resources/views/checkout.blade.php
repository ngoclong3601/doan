<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Adminpage</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Table style -->
  <link rel="stylesheets" href="plugins/adminpage.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="http://localhost:8000/home" class="nav-link">Home</a>
      </li>

    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->

      <!-- Notifications Dropdown Menu -->

      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fas fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Cart Food</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="http://localhost:8000/home">Home</a></li>
              <li class="breadcrumb-item active">
                    <button type="button"   class="btn btn-success" class="close" data-toggle="modal" data-dismiss="modal" data-target="#Modal" >Thanh Toán</button>
                    
              </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
          </div>
          <div class="clearfix hidden-md-up"></div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header border-transparent">
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>

              <!-- /.card-header -->

              <div class="card-body p-0">
                <div class="table-responsive">
                    <div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
                        @if(count($cart))
                        <table  class="table m-0" style="text-align:center">
                            <thead>
                                <tr>
                                     <th>Product  </th>
                                    <th>Quantity </th>
                                    <th>Food Name </th>
                                     <th>Price</th>
                                      <th>Action</th>
                                    </tr>
                    </thead>
                    @foreach ($cart as $item)

                    <tbody>
                        <tr class="rem1">
                                <td class="invert-image">
                                    <a href="#">
                                        <img
                                        @if($item->options && $item->options->image)
                                        src="{{$item->options->image}}"
                                        @else
                                        src='#'
                                        @endif
                                        alt=" " class="img-responsive" />
                                    </a>
                                </td>
                                <td class="invert">
                                    <div class="quantity">
                                        <div class="quantity-select">
                                            <a onclick="decreaseItem({{$item->id}})" class="entry value-minus">&nbsp;</a>
                                            <div class="entry value"><span id="amount-{{$item->id}}">{{$item->qty}}</span>
                                            </div>
                                            <a onclick="increaseItem({{$item->id}})"
                                                class="entry value-plus active">&nbsp;</a>
                                        </div>
                                    </div>
                                </td>
                                <td class="invert">{{$item->name}}</td>
                                <td id="price-{{$item->id}}" class="invert">{{$item->subtotal}} </td>
                                <td> <button class="btn btn-icon waves-effect waves-light btn-danger m-b-5" type="button" onclick="removeitem({{$item->id}})" class="btn btn-primary" data-toggle="modal" data-target=""  >
                                  <i class="fa fa-trash"></i>
                                    </button>
                                  </td>

                            </tr>
                        </tbody>
                    @endforeach
                    <tfoot style="background-color:yellow;" >
					            <tr >
						            <th colspan="4">Total</th>
						            <th id="bill-total">{{Cart::subtotal()}} $ </th>
				            	</tr>
				              </tfoot>

                  </table>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>




  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- Thanh toan don hang-->
<div class="modal fade" id="Modal"  >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header"  >
          <h4 class="modal-title" >Thông Tin Khách Hàng</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <section>
          <section><div class="modal-body">
            @if(count($errors)>0)
              <div claas="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert">X</button>
                  <ul>
                    @foreach($errors->all() as $error)
                      <li>{{$error}}</li>
                    @endforeach
                  </ul>

              </div>
            @endif

            @if($message = Session::get('success'))
              <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss ="alert">X</button>
                <strong>{{$message}}</strong>
              </div>
            @endif
            <form action="{{url('sendemail/send')}}" method="POST" align="center" style="background-color:lightgray;">
              {{csrf_field() }}
            <label for="">HỌ VÀ TÊN</label><br>
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <input type="text" id="checkoutname" name="name" placeholder="Nguyên Văn A">
            <br>
            <label for="">SỐ ĐIỆN THOẠI</label> <br>
              <input type="text" id="checkoutphone" name="phone" placeholder="0123456789">
              <br>
            <label for="">ĐỊA CHỈ</label><br>
            <input type="text" id="checkoutaddress" name="address" placeholder="TP.HCM">
            <br>
            <label for="">Email</label><br>
            <input type="email" id="checkoutemail" name="email" placeholder="abc@gmail.com" ><br>
            <label for="">Message</label><br>
            <input type="text" name="message" id="">
            <br><br>
            <button  type="submit"  value="send" class="btn btn-success" >Đặt Hàng</button>
            </form>


            </div></section>

        </section>

      </div>
    </div>
  </div>






<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>


<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>

<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="dist/js/pages/dashboard2.js"></script>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <script src="{{asset('assets/js/thanhtoan.js')}}"></script>
  <script src="{{asset('assets/js/checkout.js')}}"></script>
</body>
</html>
