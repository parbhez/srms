<!DOCTYPE html>
<html>
<head>
  @include('partial.topbar')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    @include('partial.header')
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->

        @include('partial.sidebar')
     
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      @yield('header-title')
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      @yield('content')
     
    </section>
    <!-- /.content -->
  </div> 
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    @include('partial.footer')
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    @include('partial.bottom')
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  </aside>
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

@include('partial.bottom')
</body>
</html>


<script type="text/javascript">
  $(document).ready(function(){
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  })
</script>
