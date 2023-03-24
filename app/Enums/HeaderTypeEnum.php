<?php

namespace App\Enums;

use BenSampo\Enum\Enum;


final class HeaderTypeEnum extends Enum
{
    const SAlES     = 1;
    const OPERATION = 2;
    const REPORT    = 3;
    const SETTING   = 4;
}