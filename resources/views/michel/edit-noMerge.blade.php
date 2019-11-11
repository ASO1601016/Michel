@extends('layouts.michel')

@section('css')
<link rel="stylesheet" href="{{ asset('/assets/css/edit.css') }}">
@endsection

@section('title',"編集画面")
@section('content')
<form action="./edit" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <label>
        <span class="filelabel" title="ファイルを選択">
            @empty ($image)    
                <p><img src="storage/icon/me.png" width="75" height="75" id="preview">変更</p>
            @else
                <p><img src="{{$image}}" width="75" height="75" id="preview">変更</p>
            @endempty
        </span>
        <input type="file" name="icon" id="filesend" onchange="this.form.submit()">
    </label>
</form>
<form action="./editComplete" method="post">
    {{ csrf_field() }}
    {{-- <p><img src="{{$image}}" width="100px"></p> --}}
    <p>ユーザー名<br><input type="text" name="name" value="{{$name}}"></p>
    <p>プロフィール文<br><textarea name="intro">{{$status}}</textarea></p>
    <input type="submit" value="更新する">
</form>

<script>
    $('#filesend').on('change', function (e) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#preview").attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files[0]);
    });
</script>
@endsection
