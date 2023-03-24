<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\FaqsDataTable;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use App\Http\Requests\Dashboard\Faq\StoreRequest;
use App\Http\Requests\Dashboard\Faq\UpdateRequest;
use App\Models\Faq;
use App\Repositories\FaqRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Request;

class FaqController extends BaseController
{
    use ApiResponse,AuthorizesRequests;


    /**
     * @var FaqRepository
     */
    protected FaqRepository $faqRepository;

    public function __construct(FaqRepository $faqRepository)
    {
        $this->middleware('auth');
        $this->faqRepository = $faqRepository;
    }


    /**
     * List of Records
     * @param FaqsDataTable $dt
     * @return mixed
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index (FaqsDataTable $dt)
    {
        $this->authorize('view', Faq::class);

        $titlePage = __('translation.faqs');

        return $dt->render('dashboard.page.faq.index', compact('titlePage'));
    }


    /**
     * Display page add new item
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        // Set title page
        $titlePage = __('crud.add') . ' ' . __('translation.question');
        // Get Statuses Faq
        $status = $this->faqRepository->getStatusFaq();
        return view('dashboard.page.faq.create', compact('titlePage', 'status'));
    }


    /**
     * Store Record In DB
     * @param StoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store (StoreRequest $request)
    {
        $this->authorize('create', Faq::class);
        // Store Record in DB
        $faqs = $this->faqRepository->create($request->validated());
        return redirect()->route('faqs.index')->with('success', __('messages.stored'));

    }


    /**
     * Display Page Details Item
     * @param $faq
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Faq $faq)
    {
        // Set title page
        $titlePage = __('crud.preview') . ' ' . __('translation.question');
        return view('dashboard.page.faq.show', compact('faq', 'titlePage'));
    }


    /**
     * Display Page Edit Item
     * @param $faq
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Faq $faq)
    {
        // Set title page
        $titlePage = __('crud.edit') . ' ' . __('translation.question');
        // Get Statuses Faq
        $status = $this->faqRepository->getStatusFaq();
        return view('dashboard.page.faq.edit', compact('faq', 'titlePage', 'status'));
    }


    /**
     * Update Record in DB
     * @param Faq $faq
     * @param StoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Faq $faq, StoreRequest $request)
    {
        $this->authorize('update', Faq::class);
        // Update Record
        $this->faqRepository->update($faq, $request->validated());
        return redirect()->route('faqs.show', $faq->id)->with('success', __('messages.updated'));
    }


    /**
     * Delete Record From DB
     * @param Faq $faq
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy (Faq $faq)
    {
        $this->authorize('delete', Faq::class);
        // Delete Record
        $this->faqRepository->delete($faq);
        return redirect()->route('faqs.index')->with('success', __('messages.deleted', ['attribute' => __('translation.question')]));
    }
}
