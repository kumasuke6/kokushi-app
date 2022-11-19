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
                    <h2>{{ $subjects[0]->name }}</h2>
                    <form action="{{ url('questions/exam') }}" method="get">
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="harf-am" name="harfDivs[]"
                                    value="1" checked>
                                <label class="form-check-label" for="harf-am">午前問題すべて</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="harf-pm" name="harfDivs[]"
                                    value="2" checked>
                                <label class="form-check-label" for="harf-pm">午後問題すべて</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="random" name="random"
                                    value="1">
                                <label class="form-check-label" for="random">出題順をランダムにする</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="q-number" name="examNumber"
                                    value="2" checked>
                                <label class="form-check-label" for="examNumber">2問ずつ出題</label>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="d-flex flex-column">
                                @foreach ($subjects as $subject)
                                    @if ($subject->harf_div === 1)
                                        <label class="my-1 me-1 px-1 border rounded">
                                            <input class="form-check-input me-1 q-item" type="checkbox" name="ids[]"
                                                value="{{ $subject->id }}">
                                            第{{ $subject->number }}回（{{ $subject->year }}年）午前
                                        </label>
                                    @endif
                                @endforeach
                            </div>
                            <div class="d-flex flex-column">
                                @foreach ($subjects as $subject)
                                    @if ($subject->harf_div === 2)
                                        <label class="my-1 me-1 px-1 border rounded">
                                            <input class="form-check-input me-1 q-item" type="checkbox" name="ids[]"
                                                value="{{ $subject->id }}">
                                            第{{ $subject->number }}回（{{ $subject->year }}年）午後
                                        </label>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <p class="pt-3">
                            <input class="btn btn-primary submit" type="submit" onclick="return isCheck()" value="スタート">
                        </p>
                    </form>
                </div>
                <div class="col-lg-4 pt-3">
                    <h2>Navか広告</h2>
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
    </script>
@endsection
@include('layouts.footer')
