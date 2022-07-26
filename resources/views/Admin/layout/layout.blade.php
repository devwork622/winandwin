<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Win&amp;Win @yield('title')</title>
  <!-- site favicon -->
  <link rel="shortcut icon" type="image/png" href="assets/images/favicon.jpg">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <!-- Nucleo Icons -->
  <link href="{{url('admin-assets/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{url('admin-assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link id="pagestyle" href="{{url('admin-assets/css/soft-ui-dashboard.css?v=1.0.3')}}" rel="stylesheet" />
   
  <link rel="stylesheet" href="{{url('assets/css/jquery-ui.css')}}">
    
  @stack('css')
  
  <link href="{{url('admin-assets/css/custom.css')}}" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100 {{ (\Request::is('rtl') ? 'rtl' : (Request::is('virtual-reality') ? 'virtual-reality' : '')) }} ">
    
    @if(empty(auth()->user()) || auth()->user()->role != "0"  )

      @yield('content')
      @include('Admin.layout.footers.guest.footer')
    @else
          
      @include('Admin.layout.navbars.auth.sidebar')
      <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg {{ (Request::is('rtl') ? 'overflow-hidden' : '') }}">
        @include('Admin.layout.navbars.auth.nav')
        <div class="container-fluid py-4">
          @yield('content')
          @include('Admin.layout.footers.auth.footer')
        </div>
      </main>

    @endif
    
    @if(session()->has('success'))
    <div x-data="{ show: true}"
        x-init="setTimeout(() => show = false, 4000)"
        x-show="show"
        class="position-fixed bg-success rounded right-3 text-sm py-2 px-4">
      <p class="m-0">{{ session('success')}}</p>
    </div>
    @endif

    
  </div>

  <script src="{{url('assets/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{url('assets/js/jquery-ui.js')}}"></script>
  <script src="{{url('admin-assets/js/core/popper.min.js')}}"></script>
  <script src="{{url('admin-assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{url('admin-assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{url('admin-assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
  <script src="{{url('admin-assets/js/plugins/fullcalendar.min.js')}}"></script>
  <script src="{{url('admin-assets/js/plugins/chartjs.min.js')}}"></script>
  <script src="{{url('admin-assets/js/plugins/datatables.js')}}"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{url('admin-assets/js/soft-ui-dashboard.min.js?v=1.0.3')}}"></script>

  
  <!-- jquery library js file -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  @stack('js')
</body>

</html>