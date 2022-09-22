<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBannerRequest extends FormRequest
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
            'placement' => 'required',
            'type' => 'required',
            'title' => 'required',
            'description' => 'required',
            'cta_title' => 'required',
            'link_to' => 'required',
            'priority' => 'required',
            'expires' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'placement.required' => 'Trường bắt buộc',
            'type.required' => 'Trường bắt buộc',
            'title.required' => 'Trường bắt buộc',
            'description.required' => 'Trường bắt buộc',
            'cta_title.required' => 'Trường bắt buộc',
            'link_to.required' => 'Trường bắt buộc',
            'priority.required' => 'Trường bắt buộc',
            'expires.required' => 'Trường bắt buộc',
        ];
    }
}
