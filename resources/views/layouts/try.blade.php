<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
 
    <title>{{ config('app.name') }}</title>

  <!-- Custom fonts for this template-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" rel="stylesheet">
  <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <!-- Custom Scripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="{{ url('/') }}"> {{ config('app.name', 'Profit Trade') }}</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar -->
     <!-- Left Side Of Navbar -->
     <ul class="navbar-nav mr-auto">

    </ul>
    <ul class="navbar-nav ml-auto ml-md-0">
         <!-- Authentication Links -->
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
                @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                @endif
    </ul>  
  </nav>          
                @else
                    
        
     
      <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  v-pre>
          <i class="fas fa-user-circle fa-fw fa-2x"></i> {{ Auth::user()->name }} 
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="{{ url('user/'.Auth::user()->id) }}">Profile</a>
          <a class="dropdown-item" href="">Activity Log</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                </form>                             
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/home') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>MyPortfolio</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown" style="background-color:#2c3237;">
          <h6 class="dropdown-header" style="color:#d35400;">Actions</h6>
        <a class="dropdown-item" href="{{ url('/addstocks') }}" style=" color:#f39c12;">Add Stocks</a>
        <a class="dropdown-item" href="{{ url('/dashboard') }}" style=" color:#f39c12;">View Stocks</a>
          
          
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url("/history") }}">
          <i class="fas fa-fw fa-history"></i>
          <span>Stocks History</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-sort-amount-up-alt"></i>
          <span>Reports</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}">Dashboard</a>
          </li>
        {{-- -- <li class="breadcrumb-item active">Blank Page</li> ----}}
        </ol>
        @endguest
        <!-- Page Content -->
        <main class="py-4">
            @yield('content')
        </main>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer" style="width:100%; background-color:#ecf0f1;">
        <div class="container my-auto">
          <div class="footer-copyright text-center my-auto">
            <span style="color:#212529">Copyright ©<a href="{{ url('/') }}"> {{ config('app.name', 'Profit Trade') }}</a> 2019</span>
          </div>
        </div>
      </footer>
    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

 

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <!-- <script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin.min.js') }}"></script>
  <script>
        let myChart = document.getElementById('myChart').getContext('2d');

        let lineChart = new Chart(myChart, {
          type:'line',
          data:{
                labels:['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                datasets:[{
                  label:'Total Profits',
                  data:[
                  120,
                  110,
                  20,
                  200,
                  1000,
                  50,
                  200,
                  300,
                  500,
                  900,
                  100,
                  600,
                ],
                  background-color:'#e74c3c',
                }]
          },
        });
  </script>
</body>

</html>
