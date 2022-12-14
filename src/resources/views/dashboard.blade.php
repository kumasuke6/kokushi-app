@extends('layouts.common')
@section('pageCss')
    <link href="/css/dashboad.css" rel="stylesheet">
@endsection
@include('layouts.head')
@include('layouts.header')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link border-0 bg-light active" id="create-exam-tab"
                                data-bs-toggle="tab" data-bs-target="#create-exam-tab-pane" role="tab"
                                aria-controls="create-exam-tab-pane" aria-selected="false">試験登録</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button type="button" class="nav-link border-0 bg-light" id="create-q-tab" data-bs-toggle="tab"
                                data-bs-target="#create-q-tab-pane" role="tab" aria-controls="create-q-tab-pane"
                                aria-selected="false">問題登録</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <div class="dropdown">
                                <button class="nav-link border-0 bg-light dropdown-toggle" type="button" id="list-q-tab"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    問題一覧
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="list-q-tab">
                                    @foreach ($subjects as $subject)
                                        <li>
                                            <form action="{{ url('dashboard/questionList') }}" method="get">
                                                <input type="hidden" name="id" value="{{ $subject->id }}">
                                                <button type="submit"
                                                    class="dropdown-item">第{{ $subject->number }}回{{ $subject->name }}</button>
                                            </form>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="{{ url('dashboard/users') }}" class="nav-link border-0 bg-light"
                                id="users-tab">ユーザー一覧</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active" id="create-exam-tab-pane" role="tabpanel" aria-labelledby="create-exam-tab"
                        tabindex="0">
                        <h1>試験登録</h1>
                        <form action="{{ url('dashboard/createSubject') }}" method="post">
                            @csrf
                            <p class="h5">試験種別</p>
                            <div class="d-flex mb-3">
                                <div class="form-group me-2">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="type" value="0">
                                        理学療法士国家試験
                                    </label>
                                </div>
                                <div class="form-group me-2">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="type" value="1">
                                        理学療法士オリジナル
                                    </label>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="mb-3 me-2">
                                    <label for="year" class="form-label h5">年度</label>
                                    <input type="number" name="year" class="form-control" id="year" min="2010"
                                        max="2050">
                                </div>
                                <div class="mb-3 me-2">
                                    <label for="number" class="form-label h5">実施回</label>
                                    <input type="number" name="number" class="form-control" id="number" min="50"
                                        max="100">
                                </div>
                            </div>
                            <p class="h5">共通・専門区分</p>
                            <div class="d-flex mb-3">
                                <div class="form-group me-2">
                                    <input class="form-check-input" type="radio" name="harf_div" id="common"
                                        value="1" checked>
                                    <label class="form-check-label" for="common">
                                        共通
                                    </label>
                                </div>
                                <div class="form-group me-2">
                                    <input class="form-check-input" type="radio" name="harf_div" id="specialty"
                                        value="2">
                                    <label class="form-check-label" for="specialty">
                                        専門
                                    </label>
                                </div>
                                <div class="form-group me-2">
                                    <input class="form-check-input" type="radio" name="harf_div" id="none"
                                        value="0">
                                    <label class="form-check-label" for="none">
                                        なし
                                    </label>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">作成</button>
                            </div>
                        </form>
                        <h2>試験一覧</h2>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>試験名</th>
                                    <th>試験年度</th>
                                    <th>試験実施回</th>
                                    <th>共通・専門</th>
                                    <th>削除</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subjects as $subject)
                                    <tr>
                                        <th>{{ $subject->name }}</th>
                                        <th>{{ $subject->year }}年</th>
                                        <th>{{ $subject->number }}回</th>
                                        <th>
                                            @if ($subject->harf_div == '1')
                                                共通
                                            @elseif ($subject->harf_div == '2')
                                                専門
                                            @else
                                                なし
                                            @endif
                                        </th>
                                        <th>
                                            <form action="{{ url('dashboard/deleteSubject') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $subject->id }}">
                                                <button type="submit" class="btn btn-danger">削除</button>
                                            </form>
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="create-q-tab-pane" role="tabpanel" aria-labelledby="create-q-tab"
                        tabindex="0">
                        <h1>問題登録</h1>
                        <form action="{{ url('dashboard/createQuestion') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="examName" class="form-label h5">試験選択</label>
                                <select class="form-select" name="subject_id" id="inputGroupSelect01">
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}">
                                            第{{ $subject->number }}回{{ $subject->name }}
                                            @if ($subject->harf_div == '1')
                                                共通
                                            @elseif ($subject->harf_div == '2')
                                                専門
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
                                    <input type="number" name="number" class="form-control" id="number"
                                        min="1" max="100">
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
                                <input class="form-control" type="file" name="caption_img">
                            </div>
                            <div class="mb-3">
                                <div>
                                    <h2 class="h5">選択肢</h2>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="choice1">（1）</span>
                                        <input name="choice1" type="text" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <input class="form-control" type="file" name="choice_img1">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="choice2">（2）</span>
                                        <input name="choice2" type="text" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <input class="form-control" type="file" name="choice_img2">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="choice3">（3）</span>
                                        <input name="choice3" type="text" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <input class="form-control" type="file" name="choice_img3">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="choice4">（4）</span>
                                        <input name="choice4" type="text" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <input class="form-control" type="file" name="choice_img4">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="choice5">（5）</span>
                                        <input name="choice5" type="text" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <input class="form-control" type="file" name="choice_img5">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="explan" class="form-label h5">解説</label>
                                <textarea name="explan" class="form-control" id="explan"></textarea>
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="file" name="explan_img">
                            </div>
                            <div class="mb-3">
                                <p class="form-label h5">不適切フラグ</p>
                                <input class="form-check-input" type="radio" name="inappropriate_flg"
                                    id="inappropriateFlgOff" value="0" checked>
                                <label for="inappropriateFlgOff">OFF</label>
                                <input class="form-check-input" type="radio" name="inappropriate_flg"
                                    id="inappropriateFlgOn" value="1">
                                <label for="inappropriateFlgOn">ON</label>
                            </div>
                            <button type="submit" class="btn btn-primary">作成</button>
                        </form>
                    </div>
                    <div class="tab-pane" id="users-tab-pane" role="tabpanel" aria-labelledby="users-tab-pane"
                        tabindex="0">
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
                    </div>
                </div>
            </main>
        </div>
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
