<!DOCTYPE html>
    <head>
        @include('layouts.header')
        <style>
            .main-content {
                text-align: center;
                display: inline-block;
                margin-top: 60px;
            }
        </style>
    </head>
    <body class="site-sidebar page-sidebar page-sidebar-closed">
        <!--
        <div class="security-marking security-topper green">
            <p>@yield('security-marking')</p>
        </div>
        -->
        <div id="main-page-wrapper">
            @include('layouts.navbar')
            @include('layouts.site-sidebar')
            <div id="content-wrapper" class="main site-sidebar page-sidebar">
                <div id="page-header">
                    <div id="page-help">
                        <i class="fa fa-question"></i><a href="#">Help</a>
                    </div>
                    <h1>@yield('title')</h1>
                </div>
                <div id="page-help-flyout">
                    @yield('help-text')
                </div>

                <div id="main-content-wrapper">
                    <div id="main-content">

                        @yield('content')

                    </div> <!-- END MAIN CONTENT -->
                </div>
            </div>
            <div id="push">&nbsp;</div>
        </div>
        <div id ="footer-spacer">&nbsp;</div>
        <footer class="security-marking security-footer green">
            <p>@yield('security-marking')</p>
            </div>
        </footer>

        <!-- Scripts -->

        <script src="{{ elixir('js/all.js') }}"></script>
    </body>
</html>
