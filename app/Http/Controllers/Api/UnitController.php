<?php

namespace App\Http\Controllers\Api;

use App\Models\Unit;
use App\Models\User;
use App\Models\RegisterCode;
use Illuminate\Support\Facades\DB;
use App\Transformers\UnitTransform;
use App\Transformers\UserTransform;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Api\Auth\LoginRequest;
use League\Fractal\Serializer\ArraySerializer;
use App\Http\Requests\Api\Auth\RegisterRequest;
use League\Fractal\Serializer\JsonApiSerializer;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use Illuminate\Routing\Controller as BaseController;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class UnitController extends BaseController
{
    use ApiResponse;

    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => []]);
    }

    public function index () {

        $units = Unit::orderBy('created_at')->paginate(10);

        return response()->json(fractal()->collection($units, new UnitTransform())
        ->paginateWith(new IlluminatePaginatorAdapter($units))
        ->toArray() + ["message"=>__('messages.success'),"status"=>true]);
    }


}