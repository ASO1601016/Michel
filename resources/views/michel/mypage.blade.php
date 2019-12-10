@extends('layouts.michel')
@section('title',"マイページ")
@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/css/mypage.css') }}">
@endsection
@section('content')

<div class="wrap" style="min-height:100%;">
    <div class="prof my-4" style="backgroud-color:white;">

    {{-- <h4 class="container-fluid text-center border p-2 m-0">
        <div class="text-small">
            {{$name}}のプロフィール
        </div>
    </h4> --}}

    <!-- プロフィール画像の変更 -->
    {{-- <div class=" header-image"></div> --}}
    @empty ($image)
        <img src="storage/icon/me.png" class="d-block mx-auto icon rounded-circle icon-image m-3" width="100" height="100">
    @else
        <img src="{{$image}}" class="d-block mx-auto icon rounded-circle icon-image m-3" width="100" height="100">
    @endempty

    <div class="icon text-dark small-font text-center">
        <div class="title" style="font-weight:bold;font-size:20px;"><strong>{{$name}}</strong></div>
        <div class="text-middle"><time>{{$school}}</time> / 性別：{{$sex}}</div>
        <div class="text-middle"><time>企画完了数：{{$comp}}</time> / 評価：⭐️{{$status}}</div>
    </div>
    <div class="p-1"></div>

    <!-- 自己紹介 -->
    <div class="container-fluid">
        <div class="border-top border-bottom p-2 mt-2" style="word-break: break-all;">
            @if(!$detail)
                未設定
            @else
                {!! nl2br(e($detail)) !!}
            @endif
        </div>
        <div class=""></div>
    </div>

    <!-- ページ編集ボタン -->
    <button onclick="location.href='./edit'" class="btn bg-white mx-auto d-block my-3 w-75" style="border:dashed 2px #E0E0E0;color:#E0E0E0;">ページを編集する</button>
    </div>
    <div class="obj bg-light">
    <div class="container-fluid text-center px-0 pt-3 my-3">
        <strong class="pl-1 py-2"><i class="fa fa-bullhorn" aria-hidden="true"></i>募集中の企画</strong>
    </div>
    @if($recruit->count() > 0)
        @foreach ($recruit as $recru)
            <form method="get" width="100%" name="form{{$recru->id}}" action="detail"> 
                <input type="hidden" name="id" value="{{$recru->id}}">
                <button style="width:100%;" class="p-0" href="javascript:form{{$recru->id}}.submit()">
                    <div class="container">
                    <div class="row boader mx-1" style="background:white;text-decoration: none;">
                        <div class="col-3">
                            <!--企画の画像-->
                            <div class="w-100 mt-3 mb-3" style="position:relative; padding-bottom:100%;overflow:hidden;">
                                <div class="w-100" style="position:absolute; top:50%;">
                                    @empty ($recru->image)
                                        <img class="w-100 rounded" src="storage/image/solution.jpg" style="position:absolute;transform: translate(-50%,-50%);">
                                    @else
                                        <img class="w-100 rounded" src="{{$recru->image}}" style="position:absolute;transform: translate(-50%,-50%);">
                                    @endempty
                                </div>
                            </div>
                        </div>
                        <div class="col-9">
                        <!--タイトル&最後のメッセージ文-->
                            <div class="text-title text-left mt-2 text-dark">{{$recru->title}}</div>
                            <div class="text-muted text-left" style="font-size:80%;">{{$category[$recru->category_id-1]->name}}</div>
                        </div>
                    </div>
                    </div>
                </button>
            </form>
        @endforeach
    @else
        募集中の企画はありません
    @endif

    <div class="container-fluid text-center px-3 pt-3 my-3">
        <strong class="p-1 py-2"><i class="fa fa-trophy" aria-hidden="true"></i>達成した企画</strong>
    </div>
    @if($complete->count() > 0)
        @foreach ($complete as $co)
            <form method="get" width="100%" name="form{{$co->id}}" action="detail"> 
                <input type="hidden" name="id" value="{{$co->id}}">
                <button style="width:100%;" class="p-0" href="javascript:form{{$co->id}}.submit()">
                    <div class="row boader mx-1" style="background:white;text-decoration: none;">
                        <div class="col-3">
                            <!--企画の画像-->
                            <div class="w-100 mt-3 mb-3" style="position:relative; padding-bottom:100%;overflow:hidden;">
                                <div class="w-100" style="position:absolute; top:50%;">
                                    @empty ($co->image)
                                        <img class="w-100 rounded" src="storage/image/solution.jpg" style="position:absolute;transform: translate(-50%,-50%);">
                                    @else
                                        <img class="w-100 rounded" src="{{$co->image}}" style="position:absolute;transform: translate(-50%,-50%);">
                                    @endempty
                                </div>
                            </div>
                        </div>
                        <div class="col-9">
                        <!--タイトル&最後のメッセージ文-->
                            <div class="text-title text-left mt-2 text-dark">{{$co->title}}</div>
                            <div class="text-muted text-left" style="font-size:80%;">{{$category[$co->category_id-1]->name}}</div>
                        </div>
                    </div>
                </button>
            </form>
        @endforeach
    @else
        達成した企画はありません
    @endif
    </div>
</div>
@endsection
