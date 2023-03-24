<?php

namespace App\Http\Requests\Dashboard\Setting;

use Illuminate\Foundation\Http\FormRequest;

class GeneralSettingRequest extends FormRequest
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
            'general_site_name' => 'required|array',
            'general_site_name.value' => 'required',
            'general_logo' => 'array',
            'general_logo.value' => 'image',

            'general_phone.value' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/',

            'general_play_store_link.value' => 'nullable|url',
            'general_app_store_link.value' => 'nullable|url',
        ];
    }
}
