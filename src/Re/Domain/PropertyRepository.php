<?php

namespace Re\Domain;

interface PropertyRepository
{
    public function get(string $id): Property;
}
