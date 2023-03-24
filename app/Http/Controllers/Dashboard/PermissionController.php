<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Api\Helpers\ApiResponse;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Request;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends BaseController
{
    use ApiResponse;
    /**
     * @var PermissionRepository
    */
    protected $permissionRepository;

    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->middleware('auth');
        $this->permissionRepository = $permissionRepository;
    }

    public function index () {

        $this->authorize('view', Permission::class);

        $permissions = $this->permissionRepository->search(request()->get('query'))->paginate();
    }

    public function create () {

     
    }

    public function store (Request $request) {

        $this->authorize('create', Permission::class);

        $permission = $this->permissionRepository->create($request->all());
    }

    public function edit ($id) {


        $permission = $this->permissionRepository->findOrFail($id);

    }

    public function update (Permission $permission,Request $request) {

        $this->authorize('update', Permission::class);

        $permission = $this->permissionRepository->update($permission,$request->all());
    }

    public function destroy (Permission $permission) {

        $this->authorize('delete', Permission::class);

        $this->roleRepository->delete($permission);
    }
}