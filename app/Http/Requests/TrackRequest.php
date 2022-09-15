<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrackRequest extends FormRequest
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
            'is_free' => 'required',
            'position' => 'required',
            'course_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Vui lòng nhập tiêu đề',
            'is_free.required' => 'Vui lòng chọn',
            'position.required' => 'Vui lòng nhập chức vụ',
            'course_id.required' => 'Vui lòng nhập khóa học',
        ];
    }
}
