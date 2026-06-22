<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $fillable = ['student_id', 'type', 'title', 'description', 'date', 'result', 'level'];
    
    protected $casts = [
        'date' => 'date',
    ];
    
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    
    public function files()
    {
        return $this->hasMany(File::class);
    }
    
    public function mainFile()
    {
        return $this->hasOne(File::class)->where('is_main', true);
    }
}