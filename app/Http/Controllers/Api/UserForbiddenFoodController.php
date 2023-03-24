<?php

namespace App\Http\Controllers\Api;


use App\Models\DietitianAppointment;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use App\Transformers\DietitianAppointmentTransform;
use Illuminate\Routing\Controller as BaseController;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use App\Http\Requests\Api\Appointment\SetAppointmentRequest;
use App\Http\Requests\Api\ForbiddenFood\SetFoodRequest;
use App\Models\UserForbiddenFood;
use App\Transformers\UserFoodForbiddenTransform;

class UserForbiddenFoodController extends BaseController
{
    use ApiResponse;

    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => []]);
    }

    public function index () {

        $forbiddens = UserForbiddenFood::userSearch()->typeSearch()->orderBy('created_at')->paginate(10);

        return response()->json(fractal()->collection($forbiddens, new UserFoodForbiddenTransform())
        ->parseIncludes(['user','food'])
        ->paginateWith(new IlluminatePaginatorAdapter($forbiddens))
        ->toArray() + ["message"=>__('messages.success'),"status"=>true]);
    }

    public function setFood (SetFoodRequest $request) {

        return response()->json(fractal()->item(UserForbiddenFood::updateOrCreate($request->validated()+['user_id'=>auth('api')->id()],[]), new UserFoodForbiddenTransform())
                ->parseIncludes(['user','food'])
                ->toArray() + ["message"=>__('messages.success'),"status"=>true]);
    }


}