<?php

namespace Re\Domain;

use Money\Money;

class Property
{
    private $id;
    private $location;
    private $transaction;
    private $price;

    public function __construct(string $id, Location $location, Transaction $transaction, Money $price)
    {
        $this->id = $id;
        $this->location = $location;
        $this->transaction = $transaction;
        $this->price = $price;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getLocation(): Location
    {
        return $this->location;
    }

    public function getTransaction(): Transaction
    {
        return $this->transaction;
    }

    public function getPrice(): Money
    {
        return $this->price;
    }
}
