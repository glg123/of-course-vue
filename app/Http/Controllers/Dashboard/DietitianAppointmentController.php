<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\DAppointmentDataTable;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use App\Models\DietitianAppointment;
use App\Repositories\DietitianAppoinmentRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Request;

class DietitianAppointmentController extends BaseController
{
    use ApiResponse,AuthorizesRequests;
    /**
     * @var DietitianAppoinmentRepository
    */
    protected $dAppointment;

    public function __construct(DietitianAppoinmentRepository $dAppointment)
    {
        $this->middleware('auth');
        $this->dAppointment = $dAppointment;
    }

    public function index (DAppointmentDataTable $dt) {

        $this->authorize('view', DietitianAppointment::class);

        return $dt->render('dashboard.page.dietitian_appointment.index');
    }

}