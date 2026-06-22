@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold">Олимпиады и конкурсы</h1>
        <p class="lead">Достижения наших студентов</p>
    </div>

    <!-- Поиск и фильтры -->
    <div class="card shadow-sm mb-5">
        <div class="card-body">
            <form method="GET" action="{{ route('olympiads') }}" id="filterForm">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Поиск по названию</label>
                        <input type="text" name="search" class="form-control" placeholder="Название олимпиады..." value="{{ request('search') }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Уровень</label>
                        <select name="level" class="form-select">
                            <option value="">Все уровни</option>
                            <option value="районный" {{ request('level') == 'районный' ? 'selected' : '' }}>🏘️ Районный</option>
                            <option value="городской" {{ request('level') == 'городской' ? 'selected' : '' }}>🏙️ Городской</option>
                            <option value="областной" {{ request('level') == 'областной' ? 'selected' : '' }}>🌍 Областной</option>
                            <option value="всероссийский" {{ request('level') == 'всероссийский' ? 'selected' : '' }}>🇷🇺 Всероссийский</option>
                            <option value="международный" {{ request('level') == 'международный' ? 'selected' : '' }}>🌎 Международный</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Год</label>
                        <select name="year" class="form-select">
                            <option value="">Все годы</option>
                            @for($year = date('Y'); $year >= 2020; $year--)
                                <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100">🔍 Найти</button>
                        <a href="{{ route('olympiads') }}" class="btn btn-secondary w-100 ms-2">Сбросить</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Результаты -->
    @if($olympiads->count() > 0)
        <div class="row">
            @foreach($olympiads as $olympiad)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm hover-card">
                        @php
                            $mainFile = $olympiad->files->where('is_main', true)->first() ?? $olympiad->files->first();
                        @endphp
                        
                        @if($mainFile)
                            <img src="{{ asset('storage/' . $mainFile->file_path) }}" 
                                 class="card-img-top" 
                                 alt="{{ $olympiad->title }}"
                                 style="height: 200px; object-fit: cover;">
                        @else
                            <div class="bg-secondary d-flex align-items-center justify-content-center" style="height: 200px;">
                                <span class="text-white">Нет фото</span>
                            </div>
                        @endif
                        
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="card-title mb-0">{{ $olympiad->title }}</h5>
                                @if($olympiad->level)
                                    <span class="badge bg-info">{{ $olympiad->level }}</span>
                                @endif
                            </div>
                            
                            <p class="card-text text-muted small">{{ Str::limit($olympiad->description ?? 'Нет описания', 100) }}</p>
                            
                            <div class="mt-3">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <strong class="text-primary">{{ $olympiad->student->full_name }}</strong>
                                    <span class="text-muted">{{ $olympiad->student->group_name }}</span>
                                </div>
                                
                                @if($olympiad->result)
                                    <div class="alert alert-success py-1 px-2 mb-2">
                                        <small>🏅 {{ $olympiad->result }}</small>
                                    </div>
                                @endif
                                
                                <div class="text-muted small">
                                    📅 {{ $olympiad->date->format('d.m.Y') }}
                                </div>
                            </div>
                        </div>
                        
                        <div class="card-footer bg-transparent">
                            <a href="{{ route('student.show', $olympiad->student) }}" class="btn btn-outline-primary btn-sm w-100">
                                Смотреть профиль студента →
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="mt-4">
            {{ $olympiads->appends(request()->query())->links() }}
        </div>
    @else
        <div class="alert alert-info text-center">
            <h4>😕 Ничего не найдено</h4>
            <p>Попробуйте изменить параметры поиска</p>
        </div>
    @endif
</div>

<style>
    .card-title{
        color: #3B3A3D;
    }
    .card-body {
        color: #3B3A3D;
    }
</style>
@endsection