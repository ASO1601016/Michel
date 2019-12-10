<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/assets/css/guest.css') }}">
        @yield('css')

        <title>@yield('title')</title>


    </head>
    <body>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        
        {{-- <div class="header"> --}}
            {{-- Michel --}}

            @yield('header')
            <header class="sticky-top">
                <h4 class="container-fluid text-center border p-2 m-0 bg-white text-orange">
                    MICHEL
                </h4>
                <div class="text-small gradient text-right text-white pr-1">
                    @yield('headerTitle')
                </div>
            </header>

        <div class="content">
            @yield('content')
        </div>

        <div class="footer text-center">
            {{-- copyright 2019 michel. --}}
        </div>
    </body>
</html>