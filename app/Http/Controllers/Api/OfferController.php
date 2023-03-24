<?php

namespace App\Http\Controllers\Api;


use App\Models\Brand;
use App\Models\Offer;
use App\Models\Copoun;
use App\Transformers\BrandTransform;
use App\Transformers\OfferTransform;
use App\Transformers\CopounTransform;
use App\Transformers\PackageTransform;
use League\Fractal\Serializer\ArraySerializer;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use Illuminate\Routing\Controller as BaseController;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class OfferController extends BaseController
{
    use ApiResponse;

    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => []]);
    }

    public function index () {

        $offers = Offer::with('copoun')->activeSearch()->copounSearch()->orderBy('created_at')->paginate(10);

        return response()->json(fractal()->collection($offers, new OfferTransform())
        ->parseIncludes(['copoun'])
        ->paginateWith(new IlluminatePaginatorAdapter($offers))
        ->toArray() + ["message"=>__('messages.success'),"status"=>true]);
    }


}