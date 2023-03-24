<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\AddressChangeDataTable;
use App\DataTables\CustomerAddressDataTable;
use App\DataTables\CustomerDataTable;
use App\DataTables\CustomerOtpDataTable;
use App\Models\User;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use App\Http\Requests\Dashboard\Customer\StoreRequest;
use App\Http\Requests\Dashboard\Customer\UpdateRequest;
use App\Models\Address;
use App\Models\ContactMethod;
use App\Models\Location;
use App\Models\Tag;
use Illuminate\Routing\Controller as BaseController;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class UserController extends BaseController
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

    public function index(CustomerDataTable $dt)
    {

        $this->authorize('view', User::class);

        return $dt->render(
            'dashboard.page.user.customer.index',
            [
                'tags' => Tag::whereType(Tag::CUSTOMER)->get(),
                'areas' => Location::whereType(Location::AREA_TYPE)->get(),
                'blocks' => Location::whereType(Location::BLOCK_TYPE)->get(),
            ]
        );
    }

    public function customerOtp(CustomerOtpDataTable $dt)
    {

        $this->authorize('view', User::class);

        return $dt->render('dashboard.page.user.customer.otp');
    }


    public function create()
    {

        return view('dashboard.page.user.customer.create', [
            'tags' => Tag::whereType(Tag::CUSTOMER)->get(),
            'areas' => Location::whereType(Location::AREA_TYPE)->get(),
            'blocks' => Location::whereType(Location::BLOCK_TYPE)->get(),
            'contacts' => ContactMethod::get(),
        ]);
    }

    public function store(StoreRequest $request)
    {

        
        $this->authorize('create', User::class);

        $user = $this->userRepository->create($request->all() + ['area_id' => $request->addresses['area_id'], 'block_id' => $request->addresses['block_id']]);
        $user->assignRole('customer');
        $user->addresses()->create($request->addresses + ['is_default' => true]);
        return redirect()->back()->with('success', 'تم الانشاء بنجاح');
    }


    public function edit($id)
    {


        return view('dashboard.page.user.customer.update', [
            'tags' => Tag::whereType(Tag::CUSTOMER)->get(),
            'areas' => Location::whereType(Location::AREA_TYPE)->get(),
            'blocks' => Location::whereType(Location::BLOCK_TYPE)->get(),
            'contacts' => ContactMethod::get(),
            'user' => $this->userRepository->findOrFail($id)
        ]);
    }

    public function update($id, UpdateRequest $request)
    {

        $this->authorize('update', User::class);

        $this->userRepository->update($user = $this->userRepository->findOrFail($id), $request->all() + ['area_id' => $request->addresses['area_id'], 'block_id' => $request->addresses['block_id']]);
        $user->main_address()->update($request->addresses);
        return redirect()->back()->with('success', 'تم التحديث بنجاح');
    }

    public function destroy($id)
    {

        $this->authorize('delete', User::class);
        $this->userRepository->delete($this->userRepository->findOrFail($id));
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }

    //Addresses
    public function getAddresses(CustomerAddressDataTable $dt)
    {

        $this->authorize('view', User::class);

        return $dt->render(
            'dashboard.page.user.customer.addresses.index'
        );
    }

    public function addressDefaultChange(AddressChangeDataTable $dt)
    {

        $this->authorize('view', User::class);

        return $dt->render(
            'dashboard.page.user.address.index'
        );
    }

    public function addressDefaultApproval($id)
    {
        $this->authorize('view', User::class);
        $address = Address::with('user')->where([
            'id' => $id,
            'default_requested' => true,
        ])->firstOrFail();
        if (request('status') == 'cancel') {
            $address->update(['default_requested' => false]);
        } elseif (request('status') == 'approved') {
            $address->user->main_address()->update(['is_default' => false]);
            $address->update(['default_requested' => false, 'is_default' => true]);
        }
        return redirect()->back()->with('success','updated Successfully');
    }
}
