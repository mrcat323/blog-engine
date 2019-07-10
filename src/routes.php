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

$app->get('/login', '\AuthController:showForm')->setName('login.form')->add(function ($request, $response, $next) {
	if (isset($_COOKIE['auth'])) {
		return $response->withRedirect('/admin/posts');
	}

	$response = $next($request, $response);
	return $response;
});

$app->post('/login/auth', '\AuthController:auth')->setName('login.auth')->add(new \Slim\Csrf\Guard());

$app->get('/logout', '\AuthController:logout')->setName('logout');