@extends('layouts.common')
@section('pageCss')
    <link href="/css/top.css" rel="stylesheet">
@endsection
@include('layouts.head')
@include('layouts.header')
@section('content')
    <div id="carouselExampleIndicators" class="carousel slide container-xxl top-img mb-3" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/img/top.jpg" class="d-block">
            </div>
            <div class="carousel-item">
                <img src="/img/top2.jpg" class="d-block">
            </div>
            <div class="carousel-item">
                <img src="/img/top3.jpg" class="d-block">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <main>
        <div class="container">
            <div>
                {{-- <h1 class="text-center mb-3">
                    セラピスト国試エキスパートとは
                </h1> --}}
                <p class="text-center h5">
                    本ページは、理学療法士国家試験のオンライン学習サイトです。<br>
                    解説付きの国家試験過去問題集とオリジナル問題集を解いていくことで<br>
                    皆様の学習をサポートしていきます。
                </p>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger mt-1">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="pt-3">
                    <h2 class="text-center">理学療法士過去問題集</h2>
                    <form action="{{ url('questions/exam') }}" method="get">
                        <div class="d-flex flex-column justify-content-center">
                            <div class="mb-2 d-flex justify-content-center">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="harf-am" name="harf_divs[]"
                                        value="1" onclick="return harfDivAllCheck('am')">
                                    <label class="form-check-label" for="harf-am">午前問題すべて</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="harf-pm" name="harf_divs[]"
                                        value="2" onclick="return harfDivAllCheck('pm')">
                                    <label class="form-check-label" for="harf-pm">午後問題すべて</label>
                                </div>
                            </div>
                            <div class="mb-2 d-flex justify-content-center">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="q-random" name="q_random"
                                        value="1">
                                    <label class="form-check-label" for="q-random">出題順をランダムにする</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="choice-random" name="choice_random"
                                        value="1">
                                    <label class="form-check-label" for="choice-random">選択肢をランダムにする</label>
                                </div>
                            </div>
                            <div class="mb-2 d-flex justify-content-center">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="exam-number2" name="exam_number"
                                        value="2" checked>
                                    <label class="form-check-label" for="exam-number2">2問ずつ出題</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="exam-number10" name="exam_number"
                                        value="10">
                                    <label class="form-check-label" for="exam-number10">10問ずつ出題</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="exam-number0" name="exam_number"
                                        value="0">
                                    <label class="form-check-label" for="exam-number0">全問出題</label>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="d-flex flex-column">
                                @foreach ($subjects as $subject)
                                    @if ($subject->harf_div === 1)
                                        <label class="my-1 me-1 px-1 border rounded">
                                            <input class="form-check-input me-1 q-item q-item-am" type="checkbox"
                                                name="subject_ids[]" value="{{ $subject->id }}">
                                            第{{ $subject->number }}回（{{ $subject->year }}年）午前
                                        </label>
                                    @endif
                                @endforeach
                            </div>
                            <div class="d-flex flex-column">
                                @foreach ($subjects as $subject)
                                    @if ($subject->harf_div === 2)
                                        <label class="my-1 me-1 px-1 border rounded">
                                            <input class="form-check-input me-1 q-item q-item-pm" type="checkbox"
                                                name="subject_ids[]" value="{{ $subject->id }}">
                                            第{{ $subject->number }}回（{{ $subject->year }}年）午後
                                        </label>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <p class="pt-3 d-flex justify-content-center">
                            <input class="btn btn-primary submit" type="submit" onclick="return isCheck()"
                                value="スタート">
                        </p>
                    </form>
                </div>

                <div class="col-lg-4 pt-3">
                    {{-- 広告などを入れるスペース --}}
                </div>
            </div>
        </div>
    </main>
@endsection
@section('pageJs')
    <script>
        // 問題がない場合にアラートを出す
        function isCheck() {
            var arr_checkBoxes = document.getElementsByClassName("q-item");
            var count = 0;
            for (var i = 0; i < arr_checkBoxes.length; i++) {
                if (arr_checkBoxes[i].checked) {
                    count++;
                }
            }
            if (count > 0) {
                return true;
            } else {
                alert("問題を1つ以上選択してください。");
                return false;
            }
        }

        function harfDivAllCheck(harf_div) {
            // 午前・午後全て選択の対応をする。
            console.log(harf_div);
            var am = Array.prototype.slice.call(document.getElementsByClassName("q-item-am"));
            var pm = Array.prototype.slice.call(document.getElementsByClassName("q-item-pm"));
            // var amAry = Array.prototype.slice.call(am);
            if (harf_div === "am") {
                for (let i = 0; i < am.length; i += 1) {
                    if (am[i].checked === false) {
                        am[i].checked = true;
                    } else {
                        am[i].checked = false;
                    }
                }
            } else if (harf_div == "pm") {
                for (let i = 0; i < pm.length; i += 1) {
                    if (pm[i].checked === false) {
                        pm[i].checked = true;
                    } else {
                        pm[i].checked = false;
                    }
                }
            }
        }
    </script>
@endsection
@include('layouts.footer')
