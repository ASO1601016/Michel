@extends('layouts.michel')
@section('title',"マイページ")
@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/css/mypage.css') }}">
@endsection
@section('content')
    
<div class="wrap bg-light">

    <h4 class="container-fluid text-center border p-2 m-0">
        <div class="text-small">
            {{$name}}のプロフィール
        </div>
    </h4>

    <!-- プロフィール画像の変更 -->
    {{-- <div class=" header-image"></div> --}}
    @empty ($image)
        <img src="storage/icon/me.png" class="icon rounded-circle icon-image ml-2 border border-dark mt-2" width="65" height="65">
    @else
        <img src="{{$image}}" class="icon rounded-circle icon-image ml-2 border border-dark mt-2" width="65" height="65">
    @endempty

    <div class="icon text-dark ml-2 small-font">
        <div class="title"><strong>{{$name}}</strong></div>
        <div class="text-middle"><time>{{$school}}</time>／性別：{{$sex}}</div>
        <div class="text-middle"><time>企画完了数：{{$comp}}</time>／評価：⭐️{{$status}}</div>
    </div>
    <div class="border-bottom border-dark p-1"></div>

    <!-- 自己紹介 -->
    <div class="container-fluid px-0 pt-2">
        <strong class="pl-1 py-2">自己紹介</strong>
        <div class="pl-1">
            {!! nl2br(e($detail)) !!}
        </div>
        <div class="border-bottom border-dark py-2"></div>
    </div>

    <div class="container-fluid bg-light px-0 pt-3">
        <strong class="pl-1 py-2">募集中の企画</strong>
    </div>
    @foreach ($recruit as $recru)
        

    <form method="post" width="100%" name="form{{$recru->id}}" action="#">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{$recru->id}}">
            <button style="width:100%;" class="p-0" href="javascript:form{{$recru->id}}.submit()">
                
                <div class="row boader mx-1" style="background:white;text-decoration: none;">
                    
                    <div class="col-3">
                        <!--企画の画像-->
                        <div class="w-100 mt-3 mb-3" style="position:relative; padding-bottom:100%;">
                            <div class="w-100" style="position:absolute; top:50%;">
                                <img class="w-100 rounded" src="{{$recru->image}}" style="position:absolute;transform: translate(-50%,-50%);">
                            </div>
                        </div>
                    </div>

                    <div class="col-9">
                    <!--タイトル&最後のメッセージ文-->
                                <div class="text-title text-left mt-2 text-dark">{{$recru->title}}</div>
                                <div class="text-muted text-left" style="font-size:80%;">{{$category[$recru->category_id-1]->name}}</div>
                    </div>

                </div>
            </button>
        </form>





        {{-- <div class="container-fruid border m-1 shadow-sm" style="background:white;">
            <div class="row">
                <div class="col-3">
                    <!--企画の画像-->
                    <div class="w-100 m-3" style="position:relative; overflow:hidden; padding-bottom:100%;">
                        <div class="w-100" style="position:absolute; left:50%; top:50%;">
                            <img class="w-100 rounded" src="{{$recru->image}}" style="position:absolute;transform: translate(-50%,-50%);">
                        </div>
                    </div>
                </div>
                <div class="col-9">
                <!--タイトル&詳細-->
                    <div class="text-title mt-2">{{$recru->title}}</div>
                    <a class="text-muted">{{$category[$recru->category_id-1]->name}}</a>
                </div>
            </div>
        </div>
     --}}
    @endforeach

    <!-- ページ編集ボタン -->
    <button onclick="location.href='./edit'" class="btn btn-success btn-lg mx-auto d-block mt-3">ページを編集する</button>
</div>
@endsection
