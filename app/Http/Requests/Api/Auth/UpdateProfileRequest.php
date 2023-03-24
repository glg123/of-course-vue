<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'first_name.ar' => 'required|max:50|min:3',
            'first_name.en' => 'required|max:50|min:3',
            'last_name' => 'required|array',
            'last_name.ar' => 'required|max:50|min:3',
            'last_name.en' => 'required|max:50|min:3',
            'email' => 'required|email|max:255|unique:users,email,'.auth('api')->id(),
            'phone' => 'required|min:3|max:255|unique:users,phone,'.auth('api')->id(),
            'country_code' => 'required|min:1|max:20',
            'image' => 'sometimes|nullable|mimes:jpeg,png,jpg,gif',
            'gender' => 'required|in:male,female',
            'age' => 'required|numeric',
            'contact_method_id' => 'sometimes|nullable|exists:contact_methods,id',
        ];
    }
}