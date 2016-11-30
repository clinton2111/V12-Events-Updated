<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{URL::to('components/materialize/dist/css/materialize.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::to('components/components-font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{URL::to('components/toastr/toastr.min.css')}}">
    <link href="{{URL::to('css/admin.css')}}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<div id="app">
    @include('admin.includes.header')
    <main>
        @yield('content')
    </main>

</div>

<!-- Scripts -->
<script src="{{URL::to('components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{URL::to('components/materialize/dist/js/materialize.min.js')}}"></script>
<script src="{{URL::to('components/toastr/toastr.min.js')}}"></script>
<script src="{{URL::to('js/admin.js')}}"></script>
@if(Route::current()->getName() == 'dashboard.contactSettingsView')
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAURlr1w-MD4al8sM3w_OG0xwqXPj_dfFA&callback=initMap">
    </script>
@endif

</body>
</html>
