<?php

namespace App\Http\Controllers\Api;

use App\Models\Food;
use App\Models\Meal;
use App\Models\User;
use App\Models\Package;
use App\Models\Referral;
use App\Models\PackageMeal;
use App\Models\ReferralUser;
use App\Models\PackageVarient;
use App\Models\ReferralTransaction;
use App\Transformers\FoodTransform;
use App\Transformers\MealTransform;
use App\Transformers\PackageTransform;
use App\Transformers\ReferralTransform;
use App\Transformers\PackageMealTransform;
use App\Transformers\ReferralUserTransform;
use App\Transformers\PackageVarientTransform;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use App\Transformers\ReferralTransactionsTransform;
use Illuminate\Routing\Controller as BaseController;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;


class ReferralController extends BaseController
{
    use ApiResponse;

    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => []]);
    }

    public function index () {

        $referrals = Referral::activeSearch()->orderBy('created_at')->paginate(10);

        return response()->json(fractal()->collection($referrals, new ReferralTransform())
                            ->paginateWith(new IlluminatePaginatorAdapter($referrals))
                            ->toArray() + ["message"=>__('messages.success'),"status"=>true]);
    }

    public function getReferralUsers () {

        $referralUsers = ReferralUser::activeSearch()->userSearch()->orderBy('created_at')->paginate(10);

        return response()->json(fractal()->collection($referralUsers, new ReferralUserTransform())
                            ->parseIncludes(['user'])
                            ->paginateWith(new IlluminatePaginatorAdapter($referralUsers))
                            ->toArray() + ["message"=>__('messages.success'),"status"=>true]);
    }

    public function setReferralUser (User $user) {
        return response()->json(fractal()->item(ReferralUser::firstOrCreate(['user_id'=>$user->id],['reference_id'=>rand(1,1000)]), new ReferralUserTransform())
                            ->toArray() + ["message"=>__('messages.success'),"status"=>true]);
    }

    public function getReferralUserTransactions () {
        $referralUserTrans = ReferralTransaction::userSearch()->referralSearch()->referralUserSearch()->orderBy('created_at')->paginate(10);

        return response()->json(fractal()->collection($referralUserTrans, new ReferralTransactionsTransform())
                            ->parseIncludes(['user','referral_user','referral'])
                            ->paginateWith(new IlluminatePaginatorAdapter($referralUserTrans))
                            ->toArray() + ["message"=>__('messages.success'),"status"=>true]);
    }


}