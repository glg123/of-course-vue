<?php

namespace App\Http\Requests\Dashboard\Feature;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreFeatureRequest extends FormRequest
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
        $rules =  [
            'image'    => [
                'nullable',
                'mimes:jpeg,jpg,png,svg',
                'max:5000',
                Rule::requiredIf(function () {
                    return !isset($this->feature);
                })
            ],
        ];

        foreach(config('app.supported_locales') as $locale) {
            $rules["name.{$locale}"] = 'required|min:3|max:255';
            $rules["description.{$locale}"] = 'required|min:3|max:600';
        }

        return $rules;
    }


    public function attributes()
    {
        $attributes = [];

        foreach(config('app.supported_locales') as $locale) {
            $attributes["name.{$locale}"] = __("translation.feature_name_{$locale}");
            $attributes["description.{$locale}"] = __("translation.feature_description_{$locale}");
        }

        return $attributes;
    }
}
