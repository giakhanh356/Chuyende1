@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="m-0">Quản lý bài học</h4>
        <a href="{{ route('lessons.create') }}" class="btn btn-primary btn-sm">Thêm bài học mới</a>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>Thứ tự</th>
                    <th>Tiêu đề</th>
                    <th>Thuộc khóa học</th>
                    <th>Video</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lessons as $lesson)
                <tr>
                    <td>{{ $lesson->order }}</td> <td>{{ $lesson->title }}</td>
                    <td>
                        <span class="badge bg-info text-dark">
                            {{ $lesson->course->name }} </span>
                    </td>
                    <td>
                        <a href="{{ $lesson->video_url }}" target="_blank" class="btn btn-outline-danger btn-sm">
                            <i class="fab fa-youtube"></i> Xem Video
                        </a>
                    </td>
                    <td>
                        <button class="btn btn-warning btn-sm">Sửa</button>
                        <button class="btn btn-danger btn-sm">Xóa</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection