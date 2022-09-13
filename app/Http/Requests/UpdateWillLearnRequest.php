<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWillLearnRequest extends FormRequest
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
            'course_id'=>'required',
            'content'=>'content',
        ];
    }
    public function messages()
    {
        return [
            'course_id.requied'=> 'Trường bắt buộc',
            'content.requied'=> 'Trường bắt buộc',
        ];
    }
}
