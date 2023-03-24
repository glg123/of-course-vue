<?php

namespace App\Http\Requests\Dashboard\Setting;

use Illuminate\Foundation\Http\FormRequest;

class BannerBottomSettingRequest extends FormRequest
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
            'image_banner_bottom.value' => [
                'nullable',
                'mimes:jpeg,jpg,png,svg',
                'max:5000',
            ],

            'title_banner_bottom_ar.value' => [
                'required',
                'string',
                'max:255',
            ],

            'title_banner_bottom_en.value' => [
                'required',
                'string',
                'max:255',
            ],

            'description_banner_bottom_ar.value' => [
                'required',
                'string',
                'max:600',
            ],

            'description_banner_bottom_en.value' => [
                'required',
                'string',
                'max:600',
            ],

            'link_banner_bottom.value' => [
                'required_with:text_link_banner_bottom_ar.value,text_link_banner_bottom_en.value',
                'nullable',
                'url',
            ],

            'text_link_banner_bottom_ar.value' => [
                'required_with:link_banner_bottom.value,text_link_banner_bottom_en.value',
                'nullable',
                'string',
                'max:255',
            ],

            'text_link_banner_bottom_en.value' => [
                'required_with:link_banner_bottom.value,text_link_banner_bottom_ar.value',
                'nullable',
                'string',
                'max:255',
            ],
        ];
    }
}
