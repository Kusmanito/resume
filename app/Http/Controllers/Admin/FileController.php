<?php

namespace App\Http\Controllers\Admin;

use App\Models\File;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function destroy(File $file)
    {
        // Удаляем физический файл
        if (Storage::disk('public')->exists($file->file_path)) {
            Storage::disk('public')->delete($file->file_path);
        }
        
        // Удаляем ТОЛЬКО запись о файле, НЕ достижение
        $file->delete();
        
        return redirect()->back()->with('success', 'Файл удалён');
    }
}