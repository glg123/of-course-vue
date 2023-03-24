<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\DriverUsersDataTable;
use App\Models\User;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use App\Http\Requests\Dashboard\Driver\StoreRequest;
use App\Http\Requests\Dashboard\Driver\UpdateRequest;
use Illuminate\Routing\Controller as BaseController;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DriverController extends BaseController
{
    use ApiResponse, AuthorizesRequests;
    /**
     * @var UserRepository
     * @var RoleRepository
     */
    protected $userRepository;
    protected $roleRepository;

    public function __construct(UserRepository $userRepository, RoleRepository $roleRepository)
    {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    public function index(DriverUsersDataTable $dt)
    {

        $this->authorize('viewDriver', User::class);

        return $dt->render('dashboard.page.user.driver.index');
    }


    public function store(StoreRequest $request)
    {

        $this->authorize('createDriver', User::class);

        $this->userRepository->create($request->validated())->assignRole('driver');

        return redirect()->route('users.driver')->with('success', 'تم الانشاء بنجاح');
    }

    public function edit($id)
    {

        $driver = $this->userRepository->findOrFail($id);
    }

    public function update(User $user, UpdateRequest $request)
    {

        $this->authorize('updateDriver', User::class);

        $driver = $this->userRepository->update($user, $request->all());
    }

    public function destroy($id)
    {

        $this->authorize('deleteDriver', User::class);

        $this->userRepository->delete($this->userRepository->findOrFail($id));

        return redirect()->route('users.driver')->with('success', 'تم الحذف بنجاح');

    }
}
