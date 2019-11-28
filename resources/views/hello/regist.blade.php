@extends('layouts.guest')
@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/css/regist.css') }}">
@endsection
@section('title',"新規会員登録")
@section('headerTitle',"新規会員登録 / ログイン")

@section('content')
    <div class="text-center text-white p-1 mb-3" style="background-color:orange">
        <strong>MICHEL会員登録</strong>
    </div>

    <div class="container-fluid mb-5">
        <div class="form">
            <form method="post" action="./confirm" enctype="multipart/form-data">
                {{ csrf_field() }}
                <!-- 学籍番号 -->
                <div class="form-group">
                    <label>学籍番号</label><span class="text-danger">　必須</span>
                    <input type="text" name="number" value="{{old('number')}}" class="form-control" placeholder="7桁の学籍番号を半角英数字で入力">
                    @if ($errors->has('number'))
                        <div class="bg-danger text-white mt-2 pl-1 border border-danger rounded ib"><b>{{$errors->first('number')}}</b></div>
                    @endif
                </div>

                <!-- パスワード -->
                <div class="form-group">
                    <label>パスワード</label><span class="text-danger">　必須</span>
                    <input type="password" name="password" class="form-control" placeholder="大文字、小文字、数字を含む8文字以上の文字列">
                    @if ($errors->has('password'))
                        <div class="bg-danger text-white mt-2 pl-1 border border-danger rounded ib"><b>{{$errors->first('password')}}</b></div>
                    @endif
                </div>

                <!-- パスワード -->
                <div class="form-group">
                    <label>確認のため、もう一度入力してください</label>
                    <input type="password" name="password_confirmation" class="form-control">
                    @if ($errors->has('password_confirmation'))
                        <div class="bg-danger text-white mt-2 pl-1 border border-danger rounded ib"><b>{{$errors->first('password_confirmation')}}</b></div>
                    @endif
                </div>

                <!-- 名前 -->
                <div class="form-group">
                    <label>名前</label><span class="text-danger">　必須</span>
                    <input type="text" name="nickname" class="form-control" value="{{old('nickname')}}" placeholder="サイト内で表示されるニックネームを入力">
                    @if ($errors->has('nickname'))
                        <div class="bg-danger text-white mt-2 pl-1 border border-danger rounded ib"><b>{{$errors->first('nickname')}}</b></div>
                    @endif
                </div>

                <!-- 学校名 -->
                <div class="row">
                    <div class="form-group col-11">
                        <label>学校名</label><span class="text-danger">　必須</span>
                        <select name="school" class="form-control custom-select">
                            @foreach ($items as $item)
                                <option value={{$item -> id}} @if(old('school') == $item -> id) selected  @endif>{{$item -> name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @if ($errors->has('school'))
                        <div class="bg-danger text-white mt-2 pl-1 border border-danger rounded ib"><b>{{$errors->first('school')}}</b></div>
                    @endif
                </div>

                <!-- 学年 -->
                <div class="row">
                    <div class="form-group col-4">
                        <label>学年</label><span class="text-danger">　必須</span>
                        <select name="grade" class="form-control custom-select w-75">
                            <option value="1" @if(old('grade')=='1') selected  @endif>1</option>
                            <option value="2" @if(old('grade')=='2') selected  @endif>2</option>
                            <option value="3" @if(old('grade')=='3') selected  @endif>3</option>
                            <option value="4" @if(old('grade')=='4') selected  @endif>4</option>
                        </select>
                    </div>
                    @if ($errors->has('grade'))
                        <div class="bg-danger text-white mt-2 pl-1 border border-danger rounded ib"><b>{{$errors->first('grade')}}</b></div>
                    @endif
                </div>
                
                <!-- 性別 -->
                <div class="row">
                    <div class="form-group col-4">
                        <div class="mb-2">性別<span class="text-muted">　任意</span></div>
                        <select name="sex" class="form-control custom-select " style="">
                            <option value="未設定" @if(old('sex')=='未設定') selected  @endif>未設定</option>
                            <option value="男" @if(old('sex')=='男') selected  @endif>男</option>
                            <option value="女" @if(old('sex')=='女') selected  @endif>女</option>
                        </select>
                    </div>
                    @if ($errors->has('sex'))
                        <div class="bg-danger text-white mt-2 pl-1 border border-danger rounded ib"><b>{{$errors->first('sex')}}</b></div>
                    @endif
                </div>
                <!-- 自己紹介 -->
                <div class="form-group mt-3">
                    <label>自己紹介</label><span class="text-muted">　任意</span>
                    <textarea name="intro" id="textarea" class="form-control selfintro">{{ old('intro') }}</textarea>
                    @if ($errors->has('intro'))
                        <div class="bg-danger text-white mt-2 pl-1 border border-danger rounded ib"><b>{{$errors->first('intro')}}</b></div>
                    @endif
                </div>

                <!-- アイコン画像 -->
                <label>アイコン画像</label><span class="text-muted">　任意</span>
                <div class="custom-file">
                    <input type="file" name="icon" class="custom-file-input" id="customFile">
                    <label class="custom-file-label">ファイル選択...</label>
                    <script>
                        $('.custom-file-input').on('change',function(){
                            $(this).next('.custom-file-label').html($(this)[0].files[0].name);
                        })
                    </script>
                    @if ($errors->has('icon'))
                        <div class="bg-danger text-white mt-2 pl-1 border border-danger rounded ib"><b>{{$errors->first('icon')}}</b></div>
                    @endif
                </div>

                <!-- 登録ボタン -->
                <input type="submit" class="btn btn-lg btn-block border-danger text-danger bg-white mt-5" value="確認画面へ">
            </form>
        </div>
    </div>
@endsection
