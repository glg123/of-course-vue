<?php

namespace App\Http\Controllers\Api;

use App\Models\Zone;
use App\Models\Location;
use App\Transformers\ZoneTransform;
use App\Transformers\LocationTransform;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use Illuminate\Routing\Controller as BaseController;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class LocationController extends BaseController
{
    use ApiResponse;

    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => []]);
    }

    public function index () {

        $locations = Location::with('area')->activeSearch()->typeSearch()->areaSearch()->orderBy('created_at')->paginate(10);

        return response()->json(fractal()->collection($locations, new LocationTransform())
                            ->parseIncludes(['area'])
                            ->paginateWith(new IlluminatePaginatorAdapter($locations))
                            ->toArray() + ["message"=>__('messages.success'),"status"=>true]);
    }

    public function getZones () {

        $zones = Zone::with('area')->activeSearch()->areaSearch()->orderBy('created_at')->paginate(10);

        return response()->json(fractal()->collection($zones, new ZoneTransform())
                            ->parseIncludes(['morning_driver','evening_driver','blocks','area'])
                            ->paginateWith(new IlluminatePaginatorAdapter($zones))
                            ->toArray() + ["message"=>__('messages.success'),"status"=>true]);
    }

}