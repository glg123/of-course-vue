<?php

namespace App\Http\Requests\Dashboard\Setting;

use Illuminate\Foundation\Http\FormRequest;

class TermSettingRequest extends FormRequest
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
            'term_desc_ar' => 'required|array',
            'term_desc_ar.value' => 'required',
            'term_desc_en' => 'required|array',
            'term_desc_en.value' => 'required',
            'term_payment_policy_ar' => 'required|array',
            'term_payment_policy_ar.value' => 'required',
            'term_payment_policy_en' => 'required|array',
            'term_payment_policy_en.value' => 'required',
        ];
    }
}