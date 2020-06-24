@section('header')

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
    <a href="#" class="navbar-brand">@yield('title')</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <!-- <li class="nav-item active">
            <a class="nav-link" href="#">ホーム<span class="sr-only">(current)</span></a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="/user_info/list">一覧</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/user_info/mypage">マイページ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}">ログアウト</a>
          </li>
          <li class="nav-item">
            <form class="nav-link" href="/user_info/list" method="get">
              @csrf
              <input type="text" name="search">
              <input type="submit" value="検索">
            </form>
          </li>
        </ul>
    </div>
</nav>

@endsection