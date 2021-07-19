<?php

namespace isanasan\MyPsr\Http\Handler;

use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class DateAction implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $psr17Factory = new \Nyholm\Psr7\Factory\Psr17Factory();
        $response = $psr17Factory->createResponse(200)
                ->withBody(
            $psr17Factory->createStream(date('Y:m:d H:i:s'))
        );

        return $response;
    }
}
