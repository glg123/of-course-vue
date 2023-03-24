<?php

namespace App\Repositories;

use App\Enums\RoleEnum;
use Spatie\Permission\Models\Role;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class RoleRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = Role::class;

    public function roleStaffId()
    {
      return $this->getModel()->whereNotIn('id',RoleEnum::getValues())->pluck('id')->toArray();
    }

    public function roleDriver()
    {
      return RoleEnum::roleDriverWeb;
    }

    public function roleDietitian()
    {
      return RoleEnum::roleDietitianWeb;
    }

    public function roleCelebrity()
    {
      return RoleEnum::roleCelebrityWeb;
    }


    public function roleStaff()
    {
      return $this->getModel()->whereNotIn('id',RoleEnum::getValues())->get();
    }
}