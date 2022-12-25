@extends('layouts.common')
@section('pageCss')
    <link href="/css/dashboad.css" rel="stylesheet">
@endsection
@include('layouts.head')
@include('layouts.header')
@section('content')
    <div class="container-fluid">
        <main>
            <h1 class="display-6">ユーザー一覧</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ユーザー名</th>
                        <th>Email</th>
                        <th>ユーザータイプ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>1</th>
                        <th>サンプル太郎</th>
                        <th>sample@gmail.com</th>
                        <th>無料会員</th>
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
