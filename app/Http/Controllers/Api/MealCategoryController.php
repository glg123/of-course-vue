<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Helpers\ApiResponse;
use App\Models\MealCategory;
use App\Transformers\MealCategoryTransform;
use Illuminate\Routing\Controller as BaseController;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class MealCategoryController extends BaseController
{
    use ApiResponse;

    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => []]);
    }

    public function index () {   
        
        $mealCategories = MealCategory::orderBy('created_at')->paginate(10);

        return response()->json(fractal()->collection($mealCategories, new MealCategoryTransform())
        ->paginateWith(new IlluminatePaginatorAdapter($mealCategories))
        ->toArray() + ["message"=>__('messages.success'),"status"=>true]);
    }


}