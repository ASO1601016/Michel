@extends('layouts.michel')

@section('title',"マイページ")
@section('content')

    @empty ($image)
        <p><img src="storage/icon/me.png" width="100px"></p>
    @else
        <p><img src="{{$image}}" width="100px"></p>
    @endempty

    <p>{{$name}}</p>
    <p>{{$school}}／性別：{{$sex}}</p>
    プロフィール
    <p>{{$detail}}</p>
    <p>評価{{$status}}</p>
    <p><a href="./edit">ページを編集する</a></p>
    <p><a href="./top">トップ画面へ</a></p>
@endsection
