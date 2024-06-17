@extends('layouts.app')

@section('content')
<div class="login">
    <div class="login__screen">
        <div class="login__screen-title">
            <h2>ログイン</h2>
        </div>
        <div class="login__screen-form">
            <form class="login__form" action="/login" method="post">
                @csrf
                <div class="login__input">
                    <input type="email" name="email" value=" {{old('email')}}" placeholder="メールアドレス"/>
                    @error('email')
                    <p>{{$message}}</p>
                    @enderror
                    <input type="password" name="password" placeholder="パスワード"/>
                    @error('password')
                    <p>{{$message}}</p>
                    @enderror
                    <input type="submit" value="ログイン"/>
                </div>
            </form>
        </div>
        <div class="login__screen-register">
            <p>アカウントをお持ちでない方はこちらから</p>
            <a href="/register">会員登録</a>
        </div>
    </div>
</div>

@endsection

