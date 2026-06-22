@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Добавить достижение</h1>
    
    <form action="{{ route('admin.achievements.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-3">
            <label class="form-label">Студент *</label>
            <select name="student_id" class="form-control" required>
                <option value="">Выберите студента</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->full_name }} ({{ $student->group_name }})</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Тип *</label>
            <select name="type" class="form-control" required>
                <option value="olympiad">Олимпиада</option>
                <option value="certificate">Сертификат</option>
            </select>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Название *</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Описание</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Дата *</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Результат (место/баллы)</label>
            <input type="text" name="result" class="form-control" placeholder="1 место, Участник, 95 баллов">
        </div>
        
        <div class="mb-3">
            <label class="form-label">Уровень (для олимпиад)</label>
            <select name="level" class="form-control">
                <option value="">Выберите уровень</option>
                <option value="районный">Районный</option>
                <option value="городской">Городской</option>
                <option value="областной">Областной</option>
                <option value="всероссийский">Всероссийский</option>
                <option value="международный">Международный</option>
            </select>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Файлы (фото дипломов)</label>
            <input type="file" name="files[]" class="form-control" multiple accept="image/*">
            <small class="text-muted">Можно выбрать несколько фото</small>
        </div>
        
        <button type="submit" class="btn btn-primary">Сохранить</button>
        <a href="{{ route('admin.achievements.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
</div>
<style>
    .form-label {
        color: #F0F0F0;
    }
    .text-muted {
    color: #F0F0F0 !important;
    }
</style>
@endsection