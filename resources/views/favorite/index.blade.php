@extends('layouts.michel')

@section('css')
<link rel="stylesheet" href="{{ asset('/assets/css/top.css') }}">
@endsection
@section('title',"お気に入り画面")
@section('content')
    <h5 class="title text-center" style="font-weight:bold;margin-top:10%;">お気に入り一覧</h5>
    <div class="mx-2">
    @if($items->count() > 0)
        @foreach($items as $item)
            <div class="container-fluid mt-2 shadow-sm border">
                <div class="row">
                    <div class="col-4 py-0">
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
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-6 pl-4 py-0 mt-2">
                                <p><i class="fa fa-tag" aria-hidden="true"></i>{{$categories[$item->category_id-1]->name}}</p>
                            </div>
                            <div class="col-2"></div>
                            <div class="col-4 py-0" style="text-align:right;">
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
    @else
        <h5 class="title text-center" style="margin-top:10%;">お気に入りしている企画が<br>ありません</h5>
    @endif
    </div>

@endsection