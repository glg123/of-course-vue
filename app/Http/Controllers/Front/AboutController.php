<?php

namespace App\Http\Controllers\Front;

use App\Enums\GeneralSettingEnum;
use App\Http\Controllers\Controller;
use App\Repositories\SettingRepository;

class AboutController extends Controller
{

    protected SettingRepository $settingRepository;

    public function __construct(SettingRepository $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }


    /**
     * Display About Page
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $about = $this->settingRepository
            ->findWhere(['unique_key' => 'about_desc_' . app()->getLocale(), 'type' => GeneralSettingEnum::ABOUT_TYPE])
            ->first();
        return view('front.about.index', compact('about'));
    }
}
