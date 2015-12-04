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
    <body>
        @include('layouts.navbar')
        <div id="main-page-wrapper">
            <div class="container">
                <div class="main-content">
                    <h1>@yield('title')</h1>
                    @yield('content')
                </div>
            </div>
        </div>
    </body>
    <script src="{{ elixir('js/all.js') }}"></script>
</html>
