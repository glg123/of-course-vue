<?php

namespace App\Http\Requests\Api\ForbiddenFood;

use Illuminate\Foundation\Http\FormRequest;

class SetFoodRequest extends FormRequest
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
            'type' => 'required|in:1,2',
            'food_id' => 'required|exists:foods,id',
        ];
    }
}