<?php

require_once __DIR__ . '/../vendor/autoload.php';

error_reporting(-1);
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$psr7Factory = new \Nyholm\Psr7\Factory\Psr17Factory();

$creator = new \Nyholm\Psr7Server\ServerRequestCreator(
    $psr7Factory,
    $psr7Factory,
    $psr7Factory,
    $psr7Factory
);

$serverRequest = $creator->fromGlobals();

$path = $serverRequest->getUri()->getPath();

if ($path === '/now') {
    echo date('Y-m-d H:i:s');
}
