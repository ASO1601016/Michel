@extends('layouts.michel')
@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/css/dm.css') }}">
@endsection
@section('title',"DM")
@section('content')
<script>
$(document).ready(function(){
    window.scroll(0,$(document).height());
});
</script>
    <!-- <div class="wrap">　こいつがあればヘッダー画像が画面幅からはみ出さない。けどヘッダー固定できなくなる -->
    
    <!-- 企画のサムネイル -->
    <header class="sticky-top">
        <div class=" header-image">
            <!-- 企画者のアイコン -->
            <div class="title text-center tbl">
                <div class="text-middle">{{$name}}</div>
                <div class="text-small">{{$title}}</div>
            </div>
        </div>
    </header>
    <!-- 自分の言葉（→から出てくる） -->
    <div class="container-fluid px-0">
        
        <!--①LINE会話全体を囲う-->
        <div class="line-bc mb-5" id="auto_scroll" style="overflow:auto;word-wrap: break-word;overflow-wrap: break-word;">


            @foreach ($mergeMessage as $msg)
                @if ($msg['human']==0)
                    
                            <div class="mycomment">
                                <span class="time-m">{{ date('H:i',strtotime($msg['datetime'])) }}</span>
                                <p>{!! nl2br(e($msg['message'])) !!}</p>
                                
                            </div>
                            
                @else
                    
                        <div class="partner">
                            <div class="faceicon">
                                <img class="border border-dark" width="45" height="45" src="{{$img}}">
                            </div>
                            <div class="chatting">
                                <div class="says"><p>{!! nl2br(e($msg['message'])) !!}</p></div>
                                <span class="time-p">{{ date('H:i',strtotime($msg['datetime'])) }}</span>
                            </div>
                            
                        </div>
                @endif
                
                
            @endforeach

            
                
                </div><!--/①LINE会話終了-->

            
    </div>

    <div class="container-fluid js-auto-scroll">
        <div class="row">
            <div class="send fixed-bottom bg-ao pt-1 pb-1" style="text-align: center;">
                    <form method="post" action="./dmSubmit" enctype="multipart/form-data" style="display:inline">
                        {{ csrf_field() }}
                            <textarea maxlength="128" style="vertical-align:top;width:40%;" placeholder="メッセージを入力" name="message" rows="1" class="text-area send-message border-dark rounded col-xs-4"></textarea>
                            <input type="submit"  class="justify-content-center border ml-1 col-xs-4 rounded" style="vertical-align: top;" value="送信">
                    </form>
                    @if ($flg)
                    
                        <form method="post" action="./assessment" style="display: inline">
                            {{ csrf_field() }}
                            <input type="submit" class="ml-1 mr-2 border col-xs-4" style="vertical-align: top;　font-size:10px;" value="企画を終了">
                        </form>
                    
                    @endif
            </div>
        </div>
    </div>

    <script>
        setTimeout(function() {
                window.scroll(0,$(.sita).height());
            },0);
    </script>
    
@endsection