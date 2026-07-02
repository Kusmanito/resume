<?php

namespace App\Http\Controllers;

use App\Models\Student;

class StudentController extends Controller
{
    public function show(Student $student)
    {
        $student->load('achievements.files');
        
        return view('pages.student', compact('student'));
    }
}