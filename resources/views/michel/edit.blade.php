@extends('layouts.michel')
@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/css/edit.css') }}">
@endsection
@section('title',"マイページ編集")
<!-- <link rel="stylesheet" href="slick-theme.css" type="text/css"> -->

@section('content')
    
    <div class="wrap my-3">
        {{-- <h4 class="container-fluid text-center border p-2">
            <div class="text-small">
                {{$name}}のプロフィール
            </div>
        </h4> --}}

        <!-- プロフィール画像の変更 -->

        <form action="./edit" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="center">
                <label class="header-image ">
                    <span class="filelabel" title="ファイルを選択">
                        @empty ($image)    
                            <img src="storage/icon/me.png" class="icon rounded-circle d-block mx-auto mt-2" width="100" height="100" id="preview">
                        @else
                            <img src="{{$image}}" class="icon rounded-circle d-block mx-auto mt-2" width="100" height="100" id="preview"style="object-fit:cover;">
                        @endempty
                    </span>
                    <input type="file" name="icon" id="filesend" onchange="this.form.submit()">
                    <div class="mt-2 icon text-center text-primary" style="font-size:80%">プロフィール写真を変更</div>
                </label>
            </div>
        </form>
        @if ($errors->has('icon'))
            <div class="ib">
                <div class="child bg-danger text-white mb-2 pl-1 border border-danger rounded">
                    {{$errors->first('icon')}}
                </div>
            </div>
        @endif


        <form action="./editComplete" method="post">
            {{ csrf_field() }}
            <!-- ユーザー名の変更 -->
            <div class="container-fluid">
                <div class="my-2">
                    ユーザー名
                </div>
                <div class="form-group">
                    <input type="text" id="title" name="name" maxlength="20" value="{{$name}}" class="form-control">
                </div>
            </div>

            <!-- プロフィール文の変更 -->
            <div class="container-fluid">  
                <div class="mt-4">
                    自己紹介
                </div>
                <div class="form-group">
                    <textarea name="intro" id="textarea1" maxlength="200" style="resize: none" class="form-control" placeholder="アピールしたい実績などを具体的に書いてください。">{{$detail}}</textarea>
                </div>
            </div>

            <!-- 更新ボタン -->
            <input type="submit" class="btn upload mx-auto d-block" value="更新する">
        </form>
    </div>
@endsection