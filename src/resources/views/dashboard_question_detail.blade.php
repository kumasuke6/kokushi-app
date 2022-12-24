@extends('layouts.common')
@section('pageCss')
    <link href="/css/dashboad.css" rel="stylesheet">
@endsection
@include('layouts.head')
@include('layouts.header')
@section('content')
    <div class="container-fluid">
        <main class="question-detail">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h1>問題編集</h1>
            <form action="{{ url('dashboard/updateQuestion') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $question[0]->id }}">
                <div class="mb-3">
                    <label for="examName" class="form-label h5">試験選択</label>
                    <select class="form-select" name="subject_id" id="inputGroupSelect01">
                        @foreach ($subjects as $subject)
                            @if ($subject->id == $question[0]->subject_id)
                                <option value="{{ $subject->id }}" selected>
                                @else
                                <option value="{{ $subject->id }}">
                            @endif
                            第{{ $subject->number }}回{{ $subject->name }}
                            @if ($subject->harf_div == '1')
                                午前
                            @elseif ($subject->harf_div == '2')
                                午後
                            @else
                                なし
                            @endif
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex">
                    <div class="mb-3 me-2">
                        <label for="number" class="form-label h5">問題番号</label>
                        <input type="number" name="number" class="form-control" id="number" min="1"
                            max="100" value="{{ $question[0]->number }}">
                    </div>
                    <div class="mb-3 me-2">
                        <label for="answer" class="form-label h5">回答</label>
                        <input type="number" name="answer" class="form-control" id="answer"
                            value="{{ $question[0]->answer }}">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="caption" class="form-label h5">問題説明</label>
                    <textarea name="caption" class="form-control" id="caption">{{ $question[0]->caption }}</textarea>
                </div>
                <div class="mb-3">
                    <input class="form-control" type="file" name="caption_img">
                </div>
                @if (!is_null($question[0]->caption_img))
                    <img class="mb-3" src={{ url('/storage/test_img', $question[0]->caption_img) }}>
                @endif
                <div class="mb-3">
                    <div>
                        <h2 class="h5">選択肢</h2>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="choice1">（1）</span>
                            <input name="choice1" type="text" class="form-control" value="{{ $question[0]->choice1 }}">
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="file" name="choice_img1">
                        </div>
                        @if (!is_null($question[0]->choice_img1))
                            <img class="mb-3" src={{ url('/storage/test_img', $question[0]->choice_img1) }}>
                        @endif
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="choice2">（2）</span>
                            <input name="choice2" type="text" class="form-control" value="{{ $question[0]->choice2 }}">
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="file" name="choice_img2">
                        </div>
                        @if (!is_null($question[0]->choice_img2))
                            <img class="mb-3" src={{ url('/storage/test_img', $question[0]->choice_img1) }}>
                        @endif
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="choice3">（3）</span>
                            <input name="choice3" type="text" class="form-control" value="{{ $question[0]->choice3 }}">
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="file" name="choice_img3">
                        </div>
                        @if (!is_null($question[0]->choice_img3))
                            <img class="mb-3" src={{ url('/storage/test_img', $question[0]->choice_img3) }}>
                        @endif
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="choice4">（4）</span>
                            <input name="choice4" type="text" class="form-control" value="{{ $question[0]->choice4 }}">
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="file" name="choice_img4">
                        </div>
                        @if (!is_null($question[0]->choice_img4))
                            <img class="mb-3" src={{ url('/storage/test_img', $question[0]->choice_img4) }}>
                        @endif
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="choice5">（5）</span>
                            <input name="choice5" type="text" class="form-control"
                                value="{{ $question[0]->choice5 }}">
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="file" name="choice_img5">
                        </div>
                        @if (!is_null($question[0]->choice_img5))
                            <img class="mb-3" src={{ url('/storage/test_img', $question[0]->choice_img5) }}>
                        @endif
                    </div>
                </div>
                <div class="mb-3">
                    <label for="explan" class="form-label h5">解説</label>
                    <textarea name="explan" class="form-control" id="explan">{{ $question[0]->explan }}</textarea>
                </div>
                <div class="mb-3">
                    <input class="form-control" type="file" name="explan_img">
                    @if (!is_null($question[0]->explan_img))
                        <img class="mb-3" src={{ url('/storage/test_img', $question[0]->explan_img) }}>
                    @endif
                </div>
                <div class="mb-3">
                    <p class="form-label h5">不適切フラグ</p>
                    @if ($question[0]->inappropriate_flg === 1)
                        <input class="form-check-input" type="radio" name="inappropriate_flg" id="inappropriateFlgOff"
                            value="0">
                        <label for="inappropriateFlgOff">OFF</label>
                        <input class="form-check-input" type="radio" name="inappropriate_flg" id="inappropriateFlgOn"
                            value="1" checked>
                        <label for="inappropriateFlgOn">ON</label>
                    @else
                        <input class="form-check-input" type="radio" name="inappropriate_flg" id="inappropriateFlgOff"
                            value="0" checked>
                        <label for="inappropriateFlgOff">OFF</label>
                        <input class="form-check-input" type="radio" name="inappropriate_flg" id="inappropriateFlgOn"
                            value="1">
                        <label for="inappropriateFlgOn">ON</label>
                    @endif
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">アップデート</button>
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
