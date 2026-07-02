@extends('layouts.app')

@section('content')
<section class="page">
    <div class="container">
        <span class="badge">👤 Личный кабинет</span>

        <h1 class="page-title">Здравствуйте, {{ auth()->user()->name }}</h1>

        <p class="page-subtitle">
            Это ваш личный кабинет. Здесь можно быстро перейти к основным разделам сайта.
        </p>

        <div class="stats">
            <div class="stat-card">
                <strong>{{ $studentsCount }}</strong>
                <span>Студентов</span>
            </div>

            <div class="stat-card">
                <strong>{{ $achievementsCount }}</strong>
                <span>Достижений</span>
            </div>

            <div class="stat-card">
                <strong>{{ $certificatesCount }}</strong>
                <span>Сертификатов</span>
            </div>
        </div>

        <div class="section-head">
            <div>
                <h2>Доступные разделы</h2>
                <p class="meta">Выберите раздел, который хотите открыть</p>
            </div>
        </div>

        <div class="admin-grid">
            <div class="admin-panel-card">
                <span class="pill">Олимпиады</span>

                <h3>Олимпиады и конкурсы</h3>

                <p class="meta">
                    Просмотр олимпиад, конкурсов и достижений студентов.
                </p>

                <a class="btn btn-primary" href="{{ route('olympiads') }}">
                    Открыть олимпиады
                </a>
            </div>

            <div class="admin-panel-card">
                <span class="pill pill-green">Сертификаты</span>

                <h3>Сертификаты</h3>

                <p class="meta">
                    Просмотр сертификатов, дипломов и документов студентов.
                </p>

                <a class="btn btn-primary" href="{{ route('certificates') }}">
                    Открыть сертификаты
                </a>
            </div>

            @if(auth()->user()->isAdmin())
                <div class="admin-panel-card">
                    <span class="pill">Администратор</span>

                    <h3>Админ-панель</h3>

                    <p class="meta">
                        Управление студентами, достижениями и пользователями.
                    </p>

                    <a class="btn btn-primary" href="{{ route('admin.dashboard') }}">
                        Перейти в админку
                    </a>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection