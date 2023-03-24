<?php

namespace App\Http\Controllers\Api;

use App\Models\Unit;
use App\Models\User;
use App\Models\Brand;
use App\Models\RegisterCode;
use Illuminate\Support\Facades\DB;
use App\Transformers\UnitTransform;
use App\Transformers\UserTransform;
use App\Transformers\BrandTransform;
use App\Transformers\OfferTransform;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Api\Auth\LoginRequest;
use League\Fractal\Serializer\ArraySerializer;
use App\Http\Requests\Api\Auth\RegisterRequest;
use League\Fractal\Serializer\JsonApiSerializer;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use App\Models\Notification;
use App\Transformers\NotificationTransform;
use Illuminate\Routing\Controller as BaseController;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class NotificationsController extends BaseController
{
    use ApiResponse;

    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => []]);
    }

    public function index () {

        $notifications = Notification::where('user_id',auth('api')->id())->orderBy('created_at')->paginate(10);

        return response()->json(fractal()->collection($notifications, new NotificationTransform())
        ->paginateWith(new IlluminatePaginatorAdapter($notifications))
        ->toArray() + ["message"=>__('messages.success'),"status"=>true]);
    }

    public function markAsRead ($id) {

         Notification::where(['id'=>$id])->update(['read_at'=>now()]);

        return response()->json(["message"=>__('messages.success'),"status"=>true]);
    }

    public function markAllRead () {

         Notification::where(['user_id'=>auth('api')->id(),'read_at'=>null])->update(['read_at'=>now()]);

         return response()->json(["message"=>__('messages.success'),"status"=>true]);

    }


}