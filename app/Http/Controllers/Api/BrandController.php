<?php

namespace App\Http\Controllers\Api;

use App\Models\Brand;
use App\Transformers\BrandTransform;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use Illuminate\Routing\Controller as BaseController;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class BrandController extends BaseController
{
    use ApiResponse;

    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => []]);
    }

    public function index () {

        $brands = Brand::orderBy('created_at')->paginate(10);

        return response()->json(fractal()->collection($brands, new BrandTransform())
        ->paginateWith(new IlluminatePaginatorAdapter($brands))
        ->toArray() + ["message"=>__('messages.success'),"status"=>true]);
    }


}