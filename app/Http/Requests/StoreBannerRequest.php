<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBannerRequest extends FormRequest
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
            'banner' => 'required',
            'title' => 'required',
            'description' => 'required',
            'cta_title' => 'required',
            'link_to' => 'required',
            'priority' => 'required|numeric|max:2',
            'expires' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'placement.required' => 'Trường bắt buộc',
            'type.required' => 'Trường bắt buộc',
            'banner.required' => 'Trường bắt buộc',
            'title.required' => 'Trường bắt buộc',
            'description.required' => 'Trường bắt buộc',
            'cta_title.required' => 'Trường bắt buộc',
            'link_to.required' =>'Trường bắt buộc',
            'priority.required' => 'Trường bắt buộc',
            'priority.numeric' => 'Trường bắt buộc phải là số',
            'priority.max' => 'Trường bắt buộc nhỏ hơn 2 chữ số',
            'expires.required' => 'Trường bắt buộc',
        ];
    }
}
