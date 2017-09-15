<?php

namespace Re\GraphQL;

use GraphQL\Type\Definition\BooleanType;
use GraphQL\Type\Definition\FloatType;
use GraphQL\Type\Definition\IDType;
use GraphQL\Type\Definition\IntType;
use GraphQL\Type\Definition\NonNull;
use GraphQL\Type\Definition\Type;
use Re\GraphQL\Type\Enum\TransactionEnum;
use Re\GraphQL\Type\LocationType;
use Re\GraphQL\Type\PropertyType;
use Re\GraphQL\Type\QueryType;

class Types
{
    private static $query;
    private static $property;
    private static $location;
    private static $transactionEnum;

    public static function property(): PropertyType
    {
        return self::$property ?: (self::$property = new PropertyType());
    }

    public static function location(): LocationType
    {
        return self::$location ?: (self::$location = new LocationType());
    }

    public static function transactionEnum(): TransactionEnum
    {
        return self::$transactionEnum ?: (self::$transactionEnum = new TransactionEnum());
    }

    public static function query(): QueryType
    {
        return self::$query ?: (self::$query = new QueryType());
    }

    public static function boolean(): BooleanType
    {
        return Type::boolean();
    }

    public static function float(): FloatType
    {
        return Type::float();
    }

    public static function id(): IDType
    {
        return Type::id();
    }

    public static function int(): IntType
    {
        return Type::int();
    }

    public static function nonNull($type): NonNull
    {
        return new NonNull($type);
    }

}
