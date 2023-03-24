<?php

namespace App\Repositories;

use App\Models\Invoice;
use App\Models\Package;
use App\Models\PackageMeal;
use App\Models\PackageVarient;
use Illuminate\Support\Facades\DB;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class PackageRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = Package::class;

    public function create(array $attributes)
    {

        DB::beginTransaction();
        try {
            $entity = $this->getNew($attributes);
            $entity->save();
            $entity->varients()->create($attributes['package_varients']);
            foreach ($attributes['package_meals'] ?? [] as $category_id => $Daysmeal) {
                $entity->meals()->create(['meal_category_id' => $category_id, 'days' => $Daysmeal]);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
        }
        DB::commit();
        return $entity;
    }

    public function update($entity, array $attributes)
    {
        DB::beginTransaction();
        try {
            $entity->update($attributes);
            foreach ($attributes['package_meals'] ?? [] as $category_id => $Daysmeal) {

                PackageMeal::updateOrcreate(['package_id' => $entity->id, 'meal_category_id' => $category_id], ['days' => $Daysmeal]);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
            return false;
        }

        DB::commit();

        return true;
    }

    public function createVarients(array $attributes)
    {
        DB::beginTransaction();
        try {
            $entity = PackageVarient::create($attributes['package_varients'] + ['package_id' => $attributes['package_id']]);
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
        }
        DB::commit();

        return $entity;
    }

    public function updateVarients($entity, array $attributes)
    {
        DB::beginTransaction();
        try {
            $entity->update($attributes['package_varients']);
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
            return false;
        }

        DB::commit();

        return true;
    }
}
