<?php

namespace App\Http\Requests\Api\UserSubscription;

use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\RequiredIf;

class SetSubscriptionRequest extends FormRequest
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
            'package_id' => 'required|exists:packages,id',
            'package_varient_id' => 'required|exists:package_varients,id',
            'trainer_id' => 'sometimes|exists:users,id',
            'copoun_id' => 'sometimes|exists:copouns,id',
            'offer_id' => 'sometimes|exists:offers,id',
            'referral_code' => 'sometimes|' . Rule::exists('referral_users', 'code')->where('active', true),
            'status' => 'sometimes',
            'discount' => 'sometimes|numeric|' . new RequiredIf($this->offer_id || $this->copoun_id),
            'qty' => 'sometimes|numeric',
            'start_at' => 'required|date_format:Y-m-d|before:end_at|after:' . Carbon::now()->addDay(),
            'end_at' => 'required|date_format:Y-m-d',
            'type' => 'required|in:offline,visa'
        ];
    }
}
