<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Http\Requests\CourseRequest;
use Illuminate\Support\Str;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index()
{
    // Eager loading để tránh lỗi N+1 và đếm số bài học [cite: 57, 129, 130]
    $courses = Course::withCount('lessons')
                     ->with(['lessons', 'enrollments']) 
                     ->paginate(10); // Phân trang [cite: 56]

    return view('courses.index', compact('courses'));
}

    public function store(CourseRequest $request)
{
    $data = $request->validated(); // Lấy dữ liệu đã qua validate [cite: 9]
    
    // Tự sinh Slug [cite: 38]
    $data['slug'] = Str::slug($request->name);

    // Xử lý upload ảnh [cite: 41, 47]
    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('courses', 'public');
    }

    Course::create($data);

    return redirect()->route('courses.index')->with('success', 'Thêm khóa học thành công!');
}
    public function destroy($id)
{
    $course = Course::findOrFail($id);
    $course->delete(); // Sẽ thực hiện xóa mềm nhờ "use SoftDeletes" trong Model [cite: 62]

    return back()->with('success', 'Khóa học đã được đưa vào thùng rác!');
}
    public function dashboard()
{
    // 1. Tổng số khóa học [cite: 108]
    $totalCourses = Course::count();

    // 2. Tổng số học viên (không trùng lặp) [cite: 109]
    $totalStudents = Student::count();

    // 3. Tổng doanh thu (Sum giá của các khóa học đã có người đăng ký) [cite: 110]
    // Sử dụng Join hoặc thông qua bảng Enrollment
    $totalRevenue = DB::table('enrollments')
        ->join('courses', 'enrollments.course_id', '=', 'courses.id')
        ->sum('courses.price');

    // 4. Khóa học có nhiều học viên nhất [cite: 111]
    $mostPopularCourse = Course::withCount('students')
        ->orderBy('students_count', 'desc')
        ->first();

    // 5. 5 khóa học mới nhất [cite: 112]
    $recentCourses = Course::latest()->take(5)->get();

    return view('dashboard', compact(
        'totalCourses', 
        'totalStudents', 
        'totalRevenue', 
        'mostPopularCourse', 
        'recentCourses'
    ));
}
    public function create()
{
    return view('courses.create');
}

    public function edit($id)
{
    $course = Course::findOrFail($id);
    return view('courses.edit', compact('course'));
}

}
