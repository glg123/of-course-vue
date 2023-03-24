<?php

namespace App\Http\Controllers\Front;

use App\Enums\GeneralSettingEnum;
use App\Http\Controllers\Controller;
use App\Repositories\SettingRepository;

class PrivacyController extends Controller
{
    protected SettingRepository $settingRepository;

    public function __construct(SettingRepository $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }


    /**
     * Display Privacy Page
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $privacy = $this->settingRepository
            ->findWhere(['unique_key' => 'privacy_desc_' . app()->getLocale(), 'type' => GeneralSettingEnum::PRIVACY_TYPE])
            ->first();
        return view('front.privacy.index', compact('privacy'));
    }
}
