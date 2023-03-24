<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Brand;
use App\Repositories\BrandRepository;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use Illuminate\Routing\Controller as BaseController;

class BrandController extends BaseController
{
    use ApiResponse;
    /**
     * @var BrandRepository
    */
    protected $brandRepository;

    public function __construct(BrandRepository $brandRepository)
    {
        $this->middleware('auth');
        $this->brandRepository = $brandRepository;
    }

    public function index () {

        $this->authorize('view', Brand::class);

        $brands = $this->brandRepository->search(request()->get('query'))->paginate();
    }

    public function create () {

    }

    public function store (Request $request) {

        $this->authorize('create', Brand::class);

        $brand = $this->brandRepository->create($request->all());
    }

    public function edit ($id) {

        $brand = $this->brandRepository->findOrFail($id);
    }

    public function update (Brand $brand,Request $request) {

        $this->authorize('update', Brand::class);

        $brand = $this->brandRepository->update($brand,$request->all());
    }

    public function destroy (Brand $brand) {

        $this->authorize('delete', Brand::class);

        $this->brandRepository->delete($brand);
    }
}