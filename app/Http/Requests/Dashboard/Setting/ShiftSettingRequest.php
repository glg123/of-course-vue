<?php

namespace App\Http\Requests\Dashboard\Setting;

use Illuminate\Foundation\Http\FormRequest;

class ShiftSettingRequest extends FormRequest
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
            'available_morning_shift' => 'required|array',
            'available_morning_shift.value' => 'required|max:255',

            'available_evening_shift' => 'required|array',
            'available_evening_shift.value' => 'required|max:255',

            'default_morning_shift'   => 'required|array',
            'default_morning_shift.value' => 'required|max:255',

            'default_evening_shift'   => 'required|array',
            'default_evening_shift.value' => 'required|max:255',
        ];
    }

    public function getRedirectUrl()
    {
        return parent::getRedirectUrl() . '#shiftsSettings';
    }
}
