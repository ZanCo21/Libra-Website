<!DOCTYPE html>

<html
lang="en"
class="light-style layout-menu-fixed layout-compact"
dir="ltr"
data-theme="theme-default"
data-assets-path="assets/"
data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="assets/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>

    {{-- content --}}
    <link rel="stylesheet" href="assets/vendor/libs/dropzone/dropzone.css">
    {{-- textEdior --}}
    <link rel="stylesheet" href="assets/vendor/libs/typeahead-js/typeahead.css">
    <link rel="stylesheet" href="assets/vendor/libs/editor/typography.css">
    <link rel="stylesheet" href="assets/vendor/libs/editor/katex.css">
    <link rel="stylesheet" href="assets/vendor/libs/editor/editor.css">

    <!-- Page CSS -->
    <style>
        /* Notifikasi responsif untuk perangkat mobile */
        @media (max-width: 768px) {
            #notification {
                position: fixed;
                bottom: 10px;
                right: 10px;
                width: auto;
                max-width: 90%;
                padding: 10px;
                font-size: 14px;
                z-index: 999;
            }
        }

        #notification {
            z-index: 999;
            position: fixed;
            bottom: 10px;
            right: 10px;
            /* display: none; */
            padding: 15px;
            border-radius: 5px;
            transition: 3s ease-in-out;
        }

        #notification .hidden{
            opacity: 0;
            transition: 3s ease-in;
        }
    </style>

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
</head>
    <body>
        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                @include('layouts.partials.admin.sidebar')
                <!-- Layout container -->
                <div class="layout-page">
                    @if (request()->is('dashboard*'))
                        @include('layouts.partials.admin.header')
                    @endif
                    @yield('content')
                </div>
                <!--// Layout container -->
            <div class="layout-overlay layout-menu-toggle"></div>
        </div>
        <!-- / Layout wrapper -->



    @include('layouts.partials.admin.flashMessage')
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="assets/js/dashboards-analytics.js"></script>

    {{-- input photo --}}
    <script src="assets/vendor/libs/dropzone/dropzone.js"></script>
    <script src="assets/vendor/js/forms-file-upload.js"></script>

    {{-- text editor --}}
    <script src="assets/vendor/libs/editor/katex.js"></script>
    <script src="assets/vendor/libs/editor/quill.js"></script>
    <script src="assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="assets/js/forms-editors.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    </body>
</html>
