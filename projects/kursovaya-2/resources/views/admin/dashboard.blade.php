@extends('layouts.app')

@section('content')
<section class="page">
    <div class="container">
        <span class="badge">⚙️ Админ-панель</span>

        <h1 class="page-title">Админка</h1>

        <p class="page-subtitle">
            Здесь собраны все функции администратора: студенты, олимпиады, сертификаты и управление правами.
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
                <strong>{{ $usersCount }}</strong>
                <span>Пользователей</span>
            </div>
        </div>

        <div class="section-head">
            <div>
                <h2>Управление сайтом</h2>
                <p class="meta">Все функции администратора в одном месте</p>
            </div>
        </div>

        <div class="admin-grid">
            <div class="admin-panel-card">
                <span class="pill">Студенты</span>

                <h3>Управление студентами</h3>

                <p class="meta">
                    Добавление, редактирование и удаление студентов.
                </p>

                <div class="admin-actions">
                    <a class="btn btn-primary" href="{{ route('admin.students.create') }}">
                        + Добавить студента
                    </a>

                    <a class="btn btn-light" href="{{ route('admin.students.index') }}">
                        Список студентов
                    </a>
                </div>
            </div>

            <div class="admin-panel-card">
                <span class="pill pill-green">Достижения</span>

                <h3>Олимпиады и сертификаты</h3>

                <p class="meta">
                    Добавление сертификатов, олимпиад, описаний и изображений.
                </p>

                <div class="admin-actions">
                    <a class="btn btn-primary" href="{{ route('admin.achievements.create') }}">
                        + Добавить достижение
                    </a>

                    <a class="btn btn-light" href="{{ route('admin.achievements.index') }}">
                        Список достижений
                    </a>
                </div>
            </div>

            @if(auth()->user()->isSuperAdmin())
                <div class="admin-panel-card">
                    <span class="pill pill-green">Super Admin</span>

                    <h3>Пользователи и права</h3>

                    <p class="meta">
                        Выдача и снятие прав администратора.
                    </p>

                    <div class="admin-actions">
                        <a class="btn btn-primary" href="{{ route('admin.users.index') }}">
                            Управлять пользователями
                        </a>
                    </div>
                </div>
            @endif
        </div>

        <div class="section-head">
            <div>
                <h2>Последние достижения</h2>
                <p class="meta">Недавно добавленные записи</p>
            </div>
        </div>

        <div class="timeline">
            @forelse($latestAchievements as $achievement)
                <div class="timeline-item">
                    <span class="pill {{ $achievement->type === 'certificate' ? 'pill-green' : '' }}">
                        {{ $achievement->type === 'certificate' ? 'Сертификат' : 'Олимпиада' }}
                    </span>

                    <h3>{{ $achievement->title }}</h3>

                    <p class="meta">
                        👤 {{ $achievement->student->full_name ?? 'Студент не указан' }}
                        · 📅 {{ $achievement->date->format('d.m.Y') }}
                    </p>
                </div>
            @empty
                <div class="empty">
                    Пока нет достижений.
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection