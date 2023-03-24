<?php

namespace App\Http\Requests\Dashboard\Setting;

use Illuminate\Foundation\Http\FormRequest;

class TutorialSettingRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'tutorial_video_url' => 'required|array',
            'tutorial_video_url.value' => 'required|url',
            'tutorial_script_en' => 'required|array',
            'tutorial_script_en.value' => 'required',
            'tutorial_script_ar' => 'required|array',
            'tutorial_script_ar.value' => 'required',
        ];
    }
}