@extends('layouts.common')
@section('pageCss')
    <link href="/css/top.css" rel="stylesheet">
@endsection
@include('layouts.head')
@include('layouts.header')
@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 pt-3">
                    <div class="d-flex flex-column">
                        <p>{{ $pageCount }}問終了しました。お疲れさまでした。</p>
                        <a class="btn btn-outline-secondary" href="{{ url('/') }}">トップページへ</a>
                    </div>
                </div>
                <div class="col-lg-4 pt-3">
                    <h2>Navか広告</h2>
                </div>
            </div>
        </div>
    </main>
@endsection
@include('layouts.footer')
