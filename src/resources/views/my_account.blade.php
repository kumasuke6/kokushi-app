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
                <button class="btn active" id="pills-review-tab" data-bs-toggle="pill" data-bs-target="#pills-review"
                    type="button" role="tab" aria-controls="pills-review" aria-selected="true">
                    見直しチェックリスト
                </button>
            </li>
            <li class="nav-item me-2" role="presentation">
                <button class="btn" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button"
                    role="tab" aria-controls="pills-home" aria-selected="false">
                    登録情報
                </button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                <div class="mb-3">
                    <a href="{{ url('questions/examRetryAll') }}" class="btn btn-primary">全ての問題をやり直す</a>
                </div>
                <table class="table table-bordered">
                    <tbody>
                        @foreach ($questions as $question)
                            <tr>
                                <th class="text-center">第{{ $question->subject_number }}回
                                    問{{ $question->question_number }}</th>
                                <th>{{ $question->caption }}</th>
                                <th class="text-center p-1">
                                    <form action="{{ url('questions/examRetry') }}" method="get" class="mb-0">
                                        <input type="hidden" name="id" class="form-check-input"
                                            value="{{ $question->id }}">
                                        <button type="submit" class="btn btn-primary p-1">リトライ</button>
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <p>ユーザー名 : {{ $user->name }}</p>
                <p>email : {{ $user->email }}</p>
                @if ($user->type === 0)
                    <p>会員タイプ : 無料会員</p>
                @elseif ($user->type === 1)
                    <p>会員タイプ : 有料会員</p>
                @elseif($user->type === 2)
                    <p>会員タイプ : Editor</p>
                @elseif($user->type === 3)
                    <p>会員タイプ : Admin</p>
                @endif
            </div>
        </div>
    </main>
@endsection
@include('layouts.footer')
