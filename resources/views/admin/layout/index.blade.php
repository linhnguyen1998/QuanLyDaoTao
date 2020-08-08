<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Quản Lý Sắp Xếp Thời Khóa Biểu</title>
    <meta name="description" content="sort scheldure">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <base href="{{asset('')}}">

    <link rel="apple-touch-icon" href="admin_asset/apple-icon.png">
    <link rel="shortcut icon" href="admin_asset/favicon.ico">


    <link rel="stylesheet" href="admin_asset/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin_asset/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="admin_asset/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="admin_asset/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin_asset/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="admin_asset/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="admin_asset/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="admin_asset/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


<!-- Left Panel -->

@include('admin.layout.menu')

<!-- Left Panel -->

<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!-- Header-->
    @include('admin.layout.header')
    <!-- Header-->
    @yield('content')
    <!-- .content -->
</div><!-- /#right-panel -->

<!-- Right Panel -->

<script src="admin_asset/vendors/jquery/dist/jquery.min.js"></script>
<script src="admin_asset/vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="admin_asset/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="admin_asset/assets/js/main.js"></script>


<script src="admin_asset/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="admin_asset/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="admin_asset/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="admin_asset/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="admin_asset/vendors/jszip/dist/jszip.min.js"></script>
<script src="admin_asset/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="admin_asset/vendors/pdfmake/build/vfs_fonts.js"></script>
<script src="admin_asset/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="admin_asset/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="admin_asset/vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<script src="admin_asset/assets/js/init-scripts/data-table/datatables-init.js"></script>

@yield('script')
</body>

</html>
