<?php

namespace App\Http\Requests\Dashboard\Food;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdjustRequest extends FormRequest
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
            'stock'      => 'required|numeric',
            'food_id' => 'required|exists:foods,id',
            'settings' => 'required|array',
            'settings.comment' => 'required',
            'settings.old_stock' => 'required',
            'settings.created_at' => 'required|date',

        ];
    }
}
