<?php

namespace App\Http\Requests\Dashboard\Dietitian;

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
            'first_name'  => 'required|min:3|max:150',
            'last_name'   => 'required|min:3|max:150',
            'phone'       => 'required|numeric|unique:users,phone',
            'password'    => 'required|min:8',
            'active'      => 'sometimes',
            'image'       => 'sometimes|image',
            'settings'    => 'required|array|min:1',
            'description' => 'required|array',
            'expenses'    => 'required|numeric',
            'designation' => 'required',
            'degree'      => 'required',
            'file'        => 'sometimes|mimes:pdf|max:10000',

        ];
    }
}
