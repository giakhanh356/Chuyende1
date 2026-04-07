@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Thêm khóa học mới</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Tên khóa học</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Giá (VNĐ)</label>
                <input type="number" name="price" class="form-control" required min="1"> </div>

            <div class="mb-3">
                <label>Mô tả</label>
                <textarea name="description" class="form-control" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label>Ảnh khóa học</label>
                <input type="file" name="image" class="form-control">
            </div>

            <div class="mb-3">
                <label>Trạng thái</label>
                <select name="status" class="form-control">
                    <option value="draft">Bản nháp (Draft)</option>
                    <option value="published">Xuất bản (Published)</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Lưu khóa học</button>
            <a href="{{ route('courses.index') }}" class="btn btn-secondary">Hủy bỏ</a>
        </form>
    </div>
</div>
@endsection