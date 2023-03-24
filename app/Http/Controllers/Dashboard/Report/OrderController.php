<?php

namespace App\Http\Controllers\Dashboard\Report;

use App\Http\Controllers\Api\Helpers\ApiResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller as BaseController;

class OrderController extends BaseController
{
    use ApiResponse, AuthorizesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getOrders()
    {

        return view('dashboard.page.report.order.index');
    }

    public function getFoods()
    {
        return view('dashboard.page.report.order.food');
    }

}
