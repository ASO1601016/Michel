@extends('layouts.michel')
@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/css/assessment.css') }}">
@endsection
@section('title',"評価")
@section('content')
<p>評価をしてください</p>
<p>あなたの評価がユーザーのランキングなどに繋がります</p>
<form method="post" action="./assessmentComplete">
    {{ csrf_field() }}
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
    <input type="submit" value="評価する！">
</form>

@endsection
