<?php

namespace Re\GraphQL\Type\Enum;

use GraphQL\Type\Definition\EnumType;
use Re\Domain\Transaction;

class TransactionEnum extends EnumType
{
    public function __construct()
    {
        $config = [
            'name' => 'TransactionEnum',
            'values' => [Transaction::RENT, Transaction::SALE]
        ];

        parent::__construct($config);
    }
}
