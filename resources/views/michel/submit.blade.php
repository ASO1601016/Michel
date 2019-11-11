@extends('layouts.michel')

@section('css')
<link rel="stylesheet" href="{{ asset('/assets/css/submit.css') }}">
@endsection

@section('title',"企画情報投稿")
@section('content')

<div class="wrap">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="icon" href="favicon.ico">
    <link rel="stylesheet" href="submit-blade.css">
    <link rel="stylesheet" href="slick-theme.css" type="text/css">

    <h4 class="container-fluid text-center border p-2">
        <div class="row">
            <div class="col-12">
                投稿内容
            </div>
        </div>
    </h4>

    <div class="container-fluid">
        <h5>
            <strong>
                サービスタイトル（25字以内）<span class="text-danger">必須</span>
            </strong>
        </h5>
        <div class="my-2">
            このサービスで提供することをシンプルに「〜ます」の形式で入力してください。
        </div>
        <div class="form-group">
            <input type="text" id="title" class="form-control" placeholder="例）昼の弁当買い出し代行承ります">
        </div>
        ※「ます」は必須のため削除できません。
    </div>

    <div class="container-fluid mt-4">
        <h5>
            <strong>
                サブタイトル（30字以内）<span class="text-danger">必須</span>
            </strong>
        </h5>
        <div class="my-2">
            タイトルにちなんだキャッチコピーを入力してください。
        </div>
        <div class="form-group">
            <input type="text" id="title" class="form-control" placeholder="例）50m走7.9秒の素早さで学内１早く弁当をお届けします">
        </div>
    </div>

    <div class="container-fluid mt-4">
        <h5>
            <strong>
                サービス内容（1,000字以内）<span class="text-danger">必須</span>
            </strong>
        </h5>
        <div class="form-group">
            <textarea id="textarea1" class="form-control" placeholder="例）サービスの内容、ユーザーのメリット、アピールしたい実績などを具体的に書いてください。"></textarea>
        </div>
    </div>

    <div class="container-fluid mt-5">
        <h5>
            <strong>
                カテゴリ <span class="text-danger">必須</span>
            </strong>
        </h5>
        
        <div class="form-group mb-3">
            <select class="form-control" id="exampleFormControlSelect1">
                <option value='' disabled selected style='display:none;'>選択してください</option>
                <option>勉強</option>
                <option>恋愛</option>
                <option>悩み・相談</option>
                <option>お金</option>
                <option>アニメ</option>
            </select>
        </div>

        <h5>
            <strong>
                一度に受注可能な件数 <span class="text-danger">必須</span>
            </strong>
        </h5>
        <div class="form-group mb-3">
            <select class="form-control" id="exampleFormControlSelect1">
                <option value='' disabled selected style='display:none;'>選択してください</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>

        <h5>
            <strong>
                画像（最大10枚）
            </strong>
        </h5>
        <div class="container-fluid  p-2">
            <form>
                <input type="file">
            </form>
            <div class="preview" />
        </div>
        <button type="button" class="btn btn-default btn-lg btn-block my-3">下書きで保存する</button>
        <button type="button" class="btn btn-success btn-lg btn-block">公開する</button>
        <button type="button" class="btn btn-link btn-lg btn-block">下書きを削除する</button>

    </div>
</div>



@endsection
