<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Adminpage</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Table style -->
  <link rel="stylesheets" href="{{asset('/plugins/adminpage.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{asset('/assets/css/muahang.css')}}">
 

 
    
 
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color:blue;" >
    <!-- Left navbar links -->
    <ul class="navbar-nav" >
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
 
      <!-- Messages Dropdown Menu -->
  
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE </span>
    </a>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">THÔNG TIN SẢN PHẨM </h1>
          </div>
        </div>
      </div>
    </div>
    <div id="idFood" style="display:none">{{$food->foodid}}</div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-body">
                <div class="tab-content p-0">
                      <div style="text-align:center;">
                          <img src="/{{$food -> img}}" alt=""><br><br>
                          <hr>
                        <div>
                        
                          <button  onclick="addToCart({{$food->foodid}})" type="button" class="btn btn-tinted btn--l YtgjXY_3a6p6c" aria-disabled="false"><i class="fa fa-shopping-cart"></i> Thêm Vào Giỏ Hàng
                          </button>
                          <a href='/checkout' class="btn btn-solid-primary btn--l YtgjXY" aria-disabled="false">Checkout</A>
                        </div>
                      </div>
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart"
                       style="position: relative; height: 100px;">
                      <canvas id="revenue-chart-canvas" height="100" style="height: 100px;"></canvas>                         
                   </div>
                  <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                    <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>                         
                  </div>  
                </div>
              </div>
            </div>
          </section>
          <section class="col-lg-5 connectedSortable">
              <div class="card bg-white text-dark">
                <div class="card-body">
                        <h2> {{$food->foodname}}</h2>
                          <hr>
                        <div class="gia" style="margin-top:10px;" >
                            <div id="price">Giá sản phẩm: {{$food->price}}</div>
                            <div>Số lượng còn: {{$food->quantity}} sản phẩm </div>

                        </div>
                          
                            <hr>
                          <div>
                              <a onclick="increaseCartItem({{$food->foodid}})"  class="btn btn-success"  >Tăng</a>
                              <input type="text" value="1" id="check" style="width:50px;padding:3px 6px;"/>
                              <a onclick="decreaseItem({{$food->foodid}})" class="btn btn-success" >Giảm</a>
                            <!-- Số lượng <input onclick="increaseCartItem({{$food->foodid}})" type="number" name="soluong" id="sl" value="1" min="1" max="100"> -->
                          </div>
                          <!-- <div class="input-group"> <span class="input-group-btn"> 
                             <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="quant[2]"> 
                              <span class="glyphicon glyphicon-minus"></span> </button></span> <input name="quant[2]" class="form-control input-number" value="1" min="1" max="10" type="text"> <span class="input-group-btn">    <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[2]"> <span class="glyphicon glyphicon-plus"></span> </button></span>  -->
                          
                                
                    
                    <div id="world-map" style="height: 250px; width: 100%;"></div>
                  </div> 
              </div>
            </div>
          </section>
        </div>
      </div>
    </section>       
  


  

               
 
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.0
    </div>
  </footer>
</div>


      
       
    
        



<!-- jQuery -->
<script src="{{asset('/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/dist/js/adminlte.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('/dist/js/demo.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>

<!-- ChartJS -->
<script src="{{asset('/plugins/chart.js/Chart.min.js')}}"></script>

<!-- PAGE SCRIPTS -->
<script src="{{asset('/dist/js/pages/dashboard2.js')}}"></script>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="{{asset('/assets/js/foodDetail.js')}}"></script>

  <script src="{{asset('/assets/js/oderpage.js')}}"></script>
  

	
</body>
</html>

