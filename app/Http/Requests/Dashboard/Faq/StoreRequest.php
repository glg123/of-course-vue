<?php

namespace App\Http\Requests\Dashboard\Faq;

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
            'title'      => 'sometimes',
            'show_order' => 'required|numeric',
            'question'   => 'required|min:3|max:255',
            'answer'     => 'required|min:3|max:600',
            'status'     => 'required|in:1,0',
        ];
    }
}
