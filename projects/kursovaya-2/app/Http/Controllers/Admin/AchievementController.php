<?php

namespace App\Http\Controllers\Admin;

use App\Models\Achievement;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AchievementController extends Controller
{
    public function index()
    {
        $achievements = Achievement::with('student')->orderBy('date', 'desc')->paginate(20);
        return view('admin.achievements.index', compact('achievements'));
    }
    
    public function create()
    {
        $students = Student::orderBy('full_name')->get();
        return view('admin.achievements.create', compact('students'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'type' => 'required|in:olympiad,certificate',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'result' => 'nullable|string|max:255',
            'level' => 'nullable|string|max:255',
            'files.*' => 'nullable|image|max:2048'
        ]);
        
        $achievement = Achievement::create($validated);
        
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $path = $file->store('achievements', 'public');
                $achievement->files()->create([
                    'file_path' => $path,
                    'is_main' => false
                ]);
            }
        }
        
        return redirect()->route('admin.achievements.index')->with('success', 'Достижение добавлено');
    }
    
    public function edit(Achievement $achievement)
    {
        $students = Student::orderBy('full_name')->get();
        return view('admin.achievements.edit', compact('achievement', 'students'));
    }
    
    public function update(Request $request, Achievement $achievement)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'type' => 'required|in:olympiad,certificate',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'result' => 'nullable|string|max:255',
            'level' => 'nullable|string|max:255',
        ]);
        
        $achievement->update($validated);
        
        return redirect()->route('admin.achievements.index')->with('success', 'Достижение обновлено');
    }
    
    public function destroy(Achievement $achievement)
    {
        foreach ($achievement->files as $file) {
            if (Storage::disk('public')->exists($file->file_path)) {
                Storage::disk('public')->delete($file->file_path);
            }
            $file->delete();
        }
        $achievement->delete();
        return redirect()->route('admin.achievements.index')->with('success', 'Достижение удалено');
    }
}