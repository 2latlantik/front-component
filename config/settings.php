<?php

$settings = [];

$settings['displayErrorDetails'] = true;

$settings['root'] = dirname(__DIR__);
$settings['var'] = $settings['root'] . '/var';
$settings['public'] = $settings['root'] . '/public';

$settings['twig'] = [
    'path' => $settings['root'] . '/templates',
    'cache_enabled' => false,
    'cache_path' => $settings['var'] . 'cache'
];

$settings['logger'] = [
    'name' => 'app',
    'file' => $settings['var'] . '/log/app.log',
    'level' => \Monolog\Logger::ERROR,
];

return $settings;