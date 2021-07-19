<?php

require_once __DIR__ . '/../vendor/autoload.php';

error_reporting(-1);
$whoops = new \Whoops\Run();
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
$whoops->register();

$psr17Factory = new \Nyholm\Psr7\Factory\Psr17Factory();

$creator = new \Nyholm\Psr7Server\ServerRequestCreator(
    $psr17Factory,
    $psr17Factory,
    $psr17Factory,
    $psr17Factory
);

$serverRequest = $creator->fromGlobals();

$path = $serverRequest->getUri()->getPath();

if ($path === '/now') {
    $handler = new \isanasan\MyPsr\Http\Handler\DateAction();
    $response = $handler->handle($serverRequest);
} else {
    $response = $psr17Factory->createResponse(404)
        ->withBody(
            $psr17Factory->createStream('not found')
        );
}

echo (new \Laminas\HttpHandlerRunner\Emitter\SapiEmitter())->emit($response);
