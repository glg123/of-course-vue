<?php

namespace App\Http\Requests\Dashboard\Celebrity;

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
            'first_name'                => 'required|min:3|max:150',
            'active'                    => 'sometimes',
            'image'                     => 'sometimes|image',
            'commission_percent'        =>'required|numeric',
            'show_order'                =>'required|numeric',
            // 'settings'                  => 'required|array',
            // 'settings.fee'              => 'required',
            // 'settings.designation'      => 'required',
            // 'settings.certification'    => 'required',
            // 'settings.available_days'   => 'required',
            'description'               => 'required|array',
            'description.ar'            => 'required',
            'description.en'            => 'required',
        ];
    }
}