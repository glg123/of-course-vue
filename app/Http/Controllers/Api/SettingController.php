<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Helpers\ApiResponse;
use App\Models\Setting;
use App\Transformers\SettingTransform;
use Illuminate\Routing\Controller as BaseController;

class SettingController extends BaseController
{
    use ApiResponse;

    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => []]);
    }

    public function index () {

        $settings = Setting::typeSearch()->get();

        return response()->json(fractal()->collection($settings, new SettingTransform())
        ->toArray() + ["message"=>__('messages.success'),"status"=>true]);
    }


}