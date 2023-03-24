<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\MealDataTable;
use App\DataTables\PackageDataTable;
use App\DataTables\PackageVarientDataTable;
use App\Models\Meal;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use App\Http\Requests\Dashboard\Package\StoreRequest;
use App\Http\Requests\Dashboard\Package\UpdateRequest;
use App\Http\Requests\Dashboard\Package\VarientRequest;
use App\Models\Food;
use App\Models\MealCategory;
use App\Models\MealPlan;
use App\Models\Package;
use App\Models\PackageMeal;
use App\Models\PackageVarient;
use App\Repositories\PackageRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class PackageController extends BaseController
{
    use ApiResponse, AuthorizesRequests;
    /**
     * @var PackageRepository
     */
    protected $packageRepository;

    public function __construct(PackageRepository $packageRepository)
    {
        $this->middleware('auth');
        $this->packageRepository = $packageRepository;
    }

    public function index(PackageDataTable $dt)
    {

        $this->authorize('view', Package::class);

        return $dt->render('dashboard.page.package.index');
    }


    public function create()
    {
        return view('dashboard.page.package.create', [
            'mealCategories' => MealCategory::with('meals')->get(),
        ]);
    }

    public function store(StoreRequest $request)
    {

        $this->authorize('create', Package::class);

        $this->packageRepository->create($request->validated() + ['status' => true]);

        return redirect()->back()->with('success', 'تم الانشاء بنجاح');
    }

    public function edit($id)
    {
        return view('dashboard.page.package.update', [
            'mealCategories' => MealCategory::with('meals')->get(),
            'package' => $this->packageRepository->findOrFail($id)
        ]);
    }

    public function update($id, UpdateRequest $request)
    {

        $this->authorize('update', Package::class);
        $this->packageRepository->update($this->packageRepository->findOrFail($id), $request->validated() + ['status' => true]);

        return redirect()->back()->with('success', 'تم التحديث بنجاح');
    }

  


    public function destroy($id)
    {

        $this->authorize('delete', Package::class);

        $this->packageRepository->delete($this->packageRepository->findOrFail($id));

        return redirect()->back()->with('success', 'تم الجذف بنجاح');
    }

    public function showVarients(PackageVarientDataTable $dt)
    {

        $this->authorize('view', Package::class);

        return $dt->render('dashboard.page.package.varients.index');
    }
    public function createVarients($id)
    {
        return view('dashboard.page.package.varients.create', [
            'mealCategories' => MealCategory::with('meals')->get(),
            'package' => $this->packageRepository->findOrFail($id),
        ]);
    }

    public function storeVarients(VarientRequest $request)
    {

        $this->authorize('create', Package::class);

        $this->packageRepository->createVarients($request->validated());

        return redirect()->back()->with('success', 'تم الانشاء بنجاح');
    }

    public function editVarients($id)
    {
        return view('dashboard.page.package.varients.update', [
            'mealCategories' => MealCategory::select('id', 'name')->get(),
            'varient' =>  PackageVarient::findOrFail($id)
        ]);
    }

    public function updateVarients($id, VarientRequest $request)
    {
        $this->authorize('update', Package::class);
        $this->packageRepository->updateVarients(PackageVarient::findOrFail($id), $request->validated());

        return redirect()->back()->with('success', 'تم التحديث بنجاح');
    }

  


    public function destroyVarients($id)
    {

        $this->authorize('delete', Package::class);

        PackageVarient::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'تم الجذف بنجاح');
    }

}
