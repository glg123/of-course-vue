<?php

namespace App\Http\Controllers\Api;



use App\Models\UserSubscription;
use App\Models\DietitianAppointment;
use App\Transformers\UserSubscriptionsTransform;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use App\Transformers\DietitianAppointmentTransform;
use Illuminate\Routing\Controller as BaseController;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use App\Http\Requests\Api\Appointment\SetAppointmentRequest;
use App\Http\Requests\Api\UserSubscription\SetSubscriptionRequest;

class UserSubscriptionController extends BaseController
{
    use ApiResponse;

    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => []]);
    }

    public function index()
    {

        $userSubscriptions = UserSubscription::statusSearch()->activeSearch()->userSearch()->trainerSearch()->orderBy('created_at')->paginate(10);

        return response()->json(fractal()->collection($userSubscriptions, new UserSubscriptionsTransform())
            ->parseIncludes(['user', 'trainer', 'package', 'package_varient'])
            ->paginateWith(new IlluminatePaginatorAdapter($userSubscriptions))
            ->toArray() + ["message" => __('messages.success'), "status" => true]);
    }

    public function setSubscription(SetSubscriptionRequest $request)
    {
        if (isSubscriber()) {
            return $this->failedResponse(null, 'You Are Arleady Subscribe In Package');
        }
        return response()->json(fractal()->item(UserSubscription::create($request->validated() + ['user_id' => auth('api')->id()]), new UserSubscriptionsTransform())
            ->parseIncludes(['user', 'package', 'package_varient'])
            ->toArray() + ["message" => __('messages.success'), "status" => true]);
    }
}
