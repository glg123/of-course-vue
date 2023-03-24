<?php

namespace App\Http\Controllers\Api;

use App\Models\Food;
use App\Models\Meal;
use App\Models\Package;
use App\Models\PackageMeal;
use App\Models\PackageVarient;
use App\Transformers\FoodTransform;
use App\Transformers\MealTransform;
use App\Transformers\PackageTransform;
use App\Transformers\PackageMealTransform;
use App\Transformers\PackageVarientTransform;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use Illuminate\Routing\Controller as BaseController;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;


class PackageController extends BaseController
{
    use ApiResponse;

    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => []]);
    }

    public function index () {

        $packages = Package::with('meal_plan')->activeSearch()->planSearch()->celebritySearch()->orderBy('created_at')->paginate(10);

        return response()->json(fractal()->collection($packages, new PackageTransform())
                            ->parseIncludes(['diet_plan'])
                            ->paginateWith(new IlluminatePaginatorAdapter($packages))
                            ->toArray() + ["message"=>__('messages.success'),"status"=>true]);
    }

    public function getVarients ($id) {

        $varients = PackageVarient::where('package_id',$id)->orderBy('created_at')->paginate(10);
        
        return response()->json(fractal()->collection($varients, new PackageVarientTransform())
                            ->parseIncludes(['diet_plan'])
                            ->paginateWith(new IlluminatePaginatorAdapter($varients))
                            ->toArray() + ["message"=>__('messages.success'),"status"=>true]);
    }

    public function getMeals ($id) {

        $meals = PackageMeal::where('package_id',$id)->when(request()->has('category_id'),function($query){
            return $query->where('meal_category_id',request()->get('category_id'));
        })->orderBy('created_at')->paginate(10);

        return response()->json(fractal()->collection($meals, new PackageMealTransform())
                            ->paginateWith(new IlluminatePaginatorAdapter($meals))
                            ->toArray() + ["message"=>__('messages.success'),"status"=>true]);
    }


}