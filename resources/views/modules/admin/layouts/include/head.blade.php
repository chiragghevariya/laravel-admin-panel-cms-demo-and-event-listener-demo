<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }} | Admin Panel</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href='{{ asset("public/themes/admin/")}}/css/bootstrap.min.css'>
    <!-- Font Awesome -->
    <?php /* tostrr */ ?>

    <link rel="stylesheet" type="text/css" href="{{asset('public/toaster/toastr.css')}}">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href='{{ asset("public/themes/admin/plugins/")}}/jvectormap/jquery-jvectormap-1.2.2.css'>
    <!-- Theme style -->
    <link rel="stylesheet" href='{{ asset("public/themes/admin/")}}/css/style.min.css'>
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    
    <link rel="stylesheet" href='{{ asset("public/themes/admin/")}}/css/_all-skins.min.css'>
    
    <link rel="stylesheet" href="{{ asset('public/themes/admin/plugins/')}}/datatables/dataTables.bootstrap.css">

    <link rel="stylesheet" href="{{ asset('public/themes/admin/plugins/')}}/datepicker/datepicker3.css">
    <link rel="stylesheet" href="{{ asset('public/themes/admin/plugins/')}}/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="{{ asset('public/themes/admin/plugins/colorpicker/bootstrap-colorpicker.min.css')}}">


    <link rel="stylesheet" href="{{ asset('public/css/admin/')}}/admin_custom.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('public/themes/admin/plugins/')}}/fancybox/jquery.fancybox.min.css">
    <link rel="stylesheet" href="{{ asset('public/themes/admin/plugins/')}}/select2/select2.min.css">
    <link rel="stylesheet" href="{{ asset('public/themes/admin/css/')}}/dialog.css">
        
    <!-- <script src="{{asset('toaster/toastr.min.js')}}" type="text/javascript"></script> -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">

</head>