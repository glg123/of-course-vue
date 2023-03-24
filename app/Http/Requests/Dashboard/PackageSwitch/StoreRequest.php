<?php

namespace App\Http\Requests\Dashboard\PackageSwitch;

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
        return [
            'package_id_from' => 'required|exists:packages,id',
            'package_varient_id_from' => 'required|exists:package_varients,id',
            'package_id_to' => 'required|exists:packages,id|different:package_id_from',
            'package_varient_id_to' => 'required|exists:package_varients,id|different:package_varient_id_from',
        ];
    }
}