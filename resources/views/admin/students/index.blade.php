@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Управление студентами</h1>
        <a href="{{ route('admin.students.create') }}" class="btn btn-primary">+ Добавить студента</a>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>ФИО</th>
                <th>Группа</th>
                <th>Курс</th>
                <th>Фото</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->full_name }}</td>
                <td>{{ $student->group_name }}</td>
                <td>{{ $student->course }}</td>
                <td>
                    @if($student->photo)
                        <img src="{{ asset('storage/' . $student->photo) }}" width="50" height="50" style="object-fit: cover;">
                    @else
                        <span class="text-muted">Нет фото</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.students.edit', $student) }}" class="btn btn-sm btn-warning">Изменить</a>
                    <form action="{{ route('admin.students.destroy', $student) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Удалить студента? Все его достижения тоже удалятся.')">🗑️ Удалить</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    {{ $students->links() }}
</div>
@endsection