@extends('layouts.michel')
@section('content')
@section('title',"企画情報投稿")
@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/css/submit.css') }}">
@endsection
@section('content')
    <form method="post" action="{{ route('solutions.create') }}" enctype="multipart/form-data">
 @csrf
    <div class="wrap">
      <h4 class="container-fluid text-center border p-2">
        <div class="row">
          <div class="col-12">
            投稿内容
          </div>
        </div>
      </h4>
      <div class="form">
        <div class="container-fluid form-title">
          <h5>
            <strong>
              <label for="title">タイトル</label> <span class="text-danger">必須</span>
            </strong>
          </h5>
          <div class="my-2">
            このサービスのタイトルを入力してください。
          </div>
          <div class="form-group">
            <input class="form-control" name="title" value="{{ old('title') }}" placeholder="例）昼の弁当買い出し代行承ります">
          </div>
          @if ($errors->has('title'))
              <div class="bg-danger text-white mt-2 pl-1 border border-danger rounded ib"><b>{{$errors->first('title')}}</b></div>
          @endif
        </div>
      </div>
      
      <div class="container-fluid mt-4 form-detail">
        <h5>
          <strong>
            <label for="detail" class="form-detail">サービス内容</label> <span class="text-danger">必須</span>
          </strong>
        </h5>
        <div class="form-group">
          <textarea class="form-control" name="detail" placeholder="例）サービスの内容、ユーザーのメリット、アピールしたい実績などを具体的に書いてください。">{{ old('detail') }}</textarea>   
        </div>
        @if ($errors->has('detail'))
            <div class="bg-danger text-white mt-2 pl-1 border border-danger rounded ib"><b>{{$errors->first('detail')}}</b></div>
        @endif
      </div>

      <div class="container-fluid mt-5 form-category_id form-category_id">
        <h5>
          <strong>
            <label for="category_id" class="form-category_id">カテゴリ</label> <span class="text-danger">必須</span>
          </strong>
        </h5>
        <div class="form-group mb-3">
          <select name="category_id" class="form-control">
            <option value='' disabled selected style='display:none;'>選択してください</option>
            @foreach ($items as $item)
              <option value={{$item -> id}} @if(old('category_id') == $item -> id) selected  @endif>{{$item -> name}}</option>
            @endforeach
          </select>
          @if ($errors->has('category_id'))
              <div class="bg-danger text-white mt-2 pl-1 border border-danger rounded ib"><b>{{$errors->first('category_id')}}</b></div>
          @endif
        </div>

        <h5>
          <strong>
            <label for="grade" class="form-grade">募集人数</label> <span class="text-danger">必須</span>
          </strong>
        </h5>
        <div class="form-group mb-3">
          <select name="grade" class="form-control">
            <option value='' disabled selected style='display:none;'>選択してください</option>
            <option value="1" @if(old('grade')=='1') selected  @endif>1</option>
            <option value="2" @if(old('grade')=='2') selected  @endif>2</option>
            <option value="3" @if(old('grade')=='3') selected  @endif>3</option>
            <option value="4" @if(old('grade')=='4') selected  @endif>4</option>
            <option value="5" @if(old('grade')=='5') selected  @endif>5</option>
            <option value="6" @if(old('grade')=='6') selected  @endif>6</option>
            <option value="7" @if(old('grade')=='7') selected  @endif>7</option>
            <option value="8" @if(old('grade')=='8') selected  @endif>8</option>
            <option value="9" @if(old('grade')=='9') selected  @endif>9</option>
            <option value="10" @if(old('grade')=='10') selected  @endif>10</option>
          </select>
        </div>
        @if ($errors->has('grade'))
            <div class="bg-danger text-white mt-2 pl-1 border border-danger rounded ib"><b>{{$errors->first('grade')}}</b></div>
        @endif


        <h5>
          <strong>
            <label for="image">締め切り日</label> <span class="text-danger">必須</span>
          </strong>
        </h5>
        <div class="form-group mb-3">
            <input type="date" name="limit" value="{{ old('limit') }}">
        </div>
        @if ($errors->has('limit'))
            <div class="bg-danger text-white mt-2 pl-1 border border-danger rounded ib"><b>{{$errors->first('limit')}}</b></div>
        @endif

        <div class="form-image">
          <h5>
            <strong>
              <label for="image">画像</label> <span class="text-muted">任意</span>
            </strong>
          </h5>
          <div class="container-fluid p-2">
            <input type="file" class="" name="image" value="{{ old('image') }}">
            <div class="preview" />
          </div>
        </div>
        

        <div class="form-submit">
          <button type="submit" class="btn btn-success btn-lg btn-block my-3">投稿する</button>
        </div>

      </div>
    </div>
</form>
@endsection