<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\PaymentInvoiceDataTable;
use App\DataTables\SaleDataTable;
use App\DataTables\SalesDataTable;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use App\Models\Order;
use App\Models\User;
use App\Repositories\RoleRepository;
use App\Repositories\SalesRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller as BaseController;

class SalesRequestController extends BaseController
{
    use ApiResponse, AuthorizesRequests;

    protected $saleRepository;
    protected $roleRepository;

    public function __construct(SalesRepository $saleRepository, RoleRepository $roleRepository)
    {
        $this->middleware('auth');
        $this->saleRepository = $saleRepository;
        $this->roleRepository = $roleRepository;
    }

    public function getSalesRequest(SaleDataTable $dt)
    {

        $this->authorize('view', Order::class);

        return $dt->render(
            'dashboard.page.sales_request.sales_request'
        );
    }



    public function getSalesToday(SaleDataTable $dt)
    {
        $this->authorize('view', Order::class);

        return $dt->render(
            'dashboard.page.sales_request.sales_request'
        );
        //return view('dashboard.page.sales_request.sales_today');
    }

    public function getSalesDiscount(SaleDataTable $dt)
    {
        $this->authorize('view', Order::class);

        return $dt->render(
            'dashboard.page.sales_request.sales_request'
        );
       // return view('dashboard.page.sales_request.sales_discount');
    }

    public function getSalesReminder(SaleDataTable $dt)
    {
        $this->authorize('view', Order::class);

        return $dt->render(
            'dashboard.page.sales_request.sales_request'
        );
       // return view('dashboard.page.sales_request.sales_reminder');
    }
}
