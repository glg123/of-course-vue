<?php

namespace App\Http\Controllers\Dashboard\Report;

use App\Http\Controllers\Api\Helpers\ApiResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller as BaseController;

class MarketingCampaignsController extends BaseController
{
    use ApiResponse, AuthorizesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        return view('dashboard.page.report.marketing.index');
    }



}
