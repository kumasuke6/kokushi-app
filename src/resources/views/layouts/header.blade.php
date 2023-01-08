@section('header')
    <header class="sticky-top">
        <div class="navbar navbar-expand-md navbar-dark bg-dark">
            <div id="header-container" class="container">
                <a class="navbar-brand" href="{{ url('/') }}">セラピスト国試エキスパート</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#Navbar"
                    aria-controls="Navbar" aria-expanded="false" aria-label="ナビゲーションの切替">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="Navbar">
                    <ul class="navbar-nav align-items-md-center">
                        @if (Route::has('login'))
                            @auth
                                <li class="nav-item">
                                    <form action="{{ route('logout') }}" method="post" class="mb-0">
                                        @csrf
                                        <input type="submit" value="ログアウト" class="nav-link bg-dark border-0">
                                    </form>
                                </li>
                                <li class="nav-item">
                                    <form action="{{ route('myAccount') }}" method="get" class="mb-0">
                                        @csrf
                                        <input type="submit" value="マイページ" class="nav-link bg-dark border-0">
                                    </form>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="nav-link">ログイン</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="nav-link">新規登録</a>
                                </li>
                            @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </header>
@endsection
