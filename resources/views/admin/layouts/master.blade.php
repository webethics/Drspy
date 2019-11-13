<!DOCTYPE html>
<html lang='en'><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Drspy</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
     <link rel="shortcut icon" type="image/x-icon" href="{{ url('frontend/images/favicon.ico') }}">
    <!-- <link rel="shortcut icon" type="image/x-icon" href="{{ url('assets/frontend/images/favicon.png') }}"> -->
    <link rel="stylesheet" href="{{ url('assets/admin/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/admin/bootstrap/css/font-awesome.min.css') }}">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->

 <!-- <link rel="stylesheet" href="{{ url('assets/admin/dist/css/components.css') }}"> -->
     <link rel="stylesheet" href="{{ url('assets/admin/plugins/datatables/dataTables.bootstrap.css') }} ">
    <link rel="stylesheet" href="{{ url('assets/admin/dist/css/AdminLTE.css') }}">
    <link rel="stylesheet" href="{{ url('assets/admin/dist/css/bootstrap-tokenfield.css') }}">
    <link rel="stylesheet" href="{{ url('assets/admin/dist/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ url('assets/admin/dist/css/skins/skin-blue.css') }}">
    <link rel="stylesheet" href="{{ url('css/admin/style.css') }}">
    <link rel="stylesheet" href="{{ url('css/admin/custom.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ url('css/admin/colorpicker.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script>
	 base_url = '<?php echo url('/admin'); ?>';
	</script>

	<script src="{{ url('assets/admin/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>


  </head>
  <body class="hold-transition login-page hold-transition skin-blue sidebar-mini fixed">
        <div class='container-fluid'>
            <div class='row'>
                @yield('content')
            </div>
        </div>

    <script src="{{ url('assets/admin/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ url('assets/admin/dist/js/app.min.js')}}"></script>
    <!-- <script src="{{ url('assets/admin/dist/js/jquery-ui.js')}}"></script> -->
    <!-- <script src="{{ url('assets/admin/dist/js/bootstrap-tokenfield.min.js')}}"></script> -->
     <script src="{{ url('assets/admin/dist/js/bootstrap-filestyle.min.js')}}"></script>
     <script src="{{ url('assets/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>

     <script src="{{ url('assets/admin/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
     <!-- <script src="{{ url('js/admin/colorpicker.js')}}"></script> -->

     <!--  For CK EDitor -->
     <!-- <script src="{{ url('assets/admin/dist/js/ckeditor.js')}}"></script> -->
     <!-- script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script -->
     <!-- <script src="{{ url('js/admin/dropzone.js')}}"></script> -->
     <!-- <script src="{{ url('js/admin/common.js')}}"></script> -->
     <!-- script src="{{ url('js/admin/restaurant.js')}}"></script -->

    </body>
</html>
