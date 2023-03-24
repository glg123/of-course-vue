<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\AreaDataTable;
use App\DataTables\BlockDataTable;
use App\DataTables\ZoneDataTable;
use App\DataTables\ZoneDriverDataTable;
use App\Http\Controllers\Api\Helpers\ApiResponse;
use App\Http\Requests\Dashboard\Location\AreaRequest;
use App\Http\Requests\Dashboard\Location\BlockRequest;
use App\Http\Requests\Dashboard\Location\ZoneDriverRequest;
use App\Http\Requests\Dashboard\Location\ZoneRequest;
use App\Models\Location;
use App\Models\Tag;
use App\Models\User;
use App\Models\Zone;
use App\Repositories\LocationRepository;
use App\Repositories\RoleRepository;
use Illuminate\Routing\Controller as BaseController;
use App\Repositories\TagRepository;
use App\Repositories\UserRepository;
use App\Repositories\ZoneRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Request;

class LocationController extends BaseController
{
    use ApiResponse, AuthorizesRequests;
    /**
     * @var LocationRepository
     */
    protected $locationRepository;
    protected $zoneRepository;

    public function __construct(LocationRepository $locationRepository, ZoneRepository $zoneRepository)
    {
        $this->middleware('auth');
        $this->locationRepository = $locationRepository;
        $this->zoneRepository     = $zoneRepository;
    }

    public function getArea(AreaDataTable $dt)
    {

        $this->authorize('view', Location::class);

        return $dt->render('dashboard.page.location.area.index');
    }

    public function getBlock(BlockDataTable $dt)
    {

        $this->authorize('view', Location::class);

        return $dt->render('dashboard.page.location.block.index', ['areas' => Location::whereType(Location::AREA_TYPE)->get()]);
    }

    public function getZone(ZoneDataTable $dt)
    {

        $this->authorize('view', Location::class);

        return $dt->render('dashboard.page.location.zone.index', ['areas' => Location::whereType(Location::AREA_TYPE)->get(), 'blocks' => Location::whereType(Location::BLOCK_TYPE)->get()]);
    }

    public function getZoneDriver(ZoneDriverDataTable $dt)
    {

        $this->authorize('view', Location::class);

        return $dt->render('dashboard.page.location.zone_driver.index', ['zones' => Zone::get(), 'drivers' => User::role((new RoleRepository)->roleDriver())->get()]);
    }



    public function storeArea(AreaRequest $request)
    {

        $this->authorize('create', Location::class);

        $this->locationRepository->create($request->validated() + ['type' => Location::AREA_TYPE]);

        return redirect()->route('locations.area')->with('success', 'تم الانشاء بنجاح');
    }

    public function storeBlock(BlockRequest $request)
    {
        $this->authorize('create', Location::class);

        $this->locationRepository->create($request->validated() + ['type' => Location::BLOCK_TYPE]);

        return redirect()->route('locations.block')->with('success', 'تم الانشاء بنجاح');
    }

    public function storeZone(ZoneRequest $request)
    {

        $this->authorize('create', Zone::class);

        $this->zoneRepository->create($request->validated());

        return redirect()->route('locations.zone')->with('success', 'تم الانشاء بنجاح');
    }

    public function storeZoneDriver(ZoneDriverRequest $request)
    {

        $this->authorize('create', Location::class);

        $this->locationRepository->update($this->zoneRepository->findOrFail($request->zone_id), $request->only(['morning_driver_id',
         'evening_driver_id']));

        return redirect()->route('locations.zone.driver')->with('success', 'تم الانشاء بنجاح');
    }


    public function editLocation($id)
    {
        $types = $this->locationRepository->getTagTypes();
        $location = $this->locationRepository->findOrFail($id);
    }

    public function editZone($id)
    {
        $types = $this->locationRepository->getTagTypes();
        $zone  = $this->zoneRepository->findOrFail($id);
    }

    public function updateArea(Location $location, AreaRequest $request)
    {

        $this->authorize('update', Location::class);

        $location = $this->locationRepository->update($location, $request->all());
    }

    public function updateBlock(Location $location, BlockRequest $request)
    {

        $this->authorize('update', Location::class);

        $location = $this->locationRepository->update($location, $request->all());
    }

    public function updateZone(Zone $zone, ZoneRequest $request)
    {

        $this->authorize('update', Location::class);

        $zone = $this->zoneRepository->update($zone, $request->all());
    }


    public function destroy(Location $location)
    {

        $this->authorize('delete', Location::class);

        $this->locationRepository->delete($location);
        return redirect()->back()->with('success', 'تم الحذف بنجاح');

    }


    public function destroyZone(Zone $zone)
    {

        $this->authorize('delete', Location::class);

        $this->locationRepository->delete($zone);
        return redirect()->back()->with('success', 'تم الحذف بنجاح');

    }
}
