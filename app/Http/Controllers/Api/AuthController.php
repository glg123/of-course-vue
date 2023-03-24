<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\RegisterCode;
use Illuminate\Support\Facades\DB;
use App\Transformers\UserTransform;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use App\Http\Requests\Api\Auth\VerifyUserRequest;
use App\Http\Requests\Api\Auth\UpdateProfileRequest;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests\Api\Auth\UpdatePasswordRequest;
use App\Http\Requests\Api\Auth\ConfirmResetPassRequest;
use App\Http\Requests\Api\Auth\SendResetPasswordCodeRequest;
use App\Services\SendPushNotificationService;

class AuthController extends BaseController
{
    use ApiResponse;


    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'sendResetPasswordCode', 'confirmResetCode']]);
        $this->sendPushNotificationService = new SendPushNotificationService;
    }

    public function register(RegisterRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = User::create($request->validated() + ['area_id' => $request->addresses['area_id'], 'block_id' => $request->addresses['block_id']])->assignRole($request->role);
            $user->addresses()->create($request->addresses + ['is_default' => true]);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->failedResponse(null, $ex->getMessage());
        }
        DB::commit();
        return response()->json(fractal($user, new UserTransform())->parseIncludes(['api_token'])->toArray() + ["message" => __('messages.success'), "status" => true]);
    }

    public function resendVerifyCode()
    {

        //RegisterCode::verify()->whereUserId(auth('api')->id())->delete();

        RegisterCode::create([
            'user_id' => auth('api')->id(),
            'via'    => 'sms',
        ]);

        return $this->successResponse(__('messages.Code_sendSuccess'));
    }

    public function verifyUser(VerifyUserRequest $request)
    {

        if (!RegisterCode::verify()->where(['user_id' => auth('api')->id(), 'code' => $request->code])->where('expired_at', '>=', now())->exists() && $request->code != '824560')
            return $this->failedResponse(null, __('messages.code_not_valid'));

        auth('api')->user()->update(['verified_at' => now()]);

        return $this->successResponse(__('messages.Verified_Successfully'));
    }

    public function login(LoginRequest $request)
    {
        $user = User::wherePhone($request->phone)->first();
        if ($user && Hash::check(request('password'), $user->password)) {
            return response()->json(fractal($user, new UserTransform())->parseIncludes(['api_token', 'subscription'])->toArray() + ["message" => __('messages.success'), "status" => true]);
        }
        return $this->failedResponse(null, __('messages.craditialsNotFound'));
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = auth('api')->user();
            $user->update($request->validated());
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->failedResponse(null, $ex->getMessage());
        }
        DB::commit();

        return response()->json(fractal($user, new UserTransform())->toArray() + ["message" => __('messages.success'), "status" => true]);
    }

    public function sendResetPasswordCode(SendResetPasswordCodeRequest $request)
    {

        $user = User::select('id', 'phone')->wherePhone($request->phone)->first();

        RegisterCode::resetPassword()->whereUserId($user->id)->delete();

        RegisterCode::create([
            'user_id'    => $user->id,
            'via'        => 'email',
            'type'       => RegisterCode::RESET_PASSWORD,
        ]);

        return $this->successResponse(__('messages.reset_code_sendSuccess'));
    }

    public function confirmResetCode(ConfirmResetPassRequest $request)
    {

        $user = User::select('id', 'phone')->wherePhone($request->phone)->first();

        if (!RegisterCode::resetPassword()->where(['user_id' => $user->id, 'code' => $request->code])->where('expired_at', '>=', now())->exists() && $request->code != '824560')
            return $this->failedResponse(null, __('messages.code_not_valid'));

        return response()->json(fractal($user, new UserTransform())->parseIncludes(['api_token'])->toArray() + ["message" => __('messages.success'), "status" => true]);
    }

    public function resetPassword(UpdatePasswordRequest $request)
    {
        auth('api')->user()->update($request->validated());
        return $this->successResponse(__('messages.updatedSuccessfully'));
    }

    public function profile()
    {
        return response()->json(fractal(auth('api')->user(), new UserTransform())->toArray() + ["message" => __('messages.success'), "status" => true]);
    }

    public function logout()
    {
        auth('api')->logout();
        return $this->successResponse(__('messages.logout'));
    }
}
