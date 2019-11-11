@extends('layouts.michel')
@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/css/assessment.css') }}">
@endsection
@section('title',"評価")
@section('content')
<script type="text/javascript"> 
    function check(){
        if(window.confirm('評価を確定してよろしいですか？')){
            return true;
        }else{
            return false;
        }
    }
</script>

<body style="color:#444444;">
    <div class="container-fluid text-center" style="margin-top:5%;">
        <form method="post" action="./assessmentComplete" onSubmit="return check()">
            {{ csrf_field() }}
            <h2 style="font-weight:bold;">評価をしてください</h2>
            <div class="container p-4">
                <h5>あなたの評価がユーザーの</h5>
                <h5>ランキングなどに繋がります</h5>
            </div>
            <div class="container-fluid m-7 p-7">
                <div class="evaluation">
                    <input id="star3" type="radio" name="star" value="3">
                    <label for="star3">★</label>
                    <input id="star4" type="radio" name="star" value="2">
                    <label for="star4">★</label>
                    <input id="star5" type="radio" name="star" value="1">
                    <label for="star5">★</label>
                </div>
                <div class="center">
                    @if ($errors->has('star'))
                        {{$errors->first('star')}}
                    @endif
                </div>
            </div>
            <div class="contaienr p-4">
                <h5>これにて取引は終了となります</h5>
                <h5>ありがとうございました</h5>
            </div>
            <input type="submit" class="btn btn-danger btn-lg p-4 m-4" style="font-weight:bold;margin-bottom:20%;" value="評価する！">
        </form>
    </div>
    
</body>

@endsection