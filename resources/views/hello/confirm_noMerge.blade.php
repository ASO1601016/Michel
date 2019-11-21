@extends('layouts.michel')

@section('title',"確認画面")
@section('content')

<p>入力内容の確認</p>

@isset($id)
    
    <form action="./complete" method="post">
        {{ csrf_field() }}
        
        <p>学籍番号<br>{{$id}}</p>
        <p>パスワード<br>{{$pass_circle}}</p>
        <p>ニックネーム<br>{{$name}}</p>
        <p>学校名<br>{{$school}}</p>
        <p>学年<br>{{$grade}}</p>
        <p>性別<br>{{$sex}}</p>
        
        @empty(!$intro)
            <p>自己紹介<br>{{$intro}}</p>
        @endempty

        @isset($read_temp_path)
            <p>アイコン<br><img src="{{ $read_temp_path }}" width="300px" height="300px"></p>
        @endisset
        
        <p><input type="submit" value="登録する" name="action"></p>
        <p><input type="submit" value="入力内容の修正" name="action"></p>
    </form>
@endisset






@endsection
