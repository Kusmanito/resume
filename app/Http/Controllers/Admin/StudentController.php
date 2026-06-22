<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('full_name')->paginate(20);
        return view('admin.students.index', compact('students'));
    }
    
    public function create()
    {
        return view('admin.students.create');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'group_name' => 'required|string|max:255',
            'course' => 'required|integer|min:1|max:4',
            'photo' => 'nullable|image|max:2048'
        ]);
        
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('students', 'public');
            $validated['photo'] = $path;
        }
        
        Student::create($validated);
        return redirect()->route('admin.students.index')->with('success', 'Студент добавлен');
    }
    
    public function edit(Student $student)
    {
        return view('admin.students.edit', compact('student'));
    }
    
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'group_name' => 'required|string|max:255',
            'course' => 'required|integer|min:1|max:4',
            'photo' => 'nullable|image|max:2048'
        ]);
        
        if ($request->hasFile('photo')) {
            // Удаляем старое фото
            if ($student->photo) {
                Storage::disk('public')->delete($student->photo);
            }
            $path = $request->file('photo')->store('students', 'public');
            $validated['photo'] = $path;
        }
        
        $student->update($validated);
        return redirect()->route('admin.students.index')->with('success', 'Студент обновлён');
    }
    
    public function destroy(Student $student)
    {
        if ($student->photo) {
            Storage::disk('public')->delete($student->photo);
        }
        $student->delete();
        return redirect()->route('admin.students.index')->with('success', 'Студент удалён');
    }
}