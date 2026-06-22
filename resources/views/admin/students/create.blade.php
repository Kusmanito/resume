@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Добавить студента</h1>
    
    <form action="{{ route('admin.students.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-3">
            <label class="form-label">ФИО *</label>
            <input type="text" name="full_name" class="form-control @error('full_name') is-invalid @enderror" required>
            @error('full_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        
        <div class="mb-3">
            <label class="form-label">Группа *</label>
            <input type="text" name="group_name" class="form-control @error('group_name') is-invalid @enderror" required>
            @error('group_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        
        <div class="mb-3">
            <label class="form-label">Курс *</label>
            <input type="number" name="course" class="form-control @error('course') is-invalid @enderror" min="1" max="4" required>
            @error('course') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        
        <div class="mb-3">
            <label class="form-label">Фото студента</label>
            <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" accept="image/*">
            @error('photo') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">💾 Сохранить</button>
        <a href="{{ route('admin.students.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
</div>
<style>
    .form-label {
        color: #F0F0F0;
    }
</style>
@endsection