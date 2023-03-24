<?php

use App\Enums\HeaderTypeEnum;
use App\Models\UserSubscription;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

if (!function_exists('generalSetting')) {
    /**
     * Return Setting value
     *
     * @param string $key
     * @return Store|mixed
     */
    function generalSetting(string $key, $column = null)
    {
        return $column ? app('general_settings')[$key]->first()->$column : app('general_settings')[$key]->first();
    }
}
if (!function_exists('activeRoute')) {
    /**
     * Return Setting value
     *
     * @param string $key
     * @return Store|mixed
     */
    function activeRoute($name = null)
    {
        return Route::current()->getName() == $name ? 'mm-active' : '';
    }
}

if (!function_exists('activeSubRoute')) {
    /**
     * Return Setting value
     *
     * @param string $key
     * @return Store|mixed
     */
    function activeSubRoute($name = null)
    {
        return Route::current()->getName() == $name ? 'active' : '';
    }
}

if (!function_exists('headerTypeActive')) {

    function headerTypeActive(string $type, int $equal)
    {
        return HeaderTypeEnum::fromKey($type)->value == $equal ? 'activeBtn' : '';
    }
}

if (!function_exists('labelColor')) {
    function labelColor(string $label)
    {
        return config('status_color.' . $label);
    }
}

if (!function_exists('str_limit')) {
    function str_limit($string, $length = 100, $end = '...')
    {
        return Str::limit($string, $length, $end);
    }
}

if (!function_exists('isSubscriber')) {
    function isSubscriber()
    {
        return UserSubscription::where([
            'user_id' => auth('api')->id(),
            'active' => true,
        ])->where(function ($q) {
            $q->where('start_at', '<=', Carbon::now())->where('end_at', '>=', Carbon::now());
        })->exists();
    }
}
