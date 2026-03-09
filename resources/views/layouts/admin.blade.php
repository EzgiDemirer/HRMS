<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>HRMS</title>

  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/fonts/SansPro/SansPro.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/css/mycustomstyle.css') }}">

  @yield('css')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  @include('admin.includes.navbar')

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
      <img src="{{ asset('assets/admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">HRMS</span>
    </a>

    @include('admin.includes.sidebar')
  </aside>

  @include('admin.includes.content')
  @include('admin.includes.footer')

</div>

<script src="{{ asset('assets/admin/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/admin/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/General.js') }}"></script>

@yield('script')
</body>
</html>