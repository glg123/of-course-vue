<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required|min:3|max:255|unique:users',
            'country_code' => 'required|min:1|max:20',
            'image' => 'sometimes|nullable|mimes:jpeg,png,jpg,gif',
            'gender' => 'required|in:male,female',
            'age' => 'required|numeric',
            'birthday' => 'sometimes|nullable|date',
            'goal' =>'sometimes|nullable',
            'how_find_us'=>'sometimes|nullable',
            // 'status' => 'required',
            'tag_id' => 'sometimes|nullable|exists:tags,id',
            'addresses' => 'required|array|min:1',
            'addresses.area_id' => 'required|exists:locations,id',
            'addresses.block_id' => 'required|exists:locations,id',
            'addresses.map_lat' => 'sometimes|nullable',
            'addresses.map_long' => 'sometimes|nullable',
            'addresses.map_zoom' => 'sometimes|nullable',
            'addresses.address' => 'required|array|min:1',
            'addresses.time'=>'required|in:evening,morning',
            'password' => 'required|string|min:8|confirmed',
            'employee_code' => 'sometimes|nullable|exists:referral_users,code',
            'contact_method_id' => 'sometimes|nullable|exists:contact_methods,id',
            'role' => 'required|string|in:customer,driver,celebrity,dietitian',
        ];
    }
}