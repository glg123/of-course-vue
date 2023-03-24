<?php

namespace App\Http\Controllers\Api;

use App\Models\Unit;
use App\Models\User;
use App\Transformers\UnitTransform;
use App\Transformers\UserTransform;
use App\Transformers\PackageTransform;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use App\Http\Requests\Api\Address\AddressRequest;
use Illuminate\Routing\Controller as BaseController;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use App\Http\Requests\Api\User\SetCelebrityPackagesRequest;
use App\Models\Address;
use App\Transformers\UserAddressTransform;

class UserAddressesController extends BaseController
{
    use ApiResponse;

    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => []]);
    }

    public function index()
    {

        $addresses = Address::where('user_id', auth('api')->id())->orderBy('created_at')->paginate(10);

        return response()->json(fractal()->collection($addresses, new UserAddressTransform())
            ->paginateWith(new IlluminatePaginatorAdapter($addresses))
            ->toArray() + ["message" => __('messages.success'), "status" => true]);
    }

    public function store(AddressRequest $request)
    {
        return response()->json(fractal()->item(auth('api')->user()->addresses()->create($request->validated()), new UserAddressTransform())
            ->toArray() + ["message" => __('messages.success'), "status" => true]);
    }

    public function update($id, AddressRequest $request)
    {

        $address = Address::findOrFail($id);
        $address->update($request->validated());
        return response()->json(fractal()->item($address, new UserAddressTransform())
            ->toArray() + ["message" => __('messages.success'), "status" => true]);
    }

    public function setDefaultRequest($id)
    {
        $address = Address::findOrFail($id);
        Address::where([
            'user_id' => auth('api')->id(),
            'default_requested' => true,
        ])->update(['default_requested' => false]);
        $address->update(['default_requested' => true]);

        return response()->json(fractal()->item($address, new UserAddressTransform())
            ->toArray() + ["message" => __('messages.success'), "status" => true]);
    }

    public function delete($id)
    {
        $address = Address::findOrFail($id);
        if ($address->is_default) {
            return $this->failedResponse(null, 'the address is main can not delete it');
        }
        $address->delete();
        return $this->successResponse(null, 'deleted Successfully');
    }
}
