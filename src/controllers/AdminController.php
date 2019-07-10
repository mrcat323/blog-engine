<?php 

use Psr\Container\ContainerInterface;

use Model\User;
use Model\Post;

class AdminController 
{

	protected $container;

	public function __construct(ContainerInterface $container) 
	{
		$this->container = $container;
	}


	public function index($request, $response) 
	{
		$posts = Post::latest()->get();
		$this->container->view->render($response, 'posts/index.html', ['posts' => $posts, 'email' => $_COOKIE['email']]);
		return $response;
	}

	public function create($request, $response) 
	{
		$name = $request->getAttribute('csrf_name');
	    $value = $request->getAttribute('csrf_value');

		$this->container->view->render($response, 'posts/create.html', ['name' => $name, 'value' => $value]);
		return $response;
	}

	public function store($request, $response, $args) 
	{
		$data = $request->getParams();
		Post::create([
			'title' => $data['title'],
			'text' => $data['text'],
			'pub_date' => time()
		]);

		return $response->withRedirect('/admin/posts');
	}

	public function update($request, $response, $args) 
	{
		$id = $args['id'];
		$data = $request->getParams();
		Post::find($id)->update([
			'title' => $data['title'],
			'text' => $data['text'],
			'pub_date' => time()
		]);

		return $response->withRedirect('/admin/posts');
	}

	public function edit($request, $response, $args) 
	{
		$id = $args['id'];
		$post = Post::find($id);

		$name = $request->getAttribute('csrf_name');
	    $value = $request->getAttribute('csrf_value');

		$this->container->view->render($response, 'posts/edit.html', ['post' => $post, 'name' => $name, 'value' => $value]);

		return $response;
	}

	public function destroy($request, $response, $args) 
	{
		$id = $args['id'];
		$post = Post::find($id)->delete();

		return $response->withRedirect('/');
	}



}