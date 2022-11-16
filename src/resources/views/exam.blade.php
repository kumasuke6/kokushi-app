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
                    <div>
                        <p>第{{ $questions[0]->number }}回{{ $questions[0]->name }}　問題{{ $questions[0]->question_number }}</p>
                    </div>
                    <h3>問題</h3>
                    <p>{{ $questions[0]->caption }}</p>
                    <h4>選択肢</h4>
                    @foreach ($randomChoices as $key => $value)
                        <div class="form-check rounded" >
                            <input type="checkbox" name="choice" class="form-check-input" id="{{ $key }}"
                                value="{{ $key }}">
                            <label for="{{ $key }}" class="form-check-label">{{ $value }}</label>
                        </div>
                    @endforeach
                    <div class="d-flex">
                        <p id="answer-btn" class="pt-3">
                            <a class="btn btn-primary" onclick="checkChoice()" role="button">正解を確認</a>
                        </p>
                        <div id="next-btn" class="pt-3 d-none">
                            @if( $questions->currentPage()  === $questions->lastPage() )
                                <form id="end-exam" action="{{ url('questions/end_exam') }}" method="get">
                                    <input form="end-exam" type="hidden" name="page_count" value="{{$questions->lastPage()}}">
                                    <input class="btn btn-secondary" form="end-exam" type="submit" value="終わり">
                                </form>
                            @else
                                <a class="btn btn-secondary" href="{{ $questions->appends(request()->query())->appends(['seed' => $seed])->nextPageUrl() }}" role="button">次の問題へ</a>
                            @endif
                        </div>
                    </div>
                    <div id="explan" class="d-none">
                        <h4 id="answer"></h4>
                        <p>{{ $questions[0]->explan }}</p>
                    </div>
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
        let answers = {{ Js::from($aryAnswers) }};
        console.log(answers);

        function checkChoice() {
            // 表示の変更
            document.getElementById('answer-btn').classList.add('d-none')
            document.getElementById('next-btn').classList.remove('d-none')
            document.getElementById("explan").classList.remove("d-none")

            var answers = {{ Js::from($aryAnswers) }};
            var aryChoices = []
            var choices = document.getElementsByName('choice')

            for (let i = 0; i < choices.length; i++) {
                if (choices[i].checked) {
                    aryChoices.push(choices[i].value)
                }
            }

            if (array_equal(answers, aryChoices)) {
                document.getElementById('answer').innerText = '正解';
                for (let i = 0; i < answers.length; i++) {
                    document.getElementById(answers[i]).parentNode.classList.add('correct-answer')
                }
            } else {
                document.getElementById('answer').innerText = '不正解';
                for (let i = 0; i < answers.length; i++) {
                    document.getElementById(answers[i]).parentNode.classList.add('correct-answer')
                }
            }
        }


        function array_equal(a, b) {
            if (!Array.isArray(a)) return false;
            if (!Array.isArray(b)) return false;
            if (a.length != b.length) return false;
            for (var i = 0, n = a.length; i < n; ++i) {
                if (!b.includes(a[i])) return false;
            }
            return true;
        }
    </script>
@endsection
@include('layouts.footer')
