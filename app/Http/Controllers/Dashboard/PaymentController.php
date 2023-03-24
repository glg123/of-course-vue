<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\MealReviewDataTable;
use App\DataTables\PaymentInvoiceDataTable;
use App\Models\Review;
use Illuminate\Support\Facades\Request;
use App\Repositories\MealRatingRepository;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller as BaseController;

class PaymentController extends BaseController
{
    use ApiResponse,AuthorizesRequests;
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getInvoice (PaymentInvoiceDataTable $dt) {

        return $dt->render('dashboard.page.payment.invoice');
    }

  
}