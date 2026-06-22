<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Олимпиады и достижения</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        /* Основные цвета палитры */
        :root {
            --color-dark: #3B3A3D;
            --color-gray: #6E6C78;
            --color-green: #7AA899;
            --color-purple: #8B7AA8;
            --color-deep: #27263D;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #3B3A3D;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        /* Стили для навигации */
        .navbar {
            background: #27263D;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }
        
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
            transition: transform 0.3s ease;
        }
        
        .nav-link {
            transition: all 0.3s ease;
            position: relative;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--color-green);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }
        
        .nav-link:hover::after {
            width: 80%;
        }
        
        /* Стили для карточек */
        .card {
            transition: all 0.3s ease;
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            background: white;
            color: #f0f0f0;
        }
        
        /* Кнопки */
        .btn-primary {
            background: linear-gradient(135deg, var(--color-purple) 0%, var(--color-deep) 100%);
            border: none;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, var(--color-green) 0%, var(--color-purple) 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(139, 122, 168, 0.4);
        }
        
        .btn-success {
            background: linear-gradient(135deg, var(--color-green) 0%, #5a8a7a 100%);
            border: none;
            transition: all 0.3s ease;
        }
        
        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(122, 168, 153, 0.4);
        }
        
        .btn-outline-primary {
            border-color: var(--color-purple);
            color: var(--color-purple);
        }
        
        .btn-outline-primary:hover {
            background: linear-gradient(135deg, var(--color-purple) 0%, var(--color-deep) 100%);
            border-color: transparent;
            color: white;
        }
        
        /* Badges */
        .badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-weight: normal;
        }
        
        .badge.bg-primary {
            background: #8B7AA8 !important;
        }

        .text-primary {
            color: #3B3A3D !important;
        }
        
        .badge.bg-success {
            background: linear-gradient(135deg, var(--color-green) 0%, #5a8a7a 100%);
        }
        
        .badge.bg-info {
            background: var(--color-gray) !important;
        }
        
        /* Формы */
        .form-control, .form-select {
            border-radius: 10px;
            border: 2px solid #e0e0e0;
            transition: all 0.3s ease;
            background: white;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--color-purple);
            box-shadow: 0 0 0 0.2rem rgba(139, 122, 168, 0.25);
        }
        
        /* Пагинация */
        .pagination {
            justify-content: center;
        }
        
        .page-link {
            border-radius: 10px;
            margin: 0 5px;
            color: var(--color-purple);
            transition: all 0.3s ease;
            background: white;
        }
        
        .page-link:hover {
            background: linear-gradient(135deg, var(--color-purple) 0%, var(--color-deep) 100%);
            color: white;
            transform: translateY(-2px);
        }
        
        .page-item.active .page-link {
            background: linear-gradient(135deg, var(--color-purple) 0%, var(--color-deep) 100%);
            border-color: var(--color-purple);
        }
        
        /* Футер */
        footer {
            margin-top: auto;
            background: #27263D;
            color: rgba(255,255,255,0.9) !important;
        }
        
        footer .text-muted {
            color: rgba(255,255,255,0.7) !important;
        }
        
        /* Анимации */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        main {
            animation: fadeIn 0.5s ease-out;
        }
        
        /* Адаптивность */
        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.2rem;
            }
            
            .container {
                padding-left: 15px;
                padding-right: 15px;
            }
        }
        
        /* Стили для изображений в карточках */
        .card-img-top {
            transition: transform 0.5s ease;
        }
        
        /* Стили для уведомлений */
        .alert {
            border-radius: 15px;
            border: none;
            animation: fadeIn 0.3s ease-out;
        }
        
        .alert-success {
            background: linear-gradient(135deg, var(--color-green) 0%, #5a8a7a 100%);
            color: white;
        }
        
        .alert-info {
            background: var(--color-gray);
            color: white;
        }
        
        /* Стили для дропдауна */
        .dropdown-menu {
            border-radius: 10px;
            border: none;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            background: white;
        }
        
        .dropdown-item {
            transition: all 0.3s ease;
        }
        
        .dropdown-item:hover {
            background: linear-gradient(135deg, var(--color-purple) 0%, var(--color-deep) 100%);
            color: white;
            transform: translateX(5px);
        }
        
        /* Стили для главной статистики */
        .display-1 {
            font-size: 3rem;
            margin-bottom: 10px;
        }

        h1 {
            color: #f0f0f0;
        }
        
        /* Стили для профиля студента */
        .student-photo {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        /* Плавный скролл */
        html {
            scroll-behavior: smooth;
        }
        
        /* Градиентные карточки статистики */
        .bg-gradient-primary {
            background: linear-gradient(135deg, var(--color-purple) 0%, var(--color-deep) 100%);
        }
        
        .bg-gradient-success {
            background: linear-gradient(135deg, var(--color-green) 0%, #5a8a7a 100%);
        }
        
        .bg-gradient-info {
            background: linear-gradient(135deg, var(--color-gray) 0%, var(--color-dark) 100%);
        }
        
        /* Карточки достижений */
        .achievement-card {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 10px;
            transition: all 0.3s ease;
            border-left: 4px solid var(--color-green);
        }
        
        /* Фото студента */
        .student-photo-wrapper {
            background: linear-gradient(135deg, var(--color-purple) 0%, var(--color-deep) 100%);
            padding: 20px;
            text-align: center;
        }
        
        .student-photo-img {
            width: 100%;
            max-width: 250px;
            height: 250px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            margin: 0 auto;
            display: block;
        }
        
        .student-photo-placeholder {
            width: 250px;
            height: 250px;
            border-radius: 50%;
            background: rgba(255,255,255,0.2);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            color: white;
        }
        
        .student-photo-placeholder .display-1 {
            font-size: 4rem;
            margin: 0;
        }
        
        /* Изменение цвета заголовка карточек */
        .card-header.bg-primary.text-white {
            background: #8B7AA8 !important;
        }
        .text-primary {
            color: #f0f0f0;
        }   
        
      footer p {
            color: #f0f0f0 !important;
        }
        .text-success {
            color: var(--color-green) !important;
        }
        
        .btn-outline-success {
            border-color: var(--color-green);
            color: var(--color-green);
        }
        
        .btn-outline-success:hover {
            background: linear-gradient(135deg, var(--color-green) 0%, #5a8a7a 100%);
            border-color: transparent;
            color: white;
        }
        
        /* Контейнер на тёмном фоне */
        .container {
            background: transparent;
        }
        
        /* Карточка в админке */
        .card.shadow-sm {
            background: white;
        }

        h3 {
            color: #F0F0F0;
        }

        p {
            color: #f0f0f0;
        }

        h5 {
            color: #f0f0f0;
        }

        .display-4.fw-bold.text-primary,
        h1.display-4.fw-bold.text-primary {
            color: #ffffff !important;
        }

        html, body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }

        footer {
            flex-shrink: 0;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                Достижения техникума
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">
                            Главная
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('olympiads') }}">
                            Олимпиады
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('certificates') }}">
                            Сертификаты
                        </a>
                    </li>
                    @auth
                        @if(auth()->user()->email === 'admin@test.ru')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-warning" href="#" id="adminDropdown" role="button" data-bs-toggle="dropdown">
                                    Админка
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="{{ url('/admin/students') }}">
                                            Управление студентами
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ url('/admin/achievements') }}">
                                            Управление достижениями
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                👤 {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            Выйти
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                Вход
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>

    <footer class="mt-5 py-4">
        <div class="container text-center">
            <p class="mb-0">
                © {{ date('Y') }} Техникум. Все достижения студентов.
            </p>
            <p class="mb-0 mt-2 small">
                Сайт-отчёт об олимпиадах и сертификатах
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>