<?php

namespace App\Http\Controllers\Api;

use App\Models\Faq;
use App\Transformers\FaqTransform;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use Illuminate\Routing\Controller as BaseController;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class FaqController extends BaseController
{
    use ApiResponse;

    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => []]);
    }

    public function index () {

        $faqs = Faq::activeSearch()->orderBy('created_at')->paginate(10);

        return response()->json(fractal()->collection($faqs, new FaqTransform())
        ->paginateWith(new IlluminatePaginatorAdapter($faqs))
        ->toArray() + ["message"=>__('messages.success'),"status"=>true]);
    }


}