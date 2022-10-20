@section('header')
<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">過去問勉強帳</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#Navbar" aria-controls="Navbar" aria-expanded="false" aria-label="ナビゲーションの切替">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="Navbar">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="#">ホーム</a>
            </li>
            <li class="nav-item">
            @if (Route::has('login'))
              @auth
              <form action="{{ route('logout') }}" method="post" class="nav-link">
                @csrf
                <input type="submit" value="ログアウト">
              </form>
              @else
                <div class="d-flex">
                  <a href="{{ route('login') }}" class="nav-link">ログイン</a>
                  @if (Route::has('register'))
                      <a href="{{ route('register') }}" class="nav-link">新規登録</a>
                  @endif
                </div>
              @endauth
            @endif
            </li>
          </ul>
        </div>
      </div>
    </nav>
</header>
@endsection