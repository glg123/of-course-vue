<?php

namespace App\Http\Controllers\Dashboard;


use App\Enums\GeneralSettingEnum;
use App\Http\Requests\Dashboard\Feature\StoreFeatureRequest;
use App\Http\Requests\Dashboard\Setting\AboutSettingRequest;
use App\Http\Requests\Dashboard\Setting\BannerBottomSettingRequest;
use App\Http\Requests\Dashboard\Setting\FeatresSettingRequest;
use App\Http\Requests\Dashboard\Setting\PrivacySettingRequest;
use App\Models\Food;
use App\Models\Tag;
use App\Models\User;
use App\Repositories\FeatureRepository;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use App\Http\Requests\Dashboard\Setting\GeneralSettingRequest;
use App\Http\Requests\Dashboard\Setting\NotificationSettingRequest;
use App\Http\Requests\Dashboard\Setting\ShiftSettingRequest;
use App\Http\Requests\Dashboard\Setting\SplashSettingRequest;
use App\Http\Requests\Dashboard\Setting\TermSettingRequest;
use App\Http\Requests\Dashboard\Setting\TutorialSettingRequest;
use App\Models\Setting;
use App\Repositories\SettingRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller as BaseController;

class SettingController extends BaseController
{
    use ApiResponse, AuthorizesRequests;
    /**
     * @var SettingRepository
     */
    protected $settingRepository;

    protected FeatureRepository $featureRepository;

    public function __construct(SettingRepository $settingRepository, FeatureRepository $featureRepository)
    {
        $this->middleware('auth');
        $this->settingRepository = $settingRepository;
        $this->featureRepository = $featureRepository;
    }

    public function generalSettings()
    {
        $this->authorize('view', Setting::class);

        $generalSettings = $this->settingRepository->findWhere(['type' => GeneralSettingEnum::GENERAL_TYPE])->groupBy('unique_key');
        $shiftSettings = $this->settingRepository->findWhere(['type' => GeneralSettingEnum::SHIFT_TYPE])->groupBy('unique_key');
        $splashSettings = $this->settingRepository->findWhere(['type' => GeneralSettingEnum::SPLASH_TYPE])->groupBy('unique_key');
        $notificationSettings = $this->settingRepository->findWhere(['type' => GeneralSettingEnum::NOTIFICATION_TYPE])->groupBy('unique_key');

        return view('dashboard.page.setting.general', compact(
            'splashSettings',
            'generalSettings',
            'notificationSettings',
            'shiftSettings'
        ));
    }

    public function updateGeneralSettings(GeneralSettingRequest $request)
    {
        $this->authorize('update', Setting::class);

        $this->settingRepository->updateSettings($this->settingRepository->handlePaymentSetting($request->except('_token')));

        return redirect()->back()->with('success', 'تم التحديث بنجاح');
    }


    /**
     * Update Shifts Setting in DB
     * @param ShiftSettingRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function updateShiftSettings(ShiftSettingRequest $request)
    {
        $this->authorize('update', Setting::class);

        $this->settingRepository->updateSettings($request->validated());

        return redirect()->back()->with('success', 'تم التحديث بنجاح');
    }


    /**
     * Update Splash Setting in DB
     * @param SplashSettingRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function updateSplashSettings(SplashSettingRequest $request)
    {
        $this->authorize('update', Setting::class);

        $this->settingRepository->updateSettings($request->validated());

        return redirect()->back()->with('success', 'تم التحديث بنجاح');
    }


    /**
     * Update Notifications Setting in DB
     * @param NotificationSettingRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function updateNotificationSettings(NotificationSettingRequest $request)
    {
        $this->authorize('update', Setting::class);

        $this->settingRepository->updateSettings($request->validated());

        return redirect()->back()->with('success', 'تم التحديث بنجاح');
    }

    public function termsSettings()
    {
        $this->authorize('view', Setting::class);

        $termsSettings = $this->settingRepository->findWhere(['type' => GeneralSettingEnum::TERM_TYPE])->groupBy('unique_key');

        return view('dashboard.page.setting.term', compact('termsSettings'));
    }

    public function updateTermSettings(TermSettingRequest $request)
    {
        $this->authorize('update', Setting::class);

        $this->settingRepository->updateSettings($request->validated());

        return redirect()->back()->with('success', 'تم التحديث بنجاح');
    }


    /**
     * Display privacy details page
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function privacySettings()
    {
        $this->authorize('view', Setting::class);

        $privacy = $this->settingRepository->findWhere(['type' => GeneralSettingEnum::PRIVACY_TYPE])->groupBy('unique_key');
        // Set title page
        $titlePage = __('translation.privacy_policy');
        return view('dashboard.page.setting.privacy', compact('privacy', 'titlePage'));
    }


    /**
     * Update privacy information
     * @param PrivacySettingRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function updatePrivacySettings(PrivacySettingRequest $request)
    {
        $this->authorize('update', Setting::class);

        $this->settingRepository->updateSettings($request->validated());

        return redirect()->back()->with('success', __('messages.updated'));
    }


    /**
     * Display about details page
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function aboutSettings()
    {
        $this->authorize('view', Setting::class);

        $about = $this->settingRepository->findWhere(['type' => GeneralSettingEnum::ABOUT_TYPE])->groupBy('unique_key');
        // Set title page
        $titlePage = __('translation.about_us');
        return view('dashboard.page.setting.about', compact('about', 'titlePage'));
    }


    /**
     * Update about information
     * @param AboutSettingRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function updateAboutSettings(AboutSettingRequest $request)
    {
        $this->authorize('update', Setting::class);

        $this->settingRepository->updateSettings($request->validated());

        return redirect()->back()->with('success', __('messages.updated'));
    }


    public function tutorialSettings()
    {
        $this->authorize('view', Setting::class);

        $tutorialSettings = $this->settingRepository->findWhere(['type' => GeneralSettingEnum::TUTORIAL_TYPE])->groupBy('unique_key');

        return view('dashboard.page.setting.tutorial', compact('tutorialSettings'));
    }

    public function updateTutorialSettings(TutorialSettingRequest $request)
    {
        $this->authorize('update', Setting::class);

        $this->settingRepository->updateSettings($request->validated());

        return redirect()->back()->with('success', 'تم التحديث بنجاح');
    }


    /**
     * Display slider details page
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function sliderAppearance()
    {
        $this->authorize('view', Setting::class);

        $generalSettings = $this->settingRepository->findWhere(['type' => GeneralSettingEnum::GENERAL_TYPE])->groupBy('unique_key');
        // Set title page
        $titlePage = __('translation.banner_home_page');
        return view('dashboard.page.setting.appearance.slider.index', compact('generalSettings', 'titlePage'));
    }


    /**
     * Update slider information
     * @param SliderSettingRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function updateSliderAppearance(SliderSettingRequest $request)
    {
        $this->authorize('update', Setting::class);

        $this->settingRepository->updateSettings($request->validated());

        return redirect()->back()->with('success', __('messages.updated'));
    }

    /**
     * Display Banner Bottom details page
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function bannerBottomAppearance()
    {
        $this->authorize('view', Setting::class);

        $generalSettings = $this->settingRepository->findWhere(['type' => GeneralSettingEnum::GENERAL_TYPE])->groupBy('unique_key');
        // Set title page
        $titlePage = __('translation.banner_bottom');
        return view('dashboard.page.setting.appearance.banner_bottom.index', compact('generalSettings', 'titlePage'));
    }


    /**
     * Update banner bottom information
     * @param BannerBottomSettingRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function updateBannerBottomAppearance(BannerBottomSettingRequest $request)
    {
        $this->authorize('update', Setting::class);

        $this->settingRepository->updateSettings($request->validated());

        return redirect()->back()->with('success', __('messages.updated'));
    }


    /**
     * Display features list page
     * @param FeatureDataTable $dt
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|mixed
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function featuresAppearance(FeatureDataTable $dt)
    {
        $this->authorize('view', Setting::class);
        $settings = $this->settingRepository->findWhere(['type' => GeneralSettingEnum::GENERAL_TYPE])->groupBy('unique_key');
        // Set title page
        $titlePage = __('translation.features');
        return $dt->render('dashboard.page.setting.appearance.features.index', compact('settings', 'titlePage'));
    }


    /**
     * Update Features Request
     * @param FeatresSettingRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function updateFeaturesAppearance(FeatresSettingRequest $request)
    {
        $this->authorize('update', Setting::class);

        $this->settingRepository->updateSettings($request->validated());

        return redirect()->back()->with('success', __('messages.updated'));
    }


    /**
     * Display Add new record feature
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function createFeature()
    {
        $this->authorize('view', Setting::class);
        // Set title page
        $titlePage = __('crud.add') . ' ' . __('translation.features');
        return view('dashboard.page.setting.appearance.features.create', compact('titlePage'));
    }


    /**
     * Insert New Record in DB
     * @param StoreFeatureRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function storeFeature(StoreFeatureRequest $request)
    {
        $this->authorize('update', Setting::class);
        $this->featureRepository->create($request->validated());
        return redirect()->route('settings.appearance.features.index')->with('success', __('messages.stored'));
    }


    /**
     * Display Details record feature
     * @param Feature $feature
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function showFeature(Feature $feature)
    {
        $this->authorize('view', Setting::class);
        // Set title page
        $titlePage = __('crud.preview') . ' ' . __('translation.feature');
        return view('dashboard.page.setting.appearance.features.show', compact('feature', 'titlePage'));
    }


    /**
     * Display edit record feature
     * @param Feature $feature
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function editFeature(Feature $feature)
    {
        $this->authorize('view', Setting::class);
        // Set title page
        $titlePage = __('crud.edit') . ' ' . __('translation.features');
        return view('dashboard.page.setting.appearance.features.edit', compact('feature', 'titlePage'));
    }


    /**
     * Update Record in DB
     * @param StoreFeatureRequest $request
     * @param Feature $feature
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function updateFeature(StoreFeatureRequest $request, Feature $feature)
    {
        $this->authorize('update', Setting::class);
        $this->featureRepository->update($feature, $request->validated());
        return redirect()->route('settings.appearance.features.index')->with('success', __('messages.updated'));
    }


    /**
     * Delete Feature From DB
     * @param Feature $feature
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function deleteFeature(Feature $feature)
    {
        $this->authorize('update', Setting::class);
        // Delete Record
        $this->featureRepository->delete($feature);
        return redirect()->route('settings.appearance.features.index')->with('success', __('messages.deleted', ['attribute' => __('translation.feature')]));
    }


    public function lang(\Illuminate\Http\Request $request, $lang)
    {

        if (!in_array($lang, ['en', 'ar'])) {
            $lang = 'ar';
        }
        \Session::put('locale', $lang);
        return back();
    }


    public function select2_customers(\Illuminate\Http\Request $request)
    {
        $search = $request->get('q', '');
        $data = User::where('status',2)
           ->where('first_name', 'like', '%'.$search.'%')
            ->orwhere('last_name', 'like', '%'.$search.'%')
            ->paginate()->toArray();
        array_unshift($data['data'], [
            'id' => 'null',
            'title' => __('root'),
        ]);
        // TODO add padding to indicate child city
        // TODO show old value in form
        return $data;
    }
    public function select2_tags(\Illuminate\Http\Request $request)
    {
        $search = $request->get('q', '');
        $data = Tag::where('name', 'like', '%'.$search.'%')
            ->paginate()->toArray();
        array_unshift($data['data'], [
            'id' => 'null',
            'title' => __('root'),
        ]);
        // TODO add padding to indicate child city
        // TODO show old value in form
        return $data;
    }


    public function select2_foods(\Illuminate\Http\Request $request)
    {
        $search = $request->get('q', '');
        $data = Food::where('name', 'like', '%'.$search.'%')
        ->orwhere('description', 'like', '%'.$search.'%')
            ->paginate()->toArray();



        array_unshift($data['data'], [
            'id' => 'null',
            'title' => __('root'),
        ]);
        // TODO add padding to indicate child city
        // TODO show old value in form
        return $data;
    }
}
