<?php

namespace App\Http\Requests\Dashboard\Setting;

use App\Enums\GeneralSettingEnum;
use App\Repositories\SettingRepository;
use Illuminate\Foundation\Http\FormRequest;

class NotificationSettingRequest extends FormRequest
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
        // Notifications Unique Keys
        $keys = (new SettingRepository)->findWhere(['type' => GeneralSettingEnum::NOTIFICATION_TYPE], ['unique_key'])
            ->pluck('unique_key')->toArray();

        // Unset enable_sms
        unset($keys['enable_sms']);
        // Set array rules validation
        $rules = [];
        // Loop on notification keys
        foreach ($keys as $key) {
            $rules[$key] = 'required|array';
            $rules["{$key}.value"] = 'required|max:255';
        }
        // Set enable sms inside rules validations
        $rules['enable_sms'] = 'required|array';
        $rules['enable_sms.value'] = 'required|in:0,1';

        return $rules;
    }

    public function getRedirectUrl()
    {
        return parent::getRedirectUrl() . '#notificationsSettings';
    }
}
