@extends('layouts.michel')
@section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/css/submit-detail-blade.css') }}">
@endsection
@section('title',"企画情報詳細")
@section('content')
    <!-- イイネボタン -->
    <script type="text/javascript" src="/mod/LKBNX/v2.23/demo/cn/cn.php"></script>

@csrf
    
        <div class="wrap">
            
            <div class="jumbotron-fluid bg-white">
                <div class="image py-3">
                    @empty ($title->image)
                        <img class="gazo" src="storage/image/solution.jpg">
                    @else
                        <img class="gazo" src="{{ $title->image }}">
                    @endempty
                </div>
            </div>
            
            <div class="container-fluid bg-white mb-1 mt-4 pt-3 pb-2" style="word-break: break-all;">
                <h5>
                    <strong>
                        {{ $title->title }}
                    </strong>
                </h5>
                <div class="container-fluid pl-0 my-2">
                    <!--Usersテーブルから引っ張る-->
                    @empty ($title->userImage)
                        @if($title->sex == "男")
                            <img src="storage/icon/me.png" class="rounded-circle border border-primary" width="65" height="65">
                        @elseif($title->sex == "女")
                            <img src="storage/icon/me.png" class="rounded-circle border border-danger" width="65" height="65">
                        @else
                            <img src="storage/icon/me.png" class="rounded-circle" width="65" height="65">
                        @endif
                    @else
                        @if($title->sex == "男")
                            <img src="{{ $title->userImage }}" class="rounded-circle border border-primary" width="65" height="65">
                        @elseif($title->sex == "女")
                            <img src="{{ $title->userImage }}" class="rounded-circle border border-danger" width="65" height="65">
                        @else
                            <img src="{{ $title->userImage }}" class="rounded-circle" width="65" height="65">
                        @endif
                    @endempty
                    <span class="text-middle">{{ $title->name }}
                        <time class="text-muted">
                            {{ $title->sex }}
                        </time>
                    </span>
                </div>
                

            </div>
        </div>

        <div class="container-fluid bg-light text-small pt-2 pb-1">
            企画内容
        </div>
        {{-- 企画内容文表示 --}}
        <div class="container-fluid bg-white py-2" style="word-break: break-all;">
            {!! nl2br(e($title->detail)) !!}
        </div>
        @if(!$mySolutionBool)
            <div class="form-submit container-fluid bg-light py-3">
                <form method="get" action="./apply" enctype="multipart/form-data" style="display:inline">
                    <input type="submit" class="btn btn-success d-block mx-auto" value="応募する">
                </form>
                <form action="./favoComplete" method="get" style="display:inline">
                    @if($favoBool)
                        <input type="submit" class="btn btn-success d-block mx-auto" style="color:yellow;" value="お気に入り解除 {{$favoCount}}">
                    @else
                        <input type="submit" class="btn btn-success d-block mx-auto" value="お気に入り追加 {{$favoCount}}">
                    @endif
                </form>
            </div>
        @endif
        

@endsection