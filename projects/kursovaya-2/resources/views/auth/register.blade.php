@extends('layouts.app')

@section('content')
<section class="page">
    <div class="container">
        <div class="auth-card">
            <span class="badge">📝 Регистрация</span>
            <h1 class="page-title">Создать аккаунт</h1>
            <p class="page-subtitle">После регистрации вы попадёте в личный кабинет пользователя.</p>

            @if($errors->any())
                <div class="alert-error">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label for="name">Имя</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                </div>

                <div class="form-group">
                    <label for="email">Почта</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input id="password" type="password" name="password" required>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Повторите пароль</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required>
                </div>

                <button class="btn btn-primary" type="submit">Зарегистрироваться</button>
                <a class="btn btn-light" href="{{ route('login') }}">Уже есть аккаунт</a>
            </form>
        </div>
    </div>
</section>
@endsection