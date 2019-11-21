@extends('layouts.michel')
@section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/css/submit-detail-blade.css') }}">
@endsection
@section('title',"企画情報詳細")

    <!-- イイネボタン -->
    <script type="text/javascript" src="/mod/LKBNX/v2.23/demo/cn/cn.php"></script>

@csrf
    <form method="get" action="./apply" enctype="multipart/form-data">
    <div class="wrap">
        <div class="jumbotron-fluid bg-white">
            <div class="image py-3">
                @empty ($image)
                    <img class="gazo" src="storage/image/nym.gif">
                @else
                    <img class="gazo" src="{{ $title->image }}">
                @endempty
            </div>
        </div>
        
        <div class="container-fluid bg-white mb-1 mt-4 pt-3 pb-2">
            <h5>
                <strong>
                    {{ $title->title }}
                </strong>
            </h5>
            <div class="container-fluid pl-0 my-2">
                <!--Usersテーブルから引っ張る-->
                <img src="{{ $title->userImage }}" class="rounded-circle" width="65" height="65">
                <span class="text-middle">{{ $title->name }}
                    <time class="text-muted">
                        {{ $title->sex }}
                        
                    </time>
                </span>
            </div>
            <!--<div class="col btn btn-sm">
                <div class="fav border border-dark text-muted text-center text-small bg-light">
                    お気に入り追加
                    <span class="pl-1">
                        139
                        //Favoritesテーブルから
                    </span>
                </div>
            </div>-->
        </div>
    </div>

    <div class="container-fluid bg-light text-small pt-2 pb-1">
        企画内容
    </div>
    <div class="container-fluid bg-white py-2">
        {!! nl2br(e($title->detail)) !!}
    </div>
    <div class="form-submit container-fluid bg-light py-3">
        <input type="submit" class="btn btn-success d-block mx-auto" value="応募する">
    </div>

@endsection