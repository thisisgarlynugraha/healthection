<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    @yield('title')

    <link rel="stylesheet" href="{{ asset('vendor/stisla-2.2.0/dist/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/stisla-2.2.0/dist/assets/modules/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/stisla-2.2.0/dist/assets/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/stisla-2.2.0/dist/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/stisla-2.2.0/dist/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/stisla-2.2.0/dist/assets/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/stisla-2.2.0/dist/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/stisla-2.2.0/dist/assets/css/components.css') }}">
</head>
<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            @include('layouts.components.master.navbar')
            @include('layouts.components.master.sidebar')

            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        @yield('section-head')
                    </div>

                    <div class="section-body">
                        @yield('section-body')
                    </div>
                </section>
            </div>

            @include('layouts.components.master.footer')
        </div>
    </div>

    <script src="{{ asset('vendor/stisla-2.2.0/dist/assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/stisla-2.2.0/dist/assets/modules/popper.js') }}"></script>
    <script src="{{ asset('vendor/stisla-2.2.0/dist/assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('vendor/stisla-2.2.0/dist/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/stisla-2.2.0/dist/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('vendor/stisla-2.2.0/dist/assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/stisla-2.2.0/dist/assets/js/stisla.js') }}"></script>
    <script src="{{ asset('vendor/stisla-2.2.0/dist/assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('vendor/stisla-2.2.0/dist/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendor/stisla-2.2.0/dist/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('vendor/stisla-2.2.0/dist/assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('vendor/stisla-2.2.0/dist/assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('vendor/stisla-2.2.0/dist/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('vendor/stisla-2.2.0/dist/assets/js/custom.js') }}"></script>

    @stack('scripts')
</body>
</html>