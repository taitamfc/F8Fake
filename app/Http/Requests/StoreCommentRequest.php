<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
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
            'commentstable_type' => 'required',
            'comment' => 'required',
            'approved' => 'required',

        ];
    }
    public function messages()
    {
        return [
            'commentstable_type.required' => 'Trường bắt buộc',
            'comment.required' => 'Trường bắt buộc',
            'approved.required' => 'Trường bắt buộc',

        ];
    }
}
