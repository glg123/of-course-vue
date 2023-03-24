<?php

namespace App\Http\Requests\Dashboard\Staff;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'first_name' => 'required|min:3|max:150',
            'last_name'  => 'required|min:3|max:150',
            'phone'      => 'required|numeric|min:3|max:150|unique:users,phone',
            'active'     => 'sometimes',
            'image'      => 'sometimes|image',
            'referral_percent'  => 'required|numeric',
            'max_referral_amount'  => 'required|numeric',
        ];
    }
}