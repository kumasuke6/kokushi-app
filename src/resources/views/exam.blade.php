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
                <div id="exam-page" class="col-lg-8 pt-3">
                    <div>
                        {{-- TODO: numberがおかしい --}}
                        <p>第{{ $questions[0]->subject_number }}回{{ $questions[0]->name }}　問題{{ $questions[0]->question_number }}
                        </p>
                    </div>
                    <h3>問題</h3>
                    <p>{{ $questions[0]->caption }}</p>
                    @if (!is_null($questions[0]->caption_img))
                        <img class="exam-image" src={{ url('/storage/test_img', $questions[0]->caption_img) }}>
                    @endif
                    <h4>選択肢</h4>
                    @foreach ($randomChoices as $key => $randomChoice)
                        <div class="form-check rounded">
                            <input type="checkbox" name="choice" class="form-check-input" id="{{ $key }}"
                                value="{{ $key }}">
                            <label for="{{ $key }}" class="form-check-label">
                                <p class="mb-0">{{ $randomChoice['text'] }}</p>
                                @if (!is_null($randomChoice['img']))
                                    <img class="q-image" src={{ url('/storage/test_img', $randomChoice['img']) }}>
                                @endif
                            </label>
                        </div>
                    @endforeach
                    <div class="d-flex">
                        <p id="answer-btn" class="pt-3">
                            <a class="btn btn-primary" onclick="checkChoice()" role="button">正解を確認</a>
                        </p>
                        <div id="next-btn" class="pt-3 d-none">
                            @if ($questions->currentPage() === $questions->lastPage())
                                <a class="btn btn-secondary" onclick="finishQuestion()" role="button">終わり</a>
                            @else
                                <a class="btn btn-secondary"
                                    href="{{ $questions->appends(request()->query())->appends(['seed' => $seed])->nextPageUrl() }}"
                                    role="button">次の問題へ</a>
                            @endif
                        </div>
                    </div>
                    <div id="explan" class="d-none">
                        <h4 id="answer"></h4>
                        <p>{{ $questions[0]->explan }}</p>
                        @if (!is_null($questions[0]->explan_img))
                            <img class="explan-image" src={{ url('/storage/test_img', $questions[0]->explan_img) }}>
                        @endif
                    </div>
                </div>
                <div id="finish-page" class="col-lg-8 pt-3 d-none">
                    <div class="d-flex flex-column">
                        <p id="finish-comment">{{ $questions->currentpage() - 1 }}問終了しました。お疲れさまでした。</p>
                        <a id="next-q-link" class="btn btn-primary" onclick="nxetQuestion()" role="button">次の問題へ</a>
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
@section('pageJs')
    <script>
        const examNumber = {{ Js::from($examNumber) }};
        const currentPage = {{ Js::from($questions->currentPage()) }};
        const examPage = document.getElementById('exam-page');
        const finishPage = document.getElementById('finish-page');

        window.onload = function() {
            let finishQNumber = currentPage % examNumber
            if (finishQNumber == 1 && currentPage != 1) {
                examPage.classList.add('d-none')
                finishPage.classList.remove('d-none')
            }
        }

        function nxetQuestion() {
            finishPage.classList.add('d-none')
            examPage.classList.remove('d-none')
        }

        const nextQLink = document.getElementById('next-q-link');
        const finishComment = document.getElementById('finish-comment');

        function finishQuestion() {
            examPage.classList.add('d-none')
            nextQLink.classList.add('d-none')
            finishPage.classList.remove('d-none')
            finishComment.innerText = currentPage + "問終了しました。お疲れさまでした";
        }

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
