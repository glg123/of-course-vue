<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\MealDataTable;
use App\Models\Meal;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use App\Http\Requests\Dashboard\Meal\StoreRequest;
use App\Http\Requests\Dashboard\Meal\UpdateRequest;
use App\Models\Food;
use App\Models\MealCategory;
use App\Models\MealPlan;
use App\Repositories\MealRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller as BaseController;

class MealController extends BaseController
{
    use ApiResponse, AuthorizesRequests;
    /**
     * @var MealRepository
     */
    protected $mealRepository;

    public function __construct(MealRepository $mealRepository)
    {
        $this->middleware('auth');
        $this->mealRepository = $mealRepository;
    }

    public function index(MealDataTable $dt)
    {

        $this->authorize('view', Meal::class);

        return $dt->render('dashboard.page.meal.index', [
            'mealPlans' => MealPlan::select('id', 'name')->get()
        ]);
    }


    public function create()
    {
        return view('dashboard.page.meal.create', [
            'mealPlans' => MealPlan::select('id', 'name')->get(),
            'mealCategories' => MealCategory::select('id', 'name')->get(),
            'foods' => Food::select('id', 'name', 'code')->get(),
        ]);
    }

    public function store(StoreRequest $request)
    {

        $this->authorize('create', Meal::class);

        $meal = $this->mealRepository->create($request->validated());
        $meal->categories()->sync($request->meal_category_id);
        $meal->meal_plans()->sync($request->meal_plan_id);
        // $meal->tags()->sync(Tag::pluck('id'));
        $meal->foods()->sync($request->food_id);
        return redirect()->back()->with('success', 'تم الانشاء بنجاح');
    }

    public function edit($id)
    {
        return view('dashboard.page.meal.update', [
            'mealPlans' => MealPlan::select('id', 'name')->get(),
            'mealCategories' => MealCategory::select('id', 'name')->get(),
            'foods' => Food::select('id', 'name', 'code')->get(),
            'meal' => $this->mealRepository->findOrFail($id)
        ]);
    }

    public function update($id, UpdateRequest $request)
    {

        $this->authorize('update', Meal::class);
        $meal = $this->mealRepository->findOrFail($id);
        $this->mealRepository->update($meal, $request->validated());
        $meal->categories()->sync($request->meal_category_id);
        $meal->meal_plans()->sync($request->meal_plan_id);
        // $meal->tags()->sync(Tag::pluck('id'));
        $meal->foods()->sync($request->food_id);
        return redirect()->back()->with('success', 'تم التحديث بنجاح');
    }

    public function destroy($id)
    {

        $this->authorize('delete', Meal::class);

        $this->mealRepository->delete($this->mealRepository->findOrFail($id));

        return redirect()->back()->with('success', 'تم الجذف بنجاح');
    }
}
