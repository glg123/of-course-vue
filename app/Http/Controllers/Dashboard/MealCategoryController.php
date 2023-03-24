<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\MealCategoryDataTable;
use App\Models\MealCategory;
use Illuminate\Support\Facades\Request;
use App\Repositories\MealCategoryRepository;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Routing\Controller as BaseController;

class MealCategoryController extends BaseController
{
    use ApiResponse, AuthorizesRequests;
    /**
     * @var MealCategoryRepository
     */
    protected $mealCategoryRepository;

    public function __construct(MealCategoryRepository $mealCategoryRepository)
    {
        $this->middleware('auth');
        $this->mealCategoryRepository = $mealCategoryRepository;
    }

    public function index(MealCategoryDataTable $dt)
    {

        $this->authorize('view', MealCategory::class);

        return $dt->render('dashboard.page.meal_category.index');
    }



    public function store(HttpRequest $request)
    {

        $this->authorize('create', MealCategory::class);

        $this->mealCategoryRepository->create($request->all());

        return redirect()->route('meal.category.index')->with('success', 'تم الانشاء بنجاح');
    }


    public function edit($id)
    {

        $mealCat = $this->mealCategoryRepository->findOrFail($id);
    }

    public function update(MealCategory $mealCat, Request $request)
    {

        $this->authorize('update', MealCategory::class);

        $mealCat = $this->mealCategoryRepository->update($mealCat, $request->all());
    }

    public function destroy($id)
    {

        $this->authorize('delete', MealCategory::class);

        $this->mealCategoryRepository->delete($this->mealCategoryRepository->findOrFail($id));

        return redirect()->route('meal.category.index')->with('success', 'تم الحذف بنجاح');
    }
}
