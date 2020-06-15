<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
<title>@yield('title')</title>
<link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
<link rel="stylesheet" href="{{ asset('dashboard_assets') }}/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('dashboard_assets') }}/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css"/>
<link rel="stylesheet" href="{{ asset('dashboard_assets') }}/plugins/charts-c3/plugin.css"/>

<link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">

<!-- Bootstrap Tagsinput Css -->
<link rel="stylesheet" href="{{ asset('dashboard_assets') }}/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css">


<link rel="stylesheet" href="{{ asset('dashboard_assets') }}/plugins/dropify/css/dropify.min.css">
<!-- Bootstrap Select Css -->
<link href="{{ asset('dashboard_assets') }}/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('dashboard_assets') }}/plugins/morrisjs/morris.min.css" />
<link rel="stylesheet" href="{{ asset('dashboard_assets') }}/plugins/summernote/dist/summernote.css" />
<!-- JQuery DataTable Css -->
<link rel="stylesheet" href="{{ asset('dashboard_assets') }}/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('dashboard_assets') }}/plugins/select2/select2.css" />
<!-- Custom Css -->
<link rel="stylesheet" href="{{ asset('dashboard_assets') }}/css/style.min.css">
</head>

<body class="theme-blush">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="{{ asset('dashboard_assets') }}/images/loader.svg" width="48" height="48" alt="Aero"></div>
        <p>Please wait...</p>
    </div>
</div>

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<!-- Main Search -->
<div id="search">
    <button id="close" type="button" class="close btn btn-primary btn-icon btn-icon-mini btn-round">x</button>
    <form>
      <input type="search" value="" placeholder="Search..." />
      <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div>

  @include('layouts.dashboard_navbarright')

  <!-- Left Sidebar -->
  @include('layouts.dashboard_leftsidebar')

  <!-- Right Sidebar -->
  @include('layouts.dashboard_rightsidebar')

<!-- Main Content -->

@yield('content')

<!-- Jquery Core Js -->
<script src="{{ asset('dashboard_assets') }}/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
<script src="{{ asset('dashboard_assets') }}/bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->

<script src="{{ asset('dashboard_assets') }}/bundles/jvectormap.bundle.js"></script> <!-- JVectorMap Plugin Js -->
<script src="{{ asset('dashboard_assets') }}/bundles/sparkline.bundle.js"></script> <!-- Sparkline Plugin Js -->
<script src="{{ asset('dashboard_assets') }}/bundles/c3.bundle.js"></script>

<script src="{{ asset('dashboard_assets') }}/bundles/mainscripts.bundle.js"></script>
<script src="{{ asset('dashboard_assets') }}/js/pages/index.js"></script>

<script src="{{ asset('dashboard_assets') }}/plugins/dropify/js/dropify.min.js"></script>

<script src="{{ asset('dashboard_assets') }}/js/pages/forms/dropify.js"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="{{ asset('dashboard_assets') }}/bundles/datatablescripts.bundle.js"></script>
<script src="{{ asset('dashboard_assets') }}/plugins/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
<script src="{{ asset('dashboard_assets') }}/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('dashboard_assets') }}/plugins/jquery-datatable/buttons/buttons.colVis.min.js"></script>
<script src="{{ asset('dashboard_assets') }}/plugins/jquery-datatable/buttons/buttons.flash.min.js"></script>
<script src="{{ asset('dashboard_assets') }}/plugins/jquery-datatable/buttons/buttons.html5.min.js"></script>
<script src="{{ asset('dashboard_assets') }}/plugins/jquery-datatable/buttons/buttons.print.min.js"></script>
<script src="{{ asset('dashboard_assets') }}/js/pages/tables/jquery-datatable.js"></script>


<script src="{{ asset('dashboard_assets') }}/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script> <!-- Bootstrap Tags Input Plugin Js -->

<script src="{{ asset('dashboard_assets') }}/plugins/select2/select2.min.js"></script> <!-- Select2 Js -->

<script src="{{ asset('dashboard_assets') }}/plugins/ckeditor/ckeditor.js"></script> <!-- Ckeditor -->
<script src="{{ asset('dashboard_assets') }}/js/pages/forms/editors.js"></script>
<script src="{{ asset('dashboard_assets') }}/plugins/summernote/dist/summernote.js"></script>

<script src="{{ asset('dashboard_assets') }}/js/pages/forms/advanced-form-elements.js"></script>

<!--Sweetalert Js file link -->
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<!--toastr Js file link -->
<script src="{{ asset('js/toastr.min.js') }}"></script>
<!--toastr custome code here-->
<script type="text/javascript">
  @if (session('message'))
      var alert = "{{ session('type') }}";
      var message = "{{ session('message') }}";
      switch (alert) {
        case "error":
          toastr.error(message)
          break;
        case "warning":
          toastr.warning(message)
          break;
        case "info":
          toastr.info(message)
          break;
        default:
          toastr.success(message)
          break;
      }
  @endif

  $(document).on("click","#delete",function(e){
      e.preventDefault();
      var link = $(this).attr("href");
        swal({
          title: "Are you Want to Delete?",
          text: "Once Delete, This will be permanently Delete!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete)=> {
          if(willDelete) {
            window.location.href = link;
            event.preventDefault(); document.getElementById('delete-form').submit();
          }
          else{
            swal("Cancelled", "Your Data Is Safe :)", "error");
          }
        });
      });
</script>
@yield('script')

</body>
</html>
