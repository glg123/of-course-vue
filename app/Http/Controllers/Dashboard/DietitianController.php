<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\DietitianUsersDataTable;
use App\Models\User;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use App\Http\Requests\Dashboard\Dietitian\StoreRequest;
use App\Http\Requests\Dashboard\Dietitian\UpdateRequest;
use Illuminate\Routing\Controller as BaseController;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DietitianController extends BaseController
{
    use ApiResponse,AuthorizesRequests;
    /**
     * @var UserRepository
     * @var RoleRepository
    */
    protected $userRepository;
    protected $roleRepository;

    public function __construct(UserRepository $userRepository,RoleRepository $roleRepository)
    {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    public function index(DietitianUsersDataTable $dt)
    {

        $this->authorize('viewDietitian', User::class);

        return $dt->render('dashboard.page.user.dietitian.index');
    }


    public function store (StoreRequest $request) {

        $this->authorize('createDietitian', User::class);
        $this->userRepository->create($request->except(['_token','description']))->assignRole('dietitian');
        return redirect()->route('users.dietitian')->with('success', 'تم الانشاء بنجاح');
    }

    public function edit ($id) {

        $dietitian = $this->userRepository->findOrFail($id);

    }

    public function updateDietitian (User $user,UpdateRequest $request) {

        $this->authorize('updateDietitian', User::class);

        $dietitian = $this->userRepository->update($user,$request->all());
    }

    public function destroy ($id) {

        $this->authorize('deleteDietitian', User::class);

        $this->userRepository->delete($this->userRepository->findOrFail($id));

        return redirect()->route('users.dietitian')->with('success', 'تم الحذف بنجاح');

    }
}