<?php

namespace App\Http\Requests\Dashboard\Food;

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

            'code' => 'required|unique:foods,code',
            'category_name'   => 'required|min:3|max:250',
            'unit_id' => 'required|exists:units,id',
            'name'     => 'required|array',
            'name.ar'     => 'required',
            'name.en'     => 'required',
            'is_component'     => 'required|in:1,0',
            'is_liked'     => 'required|in:1,0',
            'variations'     => 'required|array',
            'variations.fat'     => 'required|numeric',
            'variations.protien'     => 'required|numeric',
            'variations.carb'     => 'required|numeric',
            'variations.calory'     => 'required|numeric',
            'stock_reminder'     => 'required|numeric',
        ];
    }
}
