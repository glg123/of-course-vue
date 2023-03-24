<?php

namespace App\Http\Controllers\Api;

use App\Models\Unit;
use App\Models\User;
use App\Transformers\UnitTransform;
use App\Transformers\UserTransform;
use App\Transformers\PackageTransform;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use Illuminate\Routing\Controller as BaseController;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use App\Http\Requests\Api\User\SetCelebrityPackagesRequest;

class UserController extends BaseController
{
    use ApiResponse;

    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => []]);
    }

    public function index () {

        $users = User::roleSearch()->orderBy('created_at')->paginate(10);

        return response()->json(fractal()->collection($users, new UserTransform())
        ->paginateWith(new IlluminatePaginatorAdapter($users))
        ->toArray() + ["message"=>__('messages.success'),"status"=>true]);
    }

    public function getCelebrityPackages ($id) {

        $user = User::findOrFail($id);

        if (!$user->hasRole('celebrity'))
            return $this->failedResponse(null,'User Is Not Have Right Access');

        return response()->json(fractal()->collection($user->celebrity_packages, new PackageTransform())
        // ->parseIncludes(['varients'])
        ->toArray() + ["message"=>__('messages.success'),"status"=>true]);
    }

    public function setCelebrityPackages (SetCelebrityPackagesRequest $request) {

        $user = User::findOrFail($request->celebrity_id);

        if (!$user->hasRole('celebrity'))
            return $this->failedResponse(null,'User Is Not Have Right Access');

        $user->celebrity_packages()->sync($request->packages);

        return response()->json(fractal()->item($user, new UserTransform())
        ->parseIncludes(['celebrity_packages'])
        ->toArray() + ["message"=>__('messages.success'),"status"=>true]);
    }
}