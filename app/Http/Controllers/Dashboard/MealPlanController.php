<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\MealPlanDataTable;
use App\Models\MealPlan;
use Illuminate\Http\Request;
use App\Repositories\MealPlanRepository;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller as BaseController;

class MealPlanController extends BaseController
{
    use ApiResponse, AuthorizesRequests;
    /**
     * @var MealPlanRepository
     */
    protected $mealPlanRepository;

    public function __construct(MealPlanRepository $mealPlanRepository)
    {
        $this->middleware('auth');
        $this->mealPlanRepository = $mealPlanRepository;
    }

    public function index(MealPlanDataTable $dt)
    {

        $this->authorize('view', MealPlan::class);

        return $dt->render('dashboard.page.meal_plan.index');
    }



    public function store(Request $request)
    {

        $this->authorize('create', MealPlan::class);

        $this->mealPlanRepository->create($request->all());

        return redirect()->route('meal.plan.index')->with('success', 'تم الانشاء بنجاح');
    }


    public function edit($id)
    {

        $mealPlan = $this->mealPlanRepository->findOrFail($id);
    }

    public function update(MealPlan $mealPlan, Request $request)
    {

        $this->authorize('update', MealPlan::class);

        $mealPlan = $this->mealPlanRepository->update($mealPlan, $request->all());
    }

    public function destroy($id)
    {

        $this->authorize('delete', MealPlan::class);

        $this->mealPlanRepository->delete($this->mealPlanRepository->findOrFail($id));
        return redirect()->route('meal.plan.index')->with('success', 'تم الحذف بنجاح');
    }
}
