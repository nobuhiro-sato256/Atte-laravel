@extends('layouts.app')

@section('content')

<div class="register">
    <div class="register__screen">
        <div class="register__screen-title">
            <h2>会員登録</h2>
        </div>
        <div class="register__screen-form">
            <form class="register__form" action="/register" method="post">
                @csrf
                <div class="register__input">
                    <input type="text" name="name" placeholder="名前"/>
                    <input type="email" name="email" placeholder="メールアドレス"/>
                    <input type="password" name="password" placeholder="パスワード"/>
                    <input type="password" name="password_confirmation" placeholder="確認用パスワード"/>
                    <input type="submit" value="会員登録"/>
                </div>
            </form>
        </div>
        <div class="register__screen-register">
            <p>アカウントをお持ちの方はこちらから</p>
            <a href="/">ログイン</a>
        </div>
    </div>
</div>

@endsection