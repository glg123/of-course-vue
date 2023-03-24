<?php

namespace App\Http\Controllers\Dashboard;



use App\Http\Controllers\Api\Helpers\ApiResponse;
use App\Models\ReferralUser;
use App\Repositories\ReferralUserRepository;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Request;

class ReferralUserController extends BaseController
{
    use ApiResponse;
    /**
     * @var ReferralUserRepository
    */
    protected $referralUserRepository;

    public function __construct(ReferralUserRepository $referralUserRepository)
    {
        $this->middleware('auth');
        $this->referralUserRepository = $referralUserRepository;
    }

    public function index () {

        $this->authorize('view', ReferralUser::class);

        $referralUsers = $this->referralUserRepository->search(request()->get('query'))->paginate();
    }

    public function create () {

    }

    public function store (Request $request) {

        $this->authorize('create', ReferralUser::class);

        $referralUser = $this->referralUserRepository->create($request->all());
    }

    public function edit ($id) {

        $referralUser = $this->referralUserRepository->findOrFail($id);

    }

    public function update (ReferralUser $referralUser,Request $request) {

        $this->authorize('update', ReferralUser::class);

        $referralUser = $this->referralUserRepository->update($referralUser,$request->all());
    }

    public function destroy (ReferralUser $referralUser) {

        $this->authorize('delete', ReferralUser::class);

        $this->referralUserRepository->delete($referralUser);
    }
}