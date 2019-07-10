<?php 
session_start();
$config = require_once "config.php";

$app = new \Slim\App($config);

$container = $app->getContainer();

// Setting up the Eloquent 

$capsule = new \Illuminate\Database\Capsule\Manager;

$capsule->addConnection($container['settings']['db']);

$capsule->setAsGlobal();

$capsule->bootEloquent();

$container['db'] = function ($c) use ($capsule) {
	return $capsule;
};

// finishing ...

// Another components

$container['logger'] = function($c) {
	$logger = new \Monolog\Logger('my-logger');
	$fileHandler = new \Monolog\Handler\StreamHandler('../logs/app.log');
	$logger->pushHandler($fileHandler);

	return $logger;
};

$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig('../templates', [
        'cache' => false
    ]);

    // Instantiate and add Slim specific extension
    $router = $container->get('router');
    $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    $view->addExtension(new \Slim\Views\TwigExtension($router, $uri));

    return $view;
};

