@extends('layouts.app')

@section('content')
<section class="page">
    <div class="container">
        <a class="btn btn-light" href="{{ route('admin.dashboard') }}">← Назад в админку</a>

        <span class="badge" style="margin-top:20px;">👑 Super Admin</span>
        <h1 class="page-title">Пользователи и права</h1>
        <p class="page-subtitle">
            Здесь можно выдавать и забирать права администратора.
        </p>

        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert-error">{{ session('error') }}</div>
        @endif

        <div class="table-card">
            <div class="table-responsive">
                <table>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Имя</th>
                        <th>Email</th>
                        <th>Роль</th>
                        <th>Действие</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td><strong>{{ $user->name }}</strong></td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if($user->role === 'super_admin')
                                    <span class="pill pill-green">Супер-пользователь</span>
                                @elseif($user->role === 'admin')
                                    <span class="pill">Администратор</span>
                                @else
                                    <span class="pill">Пользователь</span>
                                @endif
                            </td>
                            <td>
                                @if($user->role === 'super_admin')
                                    <span class="meta">Нельзя изменить</span>
                                @elseif($user->role === 'admin')
                                    <form method="POST" action="{{ route('admin.users.removeAdmin', $user) }}">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-danger" type="submit">
                                            Забрать админку
                                        </button>
                                    </form>
                                @else
                                    <form method="POST" action="{{ route('admin.users.makeAdmin', $user) }}">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-primary" type="submit">
                                            Выдать админку
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{ $users->links() }}
    </div>
</section>
@endsection