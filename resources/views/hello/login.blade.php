@extends('layouts.login')
@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/css/login.css') }}">
@endsection

@section('title',"ログイン画面")
@section('content')     
        <div class="container-fluid text-center" style="margin-top:10%;">
            <img src="storage/image/titlebrk.png" alt="title" width="50%">
        </div>
        <div class="container-fluid mt-5">
            <div class="login-page">
                <div class="form pw-form">
                    <form class="login-form pw-form-container" action="./login_check" method="post">
                        {{ csrf_field() }}
                        @php $flag = false; @endphp
                        <input class="border rounded border-dark p-2 mb-2" type="text" name="id" value="{{old('id')}}" placeholder="学籍番号"/>
                        @if ($errors->first('id')=="学籍番号を入力してください。")
                            <div class="bg-danger text-white mt-2 pl-1 border border-danger rounded ib"><b>{{$errors->first('id')}}</b></div>
                            @php $flag = true; @endphp
                        @endif
                        <div>
                            <input class="border rounded border-dark p-2 mt-2 mb-2" type="password" id="pass" name="password" placeholder="パスワード"/>
                            <span class="field-icon">
                                <i toggle="#password-field" class="fa fa-eye toggle-password"></i>
                            </span>
                        </div>
                        @if ($errors->first('password')=="パスワードを入力してください。")
                        <div class="bg-danger text-white mt-2 pl-1 border border-danger rounded ib"><b>{{$errors->first('password')}}</b></div>
                            
                            @php $flag = true; @endphp
                        @endif

                        @if (($errors->has('id') || $errors->has('password')) && $flag == false)
                            <div class="bg-danger text-white mt-2 pl-1 border border-danger rounded ib"><b>{{ "学籍番号またはパスワードが違います。" }}</b></div>
                        @endif
                        <input type="submit" value="ログイン" class="mx-auto d-block rounded text-white mt-4 p-2" style="background-color:#F7B46B;border:none;font-weight:bold;">
                    </form>
                </div>
            </div>
        </div>
        <script>
            // パスワードの表示・非表示切替
            $(".toggle-password").click(function() {
                // iconの切り替え
                $(this).toggleClass("fa-eye-slash");
                
                // 入力フォームの取得
                var input = $(this).parent().prev("input");
                // type切替
                if (input.attr("type") == "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });
        </script>
        <div class="pl-2 m-2" style="font-size: 75%;">まだ会員で無い方はこちら</div>
        <div class="container-fluid">
            <div class="form">
                <button onclick="location.href='./regist'" class="mx-auto d-block rounded text-white p-2 mb-5 w-100" style="background-color:#BCB5B5;border:none;"><strong>新規会員登録を行う</strong></button>
            </div>
        </div>
@endsection
