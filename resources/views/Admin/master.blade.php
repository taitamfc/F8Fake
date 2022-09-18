<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><!-- End Required meta tags -->
    <!-- Begin SEO tag -->
    <title> Dashboard | Looper - Bootstrap 4 Admin Theme </title>
    <meta property="og:title" content="Dashboard">
    <meta name="author" content="Beni Arisandi">
    <meta property="og:locale" content="en_US">
    <meta name="description" content="Responsive admin theme build on top of Bootstrap 4">
    <meta property="og:description" content="Responsive admin theme build on top of Bootstrap 4">
    <link rel="canonical" href="https://uselooper.com">
    <meta property="og:url" content="https://uselooper.com">
    <meta property="og:site_name" content="Looper - Bootstrap 4 Admin Theme">
    <script type="application/ld+json">
      {
        "name": "Looper - Bootstrap 4 Admin Theme",
        "description": "Responsive admin theme build on top of Bootstrap 4",
        "author":
        {
          "@type": "Person",
          "name": "Beni Arisandi"
        },
        "@type": "WebSite",
        "url": "",
        "headline": "Dashboard",
        "@context": "http://schema.org"
      }
    </script><!-- End SEO tag -->
    <!-- FAVICONS -->
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('AdminTheme/assets/apple-touch-icon.png') }}">
    <link rel="shortcut icon" href="{{ asset('AdminTheme/assets/favicon.ico') }}">
    <meta name="theme-color" content="#3063A0"><!-- End FAVICONS -->
    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" rel="stylesheet"><!-- End GOOGLE FONT -->
    <!-- BEGIN PLUGINS STYLES -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet"
        href="{{ asset('AdminTheme/assets/vendor/open-iconic/font/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminTheme/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminTheme/assets/vendor/flatpickr/flatpickr.min.css') }}">
    <!-- END PLUGINS STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link rel="stylesheet" href="{{ asset('AdminTheme/assets/stylesheets/theme.min.css') }}" data-skin="default">
    <link rel="stylesheet" href="{{ asset('AdminTheme/assets/stylesheets/theme-dark.min.css') }}" data-skin="dark">
    <link rel="stylesheet" href="{{ asset('AdminTheme/assets/stylesheets/custom.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script>
        var skin = localStorage.getItem('skin') || 'default';
        var disabledSkinStylesheet = document.querySelector('link[data-skin]:not([data-skin="' + skin + '"])');
        // Disable unused skin immediately
        disabledSkinStylesheet.setAttribute('rel', '');
        disabledSkinStylesheet.setAttribute('disabled', true);
        // add loading class to html immediately
        document.querySelector('html').classList.add('loading');
    </script><!-- END THEME STYLES -->
</head>

<body>
    <!-- .app -->
    <div class="app">
        <!--[if lt IE 10]>
      <div class="page-message" role="alert">You are using an <strong>outdated</strong> browser. Please <a class="alert-link" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</div>
      <![endif]-->
        <!-- .app-header -->
        @include('Admin.layout.header')
        <!-- /.app-header -->
        <!-- .app-aside -->
        @include('Admin.layout.sidebar')
        <!-- /.app-aside -->
        <!-- .app-main -->
        <main class="app-main">
            <!-- .wrapper -->
            <div class="wrapper">
                <!-- .page -->
                <div class="page">
                    <!-- .page-inner -->
                    @yield('content')
                    <!-- /.page-inner -->
                </div><!-- /.page -->
            </div><!-- .app-footer -->
            <footer class="app-footer">
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a class="text-muted" href="#">Support</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-muted" href="#">Help Center</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-muted" href="#">Privacy</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-muted" href="#">Terms of Service</a>
                    </li>
                </ul>
                <div class="copyright"> Copyright © 2018. All right reserved. </div>
            </footer><!-- /.app-footer -->
            <!-- /.wrapper -->
        </main><!-- /.app-main -->
    </div><!-- /.app -->
    <!-- BEGIN BASE JS -->
    <script src="{{ asset('AdminTheme/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('AdminTheme/assets/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('AdminTheme/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script> <!-- END BASE JS -->
    <!-- BEGIN PLUGINS JS -->
    <script src="{{ asset('AdminTheme/assets/vendor/pace-progress/pace.min.js') }}"></script>
    <script src="{{ asset('AdminTheme/assets/vendor/stacked-menu/js/stacked-menu.min.js') }}"></script>
    <script src="{{ asset('AdminTheme/assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('AdminTheme/assets/vendor/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('AdminTheme/assets/vendor/easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ asset('AdminTheme/assets/vendor/chart.js/Chart.min.js') }}"></script> <!-- END PLUGINS JS -->
    <!-- BEGIN THEME JS -->
    <script src="{{ asset('AdminTheme/assets/javascript/theme.min.js') }}"></script> <!-- END THEME JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="{{ asset('AdminTheme/assets/javascript/pages/dashboard-demo.js') }}"></script> <!-- END PAGE LEVEL JS -->
    <!-- Global site tag (gtag.js')}}) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-116692175-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-116692175-1');
    </script>
    <script>
        jQuery(document).ready(function() {
            if ($('#blah').hide()) {
                $('#blah').hide();
            }
            jQuery('#imgInp').change(function() {
                $('#blah').show();
                const file = jQuery(this)[0].files;
                if (file[0]) {
                    jQuery('#blah').attr('src', URL.createObjectURL(file[0]));
                    jQuery('#blah1').attr('src', URL.createObjectURL(file[0]));
                }
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
