<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\ClinicDataTable;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use App\Http\Requests\Dashboard\Clinic\StoreRequest;
use App\Http\Requests\Dashboard\Clinic\UpdateRequest;
use App\Models\Clinic;
use App\Repositories\EClinicRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller as BaseController;

class EClinicController extends BaseController
{
    use ApiResponse, AuthorizesRequests;
    /**
     * @var EClinicRepository
     */
    protected $eClinicRepository;

    public function __construct(EClinicRepository $eClinicRepository)
    {
        $this->middleware('auth');
        $this->eClinicRepository = $eClinicRepository;
    }

    public function index(ClinicDataTable $dt)
    {

        $this->authorize('view', Clinic::class);

        return $dt->render('dashboard.page.clinic.index');
    }


    public function store(StoreRequest $request)
    {

        $this->authorize('create', Clinic::class);
        $this->eClinicRepository->create($request->all());
        return redirect()->route('clinic.index')->with('success', 'تم الانشاء بنجاح');
    }

    public function edit($id)
    {

        $eClinic = $this->eClinicRepository->findOrFail($id);
    }

    public function update(Clinic $clinic, UpdateRequest $request)
    {

        $this->authorize('update', Clinic::class);

        $eClinic = $this->eClinicRepository->update($clinic, $request->all());
    }

    public function destroy($id)
    {

        $this->authorize('delete', Clinic::class);

        $this->eClinicRepository->delete($this->eClinicRepository->findOrFail($id));
        return redirect()->route('clinic.index')->with('success', 'تم الحذف بنجاح');

    }
}
