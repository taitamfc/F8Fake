<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequirementRequest extends FormRequest
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
            'content' => 'required',
            'course_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'content.required' => 'Vui lòng nhập nội dung',
            'course_id.required' => 'Vui lòng nhập khóa học',
        ];
    }
}
