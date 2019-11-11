@extends('layouts.michel')


@section('header')
<header class="header">
    <div id="header_bar" >
        <nav class="navbar navbar-dark bg-dark">
            
            <!--ハンバーガーボタン-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!--タイトル-->
            <a class="header_brand" href="#">michel  
            </a>
            
            <!--ログアウト-->
            <a href="#">ログアウト</a>

            <!--ハンバーガー　中身-->
            <div class="collapse navbar-collapse" id="navbarsExample01">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">マイページ</a>
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
@endsection