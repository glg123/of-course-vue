<?php

namespace App\Http\Controllers\Api;


use App\Models\Copoun;
use App\Transformers\CopounTransform;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use Illuminate\Routing\Controller as BaseController;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class CopounController extends BaseController
{
    use ApiResponse;

    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => []]);
    }

    public function index () {

        $copouns = Copoun::activeSearch()->orderBy('created_at')->paginate(10);

        return response()->json(fractal()->collection($copouns, new CopounTransform())
        ->parseIncludes(['packages', 'package_varients'])
        ->paginateWith(new IlluminatePaginatorAdapter($copouns))
        ->toArray() + ["message"=>__('messages.success'),"status"=>true]);
    }

    public function checkValidCopoun ($code) {

        $checkCopoun = Copoun::whereCode($code)->firstOrFail()->checkValidCopoun();

        if (!$checkCopoun['status']) {
            return $this->failedResponse(null,$checkCopoun['message']);
        }
        return response()->json(fractal()->item($checkCopoun['copoun'], new CopounTransform())
            ->parseIncludes(['packages', 'package_varients'])
            ->toArray() + ["message"=>__('messages.success'),"status"=>true]);
    }


}