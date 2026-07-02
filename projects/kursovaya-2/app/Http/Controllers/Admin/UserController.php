<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Models\Student;
use App\Models\User;

class UserController extends Controller
{
    public function dashboard()
    {
        $studentsCount = Student::count();
        $achievementsCount = Achievement::count();
        $usersCount = User::count();
        $adminsCount = User::whereIn('role', ['admin', 'super_admin'])->count();

        $latestUsers = User::latest()->take(5)->get();
        $latestAchievements = Achievement::with('student')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'studentsCount',
            'achievementsCount',
            'usersCount',
            'adminsCount',
            'latestUsers',
            'latestAchievements'
        ));
    }

    public function index()
    {
        if (!auth()->user()->isSuperAdmin()) {
            abort(403, 'Только супер-пользователь может управлять администраторами.');
        }

        $users = User::latest()->paginate(15);

        return view('admin.users.index', compact('users'));
    }

    public function makeAdmin(User $user)
    {
        if (!auth()->user()->isSuperAdmin()) {
            abort(403);
        }

        if (!$user->isSuperAdmin()) {
            $user->update(['role' => 'admin']);
        }

        return back()->with('success', 'Пользователь получил права администратора.');
    }

    public function removeAdmin(User $user)
    {
        if (!auth()->user()->isSuperAdmin()) {
            abort(403);
        }

        if (!$user->isSuperAdmin()) {
            $user->update(['role' => 'user']);
        }

        return back()->with('success', 'Права администратора удалены.');
    }
}