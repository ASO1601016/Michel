@extends('layouts.michel')

@section('title',"DM")
@section('content')
    <img src="{{$topImg}}" width="100px">
    <div>{{$name}}</div>
    <div>{{$title}}</div>
    <hr>
    <form method="post" action="./dmSubmit" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="text" name="message">
        <input type="submit">
    </form>
    @if ($flg)
        <form method="post" action="./assessment">
            {{ csrf_field() }}
            <input type="submit" value="企画を終了する">
        </form>
    @endif
    

    @foreach ($mergeMessage as $msg)
        @if ($msg['human']==0)
            <p style="text-align: right;color:red">
        @else
            <p style="text-align:  left;color:blue"><img src="{{$img}}" width="40px">
        @endif
        {{$msg['message']}} {{ date('H:i',strtotime($msg['datetime'])) }}</p>
    @endforeach

    <script type="text/javascript">
        //送信ボタンを押した際に送信ボタンを無効化する（連打による多数送信回避）
        $(function(){
            $('[type="submit"]').click(function(){
                $(this).prop('disabled',true);//ボタンを無効化する
                $(this).closest('form').submit();//フォームを送信する
            });
        });
    </script>
@endsection
