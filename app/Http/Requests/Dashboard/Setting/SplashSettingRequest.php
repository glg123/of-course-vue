<?php

namespace App\Http\Requests\Dashboard\Setting;

use App\Enums\GeneralSettingEnum;
use App\Repositories\SettingRepository;
use Illuminate\Foundation\Http\FormRequest;

class SplashSettingRequest extends FormRequest
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
        $keys = (new SettingRepository)->findWhere(['type' => GeneralSettingEnum::SPLASH_TYPE], ['unique_key'])
            ->pluck('unique_key')->toArray();
        // Set array rules validation
        $rules = [];
        // Loop on notification keys
        foreach ($keys as $key) {
            $rules[$key] = 'required|array';
            $rules["{$key}.value"] = 'required|max:600';
        }

        return $rules;
    }


    public function getRedirectUrl()
    {
        return parent::getRedirectUrl() . '#splashSettings';
    }
}
