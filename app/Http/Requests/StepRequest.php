<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StepRequest extends FormRequest
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
    public function rules()
    {
        return [
            'title' => 'required',
            'content' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'video_type' => 'required',
            'original_name' => 'required',
            'image' => 'required',
            'video' => 'required',
            'image_url' => 'required',
            'video_url' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Vui lòng nhập tiêu đề',
            'content.required' => 'Vui lòng nhập nội dung',
            'description.required' => 'Vui lòng nhập mô tả',
            'duration.required' => 'Vui lòng nhập thời gian',
            'video_type.required' => 'Vui lòng nhập loại video',
            'original_name.required' => 'Vui lòng nhập tên chính',
            'image.required' => 'Vui lòng nhập hình ảnh',
            'video.required' => 'Vui lòng nhập video',
            'image_url.required' => 'Vui lòng nhập liên kết ảnh',
            'video_url.required' => 'Vui lòng nhập liên kết video',
        ];
    }
}
