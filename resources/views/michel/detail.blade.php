@extends('layouts.michel')
@section('content')
<p>タイトル：{{ $title->title }}</p>
<p>画像：<img src="{{ $title->image }}"></p>
<p>内容：{{ $title->detail }}</p>

@endsection