<?php 

use Psr\Container\ContainerInterface;

use Xandros15\SlimPagination\Pagination;

use Model\Post;

class PostController 
{

	protected $container;

	public function __construct(ContainerInterface $container) 
	{
		$this->container = $container;
	}


	public function index($request, $response, $args) 
	{

		$page = $_GET['page'] ? $_GET['page'] : 1;
		$limit = 5;
		$posts = Post::skip(($page  - 1) * $limit)->take($limit)->get();

		$pagination = new Pagination($request, $this->container->get('router'), [
			Pagination::OPT_TOTAL => Post::count(),
			Pagination::OPT_PER_PAGE => $limit
		]);

		$this->container->view->render($response, 'pages/blog.html', ['posts' => $posts, 'pagination' => $pagination]);
		return $response;
	}

	public function show($request, $response, $args) 
	{
		$post = Post::find($args['id']);

		$this->container->view->render($response, 'posts/single.html', ['post' => $post);
		return $response;
	}



}