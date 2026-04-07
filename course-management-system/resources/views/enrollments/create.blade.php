@extends('layouts.master')

@section('content')
<div class="card shadow col-md-8 mx-auto">
    <div class="card-header bg-primary text-white"><h4>Form Đăng ký khóa học</h4></div>
    <div class="card-body">
        <form action="{{ route('enrollments.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Tên học viên</label>
                <input type="text" name="name" class="form-control" placeholder="Nhập họ tên..." required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="example@gmail.com" required>
            </div>
            <div class="mb-3">
                <label>Chọn khóa học</label>
                <select name="course_id" class="form-control" required>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }} ({{ number_format($course->price) }} VNĐ)</option>
                    @endforeach
                </select>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Xác nhận Đăng ký</button>
            </div>
        </form>
    </div>
</div>
@endsection