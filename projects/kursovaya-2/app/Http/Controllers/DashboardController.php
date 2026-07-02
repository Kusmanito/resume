<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Student;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $studentsCount = Student::count();
        $achievementsCount = Achievement::count();
        $olympiadsCount = Achievement::where('type', 'olympiad')->count();
        $certificatesCount = Achievement::where('type', 'certificate')->count();
        $usersCount = User::count();

        $latestAchievements = Achievement::with('student')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'studentsCount',
            'achievementsCount',
            'olympiadsCount',
            'certificatesCount',
            'usersCount',
            'latestAchievements'
        ));
    }
}