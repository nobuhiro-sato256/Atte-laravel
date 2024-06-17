@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}" />
@endsection

@section('content')

<div class="register">
    <div class="register__screen">
        <div class="register__screen-title">
            <h2 class="register__screen-heading">会員登録</h2>
        </div>
        <div class="register__screen-form">
            <form class="register__form" action="/register" method="post">
                @csrf
                <div class="register__input">
                    <div class="register__input-form">
                        <input class="register__input-item" type="text" name="name" value="{{old('name')}}" placeholder="名前"/>
                    </div>
                    @error('name')
                    <p>{{ $errors->first('name') }}</p>
                    @enderror
                    <div class="register__input-form">
                        <input class="register__input-item" type="email" name="email" value="{{old('email')}}" placeholder="メールアドレス"/>
                    </div>
                    @error('email')
                    <p>{{ $errors->first('email') }}</p>
                    @enderror
                    <div class="register__input-form">
                        <input class="register__input-item" type="password" name="password" placeholder="パスワード"/>
                    </div>
                    @error('password')
                    <p>{{ $errors->first('password') }}</p>
                    @enderror
                    <div class="register__input-form">
                        <input class="register__input-item" type="password" name="password_confirmation" placeholder="確認用パスワード"/>
                    </div>
                    @error('password_confirmation')
                    <p>{{ $errors->first('password_confirmation') }}</p>
                    @enderror
                    <div class="register__input-bottan">
                        <input class="register__input-member" type="submit" value="会員登録"/>
                    </div>
                </div>
            </form>
        </div>
        <div class="register__screen-register">
            <p class="register__screen-paragraph">アカウントをお持ちの方はこちらから</p>
            <a class="register__screen-anchor" href="/">ログイン</a>
        </div>
    </div>
</div>

@endsection