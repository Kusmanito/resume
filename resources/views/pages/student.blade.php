@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-4">
            <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                ← На главную
            </a>
        </div>
    </div>

    <div class="row">
        <!-- Левая колонка с фото -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="student-photo-wrapper">
                    @if($student->photo)
                        <img src="{{ asset('storage/' . $student->photo) }}" 
                             class="student-photo-img" 
                             alt="{{ $student->full_name }}">
                    @else
                        <div class="student-photo-placeholder">
                            <div class="display-1">👨‍🎓</div>
                            <p class="mt-2">Нет фото</p>
                        </div>
                    @endif
                </div>
                <div class="card-body text-center">
                    <h3 class="card-title">{{ $student->full_name }}</h3>
                    <p class="card-text">
                        <strong>Группа:</strong> {{ $student->group_name }}<br>
                        <strong>Курс:</strong> {{ $student->course }} курс
                    </p>
                </div>
            </div>
        </div>

        <!-- Правая колонка с достижениями -->
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Достижения</h4>
                </div>
                <div class="card-body">
                    <!-- Олимпиады -->
                    @if($student->olympiads->count() > 0)
                        <h5 class="text-primary mb-3">Олимпиады и конкурсы</h5>
                        @foreach($student->olympiads as $olympiad)
                            <div class="achievement-card mb-3">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6 class="mb-1">{{ $olympiad->title }}</h6>
                                        @if($olympiad->description)
                                            <p class="text-muted small mb-2">{{ $olympiad->description }}</p>
                                        @endif
                                        <div class="achievement-meta">
                                            <span class="badge bg-primary">📅 {{ $olympiad->date->format('d.m.Y') }}</span>
                                            @if($olympiad->result)
                                                <span class="badge bg-success">🏅 {{ $olympiad->result }}</span>
                                            @endif
                                            @if($olympiad->level)
                                                <span class="badge bg-info">{{ $olympiad->level }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @if($olympiad->files->count() > 0)
                                    <div class="mt-2">
                                        <small class="text-muted">📎 Файлы:</small>
                                        <div class="row mt-1">
                                            @foreach($olympiad->files as $file)
                                                <div class="col-auto">
                                                    <a href="{{ asset('storage/' . $file->file_path) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                                        Смотреть файл
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                            @if(!$loop->last)
                                <hr>
                            @endif
                        @endforeach
                    @endif

                    <!-- Сертификаты -->
                    @if($student->certificates->count() > 0)
                        <h5 class="text-success mt-4 mb-3">Сертификаты и курсы</h5>
                        @foreach($student->certificates as $certificate)
                            <div class="achievement-card mb-3">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6 class="mb-1">{{ $certificate->title }}</h6>
                                        @if($certificate->description)
                                            <p class="text-muted small mb-2">{{ $certificate->description }}</p>
                                        @endif
                                        <div class="achievement-meta">
                                            <span class="badge bg-success">📅 {{ $certificate->date->format('d.m.Y') }}</span>
                                            @if($certificate->result)
                                                <span class="badge bg-info">{{ $certificate->result }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @if($certificate->files->count() > 0)
                                    <div class="mt-2">
                                        <small class="text-muted">📎 Файлы сертификата:</small>
                                        <div class="row mt-1">
                                            @foreach($certificate->files as $file)
                                                <div class="col-auto">
                                                    <a href="{{ asset('storage/' . $file->file_path) }}" target="_blank" class="btn btn-sm btn-outline-success">
                                                        Смотреть сертификат
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                            @if(!$loop->last)
                                <hr>
                            @endif
                        @endforeach
                    @endif

                    @if($student->olympiads->count() == 0 && $student->certificates->count() == 0)
                        <div class="alert alert-info text-center mb-0">
                            У студента пока нет достижений
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Стили для фото студента */
    h6 {
        color: #3B3A3D;
    }
    
    .card-header .bg-primary {
        background: #8B7AA8;
    }
    .card-title {
        color: #3B3A3D;
    }

    p {
        color: #3B3A3D;
    }
    .student-photo-wrapper {
        background: #6e6c78;
        padding: 20px;
        text-align: center;
    }
    
    .student-photo-img {
        width: 100%;
        max-width: 250px;
        height: 250px;
        object-fit: cover;
        border-radius: 50%;
        border: 5px solid white;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        margin: 0 auto;
        display: block;
    }
    
    .student-photo-placeholder {
        width: 250px;
        height: 250px;
        border-radius: 50%;
        background: rgba(255,255,255,0.2);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        color: white;
    }
    
    .student-photo-placeholder .display-1 {
        font-size: 4rem;
        margin: 0;
    }
    
    /* Стили для карточек достижений */
    .achievement-card {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 10px;
        transition: all 0.3s ease;
    }
    
    .achievement-card:hover {
        background: #e9ecef;
        transform: translateX(5px);
    }
    
    .achievement-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-top: 8px;
    }
    
    /* Адаптивность для мобильных */
    @media (max-width: 768px) {
        .student-photo-img {
            width: 180px;
            height: 180px;
        }
        
        .student-photo-placeholder {
            width: 180px;
            height: 180px;
        }
        
        .student-photo-placeholder .display-1 {
            font-size: 3rem;
        }
    }
</style>
@endsection