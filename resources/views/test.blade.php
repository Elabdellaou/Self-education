<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Self Education-{{ Request::route()->getName() }}</title>
    <link rel="stylesheet" href="{{ asset('Links/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Links/css/all.min.css') }}">
    <script src="{{ asset('Links/jQuery/node_modules/jquery/dist/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('Links/css/login1.css') }}">
    <link rel="stylesheet" href="{{ asset('Links/css/mm.css') }}">
    <script src="{{ asset('Links/js/sorttable.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('Links/node_modules/bootstrap-icons/font/bootstrap-icons.css') }}">
    {{-- <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-all.min.css">
    <script src="https://cdn.metroui.org.ua/v4/js/metro.min.js"></script> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.33/sweetalert2.css" />
    <style>
    v-cloak{
        display: none;
    }
    </style>
</head>

<body class="w-100 test" style="height:110vh;overflow:hidden;">
    @include('includes.loading')

    <div id="app" class="w-100 h-100 page"  style="opacity:0 !important;" v-cloak>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.33/sweetalert2.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
