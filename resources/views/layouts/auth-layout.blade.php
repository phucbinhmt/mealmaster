<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'MealMaster') }} - @yield('pageTitle')</title>
    <!-- CSS files -->
    <link href="tabler/dist/css/tabler.min.css?1692870487" rel="stylesheet" />
    <link href="tabler/dist/css/tabler-flags.min.css?1692870487" rel="stylesheet" />
    <link href="tabler/dist/css/tabler-payments.min.css?1692870487" rel="stylesheet" />
    <link href="tabler/dist/css/tabler-vendors.min.css?1692870487" rel="stylesheet" />
    <link href="tabler/dist/css/demo.min.css?1692870487" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
    <!-- Styles -->
    @vite('resources/sass/app.scss')
    @stack('styles')
    <!-- Router in JS -->
    @routes
</head>

<body class=" d-flex flex-column">
    <script src="tabler/dist/js/demo-theme.min.js?1692870487"></script>
    @yield('content')
    <!-- Tabler Core -->
    <script src="tabler/dist/js/tabler.min.js?1692870487" defer></script>
    <script src="tabler/dist/js/demo.min.js?1692870487" defer></script>
    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <!-- Scripts -->
    @vite('resources/js/app.js')
    @stack('scripts')
</body>

</html>
