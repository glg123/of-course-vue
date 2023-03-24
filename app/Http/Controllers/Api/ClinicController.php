<?php

namespace App\Http\Controllers\Api;


use App\Models\Clinic;
use App\Models\ClinicAnswer;
use App\Transformers\ClinicAnswerTransform;
use App\Transformers\ClinicQuestionsTransform;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use App\Http\Requests\Api\Clinic\SetAnswerRequest;
use Illuminate\Routing\Controller as BaseController;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class ClinicController extends BaseController
{
    use ApiResponse;

    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => []]);
    }

    public function index () {

        $clinicQuestions = Clinic::activeSearch()->editableSearch()->orderBy('order')->paginate(10);

        return response()->json(fractal()->collection($clinicQuestions, new ClinicQuestionsTransform())
        ->parseIncludes(['choices'])
        ->paginateWith(new IlluminatePaginatorAdapter($clinicQuestions))
        ->toArray() + ["message"=>__('messages.success'),"status"=>true]);
    }

    public function show ($id) {
        return response()->json(fractal()->item(Clinic::findOrFail($id), new ClinicQuestionsTransform())
        ->parseIncludes(['choices','answers'])
        ->toArray() + ["message"=>__('messages.success'),"status"=>true]);
    }

    public function setAnswer (SetAnswerRequest $request) {

        return response()->json(fractal()->item(ClinicAnswer::updateOrCreate(['user_id'=>auth('api')->id(),'clinic_id'=>$request->clinic_id],
                                                 $request->validated()
                                                ), new ClinicAnswerTransform())
                ->parseIncludes(['user','questions'])
                ->toArray() + ["message"=>__('messages.success'),"status"=>true]);
    }

    public function answers () {

        $answers = ClinicAnswer::userSearch()->questionSearch()->orderBy('clinic_id')->paginate(10);

        return response()->json(fractal()->collection($answers, new ClinicAnswerTransform())
                ->parseIncludes(['user','questions'])
                ->paginateWith(new IlluminatePaginatorAdapter($answers))
                ->toArray() + ["message"=>__('messages.success'),"status"=>true]);
    }


}