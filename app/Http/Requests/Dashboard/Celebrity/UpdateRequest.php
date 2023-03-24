<?php

namespace App\Http\Requests\Dashboard\Celebrity;

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
            'first_name'         => 'required|min:3|max:150',
            'last_name'          => 'required|min:3|max:150',
            'phone'              => 'required|numeric|min:3|max:150|unique:users,phone',
            'active'             => 'sometimes',
            'image'              => 'sometimes|image',
            'show_order'         => 'sometimes|numeric',
            'description'        => 'required|array',
            'description.ar'     => 'required',
            'description.en'     => 'required',
            'commission_percent' => 'required|numeric',
        ];
    }
}