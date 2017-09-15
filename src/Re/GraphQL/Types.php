<?php

namespace Re\GraphQL;

use GraphQL\Type\Definition\BooleanType;
use GraphQL\Type\Definition\FloatType;
use GraphQL\Type\Definition\IDType;
use GraphQL\Type\Definition\IntType;
use GraphQL\Type\Definition\NonNull;
use GraphQL\Type\Definition\StringType;
use GraphQL\Type\Definition\Type;
use Re\GraphQL\Type\DateType;
use Re\GraphQL\Type\Enum\TransactionEnum;
use Re\GraphQL\Type\LocationType;
use Re\GraphQL\Type\PriceType;
use Re\GraphQL\Type\PropertyType;
use Re\GraphQL\Type\QueryType;

class Types
{
    private static $query;
    private static $property;
    private static $location;
    private static $transactionEnum;
    private static $price;
    private static $date;

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

    public static function price(): PriceType
    {
        return self::$price ?: (self::$price = new PriceType());
    }

    public static function date(): DateType
    {
        return self::$date ?: (self::$date = new DateType());
    }

    public static function query(): QueryType
    {
        return self::$query ?: (self::$query = new QueryType());
    }

    public static function string(): StringType
    {
        return Type::string();
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
