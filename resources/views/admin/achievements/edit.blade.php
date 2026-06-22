@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Редактировать достижение</h1>
    
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.achievements.update', $achievement) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label class="form-label">Студент *</label>
                    <select name="student_id" class="form-control" required>
                        @foreach($students as $student)
                            <option value="{{ $student->id }}" {{ $achievement->student_id == $student->id ? 'selected' : '' }}>
                                {{ $student->full_name }} ({{ $student->group_name }})
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Тип *</label>
                    <select name="type" class="form-control" required>
                        <option value="olympiad" {{ $achievement->type == 'olympiad' ? 'selected' : '' }}>🏆 Олимпиада</option>
                        <option value="certificate" {{ $achievement->type == 'certificate' ? 'selected' : '' }}>📜 Сертификат</option>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Название *</label>
                    <input type="text" name="title" class="form-control" value="{{ $achievement->title }}" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Описание</label>
                    <textarea name="description" class="form-control" rows="3">{{ $achievement->description }}</textarea>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Дата *</label>
                    <input type="date" name="date" class="form-control" value="{{ $achievement->date->format('Y-m-d') }}" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Результат</label>
                    <input type="text" name="result" class="form-control" value="{{ $achievement->result }}">
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Уровень</label>
                    <select name="level" class="form-control">
                        <option value="">Выберите уровень</option>
                        <option value="районный" {{ $achievement->level == 'районный' ? 'selected' : '' }}>🏘️ Районный</option>
                        <option value="городской" {{ $achievement->level == 'городской' ? 'selected' : '' }}>🏙️ Городской</option>
                        <option value="областной" {{ $achievement->level == 'областной' ? 'selected' : '' }}>🌍 Областной</option>
                        <option value="всероссийский" {{ $achievement->level == 'всероссийский' ? 'selected' : '' }}>🇷🇺 Всероссийский</option>
                        <option value="международный" {{ $achievement->level == 'международный' ? 'selected' : '' }}>🌎 Международный</option>
                    </select>
                </div>
                
                <!-- Показываем текущие файлы (только для просмотра) -->
                @if($achievement->files->count() > 0)
                    <div class="mb-3">
                        <label class="form-label">📎 Загруженные файлы (только для просмотра)</label>
                        <div class="row">
                            @foreach($achievement->files as $file)
                                <div class="col-md-3 col-sm-4 col-6 mb-2">
                                    <div class="card">
                                        <img src="{{ asset('storage/' . $file->file_path) }}" class="card-img-top" style="height: 120px; object-fit: cover;">
                                        <div class="card-body p-2 text-center">
                                            <small class="text-muted">Файл {{ $loop->iteration }}</small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <small class="text-warning">⚠️ Файлы нельзя удалить или заменить. Если нужно изменить фото — удалите достижение и создайте заново.</small>
                    </div>
                @endif
                
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Обновить</button>
                    <a href="{{ route('admin.achievements.index') }}" class="btn btn-secondary">Отмена</a>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    .form-label {
        color: #F0F0F0;
    }
</style>
@endsection