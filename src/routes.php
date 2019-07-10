<?php 

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/', '\HomeController:home')->setName('home');

$app->get('/about', function (Request $request, Response $response) {
	$this->view->render($response, '/pages/about.html');
	return $response;
})->setName('about');

$app->get('/blog', '\PostController:index')->setName('blog');

$app->get('/post/{id}', '\PostController:show')->setName('post');

