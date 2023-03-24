<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests\Dashboard\Auth\LoginRequest;
use App\Http\Requests\Dashboard\Auth\UpdatePasswordRequest;
use App\Http\Requests\Dashboard\Auth\UpdateProfileRequest;
use App\Services\SendPushNotificationService;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{
    use ApiResponse;


    public function __construct()
    {
        $this->sendPushNotificationService = new SendPushNotificationService;
    }

    public function showLogin()
    {
        return view('dashboard.auth.login');
    }


    public function login(LoginRequest $request)
    {


        if (Auth::guard('web')->attempt(['phone' => $request->phone, 'password' => $request->password])) {
            return redirect()->route('dashboard.index');
        }
        return redirect()->back()->with('error', 'هناك مشكله يرجي المحاله لاحقا');
    }

    public function profile()
    {
        return view('dashboard.page.profile.index');
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = auth('web')->user();
            $user->update($request->validated());
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->failedResponse(null, $ex->getMessage());
        }
        DB::commit();

        return redirect()->back()->with('success', 'تم التحديث بنجاح');
    }

    public function resetPassword(UpdatePasswordRequest $request)
    {
        auth('web')->user()->update($request->validated());
        auth('web')->logout();
        return redirect()->route('login');
    }




    public function logout()
    {
        auth('web')->logout();
        return redirect()->route('login');
    }
}
