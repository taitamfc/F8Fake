<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGroupRequest extends FormRequest
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
            'name' => 'required|min:3',
            'description' => 'required|min:10',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên Group',
            'description.required' => 'Vui lòng nhập mô tả',
            'name.min' => 'Tên Group quá ngắn',
            'description.min' => 'Mô tả quá ngắn',
        ];
    }
}
