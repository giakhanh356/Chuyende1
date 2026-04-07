<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'email'];

    // Student có nhiều Course (Many-to-Many) [cite: 70]
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'enrollments');
    }
}
