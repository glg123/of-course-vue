<?php

namespace App\Enums;

use BenSampo\Enum\Enum;


final class FoodStockEnum extends Enum
{
    const PURCHASE = 1;
    const IN_WARD  = 2;
    const OUT_WARD = 3;

}