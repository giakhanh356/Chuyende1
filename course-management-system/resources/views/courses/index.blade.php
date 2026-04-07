@extends('layouts.master')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Danh sách khóa học</h2>
    <a href="{{ route('courses.create') }}" class="btn btn-primary">Thêm khóa học mới</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Ảnh</th>
            <th>Tên khóa học</th>
            <th>Giá</th>
            <th>Số bài học</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($courses as $course)
        <tr>
            <td><img src="{{ asset('storage/'.$course->image) }}" width="80"></td>
            <td>{{ $course->name }}</td>
            <td>{{ number_format($course->price) }} VNĐ</td>
            <td>{{ $course->lessons_count }} bài</td> <td>
                @include('components.badge', ['status' => $course->status])
            </td>
            <td>
                <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Xóa khóa học?')">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $courses->links() }}
@endsection