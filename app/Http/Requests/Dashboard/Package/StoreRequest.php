<?php

namespace App\Http\Requests\Dashboard\Package;

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
            'description'        => 'required|array',
            'description.ar'     => 'required',
            'description.en'     => 'required',
            'status'           => 'sometimes',
            'image'            => 'sometimes|image',
            'is_celebrity'           => 'sometimes',
            'start_at'             => 'required|date',
            'package_varients'     => 'required|array|min:1',
            'package_varients.days'     => 'required|array|min:1',
            'package_meals' => 'required|array|min:1',
            'package_meals' => 'required|array|min:1',
            'show_order'         => 'required|numeric',
            'variations'       => 'required|array',
            'variations.carbs'  => 'required|numeric',
            // 'variations.calories'=> 'required|numeric',
            'variations.protien' => 'required|numeric',

        ];
    }
}
