<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\FoodAdjustDataTable;
use App\DataTables\FoodDataTable;
use App\DataTables\FoodPurchaseItemDataTable;
use App\DataTables\FoodStockDataTable;
use App\DataTables\FoodStockPurchaseDataTable;
use App\Enums\FoodStockEnum;
use App\Enums\InvoiceEnum;
use App\Models\Food;
use App\Models\MealCategory;
use App\Repositories\FoodRepository;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use App\Http\Requests\Dashboard\Food\StoreAdjustRequest;
use App\Http\Requests\Dashboard\Food\StorePurchaseRequest;
use App\Http\Requests\Dashboard\Food\StoreRequest;
use App\Models\FoodStock;
use App\Repositories\InvoiceRepository;
use App\Repositories\UnitRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller as BaseController;

class FoodController extends BaseController
{
    use ApiResponse, AuthorizesRequests;
    /**
     * @var foodRepository
     */
    protected $foodRepository;

    public function __construct(FoodRepository $foodRepository)
    {
        $this->middleware('auth');
        $this->foodRepository = $foodRepository;
    }

    //Food
    public function index(FoodDataTable $dt)
    {

        $this->authorize('view', Food::class);

        return $dt->render('dashboard.page.food.master.index', with(['units' => (new UnitRepository)->all()]));
    }

    public function store(StoreRequest $request)
    {

        $this->authorize('create', Food::class);

        $this->foodRepository->create($request->validated());

        return redirect()->back()->with('success', __('views.created'));
    }

    public function edit($id)
    {
        $this->authorize('update', Food::class);
        $food = $this->foodRepository->findOrFail($id);
    }

    public function update(Food $food, Request $request)
    {

        $this->authorize('update', Food::class);

        $food = $this->foodRepository->update($food, $request->all());
    }

    public function destroy($id)
    {
        $this->authorize('delete', Food::class);
        $this->foodRepository->delete($this->foodRepository->findOrFail($id));
        return redirect()->back()->with('success', __('views.deleted'));
    }


    //Stock
    public function getStock(FoodStockDataTable $dt)
    {

        $this->authorize('viewStock', Food::class);

        return $dt->render('dashboard.page.food.stock.index');
    }


    //Purchase
    public function getFoodPurchaseItems(FoodPurchaseItemDataTable $dt)
    {

        $this->authorize('viewPurchase', Food::class);
        return $dt->render('dashboard.page.food.purchase.items',
            with(['foods' => Food::with('stocks')->get()]));
    }

    public function getFoodPurchase(FoodStockPurchaseDataTable $dt)
    {

        $this->authorize('viewPurchase', Food::class);
        $select2_food_url =route('select2.foods');
        return $dt->render('dashboard.page.food.purchase.index',
            with(['foods' => Food::with('stocks')->get(),'select2_food_url'=>$select2_food_url]));
    }

    public function storeFoodPurchase(StorePurchaseRequest $request)
    {

        $this->authorize('submitPurchase', Food::class);

        (new InvoiceRepository)->create($request->validated() + [
            'modelable_type' => Food::class,
            'type' => InvoiceEnum::PURCHASE,
        ]);

        return redirect()->back()->with('success', __('views.created'));
    }


    // Adjust
    public function getFoodAdjust(FoodAdjustDataTable $dt)
    {

        $this->authorize('viewAdjustStock', Food::class);

        return $dt->render('dashboard.page.food.stock.adjust', with(['foods' => Food::with('stocks')->get()]));
    }

    public function storeFoodAdjust(StoreAdjustRequest $request)
    {

        $this->authorize('adjustStock', Food::class);

        FoodStock::create($request->validated() + [
            'type' => FoodStockEnum::IN_WARD,
        ]);

        return redirect()->back()->with('success', __('views.created'));
    }
}
