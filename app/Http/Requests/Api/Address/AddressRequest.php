<?php

namespace App\Http\Requests\Api\Address;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'area_id' => 'sometimes|nullable|exists:locations,id',
            'block_id' => 'sometimes|nullable|exists:locations,id',
            'map_lat' => 'sometimes|nullable',
            'map_long' => 'sometimes|nullable',
            'map_zoom' => 'sometimes|nullable',
            'address' => 'required|array|min:1',
            'time'=>'required|in:evening,morning',
        ];
    }
}