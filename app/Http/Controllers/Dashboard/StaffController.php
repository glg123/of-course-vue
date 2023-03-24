<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\StaffUsersDataTable;
use App\Models\User;
use App\Transformers\UnitTransform;
use App\Transformers\UserTransform;
use App\Transformers\PackageTransform;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use Illuminate\Routing\Controller as BaseController;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use App\Http\Requests\Api\User\SetCelebrityPackagesRequest;
use App\Http\Requests\Dashboard\Staff\StoreRequest;
use App\Http\Requests\Dashboard\Staff\UpdateRequest;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Request;
use Spatie\Permission\Models\Role;

class StaffController extends BaseController
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

    public function index(StaffUsersDataTable $dt)
    {

        $this->authorize('viewManger', User::class);
        return $dt->render('dashboard.page.user.staff.index', ['roles' => $this->roleRepository->roleStaff()]);
    }

    public function store(StoreRequest $request)
    {

        $this->authorize('createManager', User::class);

        $this->userRepository->create($request->validated())->assignRole($request->role);

        return redirect()->route('users.staff')->with('success', 'تم الانشاء بنجاح');
    }

    public function edit($id)
    {

        $staff = $this->userRepository->findOrFail($id);
    }

    public function update(User $user, UpdateRequest $request)
    {

        $this->authorize('updateManager', User::class);

        $staff = $this->userRepository->update($user, $request->all());

        return redirect()->route('users.staff')->with('success', 'تم الانشاء بنجاح');
    }

    public function destroy($id)
    {

        $this->authorize('deleteManager', User::class);

        $this->userRepository->delete($this->userRepository->findOrFail($id));
        return redirect()->route('users.staff')->with('success', 'تم الحذف بنجاح');
    }
}
