@extends('layouts.guest')
@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/css/confirm.css') }}">
@endsection

@section('headerTitle',"新規会員登録 / ログイン")
@section('content')
    <script>
        var exec = false;
        function double(thform) {
            if(exec == true){ return false; };
            exec = true;
            
            thform.getElementById('sub').disabled = true;
            thform.getElementById('corr').disabled = true;
            return true;
        }
    </script>
    <div class="text-center text-white p-1 mb-3" style="background-color:orange">
        <strong>会員情報の確認</strong>
    </div>
    @isset($id)
        <form action="./complete" method="post" onsubmit="return double(this);">
            {{ csrf_field() }}
            <div class="container-fluid d-block mx-auto">
                <table width="100%" class="table table-borderless bg-darkgray text-small rounded-lg">
                    <tr><td width="28%" class="pr-0">学籍番号：</td><td width="70%" >{{$id}}</td></tr>
                    <tr><td width="28%" class="pr-0">パスワード：</td><td width="70%">{{$pass_circle}}</td></tr>
                    <tr><td width="28%" class="pr-0">名前：</td><td width="70%">{{$name}}</td></tr>
                    <tr><td width="28%" class="pr-0">学校名：</td><td width="70%">{{$school}}</td></tr>
                    <tr><td width="28%" class="pr-0">学年：</td><td width="70%">{{$grade}}年</td></tr>
                    <tr><td width="28%" class="pr-0">性別：</td><td width="70%">{{$sex}}</td></tr>
                    @empty(!$intro)
                        <tr><td width="28%" class="pr-0">自己紹介：</td><td width="70%">{{$intro}}</td></tr>
                    @endempty
                    @isset($read_temp_path)
                        <tr><td width="28%" class="pr-0">アイコン：</td></tr>
                    @endisset
                </table>
                @isset($read_temp_path)
                    <div><img class="w-50 h-50 d-block mx-auto" src="{{ $read_temp_path }}" alt=""></div>
                @endisset
                
                <input type="submit" id="sub" class="btn btn-lg btn-block border-danger text-danger bg-white mt-5" value="登録する" name="action">
                <input type="submit" id="corr" class="btn btn-lg btn-block border-dark text-dark bg-white mt-3 mb-3" value="入力内容の修正" name="action">
            </form>
        @endisset
    </div>
    
@endsection