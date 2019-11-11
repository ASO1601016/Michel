@extends('layouts.michel')
@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/css/edit.css') }}">
@endsection
@section('title',"マイページ編集")
<!-- <link rel="stylesheet" href="slick-theme.css" type="text/css"> -->

@section('content')
    <div class="wrap">
        <h4 class="container-fluid text-center border p-2">
            <div class="text-small">
                {{$name}}のプロフィール
            </div>
        </h4>

        <!-- プロフィール画像の変更 -->

        <form action="./edit" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="center">
                <label class="header-image ">
                    <span class="filelabel" title="ファイルを選択">
                        @empty ($image)    
                            <img src="storage/icon/me.png" class="icon rounded-circle border border-black d-block mx-auto" width="65" height="65" id="preview">
                        @else
                            <img src="{{$image}}" class="icon rounded-circle d-block border border-black mx-auto" width="65" height="65" id="preview">
                        @endempty
                    </span>
                    <input type="file" name="icon" id="filesend" onchange="this.form.submit()">
                    <div class="icon text-center">画像変更</div>
                </label>
            </div>
        </form>


        <form action="./editComplete" method="post">
            {{ csrf_field() }}
            <!-- ユーザー名の変更 -->
            <div class="container-fluid">
                <div class="my-2">
                    ユーザー名
                </div>
                <div class="form-group">
                    <input type="text" id="title" name="name" value="{{$name}}" class="form-control">
                </div>
            </div>

            <!-- プロフィール文の変更 -->
            <div class="container-fluid">  
                <div class="mt-4">
                    自己紹介
                </div>
                <div class="form-group">
                    <textarea name="intro" id="textarea1" class="form-control" placeholder="アピールしたい実績などを具体的に書いてください。">{{$detail}}</textarea>
                </div>
            </div>

            <!-- 更新ボタン -->
            <input type="submit" class="btn btn-success btn-lg mx-auto d-block" value="更新する">
        </form>
    </div>
@endsection