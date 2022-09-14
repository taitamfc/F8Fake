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
            'priority' => 'required',
            'expires' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'placement.required' => 'Vui lòng nhập vị trí',
            'type.required' => 'Vui lòng nhập loại',
            'banner.required' => 'Vui lòng thêm ảnh bìa',
            'title.required' => 'Vui lòng nhập tiêu đề',
            'description.required' => 'Vui lòng thêm mô tả',
            'cta_title.required' => 'Vui lòng thêm chi tiết',
            'link_to.required' => 'Vui lòng nhập link',
            'priority.required' => 'Vui lòng thêm quyền ưu tiên',
            'expires.required' => 'Vui lòng nhập kỳ hạn',
        ];
    }
}
