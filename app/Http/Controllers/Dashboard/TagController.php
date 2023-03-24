<?php

namespace App\Http\Controllers\Dashboard;



use App\Http\Controllers\Api\Helpers\ApiResponse;
use App\Http\Requests\Dashboard\Tag\StoreRequest;
use App\Http\Requests\Dashboard\Tag\UpdateRequest;
use App\Models\Tag;
use Illuminate\Routing\Controller as BaseController;
use App\Repositories\TagRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Request;

class TagController extends BaseController
{
    use ApiResponse, AuthorizesRequests;
    /**
     * @var TagRepository
     */
    protected $tagRepository;

    public function __construct(TagRepository $tagRepository)
    {
        $this->middleware('auth');
        $this->tagRepository = $tagRepository;
    }

    public function getCustomer()
    {

        $this->authorize('view', Tag::class);

        return view('dashboard.page.tag.customer', ['tags' => Tag::whereType(Tag::CUSTOMER)->get()]);
    }

    public function getMeal()
    {

        $this->authorize('view', Tag::class);

        return view('dashboard.page.tag.meal', ['tags' => Tag::whereType(Tag::MEAL)->get()]);
    }

    public function store(StoreRequest $request)
    {

        $this->authorize('create', Tag::class);

        $tag = $this->tagRepository->create($request->all());
        return redirect()->back()->with('success', 'تم الانشاء بنجاح');
    }


    public function update($id, UpdateRequest $request)
    {

        $this->authorize('update', Tag::class);

        $this->tagRepository->update(Tag::findOrFail($id), $request->validated());
        return redirect()->back()->with('success', 'تم التحديث بنجاح');
    }

    public function destroy($id)
    {

        $this->authorize('delete', Tag::class);

        $this->tagRepository->delete(Tag::findOrFail($id));
        return redirect()->back()->with('success', 'تم التحديث بنجاح');

    }
}
