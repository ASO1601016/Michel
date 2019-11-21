@extends('layouts.michel')

@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/css/top.css') }}">
@endsection

@section('content')
    <div id="top">
        <!--新着-->
        <div id="title">
            <h2>New Topics</h2>
        </div>
        <!--新着企画一覧-->
        <div class="containerfluid">
            <div id="carousel-card" class="carousel slide">

                <div class="carousel-inner">
                    <!--企画カルーセル アクティブ-->
                    <div class="carousel-item px-5 active">
                        <div class="row">
                            <!--企画-->
                            <div class="col-4">
                                <div class="card">
                                    <!--企画画像-->
                                    <div class="image w-100 shadow-sm" style="position:relative; overflow:hidden; padding-bottom:100%;">
                                        <div class="inner w-100" style="position:absolute; left:50%; top:50%;">
                                        <img class="topimg border w-100 rounded" src="img/Halloween.jpg" alt="noimage">
                                        </div>
                                    </div>
                                    <!--企画内容-->
                                    <div class="card-body text-center">
                                        <h5 class="card-title bg-light p-3">一緒に本格的ビジネス英会話を学びませんか</h5>
                                        <a href="#">
                                            <img class="img shadow-sm w-75" src="img/shousai.png" alt="詳細へ">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--企画-->
                            <div class="col-4">
                                <div class="card" style="">
                                    <!--企画画像-->
                                    <div class="image w-100 shadow-sm">
                                        <div class="inner w-100">
                                        <img class="topimg border w-100 rounded" src="img/Halloween.jpg" alt="noimage">
                                        </div>
                                    </div>
                                    <!--企画内容-->
                                    <div class="card-body text-center">
                                        <h5 class="card-title bg-light p-3">一緒</h5>
                                        <a href="#">
                                            <img class="img shadow-sm w-75" src="img/shousai.png" alt="詳細へ">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--企画-->
                            <div class="col-4">
                                <div class="card">
                                    <!--企画画像-->
                                    <div class="image w-100 shadow-sm">
                                        <div class="inner w-100">
                                        <img class="topimg border w-100 rounded" src="img/Halloween.jpg" alt="noimage">
                                        </div>
                                    </div>
                                    <!--企画内容-->
                                    <div class="card-body text-center">
                                        <h5 class="card-title bg-light p-3">一緒にビジネス英会話を学びませんか</h5>
                                        <a href="#">
                                            <img class="img shadow-sm w-75" src="img/shousai.png" alt="詳細へ">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--企画カルーセル　next-->
                    <div class="carousel-item px-5">
                        <div class="row">
                            <!--企画-->
                            <div class="col-4">
                                <div class="card">
                                    <!--企画画像-->
                                    <div class="image w-100 shadow-sm">
                                        <div class="inner w-100">
                                        <img class="topimg border w-100 rounded" src="img/Halloween.jpg" alt="noimage">
                                        </div>
                                    </div>
                                    <!--企画内容-->
                                    <div class="card-body text-center">
                                        <h5 class="card-title bg-light p-3">一緒に本格的ビジネス英会話を学びませんか</h5>
                                        <a href="#">
                                            <img class="img shadow-sm w-75" src="img/shousai.png" alt="詳細へ">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--企画-->
                            <div class="col-4">
                                <div class="card" style="">
                                    <!--企画画像-->
                                    <div class="image w-100 shadow-sm">
                                        <div class="inner w-100">
                                        <img class="topimg border w-100 rounded" src="img/Halloween.jpg" alt="noimage">
                                        </div>
                                    </div>
                                    <!--企画内容-->
                                    <div class="card-body text-center">
                                        <h5 class="card-title bg-light p-3">一緒</h5>
                                        <a href="#">
                                            <img class="img shadow-sm w-75" src="img/shousai.png" alt="詳細へ">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--企画-->
                            <div class="col-4">
                                <div class="card">
                                    <!--企画画像-->
                                    <div class="image w-100 shadow-sm">
                                        <div class="inner w-100">
                                        <img class="topimg border w-100 rounded" src="img/Halloween.jpg" alt="noimage">
                                        </div>
                                    </div>
                                    <!--企画内容-->
                                    <div class="card-body text-center">
                                        <h5 class="card-title bg-light p-3">一緒にビジネス英会話を学びませんか</h5>
                                        <a href="#">
                                            <img class="img shadow-sm w-75" src="img/shousai.png" alt="詳細へ">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--企画カルーセル　prev-->
                    <div class="carousel-item px-5">
                        <div class="row">
                            <!--企画-->
                            <div class="col-4">
                                <div class="card">
                                    <!--企画画像-->
                                    <div class="image w-100 shadow-sm">
                                        <div class="inner w-100">
                                        <img class="topimg border w-100 rounded" src="img/Halloween.jpg" alt="noimage">
                                        </div>
                                    </div>
                                    <!--企画内容-->
                                    <div class="card-body text-center">
                                        <h5 class="card-title bg-light p-3">一緒に本格的ビジネス英会話を学びませんか</h5>
                                        <a href="#">
                                            <img class="img shadow-sm w-75" src="img/shousai.png" alt="詳細へ">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--企画-->
                            <div class="col-4">
                                <div class="card" style="">
                                    <!--企画画像-->
                                    <div class="image w-100 shadow-sm">
                                        <div class="inner w-100">
                                        <img class="topimg border w-100 rounded" src="img/Halloween.jpg" alt="noimage">
                                        </div>
                                    </div>
                                    <!--企画内容-->
                                    <div class="card-body text-center">
                                        <h5 class="card-title bg-light p-3">一緒</h5>
                                        <a href="#">
                                            <img class="img shadow-sm w-75" src="img/shousai.png" alt="詳細へ">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--企画-->
                            <div class="col-4">
                                <div class="card">
                                    <!--企画画像-->
                                    <div class="image w-100 shadow-sm">
                                        <div class="inner w-100">
                                        <img class="topimg border w-100 rounded" src="img/Halloween.jpg" alt="noimage">
                                        </div>
                                    </div>
                                    <!--企画内容-->
                                    <div class="card-body text-center">
                                        <h5 class="card-title bg-light p-3">一緒にビジネス英会話を学びませんか</h5>
                                        <a href="#">
                                            <img class="img shadow-sm w-75" src="img/shousai.png" alt="詳細へ">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carousel-card" role="button" data-slide="prev">
                    <i class="material-icons iarrow">arrow_back_ios</i>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-card" role="button" data-slide="next">
                    <i class="material-icons iarrow">arrow_forward_ios</i>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <!--締め切り間近-->
        <div id="title">
            <h2>締め切り間近！</h2>
        </div>
        <!--締め切り間近の企画一覧-->
        <div class="container-fluid m-4 shadow-sm border">
            <div class="row">
                <div class="col-3">
                <!--企画の画像-->
                    <div class="image w-100 m-4 shadow-sm">
                        <div class="inner w-100">
                            <img class="topimg border w-100 rounded" src="img/noimage.png" alt="noimage">
                        </div>
                    </div>
                </div>
                <div class="col-9">
                <!--タイトル&詳細-->
                    <div class="container-fluid m-4 p-4 bg-light" style="width:95%;">
                        <h4>ハロウィンで絶対好かれる衣装教えます！</h4>
                        <p>詳細な説明</p>
                    </div>
                
                <!--カテゴリ表示と詳細ボタン表示-->
                    <div class="container-fluid m-4">
                        <div class="row">
                            <div class="col-8">
                                <a class="text-muted">ファッション</a>,<a class="text-muted">イベント</a>
                            </div>
                            
                            <div class="col-4" style="text-align:right;">
                                <a href="#">
                                <img class="img shadow-sm w-100" src="img/shousai.png" alt="詳細へ">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid m-4 shadow-sm border">
        <div class="row">
            <div class="col-3">
                <!--企画の画像-->
                <div class="image w-100 m-4 shadow-sm">
                    <div class="inner w-100">
                        <img class="topimg border w-100 rounded" src="img/noimage.png" alt="noimage">
                    </div>
                </div>
            </div>
            <div class="col-9">
                <!--タイトル&詳細-->
                <div class="container-fluid m-4 p-4 bg-light" style="width:95%;">
                    <h4>ハロウィンで絶対好かれる衣装教えます！</h4>
                    <p>詳細な説明</p>
                </div>
                
                <!--カテゴリ表示-->
                <div class="container-fluid m-4">
                    <div class="row">
                        <div class="col-8">
                            <a class="text-muted">ファッション</a>,<a class="text-muted">イベント</a>
                        </div>
                        <div class="col-4" style="text-align:right;">
                            <a href="#">
                                <img class="img shadow-sm w-100" src="img/shousai.png" alt="詳細へ">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="container-fluid m-4 shadow-sm border">
        <div class="row">
            <div class="col-3">
                <!--企画の画像-->
                <div class="image w-100 m-4 shadow-sm">
                    <div class="inner w-100">
                        <img class="topimg border w-100 rounded" src="img/noimage.png" alt="noimage">
                    </div>
                </div>
            </div>
            <div class="col-9">
                <!--タイトル&詳細-->
                <div class="container-fluid m-4 p-4 bg-light" style="width:95%;">
                    <h4>ハロウィンで絶対好かれる衣装教えます！</h4>
                    <p>詳細な説明</p>
                </div>
                
                <!--カテゴリ表示-->
                <div class="container-fluid m-4">
                    <div class="row">
                        <div class="col-8">
                            <a class="text-muted">ファッション</a>,<a class="text-muted">イベント</a>
                        </div>
                        <div class="col-4" style="text-align:right;">
                            <a href="#">
                                <img class="img shadow-sm w-100" src="img/shousai.png" alt="詳細へ">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        
        <!--ランキング-->
        <div id="title">
            <h2>ランキング</h2>
        </div>
        <div>フェーズ２のため工事中</div>
        
        <!--カテゴリ-->
        <div id="title">
            <h2>カテゴリ</h2>
        </div>
        <!--カテゴリ一覧-->
        <div class="container-fluid text-center">
            <div class="row">
                <div class="col-4">
                    <button class="btn shadow-sm">インドア</button>
                </div>
                <div class="col-4">
                    <button class="btn shadow-sm">アウトドア</button>
                </div>
                <div class="col-4">
                    <button class="btn shadow-sm">旅行</button>
                </div>
                <div class="col-4">
                    <button class="btn shadow-sm">音楽</button>
                </div>
                <div class="col-4">
                    <button class="btn shadow-sm">占い</button>
                </div>
                <div class="col-4">
                    <button class="btn shadow-sm">相談</button>
                </div>
                <div class="col-4">
                    <button class="btn shadow-sm">写真</button>
                </div>
                <div class="col-4">
                    <button class="btn shadow-sm">情報・IT</button>
                </div>
                <div class="col-4">
                    <button class="btn shadow-sm">料理</button>
                </div>
                <div class="col-4">
                    <button class="btn shadow-sm">マナー</button>
                </div>
                <div class="col-4">
                    <button class="btn shadow-sm">外国語</button>
                </div>
                <div class="col-4">
                    <button class="btn shadow-sm">医療</button>
                </div>
                <div class="col-4">
                    <button class="btn shadow-sm">大人数</button>
                </div>
                <div class="col-4">
                    <button class="btn shadow-sm">少人数</button>
                </div>
                <div class="col-4">
                    <button class="btn shadow-sm">生活</button>
                </div>
                <div class="col-4">
                    <button class="btn shadow-sm">試験</button>
                </div>
                <div class="col-4">
                    <button class="btn shadow-sm">健康</button>
                </div>
                <div class="col-4">
                    <button class="btn shadow-sm">運動</button>
                </div>
                <div class="col-4">
                    <button class="btn shadow-sm">イラスト</button>
                </div>
                <div class="col-4">
                    <button class="btn shadow-sm">デザイン</button>
                </div>
                <div class="col-4">
                    <button class="btn shadow-sm">美容</button>
                </div>
                <div class="col-4">
                    <button class="btn shadow-sm">ファッション</button>
                </div>
                <div class="col-4">
                    <button class="btn shadow-sm">恋愛</button>
                </div>
                <div class="col-4">
                    <button class="btn shadow-sm">ゲーム</button>
                </div>
            </div>
        </div>
    </div>
@endsection