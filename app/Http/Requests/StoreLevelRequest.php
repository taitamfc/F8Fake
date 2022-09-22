<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLevelRequest extends FormRequest
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
    public function rules()
    {
        return [
          'title'=>'required|unique::levels',
        ];
    }
    public function messages()
    {
        return [
            'title.requied'=> 'Trương bắt buộc',
            'title.unique'=> 'Đã tồn tại'
        ];
    }
}
