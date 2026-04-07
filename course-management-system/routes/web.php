<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\EnrollmentController;

Route::resource('courses', CourseController::class);

// Route riêng cho chức năng khôi phục (Yêu cầu nâng cao) [cite: 63]
Route::post('courses/{id}/restore', [CourseController::class, 'restore'])->name('courses.restore');
Route::get('/dashboard', [CourseController::class, 'dashboard'])->name('dashboard');
Route::get('/', function () {
    return redirect()->route('dashboard'); // Tự động chuyển hướng về dashboard khi vào trang chủ
});
Route::resource('lessons', LessonController::class);
Route::resource('enrollments', EnrollmentController::class);