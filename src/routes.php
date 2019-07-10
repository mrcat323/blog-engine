<?php 

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/', '\HomeController:home')->setName('home');

$app->get('/about', function (Request $request, Response $response) {
	$this->view->render($response, '/pages/about.html');
	return $response;
})->setName('about');

$app->get('/blog', '\PostController:index')->setName('blog');

$app->group('/admin', function () use ($app) {
	$app->get('/posts', '\AdminController:index')->setName('post.index');
	$app->get('/post/create', '\AdminController:create')->setName('post.create');

	$app->post('/post/store', '\AdminController:store')->setName('post.store');

	$app->get('/post/{id}/edit', '\AdminController:edit')->setName('post.edit');
	
	$app->post('/post/{id}/update', '\AdminController:update')->setName('post.update');

	$app->post('/post/{id}/delete', '\AdminController:destroy')->setName('post.destroy');
})->add(function ($request, $response, $next) {
	if (!isset($_COOKIE['auth'])) {
		return $response->withRedirect('/login');
	}
	$response = $next($request, $response);
	return $response;
});


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