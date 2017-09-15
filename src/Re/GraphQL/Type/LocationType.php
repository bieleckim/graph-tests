<?php

namespace Re\GraphQL\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;
use Re\GraphQL\Types;

class LocationType extends ObjectType
{

    public function __construct()
    {
        $config = [
            'name' => 'Location',
            'fields' => [
                'lat' => Types::float(),
                'lng' => Types::float()
            ],
            'resolveField' => function($value, $args, $context, ResolveInfo $info) {
                return $value->{'get' . ucfirst($info->fieldName)}();
            }
        ];

        parent::__construct($config);
    }

}
