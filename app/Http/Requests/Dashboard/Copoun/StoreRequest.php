<?php

namespace App\Http\Requests\Dashboard\Copoun;

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
            'name'    => 'required|array',
            'name.ar' => 'required|min:3',
            'name.en' => 'required|min:3',
            'code'    => 'required|unique:copouns,code',
            'discount_type'    => 'required|in:amount,percent',
            'discount'    => 'required|numeric',
            'max_use'    => 'required|numeric',
            'start_at'    => 'required|date',
            'end_at'    => 'required|date',
            'status'    => 'sometimes',
        ];
    }
}
