<?php

namespace Re\Domain;

use Money\Money;

class Property
{
    private $id;
    private $location;
    private $transaction;
    private $price;
    private $createdAt;
    private $updatedAt;

    public function __construct(string $id, Location $location, Transaction $transaction, Money $price, \DateTimeInterface $createdAt, \DateTimeInterface $updatedAt)
    {
        $this->id = $id;
        $this->location = $location;
        $this->transaction = $transaction;
        $this->price = $price;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
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

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): \DateTimeInterface
    {
        return $this->updatedAt;
    }
}
