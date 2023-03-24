<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\SingleUserCartDataTable;
use App\DataTables\UserCartDataTable;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use App\Http\Requests\Dashboard\Cart\StoreRequest;
use App\Models\Package;
use App\Models\User;
use App\Models\UserCart;
use App\Repositories\UserCartRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class UserCartController extends BaseController
{
    use ApiResponse, AuthorizesRequests;

    /**
     * @var UserCartRepository
     */
    protected $userCartRepository;

    public function __construct(UserCartRepository $userCartRepository)
    {
        $this->middleware('auth');
        $this->userCartRepository = $userCartRepository;
    }

    public function index(UserCartDataTable $dt)
    {

        $this->authorize('view', UserCart::class);
        $customers = User::where('status', 2)->select('id', 'first_name', 'last_name')->get();
        $packges = Package::select('id', 'name')->get();
        return $dt->render('dashboard.page.cart.index',compact('customers','packges'));
    }

    public function abandoned_user(SingleUserCartDataTable $dt, $id)
    {

        $this->authorize('view', UserCart::class);
        $customers = User::where('status', 2)
            ->where('id',$id)
            ->select('id', 'first_name', 'last_name')->get();
        $packges = Package::select('id', 'name')->get();
        $dt= $dt->with('id', $id);
        return $dt->render('dashboard.page.cart.show',compact('customers','packges','id'));
    }
    public function store (StoreRequest $request) {

        $this->authorize('create', UserCart::class);

        $this->userCartRepository->create($request->all());

        return redirect()->route('cart.abandoned')->with('success', __('views.created'));

    }

    public function destroy($id)
    {

        $this->authorize('delete', UserCart::class);

        $this->userCartRepository->delete($this->userCartRepository->findOrFail($id));

        return redirect()->route('abandoned')->with('success', __('views.deleted'));

    }
}
