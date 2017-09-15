<?php

namespace Re\Infrastructure\InMemory;

use Re\Domain\Property;
use Re\Domain\PropertyRepository as PropertyRepositoryInterface;

class PropertyRepository implements PropertyRepositoryInterface
{
    /**
     * @var Property[]
     */
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function get(string $id): Property
    {
        foreach ($this->data as $property) {
            if ($id === $property->getId()) {
                return $property;
            }
        }

        return null;
    }
}
