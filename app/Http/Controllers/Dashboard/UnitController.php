<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use App\Models\Unit;
use App\Repositories\UnitRepository;
use Illuminate\Routing\Controller as BaseController;

class UnitController extends BaseController
{
    use ApiResponse;
    /**
     * @var UnitRepository
    */
    protected $unitRepository;

    public function __construct(UnitRepository $unitRepository)
    {
        $this->middleware('auth');
        $this->unitRepository = $unitRepository;
    }

    public function index () {

        $this->authorize('view', Unit::class);

        $units = $this->unitRepository->search(request()->get('query'))->paginate();
    }

    public function create () {

    }

    public function store (Request $request) {

        $this->authorize('create', Unit::class);

        $unit = $this->unitRepository->create($request->all());
    }

    public function edit ($id) {

        $unit = $this->unitRepository->findOrFail($id);
    }

    public function update (Unit $unit,Request $request) {

        $this->authorize('update', Unit::class);

        $unit = $this->unitRepository->update($unit,$request->all());
    }

    public function destroy (Unit $unit) {

        $this->authorize('delete', Unit::class);

        $this->unitRepository->delete($unit);
    }
}