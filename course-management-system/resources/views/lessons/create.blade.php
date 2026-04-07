@extends('layouts.master')

@section('content')
<div class="card shadow">
    <div class="card-header"><h4 class="m-0">Thêm bài học mới</h4></div>
    <div class="card-body">
        <form action="{{ route('lessons.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Thuộc khóa học</label>
                <select name="course_id" class="form-control" required>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>Tiêu đề bài học</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Video URL</label>
                <input type="url" name="video_url" class="form-control" placeholder="https://youtube.com/...">
            </div>
            <div class="mb-3">
                <label>Thứ tự (Order)</label>
                <input type="number" name="order" class="form-control" value="0">
            </div>
            <div class="mb-3">
                <label>Nội dung bài học</label>
                <textarea name="content" class="form-control" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Lưu bài học</button>
        </form>
    </div>
</div>
@endsection