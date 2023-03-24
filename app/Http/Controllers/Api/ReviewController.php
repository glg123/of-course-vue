<?php

namespace App\Http\Controllers\Api;


use App\Models\Order;
use App\Models\Review;
use App\Transformers\OrderTransform;
use App\Transformers\ReviewTransform;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use App\Http\Requests\Api\Order\MakeOrderRequest;
use App\Http\Requests\Api\Review\SetReviewRequest;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests\Api\Review\UpdateReviewRequest;
use App\Http\Requests\Api\Order\UpdateOrderStatusRequest;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;


class ReviewController extends BaseController
{
    use ApiResponse;

    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => []]);
    }

    public function index () {
        $reviews = Review::statusSearch()->typeSearch()->userSearch()->orderBy('created_at')->paginate(10);

        return response()->json(fractal()->collection($reviews, new ReviewTransform())
                             ->parseIncludes(['user'])
                            ->paginateWith(new IlluminatePaginatorAdapter($reviews))
                            ->toArray() + ["message"=>__('messages.success'),"status"=>true]);
    }

    public function show ($id) {
        return response()->json(fractal()->item(Review::findOrFail($id), new ReviewTransform())
                             ->parseIncludes(['user','item'])
                            ->toArray() + ["message"=>__('messages.success'),"status"=>true]);
    }

    public function makeReview (SetReviewRequest $request) {
        return response()->json(fractal()->item(Review::create($request->validated()+['user_id'=>auth('api')->id()]), new ReviewTransform())
                            ->parseIncludes(['user','item'])
                            ->toArray() + ["message"=>__('messages.success'),"status"=>true]);
    }

    public function updateReview ($id,UpdateReviewRequest $request) {
        $review = Review::findOrFail($id);

        $review->update($request->validated());

        return response()->json(fractal()->item($review, new ReviewTransform())
                            ->parseIncludes(['user','item'])
                            ->toArray() + ["message"=>__('messages.success'),"status"=>true]);
    }
    public function delete ($id) {
        Review::where('id',$id)->delete();

        return response()->json(["message"=>__('messages.success'),"status"=>true]);
    }


}