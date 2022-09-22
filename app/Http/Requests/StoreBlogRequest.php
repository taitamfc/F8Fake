<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
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
            'user_id' => 'required',
            'parent_id' => 'required',
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'thumbnail' => 'required',
            'content' => 'required',
            'min_read' => 'required',
            'view_count' => 'required',
            'is_recommend' => 'required',
            'is_approved' => 'required',
            'published_at' => 'required',
            'reaction_count' => 'required',
            'comments_count' => 'required',
            'is_reacted' => 'required',
            'is_bookmark' => 'required',
            'is_published' => 'required',

        ];
    }
    public function messages()
    {
        return [
            'user_id.required' => 'Trường có sẵn',
            'parent_id.required' => 'Trường bắt buộc',
            'title.required' => 'Trường bắt buộc',
            'slug.required' => 'Trường bắt buộc',
            'description.required' => 'Trường bắt buộc',
            'meta_title.required' => 'Trường bắt buộc',
            'meta_description.required' => 'Trường bắt buộc',
            'thumbnail.required' => 'Trường bắt buộc',
            'content.required' => 'Trường bắt buộc',
            'min_read.required' => 'Trường bắt buộc',
            'view_count.required' => 'Trường bắt buộc',
            'is_recommend.required' => 'Trường bắt buộc',
            'is_approved.required' => 'Trường bắt buộc',
            'published_at.required' => 'Trường bắt buộc',
            'reaction_count.required' => 'Trường bắt buộc',
            'comments_count.required' => 'Trường bắt buộc',
            'is_reacted.required' => 'Trường bắt buộc',
            'is_bookmark.required' => 'Trường bắt buộc',
            'is_published.required' => 'Trường bắt buộc',
        ];
    }
}
