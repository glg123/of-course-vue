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

class DashboardController extends BaseController
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
    }

    public function index()
    {
        return view('dashboard.page.dashboard.index');
    }


   
}