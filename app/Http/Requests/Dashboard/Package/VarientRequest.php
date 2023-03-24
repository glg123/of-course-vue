<?php

namespace App\Http\Requests\Dashboard\Package;

use Illuminate\Foundation\Http\FormRequest;

class VarientRequest extends FormRequest
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
            'package_id'             => 'required|exists:packages,id',
            'package_varients'     => 'required|array|min:1',
            'package_varients.days'     => 'required|array|min:1',
        ];
    }
}
