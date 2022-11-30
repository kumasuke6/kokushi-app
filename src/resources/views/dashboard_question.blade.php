@extends('layouts.common')
@section('pageCss')
    <link href="/css/dashboad.css" rel="stylesheet">
@endsection
@include('layouts.head')
@include('layouts.header')
@section('content')
    <div class="container-fluid">
        <main>
            <h1>問題編集</h1>
            <form action="">
                <div class="mb-3">
                    <label for="examName" class="form-label h5">試験選択</label>
                    <select class="form-select" id="inputGroupSelect01">
                        <option value="1" selected>理学療法士国家試験　年数を表示</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="d-flex">
                    <div class="mb-3 me-2">
                        <label for="q-number" class="form-label h5">問題番号</label>
                        <input type="number" name="q-number" class="form-control" id="q-number" min="1"
                            max="100">
                    </div>
                    <div class="mb-3 me-2">
                        <label for="answer" class="form-label h5">回答</label>
                        <input type="number" name="answer" class="form-control" id="answer">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="caption" class="form-label h5">問題説明</label>
                    <textarea name="caption" class="form-control" id="caption"></textarea>
                </div>
                <div class="mb-3">
                    <input class="form-control" type="file" id="captionImg">
                </div>
                <div class="mb-3">
                    <div>
                        <h2 class="h5">選択肢</h2>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="choice1">（1）</span>
                            <input name="choice[]" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="file" id="choiceImg1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="choice2">（2）</span>
                            <input name="choice[]" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="file" id="choiceImg2">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="choice3">（3）</span>
                            <input name="choice[]" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="file" id="choiceImg3">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="choice4">（4）</span>
                            <input name="choice[]" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="file" id="choiceImg4">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="choice5">（5）</span>
                            <input name="choice[]" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="file" id="choiceImg5">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="explan" class="form-label h5">解説</label>
                    <textarea name="explan" class="form-control" id="explan"></textarea>
                </div>
                <div class="mb-3">
                    <input class="form-control" type="file" id="explanImg">
                </div>
                <div class="mb-3">
                    <input class="form-check-input" type="checkbox" name="inappropriateFlg" id="inappropriateFlg"
                        value="1">
                    <label for="inappropriateFlg" class="form-check-label">不適切フラグ</label>
                </div>
            </form>
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
