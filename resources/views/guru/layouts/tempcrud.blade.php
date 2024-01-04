<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('sources/vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('sources/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('sources/vendors/css/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('sources/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" href="{{ asset('sources/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('sources/js/select.dataTables.min.css') }}">
  @yield('css')
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('sources/css/vertical-layout-light/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('sources/images/alamy-logo.png') }}" />
  <script src="https://kit.fontawesome.com/2066cab7a7.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<style>
    .ctr {
        text-align: center !important;
    }
    
    thead > tr > th, tbody > tr > td{
        vertical-align: middle !important;
    }

    td> input.form-control{
        width: 60px !important;
        padding: 8px !important;
        box-shadow: none !important;
    }

    input[name=predikat]{
        align-items: center;
        width:60px !important;
        background:#fff !important;
        box-shadow: none !important;
    }

    input[disabled],input[disabled]:hover{
        cursor: default !important;
        border:none !important;
    }
    
    .textarea-rapot{
        font-size:11px !important;
        background: #fff !important;
        border:none !important;
        font-size: 11px !important;
        cursor: default !important;
    }

    @media (min-width: 768px) {
        .img-details {
            margin-left: 40px;
        }
        .btn-details {
            margin-top: 28px !important;
        }
        .btn-details-siswa {
            margin-top: 175px !important;
        }
    }
</style>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
   @include('guru/layouts/navcrud')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
      <!-- partial -->
      <div class="main-panel">
       @yield('isi')
      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  @include('guru/layouts/footer')
{{-- 
  <!-- plugins:js -->
  <script src="{{ asset('sources/vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ asset('sources/vendors/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('sources/vendors/datatables.net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('sources/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
  <script src="{{ asset('sources/js/dataTables.select.min.js') }}"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('sources/js/off-canvas.js') }}"></script>
  <script src="{{ asset('sources/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('sources/js/template.js') }}"></script>
  <script src="{{ asset('sources/js/settings.js') }}"></script>
  <script src="{{ asset('sources/js/todolist.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('sources/js/dashboard.js') }}"></script>
  <script src="{{ asset('sources/js/Chart.roundedBarCharts.js') }}"></script>
  <!-- End custom js for this page-->
</body>
@yield('js')
</html> --}}

