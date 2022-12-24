@extends('layouts.common')
@section('pageCss')
    <link href="/css/dashboad.css" rel="stylesheet">
@endsection
@include('layouts.head')
@include('layouts.header')
@section('content')
    <div class="container-fluid">
        <main>
            <h1>第{{ $subjectNumber }}回理学療法士国家試験</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>番号</th>
                        <th>説明文</th>
                        <th>編集</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($questions as $question)
                        <tr>
                            <th>{{ $question->number }}</th>
                            <th>{{ $question->caption }}</th>
                            <th>
                                <form action="{{ url('dashboard/questionDetail') }}" method="get">
                                    <input type="hidden" name="id" value="{{ $question->id }}">
                                    <button class="btn btn-primary" type="submit">編集</button>
                                </form>
                            </th>
                        </tr>
                    @endforeach
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
