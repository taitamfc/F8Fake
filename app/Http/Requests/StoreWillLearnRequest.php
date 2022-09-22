<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWillLearnRequest extends FormRequest
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
          'content'=>'required|unique:will_learns',
          'course_id'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'content.required'=> 'Trường bắt buộc',
            'course_id.required'=> 'Trường bắt buộc',
            'content.unique'=> 'Đã tồn tại',
        ];
    }
}
