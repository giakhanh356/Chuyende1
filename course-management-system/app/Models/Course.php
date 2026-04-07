<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Dùng cho yêu cầu 2.1 [cite: 62]

class Course extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'slug', 'price', 'description', 'image', 'status'];

    // 1 Course -> nhiều Lesson 
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    // Quan hệ Many-to-Many với Student qua bảng trung gian enrollments 
    public function students()
    {
        return $this->belongsToMany(Student::class, 'enrollments');
    }

    // Local Scope: Chỉ lấy khóa học đã xuất bản [cite: 132]
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
