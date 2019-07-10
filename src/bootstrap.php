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

