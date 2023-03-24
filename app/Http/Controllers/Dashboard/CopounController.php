<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\CopounDataTable;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use App\Http\Requests\Dashboard\Copoun\StoreRequest;
use App\Models\Copoun;
use App\Repositories\CopounRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class CopounController extends BaseController
{
    use ApiResponse,AuthorizesRequests;
    /**
     * @var CopounRepository
    */
    protected $copounRepository;

    public function __construct(CopounRepository $copounRepository)
    {
        $this->middleware('auth');
        $this->copounRepository = $copounRepository;
    }

    public function index (CopounDataTable $dt) {

        $this->authorize('view', Copoun::class);

        return $dt->render('dashboard.page.copoun.index');
    }


    public function store (StoreRequest $request) {

        $this->authorize('create', Copoun::class);

        $this->copounRepository->create($request->all());

        return redirect()->route('copouns.index')->with('success', 'تم الانشاء بنجاح');

    }

    public function edit ($id) {

        $copoun = $this->copounRepository->findOrFail($id);

    }

    public function update (Copoun $copoun,Request $request) {

        $this->authorize('update', Copoun::class);

        $copoun = $this->copounRepository->update($copoun,$request->all());
    }

    public function destroy ($id) {

        $this->authorize('delete', Copoun::class);

        $this->copounRepository->delete($this->copounRepository->findOrFail($id));

        return redirect()->route('copouns.index')->with('success', 'تم الانشاء بنجاح');

    }
}