@extends('layouts.app')

@section('content')
<section class="hero">
    <div class="container hero-grid">
        <div>
            <span class="badge">⭐ Достижения наших студентов</span>
            <h1>Сертификаты и олимпиады</h1>
            <p>
                Удобная галерея достижений техникума: олимпиады, конкурсы,
                сертификаты, дипломы и награды студентов.
            </p>

            <div class="hero-actions">
                <a href="{{ route('olympiads') }}" class="btn btn-primary">🏆 Смотреть олимпиады</a>
                <a href="{{ route('certificates') }}" class="btn btn-light">📄 Смотреть сертификаты</a>
            </div>
        </div>

        <div class="hero-preview">
            <div class="preview-card">🏆</div>
            <div class="preview-card">📜</div>
            <div class="preview-card">🎖️</div>
        </div>
    </div>
</section>

<section class="container">
    <div class="stats">
        <div class="stat-card">
            <strong>{{ $olympiadsCount }}</strong>
            <span>Олимпиад и конкурсов</span>
        </div>

        <div class="stat-card">
            <strong>{{ $certificatesCount }}</strong>
            <span>Сертификатов</span>
        </div>

        <div class="stat-card">
            <strong>{{ $studentsCount }}</strong>
            <span>Студентов</span>
        </div>
    </div>

    <div class="section-head">
        <div>
            <h2>Последние достижения</h2>
            <p class="meta">Новые записи, добавленные в галерею</p>
        </div>
    </div>

    <div class="grid">
        @forelse($latestAchievements as $achievement)
            <article class="card">
                <div class="card-body">
                    <span class="pill {{ $achievement->type === 'certificate' ? 'pill-green' : '' }}">
                        {{ $achievement->type == 'olympiad' ? 'Олимпиада' : 'Сертификат' }}
                    </span>

                    <h3 class="card-title">{{ $achievement->title }}</h3>

                    <p class="meta">
                        👤 {{ $achievement->student->full_name }}<br>
                        🎓 {{ $achievement->student->group_name }}<br>
                        📅 {{ $achievement->date->format('d.m.Y') }}
                    </p>

                    @if($achievement->result)
                        <p><strong>{{ $achievement->result }}</strong></p>
                    @endif

                    <a class="btn btn-light" href="{{ route('student.show', $achievement->student) }}">
                        Открыть профиль →
                    </a>
                </div>
            </article>
        @empty
            <div class="empty">Пока нет достижений. Добавьте их через админку.</div>
        @endforelse
    </div>
</section>
@endsection