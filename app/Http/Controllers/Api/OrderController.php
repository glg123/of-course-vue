<?php

namespace App\Http\Controllers\Api;


use App\Models\User;
use App\Models\Order;
use App\Models\Package;
use App\Models\Referral;
use App\Models\ReferralUser;
use App\Models\ReferralTransaction;
use App\Transformers\OrderTransform;
use App\Transformers\ReferralTransform;
use App\Transformers\ReferralUserTransform;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use App\Http\Requests\Api\Order\MakeOrderRequest;
use App\Transformers\ReferralTransactionsTransform;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests\Api\Order\UpdateOrderStatusRequest;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;


class OrderController extends BaseController
{
    use ApiResponse;

    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => []]);
    }

    public function index () {
        
        $orders = Order::statusSearch()->typeSearch()->userSearch()->deliverySearch()->shiftSearch()->tagSearch()->orderBy('created_at')->paginate(10);

        return response()->json(fractal()->collection($orders, new OrderTransform())
                             ->parseIncludes(['user'])
                            ->paginateWith(new IlluminatePaginatorAdapter($orders))
                            ->toArray() + ["message"=>__('messages.success'),"status"=>true]);
    }

    public function show ($id) {
        return response()->json(fractal()->item(Order::findOrFail($id), new OrderTransform())
                             ->parseIncludes(['user','trainer','delivery','meal','meals','package_varient','user_subscription'])
                            ->toArray() + ["message"=>__('messages.success'),"status"=>true]);
    }

    public function makeOrder (MakeOrderRequest $request) {
        return response()->json(fractal()->item(Order::create($request->validated()+['user_id'=>auth('api')->id()]), new OrderTransform())
                            ->parseIncludes(['user','trainer','delivery','meal','meals','package_varient','user_subscription'])
                            ->toArray() + ["message"=>__('messages.success'),"status"=>true]);
    }

    public function updateOrder ($id,MakeOrderRequest $request) {
        $order = Order::findOrFail($id);
        $order->update($request->validated());

        return response()->json(fractal()->item($order, new OrderTransform())
                            ->parseIncludes(['user','trainer','delivery','meal','meals','package_varient','user_subscription'])
                            ->toArray() + ["message"=>__('messages.success'),"status"=>true]);
    }
    public function updateOrderStatus ($id,UpdateOrderStatusRequest $request) {
        $order = Order::findOrFail($id);
        $order->update($request->validated());
        return response()->json(fractal()->item($order, new OrderTransform())
                            ->parseIncludes(['user','trainer','delivery','meal','meals','package_varient','user_subscription'])
                            ->toArray() + ["message"=>__('messages.success'),"status"=>true]);
    }


}