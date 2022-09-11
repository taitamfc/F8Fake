<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'title' => 'required',
            'level_id' => 'required',
            'certificate_name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'compeleted_content' => 'required',
            'image' => 'required',
            'icon' => 'required',
            'content' => 'required',
            'video_type' => 'required',
            'video' => 'required',
            'pass_percent' => 'required',
            'priority' => 'required',
            'student_count' => 'required',
            'old_prive' => 'required',
            'price' => 'required',
            'pre_order_price' => 'required',
            'is_relatable' => 'required',
            'is_coming_soon' => 'required',
            'is_pro' => 'required',
            'is_completable' => 'required',
            'published_at' => 'required',
        ];
    }
}
