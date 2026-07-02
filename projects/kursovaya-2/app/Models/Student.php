<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['full_name', 'group_name', 'course', 'photo'];
    
    public function achievements()
    {
        return $this->hasMany(Achievement::class);
    }
    
    public function olympiads()
    {
        return $this->achievements()->where('type', 'olympiad');
    }
    
    public function certificates()
    {
        return $this->achievements()->where('type', 'certificate');
    }
}