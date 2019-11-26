@extends('layouts.michel')

@section('css')
<link rel="stylesheet" href="{{ asset('/assets/css/top.css') }}">
@endsection


@section('content')
    <div id="top">
        @isset($newItems)
        
            <!--新着-->
            <div id="title">
                <h2>New Topics</h2>
            </div>

            <!--新着企画一覧-->
            <div class="container-fluid">
                <div id="carousel-card" class="carousel slide">
                    <div class="carousel-inner">
                        @for($j=0; $j<5; $j=$j+2)
                            
                            @if($j == 0)
                                <!--企画カルーセル アクティブ-->
                                <div class="carousel-item px-3 active">
                                <div class="row">
                            @else
                                <!--企画カルーセル-->
                                <div class="carousel-item px-3">
                                <div class="row">
                            @endif
                            @for($i=0; $i<2; $i++)
                            @if ($newItems->count() <= $j+$i)
                                @break
                            @endif
                                <!--企画-->
                                <div class="col-6">
                                    <div class="card">
                                        <!--企画画像-->
                                        @if($j == 0)
                                            <div class="image w-100 shadow-sm" style="position:relative; overflow:hidden; padding-bottom:100%;">
                                            <div class="inner w-100" style="position:absolute; left:50%; top:50%;">
                                        @else
                                            <div class="image w-100 shadow-sm">
                                            <div class="inner w-100">
                                        @endif

                                        @empty ($newItems[$j+$i]->image)
                                            <img class="topimg border w-100 rounded" src="storage/image/solution.jpg">
                                        @else
                                            <img class="topimg border w-100 rounded" src="{{$newItems[$j+$i]->image}}" alt="noimage">
                                        @endempty 

                                        </div>
                                        </div>

                                        <!--企画内容-->
                                        <div class="card-body text-center">
                                            <p class="card-title bg-light">{{$newItems[$j+$i]->title}}</p>
                                            <form method="get" width="100%" name="form{{$newItems[$j+$i]->id}}" action="detail">
                                                <input type="hidden" name="id" value="{{$newItems[$j+$i]->id}}">
                                                <button style="width:100%;" class="p-0" href="javascript:form{{$newItems[$j+$i]->id}}.submit()">
                                                    <img class="img shadow-sm w-75" src="storage/image/shousai.png" alt="詳細へ">
                                                </button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                                
                            @endfor

                            </div>
                        </div>
                        @if ($newItems->count() <= $j+$i)
                            @break
                        @endif
                        @endfor

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
            </div>
        @endisset
        
        @isset($limitItems)
        <!--締め切り間近-->
        <div id="title">
            <h2>締め切り間近！</h2>
        </div>
        <!--締め切り間近の企画一覧-->
        <div class="mx-2">
        @foreach($limitItems as $item)
            <div class="container-fluid mt-2 shadow-sm border">
                <div class="row">
                    <div class="col-4">
                    <!--企画の画像-->
                        <div class="image w-100 m-3 shadow-sm">
                            <div class="inner w-100">
                                @empty ($item->image)
                                    <img class="topimg border w-100 rounded" src="storage/image/solution.jpg">
                                @else
                                    <img class="topimg border w-100 rounded" src="{{$item->image}}" alt="noimage">
                                @endempty
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                    <!--タイトル&詳細-->
                        <div class="container-fluid m-3 p-3 bg-light" style="width:95%;">
                            <p class="content-title">{{$item->title}}</p>
                            <p class="content-sub">{{$item->detail}}</p>
                        </div>
                    </div>
                    <!--カテゴリ表示と詳細ボタン表示-->
                    <div class="container-fluid m-3">
                        <div class="row">
                            <div class="col-8">
                                <a class="text-muted">{{$item->category->name}}</a>
                            </div>    
                            <div class="col-4" style="text-align:right;">
                                <form method="get" width="100%" name="form{{$item->id}}" action="detail">
                                    <input type="hidden" name="id" value="{{$item->id}}">
                                    <button style="width:100%;" class="p-0" href="javascript:form{{$item->id}}.submit()">
                                        <img class="img shadow-sm w-100" src="storage/image/shousai.png" alt="詳細へ">
                                    </button>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
        @endisset
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
            <form action="searchResult" method="post">
                <div class="row">
                    @csrf
                    @foreach ($categories as $category)
                        <div class="col-4">
                            <button class="btn shadow-sm" name="category" value="{{$category->id}}">{{$category->name}}</button>
                        </div>
                    @endforeach
                </div>
            </form>
        </div>
    </div>
@endsection