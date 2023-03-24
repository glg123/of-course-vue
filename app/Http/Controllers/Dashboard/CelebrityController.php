<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\CelebrityUsersDataTable;
use App\Models\User;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use App\Http\Requests\Dashboard\Celebrity\StoreRequest;
use App\Http\Requests\Dashboard\Celebrity\UpdateRequest;
use Illuminate\Routing\Controller as BaseController;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CelebrityController extends BaseController
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

    public function index(CelebrityUsersDataTable $dt)
    {

        $this->authorize('viewCelebrity', User::class);

        return $dt->render('dashboard.page.user.celebrity.index');
    }


    public function store (StoreRequest $request) {

        $this->authorize('createCelebrity', User::class);

        $this->userRepository->create($request->validated())->assignRole('celebrity');

        return redirect()->route('users.celebrity')->with('success', 'تم الانشاء بنجاح');
    }

    public function edit ($id) {

        $celebrity = $this->userRepository->findOrFail($id);

    }

    public function update (User $user,UpdateRequest $request) {

        $this->authorize('updateCelebrity', User::class);

        $celebrity = $this->userRepository->update($user,$request->all());
    }

    public function destroy ($id) {

        $this->authorize('deleteCelebrity', User::class);

        $this->userRepository->delete($this->userRepository->findOrFail($id));
        return redirect()->route('users.celebrity')->with('success', 'تم الحذف بنجاح');

    }
}