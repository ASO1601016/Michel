@extends('layouts.guest')
@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/css/login.css') }}">
@endsection

@section('content')
    <div class="text-center text-white p-1 mb-3" style="background-color:orange">
        <strong>ログイン</strong>
    </div>        
        <div class="container-fluid">
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
                        <input type="submit" value="ログイン" class="mt-4 border rounded border-danger p-2 mb-5 bg-white">
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
        <div class="text-center text-white p-1 mb-3" style="background-color:orange">
            <strong>新規会員登録</strong>
        </div>
        <div class="pl-2 mb-4" style="font-size: 75%;">まだ会員で無い方はこちら</div>
        <div class="container">
            <div class="form">
                <button onclick="location.href='./regist'" class="rounded  p-2 mb-5 bg-danger text-white p-1"><strong>新規会員登録を行う</strong></button>
            </div>
        </div>
@endsection
