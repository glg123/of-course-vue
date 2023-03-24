<?php

namespace App\Http\Requests\Dashboard\Location;

use Illuminate\Foundation\Http\FormRequest;

class ZoneDriverRequest extends FormRequest
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
            'zone_id'  => 'required|exists:zones,id',
            'morning_driver_id'  => 'sometimes|nullable|exists:users,id',
            'evening_driver_id'  => 'sometimes|nullable|exists:users,id',
        ];
    }
}