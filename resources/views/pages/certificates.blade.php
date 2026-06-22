
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold">Сертификаты и курсы</h1>
        <p class="lead">Дополнительное образование студентов</p>
    </div>

    <!-- Поиск -->
    <div class="card shadow-sm mb-5">
        <div class="card-body">
            <form method="GET" action="{{ route('certificates') }}">
                <div class="row g-3">
                    <div class="col-md-9">
                        <input type="text" name="search" class="form-control" placeholder="Поиск по названию..." value="{{ request('search') }}">
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary w-100">🔍 Найти</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if($certificates->count() > 0)
        <div class="row">
            @foreach($certificates as $certificate)
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm h-100">

                        {{-- Изображения сертификатов --}}
                        @if($certificate->files->count() > 0)
                            @foreach($certificate->files as $file)
                                <img
                                    src="{{ asset('storage/' . $file->file_path) }}"
                                    alt="Сертификат"
                                    class="card-img-top"
                                    style="height: 300px; object-fit: cover;"
                                >
                            @endforeach
                        @endif

                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start">
                                <h5 class="card-title">{{ $certificate->title }}</h5>
                                <span class="badge bg-success">Сертификат</span>
                            </div>
                            
                            <p class="card-text text-muted">
                                {{ Str::limit($certificate->description ?? 'Нет описания', 150) }}
                            </p>
                            
                            <div class="mt-3">
                                <div class="row">
                                    <div class="col-6">
                                        <small class="text-muted">👨‍🎓 Студент:</small>
                                        <div>{{ $certificate->student->full_name }}</div>
                                    </div>
                                    <div class="col-6">
                                        <small class="text-muted">📚 Группа:</small>
                                        <div>{{ $certificate->student->group_name }}</div>
                                    </div>
                                </div>

                                <div class="mt-2 text-muted small">
                                    📅 Получен: {{ $certificate->date->format('d.m.Y') }}
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-transparent">
                            <a href="{{ route('student.show', $certificate->student) }}" class="btn btn-outline-success btn-sm w-100">
                                Смотреть профиль →
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="mt-4">
            {{ $certificates->appends(request()->query())->links() }}
        </div>
    @else
        <div class="alert alert-info text-center">
            <h4>😕 Сертификаты не найдены</h4>
        </div>
    @endif
</div>

<style>
    .card-title {
        color: #3B3A3D;
    }

    .mt-3 {
        color: #3B3A3D;
    }

    .card-img-top {
        border-bottom: 1px solid #e9ecef;
    }
</style>
@endsection


