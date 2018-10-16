<?php
use Slim\Container;

/** @var @var \Slim\App $app */
$container = $app->getContainer();

$container['view'] = function (Container $container) {
    $settings = $container->get('settings');
    $viewPath = $settings['twig']['path'];

    $view = new \Slim\Views\Twig($viewPath, [
        'cache' => $settings['twig']['cache_enabled'] ? $settings['twig']['cache_path'] : false
    ]);

    /** @var Twig_Loader_Filesystem $loader */
    $loader = $view->getLoader();
    $loader->addPath($settings['public'], 'public');

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container->get('request')->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container->get('router'), $basePath));

    return $view;
};

$container['logger'] = function (Container $container) {
    $settings = $container->get('settings');
    $logger = new \Monolog\Logger($settings['logger']['name']);

    $level = $settings['logger']['level'];
    if(!isset($level)) {
        $level = \Monolog\Logger::ERROR;
    }

    $logFile = $settings['logger']['file'];
    $handler = new \Monolog\Handler\RotatingFileHandler($logFile, 0, $level, true, 0775);
    $logger->pushHandler($handler);

    return $logger;
};
