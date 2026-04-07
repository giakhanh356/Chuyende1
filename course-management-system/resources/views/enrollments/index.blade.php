@extends('layouts.master')

@section('content')
<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center bg-white">
        <h4 class="m-0 text-primary">Danh sách học viên đăng ký</h4>
        <a href="{{ route('enrollments.create') }}" class="btn btn-success btn-sm">
    <i class="fas fa-plus-circle"></i> Đăng ký mới
</a>
    </div>
    <div class="card-body">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Tên học viên</th>
                    <th>Email</th>
                    <th>Khóa học</th>
                    <th>Ngày đăng ký</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($enrollments as $enrollment)
                <tr>
                    <td>#{{ $enrollment->id }}</td>
                    <td class="fw-bold">{{ $enrollment->student->name }}</td> <td>{{ $enrollment->student->email }}</td>
                    <td>
                        <span class="badge rounded-pill bg-primary">
                            {{ $enrollment->course->name }} </span>
                    </td>
                    <td>{{ $enrollment->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <button class="btn btn-light btn-sm text-danger shadow-sm">
                            <i class="fas fa-trash"></i> Hủy
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @if($enrollments->isEmpty())
            <div class="text-center py-4">
                <p class="text-muted">Chưa có dữ liệu đăng ký nào.</p>
            </div>
        @endif
    </div>
    <div class="card-footer bg-white">
        <strong>Tổng số đăng ký: {{ $enrollments->count() }}</strong> [cite: 91]
    </div>
</div>
@endsection