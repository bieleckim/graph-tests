<?php

use GraphQL\Error\Debug;
use GraphQL\FormattedError;
use GraphQL\GraphQL;
use GraphQL\Type\Schema;
use League\Container\Container;
use Re\Domain\Location;
use Re\Domain\Property;
use Re\Domain\Transaction;
use Re\GraphQL\Context;
use Re\GraphQL\Types;
use Re\Infrastructure\InMemory\PropertyRepository;

require_once __DIR__ . '/../vendor/autoload.php';

ini_set('display_errors', 0);

$debug = false;
if (!empty($_GET['debug'])) {
    set_error_handler(function($severity, $message, $file, $line) use (&$phpErrors) {
        throw new ErrorException($message, 0, $severity, $file, $line);
    });
    $debug = Debug::INCLUDE_DEBUG_MESSAGE | Debug::INCLUDE_TRACE;
}

try {

    $schema = new Schema([
        'query' => Types::query()
    ]);

    $schema->assertValid();

    $propertyRepository = new PropertyRepository([
        new Property('1', new Location('4', 52.237049, 21.017532), Transaction::SALE()),
        new Property('2', new Location('5', 50.061642, 19.939390), Transaction::SALE()),
        new Property('3', new Location('6', 52.409538, 16.931992), Transaction::RENT())
    ]);

    $container = new Container();
    $container->add('property_repository', $propertyRepository);

    $context = new Context($container);

    if (isset($_SERVER['CONTENT_TYPE']) && strpos($_SERVER['CONTENT_TYPE'], 'application/json') !== false) {
        $raw = file_get_contents('php://input') ?: '';
        $data = json_decode($raw, true);
    } else {
        $data = $_REQUEST;
    }
    $data += ['query' => null, 'variables' => null];

    if (null === $data['query']) {
        $data['query'] = '{hello}';
    }

    $result = GraphQL::executeQuery(
        $schema,
        $data['query'],
        null,
        $context
    );

    $output = $result->toArray($debug);
    $httpStatus = 200;

} catch (\Exception $e) {
    $httpStatus = 500;
    $output['errors'] = [
        FormattedError::createFromException($error, $debug)
    ];
}

header('Content-Type: application/json', true, $httpStatus);
echo json_encode($output);
