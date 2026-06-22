@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Hero секция -->
    <div class="text-center py-5 mb-4">
        <h1 class="display-4 fw-bold text-primary">Достижения студентов</h1>
        <p class="lead">Олимпиады, конкурсы, сертификаты и профессиональные успехи</p>
        <hr class="w-25 mx-auto">
    </div>

    <!-- Статистика -->
    <div class="row mb-5">
        <div class="col-md-4">
            <div class="card text-center bg-gradient-primary text-white border-0 shadow-lg">
                <div class="card-body py-4">
                    <div class="display-1">🏆</div>
                    <h2 class="display-4 fw-bold">{{ $olympiadsCount }}</h2>
                    <h5 class="mb-0">Олимпиад и конкурсов</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center bg-gradient-success text-white border-0 shadow-lg">
                <div class="card-body py-4">
                    <div class="display-1">📜</div>
                    <h2 class="display-4 fw-bold">{{ $certificatesCount }}</h2>
                    <h5 class="mb-0">Сертификатов</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center bg-gradient-info text-white border-0 shadow-lg">
                <div class="card-body py-4">
                    <div class="display-1">👨‍🎓</div>
                    <h2 class="display-4 fw-bold">{{ $studentsCount }}</h2>
                    <h5 class="mb-0">Студентов</h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Последние достижения -->
    <div class="mt-5">
        <h3 class="mb-4">📌 Последние достижения</h3>
        <div class="row">
            @forelse($latestAchievements as $achievement)
                <div class="col-md-6 mb-3">
                    <a href="{{ route('student.show', $achievement->student) }}" class="text-decoration-none">
                        <div class="card shadow-sm hover-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h5 class="card-title text-dark">{{ $achievement->title }}</h5>
                                        <p class="card-text text-muted">
                                            {{ $achievement->student->full_name }} · {{ $achievement->student->group_name }}
                                        </p>
                                    </div>
                                    <span class="badge {{ $achievement->type == 'olympiad' ? 'bg-primary' : 'bg-success' }} fs-6">
                                        {{ $achievement->type == 'olympiad' ? 'Олимпиада' : 'Сертификат' }}
                                    </span>
                                </div>
                                <div class="mt-2">
                                    <small class="text-muted">📅 {{ $achievement->date->format('d.m.Y') }}</small>
                                    @if($achievement->result)
                                        <small class="text-muted ms-3">🏅 {{ $achievement->result }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">Пока нет достижений. Добавьте их через админку.</div>
                </div>
            @endforelse
        </div>
    </div>
</div>

<style>
    .bg-gradient-primary {
        background: #6E6C78;
    }
    .bg-gradient-success {
        background: #7AA899;
    }
    .bg-gradient-info {
        background: #8B7AA8;
    }   
    hr {
        color: #f0f0f0;
    }
</style>
@endsection