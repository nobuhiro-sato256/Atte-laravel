<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Atte login</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
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
                <ul>
                    <li><a class="heder__link-button" href="/">ホーム</a></li>
                    <li><button type=“button” onclick="location.href='{{ route('attendance') }}'">日付一覧</button></li>
                    <form class="header__form" action="/logout" method="post">
                    @csrf
                    <li><button class="heder__link-button">ログアウト</button></li>
                    </form>
                </ul>
            </nav>
        </div>
        @endif
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <small>
            Atte,inc.
        </small>
    </footer>
</body>