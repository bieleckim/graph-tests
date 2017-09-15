<?php

namespace Re\GraphQL\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;
use Re\GraphQL\Types;

class DateType extends ObjectType
{
    const DEFAULT_FORMAT = 'Y-m-d H:i:s';

    public function __construct()
    {
        $config = [
            'name' => 'Date',
            'fields' => [
                'timestamp' => Types::int(),
                'date' => [
                    'type' => Types::string(),
                    'args' => [
                        'format' => Types::string()
                    ]
                ]
            ],
            'resolveField' => function($value, $args, $context, ResolveInfo $info) {
                if ('date' === $info->fieldName) {
                    return $value->format($args['format'] ?? static::DEFAULT_FORMAT);
                }

                return $value->{'get' . ucfirst($info->fieldName)}();
            }
        ];

        parent::__construct($config);
    }

}
