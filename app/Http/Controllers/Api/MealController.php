<?php

namespace App\Http\Controllers\Api;

use App\Models\Food;
use App\Models\Meal;
use App\Transformers\FoodTransform;
use App\Transformers\MealTransform;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use Illuminate\Routing\Controller as BaseController;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;


class MealController extends BaseController
{
    use ApiResponse;

    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => []]);
    }

    public function index () {

        $meals = Meal::with('categories','meal_plans','tags','foods')->orderBy('created_at')->paginate(10);

        return response()->json(fractal()->collection($meals, new MealTransform())
                            ->parseIncludes(['diet_plans', 'categories'])
                            ->paginateWith(new IlluminatePaginatorAdapter($meals))
                            ->toArray() + ["message"=>__('messages.success'),"status"=>true]);
    }


}