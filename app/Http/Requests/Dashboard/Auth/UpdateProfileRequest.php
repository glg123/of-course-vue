<?php

namespace App\Http\Requests\Dashboard\Auth;

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
            'first_name' => 'required|min:4',
            'last_name' => 'required|min:4',
            'email' => 'required|email|max:255|unique:users,email,'.auth('web')->id(),
            'phone' => 'required|min:3|max:255|unique:users,phone,'.auth('web')->id(),
        ];
    }
}