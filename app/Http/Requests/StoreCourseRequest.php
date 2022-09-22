<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
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
            'title'             => 'required|unique:courses',
            'level_id'          => 'required',
            'certificate_name'  => 'required',
            'slug'              => 'required',
            'description'       => 'required',
            'compeleted_content'=> 'required',
            'image'             => 'required',
            'icon'              => 'required',
            'content'           => 'required',
            'video_type'        => 'required',
            'video'             => 'required',
            'pass_percent'      => 'required',
            'priority'          => 'required',
            'student_count'     => 'required',
            'old_prive'         => 'required',
            'price'             => 'required',
            'pre_order_price'   => 'required',
            'is_relatable'      => 'required',
            'is_coming_soon'    => 'required',
            'is_pro'            => 'required',
            'is_completable'    => 'required',
            'published_at'      => 'required',
        ];
    }
    public function messages()
    {
        return [

            'title.required'            => 'Trường bắt buộc',
            'title.unique'              => 'Trường bắt buộc',
            'level_id.required'         => 'Trường bắt buộc',
            'certificate_name.required' => 'Trường bắt buộc',
            'slug.required'             => 'Trường bắt buộc',
            'description.required'      => 'Trường bắt buộc',
            'compeleted_content.required'=> 'Trường bắt buộc',
            'image.required'             => 'Trường bắt buộc',
            'icon.required'              => 'Trường bắt buộc',
            'content.required'           => 'Trường bắt buộc',
            'video_type.required'        => 'Trường bắt buộc',
            'video.required'             => 'Trường bắt buộc',
            'pass_percent.required'      => 'Trường bắt buộc',
            'priority.required'          => 'Trường bắt buộc',
            'student_count.required'     => 'Trường bắt buộc',
            'old_prive.required'         => 'Trường bắt buộc',
            'price.required'             => 'Trường bắt buộc',
            'pre_order_price.required'   => 'Trường bắt buộc',
            'is_relatable.required'      => 'Trường bắt buộc',
            'is_coming_soon.required'    => 'Trường bắt buộc',
            'is_pro.required'            => 'Trường bắt buộc',
            'is_completable.required'    => 'Trường bắt buộc',
            'published_at.required'      => 'Trường bắt buộc',
        ];
    }
}
