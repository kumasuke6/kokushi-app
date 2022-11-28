@extends('layouts.common')
@section('pageCss')
    <link href="/css/dashboad.css" rel="stylesheet">
@endsection
@include('layouts.head')
@include('layouts.header')
@section('content')
    <div class="container-fluid">
        <main>
            <h1 class="display-6">第55回理学療法士国家試験</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>年度</th>
                        <th>番号</th>
                        <th>説明文</th>
                        <th>編集</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>2022</th>
                        <th>1</th>
                        <th>75 歳の女性。誤嚥性肺炎。喀痰培養で MRSA を検出した。マスク、手袋、ガウンを装着し病棟個室で肺理学療法を開始した。感染予防策について正しいのはどれか。</th>
                        <th>
                            <a href="" class="btn btn-primary">編集</a>
                        </th>
                    </tr>
                </tbody>
            </table>
        </main>
    </div>
@endsection
@section('pageJs')
    <script>
        var headerContainerClassList = document.getElementById("header-container").classList;
        var footer = document.getElementById("footer").classList;
        window.onload = function() {
            headerContainerClassList.remove("container");
            headerContainerClassList.add("container-fluid");
            footer.add("d-none");
        }
    </script>
@endsection
@include('layouts.footer')
