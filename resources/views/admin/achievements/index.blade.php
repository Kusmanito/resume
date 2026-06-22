@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Достижения</h1>
        <a href="{{ route('admin.achievements.create') }}" class="btn btn-primary">+ Добавить достижение</a>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Студент</th>
                <th>Тип</th>
                <th>Название</th>
                <th>Дата</th>
                <th>Результат</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($achievements as $achievement)
            <tr>
                <td>{{ $achievement->id }}</td>
                <td>{{ $achievement->student->full_name }}</td>
                <td>{{ $achievement->type === 'olympiad' ? 'Олимпиада' : 'Сертификат' }}</td>
                <td>{{ $achievement->title }}</td>
                <td>{{ $achievement->date->format('d.m.Y') }}</td>
                <td>{{ $achievement->result ?? '-' }}</td>
                <td>
                    <a href="{{ route('admin.achievements.edit', $achievement) }}" class="btn btn-sm btn-warning">✏️</a>
                    <form action="{{ route('admin.achievements.destroy', $achievement) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Удалить?')">🗑️</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $achievements->links() }}
</div>
@endsection