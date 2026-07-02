@extends('layouts.app')

@section('content')
<section class="page">
    <div class="container">
        <h1 class="page-title">Олимпиады и конкурсы</h1>
        <p class="page-subtitle">Достижения студентов в конкурсах, олимпиадах и соревнованиях.</p>

        <div class="catalog-layout">
            <aside class="filter-card">
                <h3>Фильтры</h3>

                <form method="GET" action="{{ route('olympiads') }}">
                    <div class="form-group">
                        <label for="search">Поиск по названию</label>
                        <input id="search" type="text" name="search" value="{{ request('search') }}" placeholder="Например: информатика">
                    </div>

                    <div class="form-group">
                        <label for="level">Уровень</label>
                        <select id="level" name="level">
                            <option value="">Все уровни</option>
                            @foreach(['Районный', 'Городской', 'Областной', 'Всероссийский', 'Международный'] as $level)
                                <option value="{{ $level }}" @selected(request('level') === $level)>{{ $level }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="year">Год</label>
                        <select id="year" name="year">
                            <option value="">Все годы</option>
                            @for($year = date('Y'); $year >= 2020; $year--)
                                <option value="{{ $year }}" @selected(request('year') == $year)>{{ $year }}</option>
                            @endfor
                        </select>
                    </div>

                    <button class="btn btn-primary" type="submit">Найти</button>
                    <a class="btn btn-light" href="{{ route('olympiads') }}">Сбросить</a>
                </form>
            </aside>

            <div>
                @if($olympiads->count() > 0)
                    <div class="grid">
                        @foreach($olympiads as $olympiad)
                            @php
                                $mainFile = $olympiad->files->where('is_main', true)->first() ?? $olympiad->files->first();
                            @endphp

                            <article class="card">
                                <div class="card-image">
                                    @if($mainFile)
                                        <img src="{{ asset('storage/' . $mainFile->file_path) }}" alt="{{ $olympiad->title }}">
                                    @else
                                        <span>Нет фото</span>
                                    @endif
                                </div>

                                <div class="card-body">
                                    <span class="pill">Олимпиада</span>
                                    <h3 class="card-title">{{ $olympiad->title }}</h3>

                                    <p class="meta">
                                        @if($olympiad->level)
                                            🏅 {{ $olympiad->level }}<br>
                                        @endif
                                        👤 {{ $olympiad->student->full_name }}<br>
                                        🎓 {{ $olympiad->student->group_name }}<br>
                                        📅 {{ $olympiad->date->format('d.m.Y') }}
                                    </p>

                                    <p class="meta">{{ Str::limit($olympiad->description ?? 'Нет описания', 110) }}</p>

                                    @if($olympiad->result)
                                        <p><strong>{{ $olympiad->result }}</strong></p>
                                    @endif

                                    <a class="btn btn-light" href="{{ route('student.show', $olympiad->student) }}">
                                        Профиль студента →
                                    </a>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    {{ $olympiads->appends(request()->query())->links() }}
                @else
                    <div class="empty">
                        <h3>Ничего не найдено</h3>
                        <p>Попробуйте изменить параметры поиска.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection