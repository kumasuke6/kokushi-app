@extends('layouts.common')
@section('pageCss')
    <link href="/css/top.css" rel="stylesheet">
@endsection
@include('layouts.head')
@include('layouts.header')
@section('content')
    <main class="container">
        <h1 class="my-3">マイページ</h1>
        <ul class="nav nav-pills mb-3 navbar-dark" id="pills-tab" role="tablist">
            <li class="nav-item me-2" role="presentation">
                <button class="btn  active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                    type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                    基本情報
                </button>
            </li>
            <li class="nav-item me-2" role="presentation">
                <button class="btn " id="pills-review-tab" data-bs-toggle="pill" data-bs-target="#pills-review"
                    type="button" role="tab" aria-controls="pills-review" aria-selected="false">
                    見直しチェック問題
                </button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <p>ユーザー名 : {{ $userName }}</p>
                <p>email : {{ $userEmail }}</p>
                @if ($userType === 0)
                    <p>会員タイプ : 無料会員</p>
                @elseif ($userType === 1)
                    <p>会員タイプ : 有料会員</p>
                @elseif($userType === 2)
                    <p>会員タイプ : Editor</p>
                @elseif($userType === 3)
                    <p>会員タイプ : Admin</p>
                @endif
            </div>
            <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>番号</th>
                            <th>説明文</th>
                            <th>リトライ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>1</th>
                            <th>次の筋肉の気指定しについて誤っているものを選べ</th>
                            <th>
                                <button class="btn btn-primary" type="submit">問題を解く</button>
                            </th>
                        </tr>
                        <tr>
                            <th>1</th>
                            <th>次の筋肉の気指定しについて誤っているものを選べ</th>
                            <th>
                                <button class="btn btn-primary" type="submit">問題を解く</button>
                            </th>
                        </tr>
                        <tr>
                            <th>1</th>
                            <th>次の筋肉の気指定しについて誤っているものを選べ</th>
                            <th>
                                <button class="btn btn-primary" type="submit">問題を解く</button>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
@include('layouts.footer')
