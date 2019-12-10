@extends('layouts.michel')

@section('css')
<link rel="stylesheet" href="{{ asset('/assets/css/top.css') }}">
@endsection
@section('title',"検索結果画面")
@section('content')
<body style="color:#444444;">
    
    <!--検索キーワードの表示-->
    <div id="title">
        <h5 class="title text-center" style="font-weight:bold;margin-top:10%;">検索キーワード：<br>{{$word}}</h5>
    </div>
    @isset($items)
        <!--検索結果-->
        <div class="mx-2">
        @foreach($items as $item)
            <div class="container-fluid mt-2 shadow-sm border">
                <div class="row">
                    <div class="col-4 pt-0 pb-0">
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
                        <div class="container-fluid m-3 pt-3 px-3 pb-1 bg-light" style="width:95%;">
                            @php
                                $limit = 20;
                                if(mb_strlen($item->detail) > $limit) { 
                                    $item->detail = mb_substr($item->detail,0,$limit);
                                    $item->detail = $item->detail."..." ;
                                }
                            @endphp
                            <p class="content-title" style="word-break: break-all;">{!! nl2br(e($item->title)) !!}</p>
                            <p class="content-sub" style="word-break: break-all;">{!! nl2br(e($item->detail)) !!}</p>
                        </div>
                    </div>
                    <!--カテゴリ表示と詳細ボタン表示-->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-6 pl-4 pt-0 pb-0 mt-2">
                                <p><i class="fa fa-tag" aria-hidden="true"></i>{{$categories[$item->category_id-1]->name}}</p>
                            </div>
                            <div class="col-2"></div>
                            <div class="col-4 pt-0 pb-0" style="text-align:right;">
                                <form method="get" width="100%" name="form{{$item->id}}" action="detail">
                                    <input type="hidden" name="id" value="{{$item->id}}">
                                    <button class="btn detailbtn" href="javascript:form{{$item->id}}.submit()">詳細へ
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>

    @else
    <div id="title">
        <h5 class="title text-center" style="font-weight:bold;margin-top:10%;">見つかりませんでした</h5>
    </div>
    @endisset
</body>
@endsection