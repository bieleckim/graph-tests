<?php

namespace Re\GraphQL\Type;

use GraphQL\Type\Definition\EnumType;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;
use MyCLabs\Enum\Enum;
use Re\GraphQL\Types;

class PropertyType extends ObjectType
{

    public function __construct()
    {
        $config = [
            'name' => 'Property',
            'fields' => [
                'id' => Types::id(),
                'location' => Types::location(),
                'transaction' => Types::transactionEnum()
            ],
            'resolveField' => function($value, $args, $context, ResolveInfo $info) {
                if ($info->returnType instanceof EnumType) {
                    /** @var Enum $enum */
                    $enum = $value->{'get' . ucfirst($info->fieldName)}();
                    return $enum->getValue();
                }

                return $value->{'get' . ucfirst($info->fieldName)}();
            }
        ];

        parent::__construct($config);
    }

}
