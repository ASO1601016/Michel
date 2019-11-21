<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        @yield('css')

        <title>@yield('title')</title>

        <style>
            /* .header{
                font-size:120pt;
                text-align:right;
                color:#f6f6f6;
                margin:-50px 0px -100px 0px;
            } */

            /* .footer{
                text-align:center;
            }

            body{
                font-size:16pt; color:#999;
            } */
        </style>

    </head>
    <body class="bg-dm">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        
        {{-- <div class="header"> --}}
            {{-- Michel --}}

            @yield('header')
            <header class="header">
                    <div id="header_bar" >
                        <nav class="navbar navbar-dark bg-dark">
                            
                            <!--ハンバーガーボタン-->
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            
                            <!--タイトル-->
                            <a class="header_brand" href="./top">michel  
                            </a>
                            
                            <!--ログアウト-->
                            <a href="./logout">ログアウト</a>
                
                            <!--ハンバーガー　中身-->
                            <div class="collapse navbar-collapse" id="navbarsExample01">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="./mypage">マイページ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">お気に入り</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">達成履歴（仮）</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">投稿履歴</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">設定（仮）</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">ヘルプ（仮）</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        <nav class="navbar navbar-dark bg-dark">
                            <form class="form-inline my-2 my-md-0">
                                <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                            </form>
                        </nav>
                    </div> 
                </header>
            {{-- </div> --}}

        <div class="content">
            @yield('content')
        </div>

        <div class="footer">
            copyright 2019 akasoo.
        </div>
    </body>
</html>