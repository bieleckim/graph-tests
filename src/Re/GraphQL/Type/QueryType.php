<?php

namespace Re\GraphQL\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Re\Domain\PropertyRepository;
use Re\GraphQL\Context;
use Re\GraphQL\Types;

class QueryType extends ObjectType
{

    public function __construct()
    {
        $config = [
            'name' => 'Query',
            'fields' => [
                'property' => [
                    'type' => Types::property(),
                    'args' => [
                        'id' => Types::nonNull(Types::id())
                    ]
                ],
                'hello' => Type::string()
            ],
            'resolveField' => function($val, $args, $context, ResolveInfo $info) {
                return $this->{$info->fieldName}($val, $args, $context, $info);
            }
        ];

        parent::__construct($config);
    }

    public function property($rootValue, array $args, Context $context)
    {
        /** @var PropertyRepository $repository */
        $repository = $context->getContainer()->get('property_repository');

        return $repository->get($args['id']);
    }

    public function hello()
    {
        return 'Hello World!';
    }

}
