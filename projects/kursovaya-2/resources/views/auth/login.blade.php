@extends('layouts.app')

@section('content')
<section class="page">
    <div class="container">
        <div class="auth-card">
            <span class="badge">🔐 Вход</span>
            <h1 class="page-title">Войти в аккаунт</h1>
            <p class="page-subtitle">Войдите, чтобы открыть личный кабинет.</p>

            @if($errors->any())
                <div class="alert-error">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Почта</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                </div>

                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input id="password" type="password" name="password" required>
                </div>

                <div class="form-group">
                    <label style="display:flex; gap:8px; align-items:center; font-weight:600;">
                        <input type="checkbox" name="remember" style="width:auto;">
                        Запомнить меня
                    </label>
                </div>

                <button class="btn btn-primary" type="submit">Войти</button>
                <a class="btn btn-light" href="{{ route('register') }}">Регистрация</a>
            </form>
        </div>
    </div>
</section>
@endsection