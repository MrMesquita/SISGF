<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SISGF - Sistema gerenciador de farmácia</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="favicon.ico" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="{{url('/')}}/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('/')}}/node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{url('/')}}/node_modules/icon-kit/dist/css/iconkit.min.css">
    <link rel="stylesheet" href="{{url('/')}}/node_modules/ionicons/dist/css/ionicons.min.css">
    <link rel="stylesheet" href="{{url('/')}}/node_modules/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="{{url('/')}}/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{url('/')}}/node_modules/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="{{url('/')}}/node_modules/c3/c3.min.css">
    <link rel="stylesheet" href="{{url('/')}}/node_modules/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="{{url('/')}}/node_modules/owl.carousel/dist/assets/owl.carousel.css">
    <link rel="stylesheet" href="{{url('/')}}/node_modules/owl.carousel/dist/assets/owl.theme.default.css">
    <link rel="stylesheet" href="{{url('/')}}/dist/css/theme.min.css">
    <script src="{{url('/')}}/src/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="wrapper">
        <header class="header-top" header-theme="light">
            <div class="container-fluid">
                <div class="d-flex justify-content-between">
                    <div class="top-menu d-flex align-items-center">
                        <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                        <div class="header-search">
                            <div class="input-group">
                                <span class="input-group-addon search-close"><i class="ik ik-x"></i></span>
                                <input type="text" class="form-control">
                                <span class="input-group-addon search-btn"><i class="ik ik-search"></i></span>
                            </div>
                        </div>
                        <button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>
                    </div>
                    <div class="top-menu d-flex align-items-center">
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                    class="avatar" src="img/user.jpg" alt=""></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="pages/profile.html"><i
                                        class="ik ik-user dropdown-icon"></i> Profile</a>
                                <a class="dropdown-item" href="#"><i class="ik ik-settings dropdown-icon"></i>
                                    Settings</a>
                                <a class="dropdown-item" href="pages/login.html">
                                    <i class="ik ik-power dropdown-icon"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
            @include('layout.base')

