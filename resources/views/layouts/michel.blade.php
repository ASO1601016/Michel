<html>
    <head>
<!--        @php
            setcookie('hoge', 'fuga', time()+3600, '/; SameSite=Strict', '', true, true);
        @endphp
-->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width,user-scalable=no">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/css/drawer.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.min.css">
        <link rel="stylesheet" href="{{ asset('/assets/css/header.css') }}">
        
        @yield('css')
        <title>@yield('title')</title>
        
    </head>
    <body class="drawer drawer--left bg-dm">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>
        
        <script>
            jQuery(function($) {
                $("#date1").datepicker();
            });
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.2.0/iscroll.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/js/drawer.min.js"></script>
        <script>
            jQuery(function($) {
                $(document).ready(function() {
                    $('.drawer').drawer();
                });
            });
            

        </script>
        
        
        <div class="header">
            @yield('header')
        </div>
        
  <header role="banner">
    <button type="button" class="drawer-toggle drawer-hamburger">
      <span class="sr-only">toggle navigation</span>
      <span class="drawer-hamburger-icon"></span>
    </button>
    <nav class="drawer-nav" role="navigation">
      <ul class="drawer-menu">
        
        <li class="text-center">
            <button class="btn programbtn m-3 mx-auto d-block w-75" onclick="location.href='./solution'">
                <i class="fa fa-pencil-square-o" aria-hidden="true" style="color:white;"></i>投稿する
            </button>
        </li>

        <li><a class="drawer-menu-item" href="./mypage">
            <i class="fa fa-user-circle-o" aria-hidden="true" style="color:#444444;"></i>マイページ</a>
        </li>
        <li><a class="drawer-menu-item" href="./favorite">
            <i class="fa fa-heart" aria-hidden="true" style="color:#444444;"></i>お気に入り</a>
        </li>
        <li><a class="drawer-menu-item" href="./dmList">
            <i class="fa fa-commenting" aria-hidden="true" style="color:#444444;"></i>DM一覧</a>
        </li>
        
        <li><a class="drawer-menu-item" href="#">
            <i class="fa fa-cog"  aria-hidden="true" style="color:#444444;"></i>設定</a>
        </li>
        
        <li><a class="drawer-menu-item" href="./logout">
            <i class="fa fa-sign-out" aria-hidden="true" style="color:#444444;"></i>ログアウト</a>
        </li>   
      </ul>
    </nav>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid navcont">
            <div class="navbar-header d-block mx-auto">
                <button class="titlebtn" onclick="location.href='./top'"><img src="storage/image/titlebrk.png" width="25%"></button>
            </div>
        </div>     
    </nav>
    <nav class="navbar navbar-expand navbar-dark">
        <div class="collapse navbar-collapse" id="navbarsExample02">
            <form class="form-inline my-2 my-md-0 mx-auto w-75" method="post" action="./searchResult">
                @csrf
                <input class="form-control" type="text" name="search" placeholder="Search" maxlength="50">
            </form>
      </div>
    </nav>
  </header>
        <div class="content">
            @yield('content')
        </div>
        <div class="footer text-center">
            {{-- <a href="http://yahoo.co.jp/" style="text-decoration: none;color:black">copyright 2019 michel.</a> --}}
        </div>
        
    </body>
</html>