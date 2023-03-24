<?php

namespace App\Http\Controllers\Front;

use App\Enums\GeneralSettingEnum;
use App\Http\Controllers\Controller;
use App\Repositories\SettingRepository;
use Illuminate\Http\Request;

class TermsController extends Controller
{
    protected SettingRepository $settingRepository;

    public function __construct(SettingRepository $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    public function index()
    {
        $termsSettings = $this->settingRepository
            ->findWhere(['unique_key' => 'term_desc_' . app()->getLocale(), 'type' => GeneralSettingEnum::TERM_TYPE])
            ->first();
        return view('front.terms.index', compact('termsSettings'));
    }

}
