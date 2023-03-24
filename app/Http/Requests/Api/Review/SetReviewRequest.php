<?php

namespace App\Http\Requests\Api\Review;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SetReviewRequest extends FormRequest
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
            'type' => 'required|in:package_varients,meal,order',
            'modelable_id' => 'required|numeric',
            'score' => 'required|numeric|min:1|max:5',
            'title' => 'sometimes|nullable|min:3',
            'review' => 'required|min:3',
            'days' => 'sometimes|nullable|array',
            'variations' => 'sometimes|nullable|array',
        ];
    }
}