<?php

namespace App\Http\Requests\Dashboard\Setting;

use Illuminate\Foundation\Http\FormRequest;

class FeatresSettingRequest extends FormRequest
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
            'title_features_section_ar.value' => [
                'required',
                'string',
                'max:255',
            ],
            'title_features_section_en.value' => [
                'required',
                'string',
                'max:255',
            ],
            'image_features_section.value' => [
                'nullable',
                'mimes:jpeg,jpg,png,svg',
                'max:5000',
            ],
        ];
    }
}
