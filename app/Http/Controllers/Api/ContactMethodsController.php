<?php

namespace App\Http\Controllers\Api;

use App\Models\ContactMethod;
use App\Transformers\ContactTransform;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use Illuminate\Routing\Controller as BaseController;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class ContactMethodsController extends BaseController
{
    use ApiResponse;

    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => []]);
    }

    public function index () {

        $contacts = ContactMethod::orderBy('created_at')->paginate(10);

        return response()->json(fractal()->collection($contacts, new ContactTransform())
        ->paginateWith(new IlluminatePaginatorAdapter($contacts))
        ->toArray() + ["message"=>__('messages.success'),"status"=>true]);
    }


}