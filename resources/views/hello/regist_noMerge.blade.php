@extends('layouts.michel')

@section('title',"ユーザー登録画面")
@section('content')

@isset($message)
<p>{{$message}}</p>
@endisset




<p>会員情報の入力</p>
<form method="post" action="./confirm" enctype="multipart/form-data">
    {{ csrf_field() }}
    <!--

        span id:
            itemName 項目名
            rest 入力規則
            req 必須
            any 任意

    -->
    
    <p>
        <span id="itemName">学籍番号</span>
        <span id="rest">(半角数字7文字)</span>
        <span id="req">必須</span>
        <div><input type="text" name="number" value="{{old('number')}}"></div>
        @if ($errors->has('number'))
            {{$errors->first('number')}}
        @endif
    </p>

    <p>
        <span id="itemName">パスワード</span>
        <span id="rest">(英数字両方含む、8文字以上)</span>
        <span id="req">必須</span>
        <div><input type="password" name="password"></div>
        @if ($errors->has('password'))
            {{$errors->first('password')}}
        @endif
    </p>

    <p>
        <span id="itemName">確認のため、もう一度入力してください</span>
        <div><input type="password" name="password_confirmation"></div>
        @if ($errors->has('password_confirmation'))
            {{$errors->first('password_confirmation')}}
        @endif
    </p>

    <hr>

    <p>
        <span id="itemName">ニックネーム</span>
        <span id="req">必須</span>
        <div><input type="text" name="nickname" value="{{old('nickname')}}"></div>
        @if ($errors->has('nickname'))
            {{$errors->first('nickname')}}
        @endif
    </p>

    <p>
        <span id="itemName">学校名</span>
        <span id="req">必須</span>
        <div>
            <select name="school">
                @foreach ($items as $item)
                    <option value={{$item -> id}} @if(old('school') == $item -> id) selected  @endif>{{$item -> name}}</option>
                @endforeach
            </select>
        </div>
        @if ($errors->has('school'))
            {{$errors->first('school')}}
        @endif
    </p>
    
    <p>
        <span id="itemName">学年</span>
        <span id="req">必須</span>
        <div>
            <select name="grade">
                <option value="1" @if(old('grade')=='1') selected  @endif>1</option>
                <option value="2" @if(old('grade')=='2') selected  @endif>2</option>
                <option value="3" @if(old('grade')=='3') selected  @endif>3</option>
                <option value="4" @if(old('grade')=='4') selected  @endif>4</option>
            </select>
        </div>
        @if ($errors->has('grade'))
            {{$errors->first('grade')}}
        @endif
    </p>

    <p>
        <span id="itemName">性別</span>
        <span id="req">任意</span>
        <div>
            <select name="sex">
                <option value="未設定" @if(old('sex')=='未設定') selected  @endif>未設定</option>
                <option value="男" @if(old('sex')=='男') selected  @endif>男</option>
                <option value="女" @if(old('sex')=='女') selected  @endif>女</option>
            </select>
        </div>
        @if ($errors->has('sex'))
            {{$errors->first('sex')}}
        @endif
        
    </p>

    <p>
        <span id="itemName">自己紹介</span>
        <span id="any">任意</span>
        <div><textarea name="intro">{{ old('intro') }}</textarea></div>
        @if ($errors->has('intro'))
            {{$errors->first('intro')}}
        @endif
    </p>

    <p>
        <span id="itemName">アイコン</span>
        <span id="any">任意</span>
        <div><input type="file" name="icon"></div>
        @if ($errors->has('icon'))
            {{$errors->first('icon')}}
        @endif
    </p>
    <input type="submit" value="確認">

</form>
@endsection
