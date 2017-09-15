<?php

namespace Re\GraphQL\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;
use Re\GraphQL\Types;

class PriceType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'name' => 'Price',
            'fields' => [
                'currency' => Types::string(),
                'amount' => Types::int()
            ],
            'resolveField' => function($value, $args, $context, ResolveInfo $info) {
                $field = $value->{'get' . ucfirst($info->fieldName)}();
                if ($info->fieldName === 'currency') {
                    return $field->getCode();
                }

                return $field;
            }
        ];

        parent::__construct($config);
    }

}
