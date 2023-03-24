<?php

namespace App\Http\Requests\Dashboard\Meal;

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
            'name'             => 'required|array',
            'name.ar'          => 'required',
            'name.en'          => 'required',
            'active'           => 'sometimes',
            'image'            => 'sometimes|image',
            'in_app'           => 'sometimes',
            'code'             => 'required|unique:meals,code',
            'meal_plan_id'     => 'required|array|min:1',
            'meal_category_id' => 'required|array|min:1',
            'food_id'          => 'required|array|min:1',
            'settings'         => 'required|array|min:1',
            'variations'       => 'required|array',
            'variations.carb'  => 'required|numeric',
            'variations.fat'   => 'required|numeric',
            'variations.calories'=> 'required|numeric',
            'variations.protien' => 'required|numeric',
            'description'        => 'required|array',
            'description.ar'     => 'required',
            'description.en'     => 'required',
        ];
    }
}
