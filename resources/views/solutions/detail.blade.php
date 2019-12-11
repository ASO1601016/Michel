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

                
                <div class="container-fluid my-2">
                    <div class="row">
                    <!--Usersテーブルから引っ張る-->
                        <div class="col-3 col-sm-2 pl-0">
                            @empty ($title->userImage)
                                @if($title->sex == "男")
                                    <img src="storage/icon/me.png" style="border: 2px solid #d9534f;" class="rounded-circle" width="65" height="65">
                                @elseif($title->sex == "女")
                                    <img src="storage/icon/me.png" style="border: 2px solid #d9534f;" class="rounded-circle" width="65" height="65">
                                @else
                                    <img src="storage/icon/me.png" class="rounded-circle" width="65" height="65">
                                @endif
                            @else
                                @if($title->sex == "男")
                                    <img src="{{ $title->userImage }}" style="border: 2px solid #d9534f;" class="rounded-circle" width="65" height="65">
                                @elseif($title->sex == "女")
                                    <img src="{{ $title->userImage }}" style="border: 2px solid #d9534f;" class="rounded-circle" width="65" height="65">
                                @else
                                    <img src="{{ $title->userImage }}" class="rounded-circle" width="65" height="65">
                                @endif
                            @endempty
                        </div>
                        <div class="col-9 col-sm-10 my-auto">{{ $title->name }}</div>
                    </div>
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
                    <input type="submit" class="btn btn-success" value="応募する">
                </form>
                <div class="object">
                    <div class="inner">
                    <form action="./favoComplete" method="get" style="display:inline">
                        @if($favoBool)
                        <button type="submit" class="heart hred btn"></button><!--解除--><span>{{$favoCount}}</span>
                        @else
                        <button type="submit" class="heart hnone btn"></button><!--追加--><span>{{$favoCount}}</span>
                        @endif
                    </form>
                    </div>
                </div>
            </div>
        @endif
    
@endsection