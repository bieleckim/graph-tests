<?php

namespace Re\Domain;

class Property
{
    private $id;
    private $location;
    private $transaction;

    public function __construct(string $id, Location $location, Transaction $transaction)
    {
        $this->id = $id;
        $this->location = $location;
        $this->transaction = $transaction;
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
}
