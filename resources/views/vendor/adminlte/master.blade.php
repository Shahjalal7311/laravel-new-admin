<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title_prefix', config('adminlte.title_prefix', ''))
@yield('title', config('adminlte.title', 'AdminLTE 2'))
@yield('title_postfix', config('adminlte.title_postfix', ''))</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('public/vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('public/vendor/adminlte/vendor/font-awesome/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('public/vendor/adminlte/vendor/Ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/vendor/adminlte/dist/css/chosen.min.css') }}">

    @include('adminlte::plugins', ['type' => 'css'])

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('public/vendor/adminlte/dist/css/AdminLTE.min.css') }}">

    @yield('adminlte_css')

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
     <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body class="hold-transition @yield('body_class')">

@yield('body')

<script src="{{ asset('public/vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('public/vendor/adminlte/vendor/jquery/dist/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('public/vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/vendor/adminlte/dist/js/chosen.jquery.min.js') }}"></script>

@include('adminlte::plugins', ['type' => 'js'])

@yield('adminlte_js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
<script>
  $(".chosen-select").chosen({});
</script>
</body>
</html>
