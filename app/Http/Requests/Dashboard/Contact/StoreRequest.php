<?php

namespace App\Http\Requests\Dashboard\Contact;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name'    => 'required|array',
        ];

        foreach(config('app.supported_locales') as $locale) {
            $rules["name.{$locale}"] = 'required|min:3|max:255';
        }

        return $rules;
    }


    public function attributes()
    {
        $attributes = [];

        foreach(config('app.supported_locales') as $locale) {
            $attributes["name.{$locale}"] = __("translation.contact_method_{$locale}");
        }

        return $attributes;
    }
}
