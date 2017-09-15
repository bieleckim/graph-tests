<?php

namespace Re\Domain;

use MyCLabs\Enum\Enum;

/**
 * @method static Transaction SALE
 * @method static Transaction RENT
 */
class Transaction extends Enum
{
    const SALE = 'sale';
    const RENT = 'rent';
}
