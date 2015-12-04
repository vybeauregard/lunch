<!DOCTYPE html>
    <head>
        <title>Lunch - @yield('title')</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" crossorigin="anonymous">

        <style>

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
                margin-top: 60px;
            }

            .title {
                font-size: 96px;
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
</html>
