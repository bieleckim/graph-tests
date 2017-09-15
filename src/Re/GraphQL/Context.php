<?php

namespace Re\GraphQL;

use Psr\Container\ContainerInterface;

class Context
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function getContainer(): ContainerInterface
    {
        return $this->container;
    }
}
