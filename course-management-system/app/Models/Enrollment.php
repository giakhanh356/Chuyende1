<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $fillable = ['course_id', 'student_id'];

    // Quan hệ: Mỗi bản ghi đăng ký thuộc về một Học viên [cite: 68]
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    // Quan hệ: Mỗi bản ghi đăng ký thuộc về một Khóa học [cite: 67]
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
