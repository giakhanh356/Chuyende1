<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;    
use App\Models\Lesson; // Thêm model Lesson để truy xuất dữ liệu bài học
use App\Models\Course; // Thêm model Course để truy xuất dữ liệu khóa học

class LessonController extends Controller
{
    public function index() {
    // Tối ưu N+1 query bằng cách load trước thông tin course [cite: 129]
    $lessons = Lesson::with('course')->orderBy('order')->get(); 
    return view('lessons.index', compact('lessons'));
}
public function create()
{
    $courses = \App\Models\Course::all(); // Lấy danh sách khóa học để chọn trong Form
    return view('lessons.create', compact('courses'));
}

public function store(Request $request)
{
    $request->validate([
        'course_id' => 'required|exists:courses,id',
        'title' => 'required|string|max:255',
        'content' => 'required',
        'video_url' => 'nullable|url',
        'order' => 'required|integer|min:0',
    ]);

    \App\Models\Lesson::create($request->all());

    return redirect()->route('lessons.index')->with('success', 'Thêm bài học thành công!');
}
}
