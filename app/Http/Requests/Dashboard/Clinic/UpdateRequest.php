<?php

namespace App\Http\Requests\Dashboard\Clinic;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'question'    => 'required|min:3|max:250',
            'is_editable' => 'required',
            'status'      => 'required',
            'tag'         => 'required|min:3|max:250',
            'order'       => 'required|numeric',
            'frequency'   => 'required|array|min:1',
            'answer_type' => 'required|in:multi_choise,text,polar',
            'choices'     => 'sometimes|array|min:1',
        ];
    }
}