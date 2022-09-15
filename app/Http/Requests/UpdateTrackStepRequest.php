<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTrackStepRequest extends FormRequest
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
            'track_id' => 'required',
            'step_type' => 'required',
            'step_id' => 'required',
            'position' => 'required',
            'is_published' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'track_id.required' => 'Trường bắt buộc',
            'step_type.required' => 'Trường bắt buộc',
            'step_id.required' => 'Trường bắt buộc',
            'position.required' => 'Trường bắt buộc',
            'is_published.required' => 'Trường bắt buộc',
        ];
    }
}
