<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\StudentController as AdminStudentController;
use App\Http\Controllers\Admin\AchievementController as AdminAchievementController;
use App\Http\Controllers\Admin\FileController;
use Illuminate\Support\Facades\Route;

// Публичные маршруты
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/olympiads', [PageController::class, 'olympiads'])->name('olympiads');
Route::get('/certificates', [PageController::class, 'certificates'])->name('certificates');
Route::get('/student/{student}', [StudentController::class, 'show'])->name('student.show');

// Маршруты для авторизованных пользователей
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Админ-маршруты (только для admin@test.ru)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('students', AdminStudentController::class);
    Route::resource('achievements', AdminAchievementController::class);
});

// Авторизация (логин, регистрация)
require __DIR__.'/auth.php';