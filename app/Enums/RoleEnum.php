<?php

namespace App\Enums;

use BenSampo\Enum\Enum;


final class RoleEnum extends Enum
{
    const roleAdminWeb     = 1;
    const roleCustomerWeb  = 2;
    const roleCustomerApi  = 3;
    const roleCelebrityWeb = 4;
    const roleDriverWeb    = 5;
    const roleDietitianWeb = 6;
}