<?php

namespace App\Http\Requests\Api\Order;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class MakeOrderRequest extends FormRequest
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
            'delivery_id' => 'sometimes|nullable|exists:users,id',
            'trainer_id' => 'sometimes|nullable|exists:users,id',
            'meal_id' => 'sometimes|nullable|exists:meals,id',
            'package_varient_id' => 'sometimes|nullable|exists:package_varients,id',
            'user_subscription_id' => 'sometimes|nullable|exists:user_subscriptions,id',
            'tag_id' => 'sometimes|nullable|exists:tags,id',
            'tag' => 'sometimes|nullable|min:3',
            'shift_time' => 'required|in:evening,morning',
            'status' => 'required',
            'comment' => 'sometimes|nullable|min:3',
            'delivery_cost' => 'sometimes|nullable|numeric',
            'price' => 'sometimes|nullable|numeric',
            'discount' => 'sometimes|nullable|numeric',
            'total' => 'sometimes|nullable|numeric',
            'start_at' => 'required|date_format:Y-m-d H:i',
            'delivery_at' => 'sometimes|nullable|date_format:Y-m-d H:i',
            'type' => 'required|in:delivery',
            'image' => 'sometimes|nullable|image',
            'area_id' => 'required|exists:locations,id',
            'block_id' => 'required|exists:locations,id',
            'zone_id' => 'required|exists:zones,id',
            'address' => 'required|array',
            'address.*' => 'required',
            'days' => 'array',
            'meals' => 'sometimes|nullable|array',
            'meals.*' => 'exists:meals,id',
            'variations' => 'sometimes|nullable|array',
        ];
    }
}