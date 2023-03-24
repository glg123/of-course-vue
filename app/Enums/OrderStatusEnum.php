<?php

namespace App\Enums;

use BenSampo\Enum\Enum;


final class OrderStatusEnum extends Enum
{
    const PENDING    = 1; // Admin Dont Accept Yet ...Defualt
    const PREPARING  = 2; // The meals Was Preparing In kitchen
    const PREPARED   = 3; // The meals Was Ready To Deliverd
    const DELIVERING = 4; // Delivery On His Way
    const DELIVERED  = 5; // deliverd to user Success
    const CANCELED   = 6; // canceled from user
    const RETURNED   = 7; // user not found in address
    const HOLDING    = 8; // Hold From Admin || Staff   
}
