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
    <link href="tabler/dist/libs/dropzone/dist/dropzone.css?1692870487" rel="stylesheet" />
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
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.min.css">
    <!-- Full calendar -->
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />
    <!-- Styles -->
    @vite('resources/sass/app.scss')
    @stack('styles')
    <!-- Router in JS -->
    @routes
</head>

<body>
    <script src="tabler/dist/js/demo-theme.min.js?1692870487"></script>
    <div class="page">
        @include('inc.header')
        <div class="page-wrapper">
            <!-- Page header -->
            @include('inc.page-header')
            <!-- Page body -->
            <div class="page-body">
                @yield('content')
            </div>
            @include('inc.footer')
        </div>
    </div>
    @stack('modals')
    <!-- Libs JS -->
    <script src="tabler/dist/libs/nouislider/dist/nouislider.min.js?1692870487" defer></script>
    <script src="tabler/dist/libs/litepicker/dist/litepicker.js?1692870487" defer></script>
    <script src="tabler/dist/libs/tom-select/dist/js/tom-select.base.min.js?1692870487" defer></script>
    <script src="tabler/dist/libs/dropzone/dist/dropzone-min.js?1692870487" defer></script>
    <!-- Tabler Core -->
    <script src="tabler/dist/js/tabler.min.js?1692870487" defer></script>
    <script src="tabler/dist/js/demo.min.js?1692870487" defer></script>
    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/2.1.4/js/dataTables.min.js"></script>
    <!-- Full calendar -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>
    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    <!-- Scripts -->
    @vite('resources/js/app.js')
    @stack('scripts')
</body>

</html>
