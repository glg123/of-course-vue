<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\ContactDataTable;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use App\Http\Requests\Dashboard\Contact\StoreRequest;
use App\Http\Requests\Dashboard\Contact\UpdateRequest;
use App\Models\ContactMethod;
use App\Repositories\ContactMethodRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Request;

class ContactMethodController extends BaseController
{

    use ApiResponse,AuthorizesRequests;

    /**
     * @var ContactMethodRepository
     */
    protected ContactMethodRepository $contactMethodRepository;

    public function __construct(ContactMethodRepository $contactMethodRepository)
    {
        $this->middleware('auth');
        $this->contactMethodRepository = $contactMethodRepository;
    }


    /**
     * List of Records
     * @param ContactDataTable $dt
     * @return mixed
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(ContactDataTable $dt)
    {
        $this->authorize('view', ContactMethod::class);
        // Set title page
        $titlePage = __('translation.contact_methods');
        return $dt->render('dashboard.page.contact.index', compact('titlePage'));
    }


    /**
     * Display page add new item
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        // Set title page
        $titlePage = __('crud.add') . ' ' . __('translation.contact_method');
        return view('dashboard.page.contact.create', compact('titlePage'));
    }


    /**
     * Store Record In DB
     * @param StoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(StoreRequest $request)
    {
        $this->authorize('create', ContactMethod::class);
        // Store Record in DB
        $this->contactMethodRepository->create($request->validated());
        return redirect()->route('contacts.index')->with('success', __('messages.stored'));
    }


    /**
     * Display Page Details Item
     * @param $contact
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(ContactMethod $contact)
    {
        // Set title page
        $titlePage = __('crud.preview') . ' ' . __('translation.contact_method');
        return view('dashboard.page.contact.show', compact('contact', 'titlePage'));
    }


    /**
     * Display Page Edit Item
     * @param $contact
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(ContactMethod $contact)
    {
        // Set title page
        $titlePage = __('crud.edit') . ' ' . __('translation.contact_method');
        return view('dashboard.page.contact.edit', compact('contact', 'titlePage'));
    }


    /**
     * Update Record in DB
     * @param ContactMethod $contact
     * @param StoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(ContactMethod $contact, StoreRequest $request)
    {
        $this->authorize('update', ContactMethod::class);
        // Update Record
        $this->contactMethodRepository->update($contact, $request->validated());
        return redirect()->route('contacts.show', $contact->id)->with('success', __('messages.updated'));
    }


    /**
     * Delete Record From DB
     * @param ContactMethod $contact
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(ContactMethod $contact)
    {
        $this->authorize('delete', ContactMethod::class);
        // Delete Record
        $this->contactMethodRepository->delete($contact);
        return redirect()->route('contacts.index')->with('success', __('messages.deleted', ['attribute' => __('translation.contact_method')]));
    }
}
