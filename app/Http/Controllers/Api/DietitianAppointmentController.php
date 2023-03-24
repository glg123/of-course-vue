<?php

namespace App\Http\Controllers\Api;

use App\Models\DietitianAppointment;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use App\Transformers\DietitianAppointmentTransform;
use Illuminate\Routing\Controller as BaseController;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use App\Http\Requests\Api\Appointment\SetAppointmentRequest;

class DietitianAppointmentController extends BaseController
{
    use ApiResponse;

    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => []]);
    }

    public function index () {

        $appointments = DietitianAppointment::userSearch()->dietitianSearch()->statusSearch()->orderBy('created_at')->paginate(10);

        return response()->json(fractal()->collection($appointments, new DietitianAppointmentTransform())
        ->parseIncludes(['user','dietitian'])
        ->paginateWith(new IlluminatePaginatorAdapter($appointments))
        ->toArray() + ["message"=>__('messages.success'),"status"=>true]);
    }

    public function setAppointment (SetAppointmentRequest $request) {

        return response()->json(fractal()->item(DietitianAppointment::updateOrCreate($request->validated()+['user_id'=>auth('api')->id()],[]), new DietitianAppointmentTransform())
                ->parseIncludes(['user','dietitian'])
                ->toArray() + ["message"=>__('messages.success'),"status"=>true]);
    }

    public function UpdateAppointment ($id,SetAppointmentRequest $request) {
        $appointment=DietitianAppointment::findOrFail($id);
        $appointment->update($request->validated()+['user_id'=>auth('api')->id()]);
        return response()->json(fractal()->item($appointment, new DietitianAppointmentTransform())
                ->parseIncludes(['user','dietitian'])
                ->toArray() + ["message"=>__('messages.success'),"status"=>true]);
    }
}