@extends('layouts.app')

@section('content')
<section class="page">
    <div class="container">
        <a class="btn btn-light" href="{{ route('home') }}">← На главную</a>

        <div class="card student-hero">
            <div class="avatar-big">
                @if($student->photo)
                    <img src="{{ asset('storage/' . $student->photo) }}" alt="{{ $student->full_name }}">
                @else
                    <span>Нет фото</span>
                @endif
            </div>

            <div>
                <span class="badge">👤 Профиль студента</span>
                <h1 class="page-title">{{ $student->full_name }}</h1>
                <p class="page-subtitle">
                    Группа: <strong>{{ $student->group_name }}</strong><br>
                    Курс: <strong>{{ $student->course }} курс</strong>
                </p>
            </div>
        </div>

        <div class="section-head">
            <div>
                <h2>Достижения</h2>
                <p class="meta">Олимпиады, конкурсы и сертификаты студента</p>
            </div>
        </div>

        <div class="timeline">
            @if($student->olympiads->count() > 0)
                <h3>Олимпиады и конкурсы</h3>

                @foreach($student->olympiads as $olympiad)
                    <article class="timeline-item">
                        <span class="pill">Олимпиада</span>

                        <h3>{{ $olympiad->title }}</h3>

                        @if($olympiad->description)
                            <p>{{ $olympiad->description }}</p>
                        @endif

                        <p class="meta">
                            📅 {{ $olympiad->date->format('d.m.Y') }}

                            @if($olympiad->result)
                                · 🏆 {{ $olympiad->result }}
                            @endif

                            @if($olympiad->level)
                                · {{ $olympiad->level }}
                            @endif
                        </p>

                        @if($olympiad->files->count() > 0)
                            <div class="file-links">
                                @foreach($olympiad->files as $file)
                                    <a href="{{ asset('storage/' . $file->path) }}" target="_blank">
                                        Смотреть файл
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </article>
                @endforeach
            @endif

            @if($student->certificates->count() > 0)
                <h3>Сертификаты и курсы</h3>

                @foreach($student->certificates as $certificate)
                    <article class="timeline-item">
                        <span class="pill pill-green">Сертификат</span>

                        <h3>{{ $certificate->title }}</h3>

                        @if($certificate->description)
                            <p>{{ $certificate->description }}</p>
                        @endif

                        <p class="meta">
                            📅 {{ $certificate->date->format('d.m.Y') }}

                            @if($certificate->result)
                                · {{ $certificate->result }}
                            @endif
                        </p>

                        @if($certificate->files->count() > 0)
                            <div class="file-links">
                                @foreach($certificate->files as $file)
                                    <a href="{{ asset('storage/' . $file->path) }}" target="_blank">
                                        Смотреть сертификат
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </article>
                @endforeach
            @endif

            @if($student->olympiads->count() == 0 && $student->certificates->count() == 0)
                <div class="empty">У студента пока нет достижений.</div>
            @endif
        </div>
    </div>
</section>
@endsection