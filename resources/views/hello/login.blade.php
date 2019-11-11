@extends('layouts.michel')

@section('title',"ログイン画面")
@section('content')
    
    <form action="./login_check" method="post">
        {{ csrf_field() }}

        @php $flag = false; @endphp

        <p>学籍番号<br><input type="text" name="id" value="{{old('id')}}"></p>
        <p>
            @if ($errors->first('id')=="学籍番号を入力してください。")
                {{$errors->first('id')}}
                @php $flag = true; @endphp
                
            @endif
        </p>

        <p>パスワード<br><input type="password" name="password" id="pass"><input type="checkbox" id="password-check">パスワード表示</p>
        <p>
            @if ($errors->first('password')=="パスワードを入力してください。")
                {{$errors->first('password')}}
                @php $flag = true; @endphp
            @endif
        </p>

        @if (($errors->has('id') || $errors->has('password')) && $flag == false)
            {{ "学籍番号またはパスワードが違います" }}
        @endif

        <p><input type="submit" value="ログイン"></p>
    
    </form>

    <script>
        var pw = document.getElementById('pass');
        var pwCheck = document.getElementById('password-check');
        pwCheck.addEventListener('change', function() {
            if(pwCheck.checked) {
                pw.setAttribute('type', 'text');
            } else {
                pw.setAttribute('type', 'password');
            }
        }, false);
    </script>

@endsection
