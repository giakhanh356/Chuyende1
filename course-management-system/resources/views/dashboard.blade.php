@extends('layouts.master')

@section('content')
<h2 class="mb-4">Dashboard Thống Kê</h2>

<div class="row">
    <div class="col-md-3">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">
                <h5>Tổng khóa học</h5>
                <h3>{{ $totalCourses }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">
                <h5>Tổng học viên</h5>
                <h3>{{ $totalStudents }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card bg-warning text-dark mb-4">
            <div class="card-body">
                <h5>Tổng doanh thu</h5>
                <h3>{{ number_format($totalRevenue) }} VNĐ</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card bg-info text-white mb-4">
            <div class="card-body">
                <h5>Khóa học Hot nhất</h5>
                <p class="mb-0">{{ $mostPopularCourse->name ?? 'N/A' }}</p>
                <small>({{ $mostPopularCourse->students_count ?? 0 }} học viên)</small>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-12">
        <h4>5 Khóa học mới nhất</h4>
        <table class="table table-striped mt-2">
            <thead>
                <tr>
                    <th>Tên khóa học</th>
                    <th>Giá</th>
                    <th>Ngày tạo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentCourses as $course)
                <tr>
                    <td>{{ $course->name }}</td>
                    <td>{{ number_format($course->price) }} VNĐ</td>
                    <td>{{ $course->created_at->format('d/m/Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection