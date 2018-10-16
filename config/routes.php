<?php

$app->get('/', \App\Controller\PageController::class  . ':home');

$app->get('/logger-test', \App\Controller\LoggerController::class . ':logger');

