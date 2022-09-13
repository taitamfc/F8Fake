<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StepRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
            'content' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'video_type' => 'required',
            'original_name' => 'required',
            'image' => 'required',
            'video' => 'required',
            'image_url' => 'required',
            'video_url' => 'required',
        ];
    }
}
