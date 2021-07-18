<?php
require __DIR__ . '/../vendor/autoload.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use App\Utils\Fibonacci\Fibonacci;
use App\Utils\Fibonacci\Exception\NegativeNException;

$app = AppFactory::create();

// Register calculator route
$app->get('/fibonacci/{n}', function (Request $request, Response $response, array $args) {
    try {
        $fibonacci = new Fibonacci();
        $number = $fibonacci->getNumber($args['n']);
        $response->getBody()->write(
            json_encode(
                [
                    'number' => $number,
                    'n' => (int) $args['n'],
                ],
                JSON_PRETTY_PRINT,
            )
        );
    } catch (NegativeNException $e) {
        $response = $response->withStatus(400);
        $response->getBody()->write(
            json_encode(['error' => $e->getMessage()])
        );
    }

    return $response;
});

$app->addErrorMiddleware(false, true, true);
$app->run();