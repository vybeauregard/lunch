<!DOCTYPE html>
    <head>
        @include('layouts.header')
        <style>
            .content {
                text-align: center;
                display: inline-block;
                margin-top: 60px;
            }
        </style>
    </head>
    <body>
        @include('layouts.navbar')

        <div class="container">
            <div class="content">
                <h1>@yield('title')</h1>
                @yield('content')

            </div>
        </div>
    </body>
    <script src="{{ elixir('js/all.js') }}"></script>
</html>
