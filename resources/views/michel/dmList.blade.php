@extends('layouts.michel')
@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/css/dmList.css') }}">
@endsection
@section('title',"DM一覧")
@section('content')
<script>
window.onpageshow = function(event) {
	if (event.persisted) {
		 window.location.reload();
	}
};
</script>




    <div class="wrap">
        <h4 class="container-fluid text-center border p-2 mb-1">
            <div class="text-small">
                DM一覧
            </div>
        </h4>

        @php $count = 1; @endphp
        @foreach ($dmLists as $dmList)
        
            
                
        <div class="container-fluid p-0" style="word-wrap: break-word;overflow-wrap: break-word;">
            <form method="get" width="100%" name="form{{$dmList->id}}" action="./dm">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$dmList->id}}">
                <button style="width:100%;" class="p-0 border" href="javascript:form{{$dmList->id}}.submit()">
                    
                    <div class="row boader mx-1" style="background:white;text-decoration: none;">
                        
                        <div class="col-3">
                            <!--企画の画像-->
                            <div class="w-100 mt-3 mb-3" style="position:relative; padding-bottom:100%; overflow:hidden;">
                                <div class="w-100" style="position:absolute; top:50%;">
                                    @empty ($dmList->image)
                                        <img class="w-100 rounded" src="storage/image/me.png" style="position:absolute;transform: translate(-50%,-50%);">
                                    @else
                                        <img class="w-100 rounded" src="{{$dmList->image}}" style="position:absolute;transform: translate(-50%,-50%);">
                                    @endempty
                                </div>
                            </div>
                        </div>

                        <div class="col-9">
                        <!--タイトル&最後のメッセージ文-->
                                    <div class="text-title text-left mt-2 text-dark">{{$dmList->title}}</div>
                                    <div class="text-muted text-left" style="font-size:80%;">{{$dmList->lastDm}}</div>
                        </div>

                    </div>
                </button>
            </form>
        </div>

        @php $count += 1; @endphp
        @endforeach

        

    </div>
@endsection
