<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Helpers\ApiResponse;
use App\Models\Food;
use App\Transformers\FoodTransform;
use Illuminate\Routing\Controller as BaseController;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;


class FoodController extends BaseController
{
    use ApiResponse;

    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => []]);
    }

    public function index () {   
        
        $foods = Food::with('unit','brand')->orderBy('created_at')->paginate(10);

        return response()->json(fractal()->collection($foods, new FoodTransform())
        ->paginateWith(new IlluminatePaginatorAdapter($foods))
        ->toArray() + ["message"=>__('messages.success'),"status"=>true]);
    }


}