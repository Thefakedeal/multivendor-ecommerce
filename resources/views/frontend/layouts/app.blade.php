<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('seo')

    @include('frontend.components.styles')
    @yield('styles')
    @stack('styles')

</head>

<body style="">

    <!-- Navbar -->
    @include('frontend.components.navbar')
    <!-- Navbar -->

    <!--Carousel Wrapper-->
    @yield('hero')
    <!--/.Carousel Wrapper-->

    <!--Main layout-->
    <main>
        <div class="container-fluid py-4">
            @yield('content')
            @stack('content')
        </div>
    </main>
    <!--Main layout-->

    <!--Footer-->
    @include('frontend.components.footer')
    <!--/.Footer-->
    @include('frontend.components.scripts')
    @yield('styles')
    @stack('styles')
</body>

</html>
