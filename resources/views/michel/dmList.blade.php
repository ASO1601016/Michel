@extends('layouts.michel')

@section('title',"DM一覧")
@section('content')



@php $count = 1; @endphp
@foreach ($dmLists as $dmList)
    <form method="post" name="form{{$dmList->id}}" action="./dm">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$dmList->id}}">
        <a href="javascript:form{{$dmList->id}}.submit()">{{$count}}</a>
    </form>
    @php $count += 1; @endphp
@endforeach

@endsection
