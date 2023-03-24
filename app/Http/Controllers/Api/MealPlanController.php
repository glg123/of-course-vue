<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Helpers\ApiResponse;
use App\Models\MealPlan;
use App\Transformers\MealPlanTransform;
use Illuminate\Routing\Controller as BaseController;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class MealPlanController extends BaseController
{
    use ApiResponse;

    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => []]);
    }

    public function index () {   
        
        $mealPlans = MealPlan::orderBy('created_at')->paginate(10);

        return response()->json(fractal()->collection($mealPlans, new MealPlanTransform())
        ->paginateWith(new IlluminatePaginatorAdapter($mealPlans))
        ->toArray() + ["message"=>__('messages.success'),"status"=>true]);
    }


}