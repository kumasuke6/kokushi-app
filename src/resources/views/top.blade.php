@extends('layouts.common')
@section('pageCss')
<link href="/css/top.css" rel="stylesheet">
@endsection
@include('layouts.head')
@include('layouts.header')
@section('content')
<main>
  <div class="top">
    <img src="/img/top.jpg">
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 pt-3">
        <h2>理学療法士国家試験</h2>
        <p>5年間の理学療法士国家試験を出題</p>
        <p><a class="btn btn-primary" href="{{url('/questions/pt')}}" role="button">詳細を見る</a></p>
      </div>
      <div class="col-lg-4 pt-3">
        <h2>見出し</h2>
        <p>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。</p>
        <p><a class="btn btn-primary" href="#" role="button">詳細を見る</a></p>
      </div>
    </div>
  </div>
</main>
@endsection
@include('layouts.footer')