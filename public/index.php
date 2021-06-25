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
    $response = $psr17Factory->createResponse(200)
        ->withBody(
            $psr17Factory->createStream(date('Y-m-d H:i:s'))
        );
}

echo (string) $response->getBody();
