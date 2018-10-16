<?php
namespace App\Controller;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;

class LoggerController
{

    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function logger(RequestInterface $request, ResponseInterface $response)
    {
        /** @var LoggerInterface $logger */
        $logger = $this->container->get('logger');
        $logger->error('My error message');

        $response->getBody()->write("success");

        return $response;
    }
}