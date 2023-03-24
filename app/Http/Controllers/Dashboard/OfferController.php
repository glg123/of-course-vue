<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\OfferDataTable;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use App\Http\Requests\Dashboard\Offer\StoreRequest;
use App\Models\Copoun;
use App\Models\Offer;
use App\Repositories\OfferRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Request;

class OfferController extends BaseController
{
    use ApiResponse,AuthorizesRequests;
    /**
     * @var OfferRepository
    */
    protected $offerRepository;

    public function __construct(OfferRepository $offerRepository)
    {
        $this->middleware('auth');
        $this->offerRepository = $offerRepository;
    }

    public function index (OfferDataTable $dt) {

        $this->authorize('view', Offer::class);

        return $dt->render('dashboard.page.offer.index',with(['copouns'=>Copoun::get()]));
    }


    public function store (StoreRequest $request) {

        $this->authorize('create', Offer::class);

        $this->offerRepository->create($request->all());

        return redirect()->route('offers.index')->with('success', 'تم الانشاء بنجاح');

    }

    public function edit ($id) {

        $offer = $this->offerRepository->findOrFail($id);

    }

    public function update (Offer $offer,Request $request) {

        $this->authorize('update', Offer::class);

        $offer = $this->offerRepository->update($offer,$request->all());
    }

    public function destroy ($id) {

        $this->authorize('delete', Offer::class);

        $this->offerRepository->delete($this->offerRepository->findOrFail($id));
        return redirect()->route('offers.index')->with('success', 'تم الحذف بنجاح');

    }
}