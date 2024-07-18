<!DOCTYPE html>
<html lang="en">

<head>
    <!--  Title -->
    <title>Clinical Management System</title>
    <!--  Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="NettaAdSoka" />
    <meta name="author" content="" />
    <meta name="keywords" content="NettaAdSoka" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!--  Favicon -->
    {{--
    <link rel="shortcut icon" type="image/png" href="assets/images/logos/favicon.ico" /> --}}
    <!-- Core Css -->
    <link id="themeColors" rel="stylesheet" href="{{asset('assets/css/style.min.css')}}" />
    <link href="{{asset('https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css')}}" rel="stylesheet">

    <script src="{{asset('https://cdn.tailwindcss.com')}}"></script>
    <!-- <link href="//cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" /> -->

    <link rel="stylesheet" href="{{asset('https://unpkg.com/leaflet/dist/leaflet.css')}} />

    <link id=" themeColors rel="stylesheet" href="{{asset('assets/css/style.min.css')}}" />
    <link href="{{asset('https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css')}}" rel="stylesheet">
    {{--
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/logos/favicon.ico')}}" /> --}}
    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="{{asset('assets/libs/owl.carousel/dist/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet"
        href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js')}}">

    <!-- Core Css -->
    <link id="themeColors" rel="stylesheet" href="{{asset('assets/css/style.min.css')}}" />


    <style>
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination a {
            margin: 0 5px;
            padding: 8px 16px;
            border: 1px solid #ddd;
            text-decoration: none;
            color: #007bff;
        }

        .pagination a.active {
            background-color: #007bff;
            color: white;
            border: 1px solid #007bff;
        }
    </style>

</head>

<body>
    <!-- Preloader -->

    <!-- Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->

        @include('admin.admin.sidebar')
        <!-- Sidebar End -->
        <!-- Main wrapper -->
        <div class="body-wrapper">
            <!-- Header Start -->
            @include('admin.admin.navbar')
            <!-- Header End -->
            @yield('content')

        </div>
    </div>


    <!-- Customizer -->
    <!-- Import Js Files -->
    <script src="assets/js/carosuals.js "></script>
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/simplebar/dist/simplebar.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{asset('https://code.jquery.com/jquery-3.6.0.min.js')}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- core files -->
    <script src="assets/js/app.min.js"></script>
    <script src="assets/js/app.init.js"></script>
    <script src="assets/js/app-style-switcher.js"></script>
    <script src="assets/js/sidebarmenu.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/simplebar/dist/simplebar.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!--  core files -->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script src="{{asset('assets/js/carosuals.js')}}"></script>
    <script src="{{asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('assets/libs/simplebar/dist/simplebar.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core JS Files -->
    <script src="{{asset('assets/js/app.min.js')}}"></script>
    <script src="{{asset('assets/js/app.init.js')}}"></script>
    <script src="{{asset('assets/js/app-style-switcher.js')}}"></script>
    <script src="{{asset('assets/js/sidebarmenu.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>

</body>

</html>