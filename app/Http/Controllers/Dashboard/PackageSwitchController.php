<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Package;
use App\Models\PackageSwitch;
use Illuminate\Support\Facades\Request;
use App\Repositories\PackageSwitchRepository;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use App\Http\Requests\Dashboard\PackageSwitch\StoreRequest;
use App\Models\PackageVarient;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Routing\Controller as BaseController;

class PackageSwitchController extends BaseController
{
    use ApiResponse, AuthorizesRequests;
    /**
     * @var PackageSwitchRepository
     */
    protected $packageSwitchRepository;

    public function __construct(PackageSwitchRepository $packageSwitchRepository)
    {
        $this->middleware('auth');
        $this->packageSwitchRepository = $packageSwitchRepository;
    }

    public function index()
    {
        $this->authorize('view', PackageSwitch::class);

        return view(
            'dashboard.page.package_switch.index',
            [
                'packages' => Package::select('id', 'name')->get(),
                'packageSwitches' => PackageSwitch::with('packageFrom:id,name', 'varientFrom:id,name', 'packageTo:id,name', 'varientTo:id,name')->get()
            ]
        );
    }
    public function getVarients($id)
    {
        $items = PackageVarient::where('package_id', $id)->select('id', 'name')->get();
        return view('dashboard.page.package_switch.select.select', compact('items'))->render();
    }




    public function store(StoreRequest $request)
    {

        $this->authorize('create', PackageSwitch::class);

        $this->packageSwitchRepository->create($request->validated());

        return redirect()->back()->with('success', 'تم الانشاء بنجاح');
    }


    public function update(HttpRequest $request)
    {

        $this->authorize('update', PackageSwitch::class);
        foreach (PackageSwitch::when(is_array($request->ids), function ($q) use ($request) {
            return $q->whereIn('id', $request->ids);
        })->when(!$request->ids && !$request->type == 'all', function ($q) use ($request) {
            return $q->where('id', 0);
        })->get() as $entity) {
            $this->packageSwitchRepository->swap($entity);
        }
        return redirect()->back()->with('success', 'تم التبديل بنجاح');
    }

    public function destroy($id)
    {

        $this->authorize('delete', PackageSwitch::class);

        $this->packageSwitchRepository->delete($this->packageSwitchRepository->findOrFail($id));

        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }
}
