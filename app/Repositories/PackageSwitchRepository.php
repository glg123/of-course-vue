<?php

namespace App\Repositories;

use App\Models\PackageSwitch;
use App\Models\PackageVarient;
use Illuminate\Support\Facades\DB;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class PackageSwitchRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = PackageSwitch::class;

    public function swap($entity)
    {
        DB::beginTransaction();
        try {
            $entity->varientFrom->update(['package_id' => $entity->package_id_to]);
            $entity->varientTo->update(['package_id' => $entity->package_id_from]);
            $entity->update([
                'package_varient_id_from' => $entity->package_varient_id_to,
                'package_varient_id_to' => $entity->package_varient_id_from,
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
        }

        Db::commit();
        return true;
    }
}
