<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['achievement_id', 'file_path', 'is_main'];
    
    public function achievement()
    {
        return $this->belongsTo(Achievement::class);
    }
}