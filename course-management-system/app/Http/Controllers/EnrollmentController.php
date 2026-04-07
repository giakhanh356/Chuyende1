<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Models\Student; // Thêm model Student để truy xuất dữ liệu sinh viên
use App\Models\Course; // Thêm model Course để truy xuất dữ liệu khóa học       

class EnrollmentController extends Controller
{
    public function index()
    {
        // Tối ưu truy vấn: Load sẵn thông tin student và course [cite: 129]
        $enrollments = Enrollment::with(['student', 'course'])->latest()->get();
        
        return view('enrollments.index', compact('enrollments'));
    }
    public function create()
{
    $courses = \App\Models\Course::published()->get(); // Chỉ hiện khóa học đã xuất bản
    return view('enrollments.create', compact('courses'));
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'course_id' => 'required|exists:courses,id',
    ]);

    // 1. Tạo hoặc lấy thông tin học viên (Student) [cite: 140]
    $student = \App\Models\Student::firstOrCreate(
        ['email' => $request->email],
        ['name' => $request->name]
    );

    // 2. Lưu vào bảng đăng ký (Enrollment) [cite: 141]
    \App\Models\Enrollment::create([
        'course_id' => $request->course_id,
        'student_id' => $student->id
    ]);

    return redirect()->route('enrollments.index')->with('success', 'Đăng ký khóa học thành công!');
}
}
