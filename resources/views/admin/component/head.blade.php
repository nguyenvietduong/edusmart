<meta charset="utf-8" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title', 'Dashboard') | EDUSMART</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
<meta content="" name="author" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />

<!-- App favicon -->
<link rel="shortcut icon" href="{{ asset(config('app.asset_admin_path') . '/images/favicon.ico') }}">

<!-- include libraries(jQuer) -->
<script type="text/javascript" src="//code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- App css -->
<link href="{{ asset(config('app.asset_admin_path') . '/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset(config('app.asset_admin_path') . '/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset(config('app.asset_admin_path') . '/css/app.min.css') }}" rel="stylesheet" type="text/css" />

<!-- Sweet Alert -->
<link href="{{ asset(config('app.asset_admin_path') . '/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset(config('app.asset_admin_path') . '/libs/animate.css/animate.min.css') }}" rel="stylesheet" type="text/css">

@vite(['resources/css/app.css', 'resources/js/app.js'])