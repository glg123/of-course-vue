<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Food;
use App\Models\Invoice;
use App\Models\UserSubscription;
use App\Repositories\InvoiceRepository;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use Illuminate\Routing\Controller as BaseController;
use PDF;
class InvoiceController extends BaseController
{
    use ApiResponse;
    /**
     * @var InvoiceRepository
    */
    protected $invoiceRepository;

    public function __construct(InvoiceRepository $invoiceRepository)
    {
        $this->middleware('auth');
        $this->invoiceRepository = $invoiceRepository;
    }

    public function index () {

        $this->authorize('view', Invoice::class);

        $invoice = $this->invoiceRepository->search(request()->get('query'))->paginate();
    }

    public function create () {

    }

    public function store (Request $request) {

        $this->authorize('create', Invoice::class);

        $invoice = $this->invoiceRepository->create($request->all());
    }

    public function edit ($id) {

        $invoice = $this->invoiceRepository->findOrFail($id);

    }

    public function update (Invoice $invoice,Request $request) {

        $this->authorize('update', Invoice::class);

        $invoice = $this->invoiceRepository->update($invoice,$request->all());
    }

    public function destroy (Invoice $invoice) {

        $this->authorize('delete', Invoice::class);

        $this->invoiceRepository->delete($invoice);
    }


    public function pdfInvoice($id)
    {



        $userSubscription = UserSubscription::with('user','package','varient')->findOrFail($id);
        $file_name = $userSubscription->id . '_' . time() . '.pdf';
        view()->share('invoice', $userSubscription);
        PDF::loadView('dashboard.page.payment.invoice_pdf')->save(base_path('public\\invoices\\' . $file_name))->stream('download.pdf');
        $userSubscription->pdf_file = 'invoices\\' . $file_name;
        $userSubscription->is_created = 1;
        $userSubscription->save();

    }
}
