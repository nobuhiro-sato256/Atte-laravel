<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Atte login</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/">
                Atte
            </a>
        </div>
        @if (Auth::check())
        <div class="header__link">
            <nav class="header__link-nav">
                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item border-0"><a class="header__link-button " href="/">ホーム</a></li>
                    <li class="list-group-item border-0"><a class="header__link-button" href="{{ route('attendance') }}">日付一覧</a></li>
                    <form class="header__form" action="/logout" method="post">
                    @csrf
                    <li class="list-group-item border-0"><input type="submit" class="" >ログアウト</input></li>
                    </form>
                </ul>
            </nav>
        </div>
        @endif
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <small class="footer__small">
            Atte,inc.
        </small>
    </footer>
</body>