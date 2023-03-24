<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\MealReviewDataTable;
use App\Models\Review;
use Illuminate\Support\Facades\Request;
use App\Repositories\MealRatingRepository;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller as BaseController;

class ReviewController extends BaseController
{
    use ApiResponse,AuthorizesRequests;
    /**
     * @var MealRatingRepository
    */
    protected $mealRatingRepository;

    public function __construct(MealRatingRepository $mealRatingRepository)
    {
        $this->middleware('auth');
        $this->mealRatingRepository = $mealRatingRepository;
    }

    public function getMeal (MealReviewDataTable $dt) {

        $this->authorize('view', Review::class);

        return $dt->render('dashboard.page.meal_review.index');
    }

  
}