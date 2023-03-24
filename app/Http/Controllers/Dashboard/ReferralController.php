<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\ReferralTypeDataTable;
use App\DataTables\ReferralUserDataTable;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use App\Models\Package;
use App\Models\PackageVarient;
use App\Models\Referral;
use App\Models\Setting;
use App\Repositories\ReferralRepository;
use App\Repositories\SettingRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ReferralController extends BaseController
{
    use ApiResponse, AuthorizesRequests;

    /**
     * @var ReferralRepository
     */
    protected $referralRepository;

    public function __construct(ReferralRepository $referralRepository)
    {
        $this->middleware('auth');
        $this->referralRepository = $referralRepository;
    }

    public function index(ReferralUserDataTable $dt, Request $request)
    {

       // dd($request->all());
        $this->authorize('view', Referral::class);

        return $dt->render('dashboard.page.referral.user.index', with(['referralSettings' => Setting::whereType('referral')->get()]));
    }

    public function updateSetting(Request $request)
    {

        $this->authorize('update', Referral::class);

        (new SettingRepository)->updateSettings($request->except('_token'));

        return redirect()->back()->with('success', 'تم التحديث بنجاح');
    }

    public function referralType(ReferralTypeDataTable $dt)
    {

        $packages=Package::where('status',1)->get();

        $package_varient=PackageVarient::get();
        $this->authorize('view', Referral::class);

        return $dt->render('dashboard.page.referral.type.index',compact('packages','package_varient'));
    }


    public function referralTypeStore(Request $request)
    {

        $this->authorize('update', Referral::class);

        $referral = $this->referralRepository->create($request->all());
        return redirect()->back()->with('success', __('views.created'));
    }

    public function destroy(Referral $referral,$id)
    {

        $this->authorize('delete', Referral::class);

        $referral_deleted=  $this->referralRepository->delete($referral->find($id));

        return redirect()->back()->with('success', __('views.deleted'));
    }
}
