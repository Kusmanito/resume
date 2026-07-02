@extends('layouts.app')

@section('content')
<section class="page">
    <div class="container">
        <h1 class="page-title">Сертификаты и курсы</h1>
        <p class="page-subtitle">Сертификаты, дипломы и документы о дополнительном образовании студентов.</p>

        <div class="catalog-layout">
            <aside class="filter-card">
                <h3>Поиск</h3>

                <form method="GET" action="{{ route('certificates') }}">
                    <div class="form-group">
                        <label for="search">Название сертификата</label>
                        <input id="search" type="text" name="search" value="{{ request('search') }}" placeholder="Введите название">
                    </div>

                    <button class="btn btn-primary" type="submit">Найти</button>
                    <a class="btn btn-light" href="{{ route('certificates') }}">Сбросить</a>
                </form>
            </aside>

            <div>
                @if($certificates->count() > 0)
                    <div class="grid">
                        @foreach($certificates as $certificate)
                            @php
                                $mainFile = $certificate->files->where('is_main', true)->first() ?? $certificate->files->first();
                            @endphp

                            <article class="card">
                                <div class="card-image">
                                    @if($mainFile)
                                        <img src="{{ asset('storage/' . $mainFile->file_path) }}" alt="{{ $certificate->title }}">
                                    @else
                                        <span>Нет фото</span>
                                    @endif
                                </div>

                                <div class="card-body">
                                    <span class="pill pill-green">Сертификат</span>
                                    <h3 class="card-title">{{ $certificate->title }}</h3>

                                    <p class="meta">
                                        👤 {{ $certificate->student->full_name }}<br>
                                        🎓 {{ $certificate->student->group_name }}<br>
                                        📅 Получен: {{ $certificate->date->format('d.m.Y') }}
                                    </p>

                                    <p class="meta">{{ Str::limit($certificate->description ?? 'Нет описания', 120) }}</p>

                                    <a class="btn btn-light" href="{{ route('student.show', $certificate->student) }}">
                                        Смотреть профиль →
                                    </a>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    {{ $certificates->appends(request()->query())->links() }}
                @else
                    <div class="empty">
                        <h3>Сертификаты не найдены</h3>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection