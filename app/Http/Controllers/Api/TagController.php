<?php

namespace App\Http\Controllers\Api;


use App\Models\Tag;
use App\Models\Brand;
use App\Transformers\TagTransform;
use App\Transformers\BrandTransform;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use Illuminate\Routing\Controller as BaseController;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class TagController extends BaseController
{
    use ApiResponse;

    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => []]);
    }

    public function index () {

        $tags = Tag::when(request()->has('type'),function($query){
                        switch (request('type')) {
                            case 1:
                                return $query->meal();
                            case 2:
                                return $query->customer();
                            default:
                                break;
                        }
                })->orderBy('created_at')->paginate(10);

        return response()->json(fractal()->collection($tags, new TagTransform())
        ->paginateWith(new IlluminatePaginatorAdapter($tags))
        ->toArray() + ["message"=>__('messages.success'),"status"=>true]);
    }


}