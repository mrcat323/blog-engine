<?php 

use Psr\Container\ContainerInterface;

use Model\User;

use Model\Post;

class HomeController 
{

	protected $container;

	public function __construct(ContainerInterface $container) 
	{
		$this->container = $container;
	}


	public function home($request, $response, $args) 
	{
		$posts = Post::take(5)->latest()->get();
		$this->container->view->render($response, 'pages/index.html', ['posts' => $posts]);
		return $response;
	}


}