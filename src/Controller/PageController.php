<?php
namespace App\Controller;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class PageController {

    private $container;

    public function __construct($container) 
    {
        $this->container = $container;
    }

    public function home(RequestInterface $request, ResponseInterface $response)
    {
        $card_colors = ['blue', 'cyan', 'green', 'purple', 'pink'];
        $this->container->view->render($response, 'home.twig', ['card_colors' => $card_colors]);
    }

}