<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Техникум') }} — Сертификаты и олимпиады</title>

<style>
    {!! file_get_contents(public_path('css/app.css')) !!}
</style>
</head>
<body>
<header class="site-header">
    <div class="container header-inner">
        <a href="{{ route('home') }}" class="logo">
            <span class="logo-icon">🏆</span>
            <span>
                Достижения техникума
                <small>Сертификаты и олимпиады студентов</small>
            </span>
        </a>

        <nav class="nav">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Главная</a>
            <a href="{{ route('olympiads') }}" class="{{ request()->routeIs('olympiads') ? 'active' : '' }}">Олимпиады</a>
            <a href="{{ route('certificates') }}" class="{{ request()->routeIs('certificates') ? 'active' : '' }}">Сертификаты</a>

            @auth
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    Личный кабинет
                </a>

                @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.*') ? 'active' : '' }}">
                        Админка
                    </a>
                @endif

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Выйти</button>
                </form>
            @else
                <a href="{{ route('login') }}">Войти</a>
                <a class="btn btn-primary" href="{{ route('register') }}">Регистрация</a>
            @endauth
        </nav>
    </div>
</header>

<main>
    @yield('content')
</main>

<footer class="footer">
    <div class="container">
        © {{ date('Y') }} Техникум. Галерея сертификатов, олимпиад и достижений студентов.
    </div>
</footer>
</body>
</html>