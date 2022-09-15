<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
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
            'user_id' => 'required',
            'parent_id' => 'required',
            'title' => 'required',

        ];
    }
    public function messages()
    {
        return [
            'user_id.required' => 'Trường bắt buộc',
            'parent_id.required' => 'Trường bắt buộc',
            'title.required' => 'Trường bắt buộc',

        ];
    }
}
