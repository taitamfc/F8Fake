<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
          'name'=>'required',
          'email'=>'required',
          'password'=>'required',
          'username'=>'required',
          'first_name'=>'required',
          'last_name'=>'required',
          'full_name'=>'required',
          'bio'=>'required',
          'group_id'=>'required',
          'avatar_url'=>'required',
          'cover_url'=>'required',
          'is_comment_blocked'=>'required',
          'is_blocked'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=> 'Trường bắt buộc',
            'email.required'=> 'Trường bắt buộc',
            'password.required'=> 'Trường bắt buộc',
            'username.required'=> 'Trường bắt buộc',
            'first_name.required'=> 'Trường bắt buộc',
            'last_name.required'=> 'Trường bắt buộc',
            'full_name.required'=> 'Trường bắt buộc',
            'bio.required'=> 'Trường bắt buộc',
            'group_id.required'=> 'Trường bắt buộc',
            'avatar_url.required'=> 'Trường bắt buộc',
            'cover_url.required'=> 'Trường bắt buộc',
            'is_comment_blocked.required'=> 'Trường bắt buộc',
            'is_blocked.required'=> 'Trường bắt buộc',
        ];
    }
}
