<?php

namespace App\Http\Requests\Dashboard\Customer;

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
            'first_name' => 'required|array',
            'first_name.ar' => 'required',
            'first_name.en' => 'required',
            'last_name' => 'required|array',
            'last_name.ar' => 'required',
            'last_name.en' => 'required',
            'phone'      => 'required|min:3|max:150|unique:users,phone',
            'email'      => 'sometimes|email|unique:users,email',
            'password'   => 'required|min:8',
            'image'      => 'sometimes|image',
            'gender'  => 'required|in:male,female',
            'birthday'  => 'required|date',
            'contact_method_id'  => 'required|exists:contact_methods,id',
            'addresses'  => 'required|array',
            'addresses.area_id'  => 'required|exists:locations,id',
            'addresses.block_id'  => 'required|exists:locations,id',
        ];
    }
}
