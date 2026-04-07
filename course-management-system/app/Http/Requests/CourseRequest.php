<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
{
    return [
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0.01', // Giá phải lớn hơn 0 [cite: 46]
        'description' => 'nullable',
        'status' => 'required|in:draft,published',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Hỗ trợ upload ảnh [cite: 47]
    ];
}
}
