<?php

namespace App\Http\Requests\Api\Clinic;

use Illuminate\Foundation\Http\FormRequest;

class SetAnswerRequest extends FormRequest
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
            'answer' => 'required',
            'clinic_id' => 'required|exists:clinics,id'
        ];
    }
}