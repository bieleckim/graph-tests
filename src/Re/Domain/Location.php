<?php

namespace Re\Domain;

class Location
{
    private $id;
    private $lat;
    private $lng;

    public function __construct(string $id, float $lat, float $lng)
    {
        $this->id = $id;
        $this->lat = $lat;
        $this->lng = $lng;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getLat(): float
    {
        return $this->lat;
    }

    public function getLng(): float
    {
        return $this->lng;
    }
}
