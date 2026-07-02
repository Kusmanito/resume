<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Student;

class PageController extends Controller
{
    public function home()
    {
        $studentsCount = Student::count();
        $olympiadsCount = Achievement::where('type', 'olympiad')->count();
        $certificatesCount = Achievement::where('type', 'certificate')->count();

        $latestAchievements = Achievement::with('student')
            ->latest()
            ->take(5)
            ->get();

        return view('pages.home', compact(
            'studentsCount',
            'olympiadsCount',
            'certificatesCount',
            'latestAchievements'
        ));
    }

    public function olympiads()
    {
        $query = Achievement::where('type', 'olympiad')
            ->with('student', 'files');

        if ($search = request('search')) {
            $query->where('title', 'like', "%{$search}%");
        }

        if ($level = request('level')) {
            $query->where('level', $level);
        }

        if ($year = request('year')) {
            $query->whereYear('date', $year);
        }

        $olympiads = $query->orderBy('date', 'desc')->paginate(9);

        return view('pages.olympiads', compact('olympiads'));
    }

    public function certificates()
    {
        $query = Achievement::where('type', 'certificate')
            ->with('student', 'files');

        if ($search = request('search')) {
            $query->where('title', 'like', "%{$search}%");
        }

        $certificates = $query->orderBy('date', 'desc')->paginate(12);

        return view('pages.certificates', compact('certificates'));
    }
}