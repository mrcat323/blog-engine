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
		$name = $request->getAttribute('csrf_name');
        $value = $request->getAttribute('csrf_value');

		$post = Post::find($args['id']);

		$this->container->view->render($response, 'posts/single.html', ['post' => $post, 'name' => $name, 'value' => $value]);
		return $response;
	}

	public function search($request, $response, $args) 
	{
		$query = $request->getParam('word');
		$word = '%' . $query . '%';
		$posts = Post::where('title', 'like', $word)->orWhere('text', 'like', $word)->get();

		$this->container->view->render($response, 'pages/search.html', ['posts' => $posts, 'query' => $query]);

		return $response;
	}


}