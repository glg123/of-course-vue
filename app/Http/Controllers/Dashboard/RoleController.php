<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\RoleDataTable;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use App\Http\Requests\Dashboard\Role\StoreRequest;
use App\Http\Requests\Dashboard\Role\UpdateRequest;
use App\Repositories\RoleRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends BaseController
{
    use ApiResponse, AuthorizesRequests;
    /**
     * @var RoleRepository
     */
    protected $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->middleware('auth');
        $this->roleRepository = $roleRepository;
    }

    public function index(RoleDataTable $dt)
    {

        $this->authorize('view', Role::class);
        return $dt->render('dashboard.page.role.index');
    }

    public function create()
    {
        $this->authorize('create', Role::class);
        $salePermissions = Permission::where('group', 'sales')->get()->groupBy('type');
        $operationPermissions = Permission::where('group', 'operations')->get()->groupBy('type');
        $reportPermissions = Permission::where('group', 'reports')->get()->groupBy('type');
        $settingPermissions = Permission::where('group', 'settings')->get()->groupBy('type');

        return view('dashboard.page.role.create', compact('salePermissions', 'operationPermissions', 'reportPermissions', 'settingPermissions'));
    }

    public function store(StoreRequest $request)
    {

        $this->authorize('create', Role::class);
        $role = $this->roleRepository->create($request->only('name') + ['guard_name' => 'web'])->syncPermissions($request->permissions);
        return redirect()->route('roles.index')->with('success', 'تم الانشاء بنجاح');
    }

    public function edit($id)
    {
        $this->authorize('update', Role::class);

        $role = $this->roleRepository->findOrFail($id);
        $salePermissions = Permission::where('group', 'sales')->get()->groupBy('type');
        $operationPermissions = Permission::where('group', 'operations')->get()->groupBy('type');
        $reportPermissions = Permission::where('group', 'reports')->get()->groupBy('type');
        $settingPermissions = Permission::where('group', 'settings')->get()->groupBy('type');

        return view('dashboard.page.role.update', compact('role', 'salePermissions', 'operationPermissions', 'reportPermissions', 'settingPermissions'));
    }

    public function update($id, UpdateRequest $request)
    {
        $this->authorize('update', Role::class);

        $role = $this->roleRepository->findOrFail($id);

        $this->roleRepository->update($role, $request->only('name'));

        $role->syncPermissions($request->permissions);

        return redirect()->route('roles.index')->with('success', 'تم التحديث بنجاح');
    }

    public function destroy($id)
    {

        $this->authorize('delete', Role::class);

        $this->roleRepository->delete($this->roleRepository->findOrFail($id));

        return redirect()->route('roles.index')->with('success', 'تم الحذف بنجاح');
    }
}
